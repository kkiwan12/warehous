<?php
include '../config/function.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_siswa'])) {
    $barcode = validate($_POST['id_siswa']);

    if (is_numeric($barcode)) {



        $query = "SELECT * FROM products 
        WHERE barcode = '$barcode' LIMIT 1";
        $result = mysqli_query($connection, $query);
        if (mysqli_num_rows($result) > 0) {

            $row = mysqli_fetch_array($result);
            $product = $row;

            echo jsonResponse(200, 'success', 'the product founded  !', $product);
        } else {
            jsonResponse(404, 'warning', 'customer not found');
        }
    } else {
        jsonResponse(500, 'warning', 'somthing went wrong');
    }
}




if (isset($_POST['createOrder'])) {

    $customerId = validate($_POST['customer_id']);
    $warehouseId = validate($_POST['warehouse_id']);
    $payment = validate($_POST['payment_mode']);


    //check if the customer available
    $customerCheck = availableChecks('customers', $customerId);
    if ($customerCheck) {
        //check the warehouse is availabl
        $warehouseCheck = availableChecks('warehouseS', $warehouseId);
        if ($warehouseCheck) {

            $data = [
                'warehouse_id' => $warehouseId,
                'customer_id'  => $customerId,
                'payment_type' => $payment,
            ];

            $result = insert('orders', $data);

            if ($result) {
                $lastInsertId = mysqli_insert_id($connection);
                $orderId = $lastInsertId;
            } else {
                redirect('scan.php', 'somthing went wrong');
            }
        } else {
            redirect('scan.php', 'the warehouse is not availabl');
        }
    } else {
        redirect('scan.php', 'this customer is not available');
    }


    foreach ($_POST['id'] as $id => $productId) {

        $quantity = validate($_POST['quantity'][$id]);
        $product = getById('products', $productId);

        $totalprice =  $product['data']['price'] * $quantity;

        //check the product quantity in the warehouse

        $checkProductQuantity = "SELECT * FROM warehouseProducts WHERE product_id = $productId AND warehouse_id = $warehouseId limit 1";
        $checkProductQuantityResult = mysqli_query($connection, $checkProductQuantity);
        if ($checkProductQuantityResult && mysqli_num_rows($checkProductQuantityResult)) {

            $warehouseProduct = mysqli_fetch_array($checkProductQuantityResult);
            if ($warehouseProduct['quantity'] < $quantity) {
                redirect('sacn.php', 'there are no enough' . $product['data']['name'] . ' quantities available in this warehouse');
            }
        } else {
            redirect('scan.php', 'the ' . $product['data']['name'] . ' is not available in this warehouse');
        }

        $productUpdateQuantity = $product['data']['quantity'] - $quantity;

        $productDtat = [ 'quantity' => $productUpdateQuantity];
        
        $updatedProduct = update('products',$productId,$productDtat);
        if(!$updatedProduct){
                redirect('scan.php','cant update product quantity');
        }

        $warehouseUpdateQuantity =  $warehouseProduct['quantity'] - $quantity;
        $warehouseProductData = [ 'quantity' => $warehouseUpdateQuantity];
        $updateWarehouseProduct = "UPDATE warehouseProducts
        SET quantity = $warehouseUpdateQuantity
        WHERE product_id = $productId AND warehouse_id = $warehouseId ";
        $updateWarehouseProductResult = mysqli_query($connection,$updateWarehouseProduct);
        if(!$updateWarehouseProductResult){
            redirect('scan.php','cant update product quantity in the warehouse');
        }
            
        $data = [
            'order_id' => $orderId,
            'product_id' => $productId,
            'quantity' => $quantity,
            'total_price' => $totalprice
        ];

        $OrderResult = insert('orderInfo', $data);

        if (!$OrderResult) {

            redirect('scan.php', 'the order cannot be completed');
        }
    }


    //update the order total amount 
    $totalAmountQuery = "SELECT SUM(total_price) as total_amount FROM orderInfo WHERE order_id = $orderId";
    $totalAmountResult = mysqli_query($connection, $totalAmountQuery);

    if ($totalAmountResult) {
        $totalAmountRow = mysqli_fetch_assoc($totalAmountResult);
        $totalAmount = $totalAmountRow['total_amount'];

        $updateOrderQuery = "UPDATE orders SET total_amount = $totalAmount WHERE id = $orderId";
        $updateOrderResult = mysqli_query($connection, $updateOrderQuery);

        if (!$updateOrderResult) {
            redirect('scan.php', 'Failed to calculate the order total amount');
        }
    } else {
        redirect('scan.php', 'Failed to calculate the order total amount');
    }


    // create the order bell 

    $orderQuery = "SELECT o.id as order_id, c.name as customer_name, w.name as warehouse_name, o.payment_type
        FROM orders o
        JOIN customers c ON o.customer_id = c.id
        JOIN warehouseS w ON o.warehouse_id = w.id
        WHERE o.id = $orderId";
    $orderResult = mysqli_query($connection, $orderQuery);
    $order = mysqli_fetch_assoc($orderResult);

    $orderProductsQuery = "SELECT oi.*, p.name as product_name, p.price as product_price 
        FROM orderInfo oi 
        JOIN products p ON oi.product_id = p.id 
        WHERE oi.order_id = $orderId";
    $orderProductsResult = mysqli_query($connection, $orderProductsQuery);
    $orderProducts = mysqli_fetch_all($orderProductsResult, MYSQLI_ASSOC);

    require('fpdf.php');

    class PDF extends FPDF
    {

        private $totalAmount;
        private $customerNumber;

        function __construct($totalAmount, $customerNumber)
        {
            parent::__construct();
            $this->totalAmount = $totalAmount;
            $this->customerNumber = $customerNumber;
        }

        function Header()
        {
            $this->SetFont('Arial', 'B', 12);
            $this->Cell(0, 10, 'Order Invoice', 0, 1, 'C');
            $this->Ln(10);
        }


        function Footer()
        {
            $this->SetY(-15);
            $this->SetFont('Arial', 'I', 8);
            $this->Cell(0, 10, 'Page ' . $this->PageNo(), 0, 0, 'C');
        }


        function LoadData($order, $orderProducts)
        {
            $this->AddPage();
            $this->SetFont('Arial', '', 12);


            $this->Cell(0, 10, 'Order ID: ' . $order['order_id'], 0, 1);
            $this->Cell(0, 10, 'Customer Name: ' . $order['customer_name'], 0, 1);
            $this->Cell(0, 10, 'Warehouse Name: ' . $order['warehouse_name'], 0, 1);
            $this->Cell(0, 10, 'Payment Mode: ' . $order['payment_type'], 0, 1);
            $this->Ln(10);

            $this->SetFont('Arial', 'B', 12);
            $this->Cell(40, 10, 'Product ID', 1);
            $this->Cell(80, 10, 'Product Name', 1);
            $this->Cell(30, 10, 'Quantity', 1);
            $this->Cell(30, 10, 'Total Price', 1);
            $this->Ln();

            $this->SetFont('Arial', '', 12);
            foreach ($orderProducts as $product) {
                $this->Cell(40, 10, $product['product_id'], 1);
                $this->Cell(80, 10, $product['product_name'], 1);
                $this->Cell(30, 10, $product['quantity'], 1);
                $this->Cell(30, 10, $product['total_price'], 1);
                $this->Ln();
            }


            $this->Ln(10);
            $this->SetFont('Arial', 'B', 12);
            $this->Cell(0, 10, 'Total Amount: ' . $this->totalAmount . '  $', 0, 1);
            $this->Cell(0, 10, 'Customer Number: ' . $this->customerNumber, 0, 1);
        }
    }


    $customerQuery = "SELECT phone FROM customers WHERE id = $customerId";
    $customerResult = mysqli_query($connection, $customerQuery);
    $customer = mysqli_fetch_assoc($customerResult);
    $customerNumber = $customer['phone'];


    $totalAmount = 0;
    foreach ($orderProducts as $product) {
        $totalAmount += $product['total_price'];
    }

    $pdf = new PDF($totalAmount, $customerNumber);
    $pdf->LoadData($order, $orderProducts);

    // Save PDF file to server
    $pdfFileName = 'invoices/invoice_' . $orderId . '.pdf';
    $pdf->Output('F', $pdfFileName);

    $updateOrderQuery = "UPDATE orders SET invoice_path = '$pdfFileName' WHERE id = $orderId";
    $updateOrderResult = mysqli_query($connection, $updateOrderQuery);

    if ($updateOrderResult) {
        redirect('orders.php ','the order created successfully');
    } else {
        echo "Failed to save the invoice path.";
    }
}


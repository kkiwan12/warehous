<?php
include '../config/function.php';

if (isset($_POST['saveAdmin'])) {

    $name = validate($_POST['name']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $phone = validate($_POST['phone']);
    $is_ban = isset($_POST['is_ban']) == true ? 1 : 0;


    if ($name != '' && $email != '' && $password != '') {

        ##### check the phone number to be more than 10 numbers 
        if (strlen($phone) != 10 || !ctype_digit($phone)) {
            redirect('admins-create.php', 'Phone number must be exactly 10 digits.');
        }

        $emailCheck = mysqli_query($connection, "SELECT * FROM admins WHERE email = '$email'");

        if ($emailCheck) {
            // check if the email is already used 
            if (mysqli_num_rows($emailCheck) > 0) {
                redirect('admins-create.php', 'email already used by other users');
            }
        }

        if (strlen($password) < 8) {
            redirect('admins-create.php', 'The Password must be at least 8 characters');
        } else {
            $hashPassword = password_hash($password, PASSWORD_BCRYPT);
        }
        // hashing the password


        $data = [
            'name' => $name,
            'email' => $email,
            'password' => $hashPassword,
            'phone' => $phone,
            'is_ban' => $is_ban,
        ];
        $result = insert('admins', $data);
        if ($result) {
            redirect('admin.php', 'the admin added successfully');
        } else {
            redirect('admins-create.php', 'somthing went wrong!');
        }
    } else {
        redirect('admins-create.php', 'please fill required fields');
    }
}


if (isset($_POST['updateAdmin'])) {

    $adminId = validate($_POST['adminId']);

    $adminData = getById('admins', $adminId);
    if ($adminData['status'] != 200) {
        redirect('admins-edit.php?id=' . $adminId, 'please fill required fields');
    }
    $name = validate($_POST['name']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $phone = validate($_POST['phone']);
    $is_ban = isset($_POST['is_ban']) == true ? 1 : 0;

    if (strlen($phone) != 10 || !ctype_digit($phone)) {
        redirect('admins-edit.php?id=' . $adminId, 'Phone number must be exactly 10 digits.');
    }
    $emailCheckQuery = "SELECT * FROM admins WHERE email = '$email' AND id != '$adminId' ";

    $checkResult = mysqli_query($connection, $emailCheckQuery);
    if ($checkResult) {
        if (mysqli_num_rows($checkResult) > 0) {
            redirect('admins-edit.php?id=' . $adminId, 'The email is already exists');
        }
    }

    if ($password != '') {

        if (strlen($password) < 8) {
            redirect('admins-edit.php?id=' . $adminId, 'The Password must be at least 8 characters');
        } else {
            $hashPassword = password_hash($password, PASSWORD_BCRYPT);
        }
    } else {

        $hashedPassword = $adminData['data']['password'];
    }

    if ($name != '' && $email != '') {

        $data = [
            'name' => $name,
            'email' => $email,
            'password' => $hashedPassword,
            'phone' => $phone,
            'is_ban' => $is_ban,
        ];
        $result = update('admins', $adminId, $data);
        if ($result) {
            redirect('admin.php', 'the admin updated successfully');
        } else {
            redirect('admins-edit.php?id=' . $adminId, 'somthing went wrong!');
        }
    } else {

        redirect('admins-edit.php?id=' . $adminId, 'please fill required fields');
    }
}



//categories list



if (isset($_POST['savecategory'])) {

    $name = validate($_POST['name']);
    $description = validate($_POST['description']);
    $status = isset($_POST['status']) == true ? 1 : 0;


    $categoryCheck = mysqli_query($connection, "SELECT * FROM categories WHERE categoryName ='$name'");
    if ($name != '') {

        $categoryCheck = mysqli_query($connection, "SELECT * FROM categories WHERE categoryName ='$name'");

        if ($categoryCheck) {
            if (mysqli_num_rows($categoryCheck) > 0) {
                redirect('category-create.php', 'the category is already exists');
            }
        }
        $data = [
            'categoryName' => $name,
            'description' => $description,
            'status' => $status
        ];

        $result = insert('categories', $data);

        if ($result) {
            redirect('category.php', 'the category added successfully');
        } else {
            redirect('category-create.php', 'somthing went wrong!');
        }
    } else {
        redirect('category-create.php', 'please fill required fields');
    }
}

if (isset($_POST['updateCategory'])) {

    $categoryId = validate($_POST['categoryId']);

    $categoryData = getById('categories', $categoryId);


    if ($categoryData['status'] != 200) {
        redirect('category-edit.php?id=' . $categoryId, 'please fill required fields');
    }

    $categoryName = validate($_POST['name']);
    $description = validate($_POST['description']);
    $status = isset($_POST['status']) == true ? 1 : 0;

    $categoryCheckQuery = "SELECT * FROM categories WHERE categoryName ='$categoryName' AND id != '$categoryId'";
    $checkResult = mysqli_query($connection, $categoryCheckQuery);
    if ($checkResult) {
        if (mysqli_num_rows($checkResult) > 0) {
            redirect('category-edit.php?id=' . $categoryId, 'the category is already exists');
        }
    }

    if ($categoryName != '') {

        $date = [
            'categoryName' => $categoryName,
            'description' => $description,
            'status' => $status
        ];

        $result = update('categories', $categoryId, $date);
        if ($result) {
            redirect('category.php', 'the category updated successfully');
        } else {
            redirect('categorey-edit.php?id=' . $categoryId, 'somthing went wrong');
        }
    } else {
        redirect('category-edit.php?id=' . $categoryId, 'please fill required fields');
    }
}


//the product list 

if (isset($_POST['saveProduct'])) {

    $category_id = validate($_POST['category_id']);
    $name = validate($_POST['name']);
    $description = validate($_POST['description']);
    $price = validate($_POST['price']);
    $quantity = validate($_POST['quantity']);
    $status = isset($_POST['status']) == true ? 1 : 0;
    $barcode = validate($_POST['barcode']) ;//ADD  qrcode to database 
   
    if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) {

        $path = "../assets/uploads/products/";

      
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }


        $image_ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);


        $fileName = time() . '.' . $image_ext;


        $filePath = $path . $fileName;


        if (move_uploaded_file($_FILES['image']['tmp_name'], $filePath)) {

            $finalImage = $filePath;
        } else {

            $finalImage = '';
        }
    } else {
        $finalImage = '';
    }

    //check the barcode 
    if($barcode != '') {
        if(strlen($barcode) != 10 || !ctype_digit($barcode)){
            redirect('admins-create.php', 'barcode number must be exactly 10 digits.');
        }

        $barcodeCheck = "SELECT * FROM products WHERE barcode = '$barcode' ";
        $barcodeResult = mysqli_query($connection , $barcodeCheck);

        if(mysqli_num_rows($barcodeResult)){
            redirect('products-create.php', 'barcode already exists');
        }
    }

    // move it to view 


    $data = [
        'category_id' => $category_id,
        'name' => $name,
        'description' => $description,
        'image' => $finalImage,
        'price' => $price,
        'quantity' => $quantity,
        'barcode' => $barcode,
        'status' => $status,
    ];

   
    $result = insert('products', $data);


    if ($result) {
        redirect('products.php', 'the product added successfully');
    } else {
        redirect('products-create.php', 'somthing went wrong!');
    }
}


if (isset($_POST['updateProduct'])) {
    $productId = validate($_POST['productId']);

    $productData = getById('products', $productId);
    if ($productData['status'] != 200) {
        redirect('products-edit.php?id=' . $productId, 'No such product found!');
    }

    $category_id = validate($_POST['category_id']);
    $name = validate($_POST['name']);
    $description = validate($_POST['description']);
    $price = validate($_POST['price']);
    $quantity = validate($_POST['quantity']);
    $status = isset($_POST['status']) ? 1 : 0;

    if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) {
        $path = "../assets/uploads/products/";

       
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $image_ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $fileName = time() . '.' . $image_ext;
        $filePath = $path . $fileName;

        if (move_uploaded_file($_FILES['image']['tmp_name'], $filePath)) {
            $finalImage = "assets/uploads/products/" . $fileName;
            $deleteImage = "../" . $productData['data']['image'];
            if (file_exists($deleteImage) && !empty($productData['data']['image'])) {
                unlink($deleteImage);
            }
        } else {
            $finalImage = $productData['data']['image'];
        }
    } else {
        $finalImage = $productData['data']['image'];
    }

    $data = [
        'category_id' => $category_id,
        'name' => $name,
        'description' => $description,
        'image' => $finalImage,
        'price' => $price,
        'quantity' => $quantity,
        'status' => $status,
    ];

    $result = update('products', $productId, $data);

    if ($result) {
        redirect('products.php?category_id='.$category_id, 'Product updated successfully');
    } else {
        redirect('products-edit.php?id=' . $productId, 'Something went wrong!');
    }
}

//customer list 

if(isset($_POST['saveCustomer']))
{

    $name = validate($_POST['name']);
    $email = validate($_POST['email']);
    $phone = validate($_POST['phone']);
    $status =  isset($_POST['status']) == true ? 1 : 0;

    if($name != '' && $email != '' && $phone != '' ){
           ##### check the phone number to be more than 10 numbers 
           if (strlen($phone) != 10 || !ctype_digit($phone)) {
            redirect('customer-create.php', 'Phone number must be exactly 10 digits.');
        }

        $emailCheck = mysqli_query($connection, "SELECT * FROM customers WHERE email = '$email'");
        if ($emailCheck) {
            // check if the email is already used 
            if (mysqli_num_rows($emailCheck) > 0) {
                redirect('customer-create.php', 'email already used by other users');
            }
        }

        $data = [
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'status' => $status
        ];

        $result = insert('customers', $data);
        if($result){
            redirect('customer.php','the customer added successfully');
        }else{
            redirect('customer-create.php','somthing went wrong!');
        }
    }
}

if (isset($_POST['updateCustomer'])) {

    $customerId = validate($_POST['customerId']);
    $customerData = getById('customers', $customerId);

    if ($customerData['status'] != 200) {
        redirect('customer-edit.php?id=' . $customerId, 'Something went wrong!');
    }

    $name = validate($_POST['name']);
    $email = validate($_POST['email']);
    $phone = validate($_POST['phone']);
    $status = isset($_POST['status']) ? 1 : 0;

    // Check  customer
    $emailCheckQuery = "SELECT * FROM customers WHERE email = '$email' AND id != '$customerId'";
    $emailCheckResult = mysqli_query($connection, $emailCheckQuery);

    if ($emailCheckResult && mysqli_num_rows($emailCheckResult) > 0) {
        redirect('customer-edit.php?id=' . $customerId, 'The email is already used by another customer.');
    }
 

    $data = [
        'name' => $name,
        'email' => $email,
        'phone' => $phone,
        'status' => $status,
    ];

    $result = update('customers', $customerId, $data);

    if ($result) {
        redirect('customer.php', 'Customer updated successfully');
    } else {
        redirect('customer-edit.php?id=' . $customerId, 'Something went wrong');
    }
}


/// save Warehouse

if(isset($_POST['saveWarehouse'])){
    $name = validate($_POST['name']);
    $location = validate($_POST['location']);
    $status = isset($_POST['status']) == true ? 1 : 0;

    if($name != '' && $location != ''){
     

            $data = [
                'name' => $name,
                'location' => $location,
                'status' => $status
            ];

            $result = insert('warehouses',$data);

            if($result){
                redirect('warehouse.php','the warehouse added successfully');
            }else{
                redirect('warehouse','somthing failed');
            }
     
    }else{
        redirect('warehouse-create.php','please fill all filled');
    }
    }

    if (isset($_POST['updateWarehouse'])){
        $warehouseID = validate($_POST['warehouseId']);
        $warehouseData = getById('warehouses',$warehouseID);

        if($warehouseData['status'] != 200){
            redirect('warehouse-edit.php?id=' . $warehouseID, 'Something went wrong!');
        }

        $name = validate($_POST['name']);
        $location = validate($_POST['location']);
        $status = isset($_POST['status']) == true ? 1 : 0;

        $data = [
            'name' => $name,
            'location' => $location,
            'status' => $status
        ];

        $result = update('warehouses',$warehouseID,$data);
        if($result){
            redirect('warehouse.php','the warehouse update successfuly');

        }else{
            redirect('warehouse-edit.php?id='.$warehouseID,'somthing went wrong');
        }

    }

    if (isset($_POST['addProductToWarehouse'])) {
        $warehouseId = validate($_POST['warehouseId2']);
        $productId = validate($_POST['product_id']);
        $quantity = validate($_POST['quantity']);
    
        if ($warehouseId != '' && $productId != '' && $quantity != '') {
            // Corrected SQL queries
            $warehouseCheck = "SELECT * FROM `warehouses` WHERE `id` = '$warehouseId' AND `status` = 0 LIMIT 1";
            $warehouseCheckResult = mysqli_query($connection, $warehouseCheck);
            
            if ($warehouseCheckResult && mysqli_num_rows($warehouseCheckResult) > 0) {
                $productCheck = "SELECT * FROM `products` WHERE `id` = '$productId' AND `status` = 0 LIMIT 1";
                $productCheckResult = mysqli_query($connection, $productCheck);
                
                if ($productCheckResult && mysqli_num_rows($productCheckResult) > 0) {
                    $row = mysqli_fetch_array($productCheckResult);
                    if ($row['quantity'] < $quantity) {
                        redirect('warehouse-management.php', 'Only  ' . $row['quantity'] . '  quantity available');
                    }
                    $data = [
                        'warehouse_id' => $warehouseId,
                        'product_id' => $productId,
                        'quantity' => $quantity
                    ];
    
                    
                    $result = insert('warehouseProducts', $data);
    
                    if ($result) {
                        redirect('warehouse-management.php?id=' . $warehouseId, 'Product added to warehouse successfully');
                    } else {
                        redirect('warehouse-management.php?id=' . $warehouseId, 'Failed to add product to warehouse');
                    }
                } else {
                    redirect('warehouse-management.php?id=' . $warehouseId, 'The product is not available');
                }
            } else {
                redirect('warehouse-management.php?id=' . $warehouseId, 'The warehouse is not available');
            }
        } else {
            redirect('warehouse-management.php?id=' . $warehouseId, 'Please fill all required fields');
        }
    }

    
// the scanner function 


?>


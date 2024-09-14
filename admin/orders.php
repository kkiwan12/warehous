<?php
include 'includes/header.php';
$ordersCount = countRecords('orders');
?>
 <div class="container mt-5">
          <div class="row">
            <div class="col-md-6">
            <div class="badge bg-danger "><?= $ordersCount ?></div>
                <h1><i class="bi bi-list-ul"></i> Orders 
                <a href="scan.php" class="btn btn-dark btn-sm rounded-5"><i class="bi bi-plus-lg"></i></a>
              </h1>
            
            </div>
          </div>
</div>

<div class="container-fluid px-4 mt-4   ">
<div class="shadow p-3 mb-4 bg-body-tertiary rounded-4  "  >
    <div class="card-borderless text-center">

        <div class="card-title text-warning mb-3 ">
            <?php alertMessage() ?>
            <i class="fas fa-table me-1"></i>
            The Orders Manager  

           
        </div>
        <div class="card-body">
        <?php
            
            $orders = getAll('orders');
            if (mysqli_num_rows($orders) > 0) { ?>
            <table id="datatablesSimple"   class="display compact" style="width:100%" >
                <thead>
                    <tr>
                        <th>id</th>
                        <th>warehouse </th>
                        <th>Customer </th>
                        <th>Payment type</th>
                        <th>Total amount</th>
                    
                        <th>Status</th>
                        <th>Created at</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>id</th>
                        <th>warehouse </th>
                        <th>Customer </th>
                        <th>Payment type</th>
                        <th>Total amount</th>
                     
                        <th>Status</th>
                        <th>Created at</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                 

                        <?php foreach ($orders as $order) {
                            
                            $warehouse = getById('warehouses',$order['warehouse_id']);
                            $customer = getById('customers',$order['customer_id']);

                            ?>
                            <tr>
                                <td><?= $order['id'] ?></td>
                              
                                <td><?= $warehouse['data']['name'] ?></td>
                                <td><?= $customer['data']['name'] ?></td>
                                <td><?= $order['payment_type'] ?></td>
                                <td><?= $order['total_amount'] ?> $$</td>
                              
                                <td><?php
                                    if ($order['status'] == 1) {
                                        echo '<span class="badge  bg-success">Delivered</span>';
                                    } else {
                                        echo '<span class="badge bg-danger">Hold</span>';
                                    }
                                    ?></td>
                                <td><?= $order['created_at'] ?></td>
                                <td>
                                   
                                    <a href="orders-delete.php?id=<?= $order['id']; ?>" class="btn btn-danger btn-sm rounded-5"><i class="bi bi-trash"></i></a>
                                    <a href="orders-edit.php?id=<?= $order['id']; ?>" class="btn btn-primary btn-sm rounded-5">delivery <i class="bi bi-truck"></i></a>

                                </td>

                            </tr>
                        <?php } ?>

                </tbody>
            </table>
        </div>
    <?php } else { ?>
        <tr>
            <td colspan="4">No Records found</td>

        </tr>
    <?php } ?>
    </div>
</div>
</div>
<?php
include 'includes/footer.php';
?>
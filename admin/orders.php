<?php
include 'includes/header.php';
$ordersCount = countRecords('orders');
?>
 <div class="container mt-5">
          <div class="row">
            <div class="col-md-6">
            <div class="badge bg-danger "><?= $ordersCount ?></div>
                <h1><i class="bi bi-list-ul"></i> Orders   </h1>
            
            </div>
          </div>
</div>

<div class="container-fluid px-4 mt-4   ">
    <div class="card mb-4">

        <div class="card-header bg-warning">
            <?php alertMessage() ?>
            <i class="fas fa-table me-1"></i>
            The Orders Manager

            <a href="scan.php" class="btn btn-dark btn-sm text-end"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                </svg></a>
        </div>
        <div class="card-body">
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
                    <?php
            
                    $orders = getAll('orders');
                    if (mysqli_num_rows($orders) > 0) { ?>

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
                                   
                                    <a href="orders-delete.php?id=<?= $order['id']; ?>" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>
                                    <a href="orders-edit.php?id=<?= $order['id']; ?>" class="btn btn-primary btn-sm">delivery <i class="bi bi-truck"></i></a>

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
<?php
include 'includes/footer.php';
?>
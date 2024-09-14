<?php include "includes/header.php";
$invoicesCount = countRecords('invoices');
?>
<?php if($_SESSION['lang'] == 'en'): ?>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <div class="badge bg-danger "><?= $invoicesCount ?></div>
            <h1><i class="bi bi-receipt-cutoff"></i>Daily invoices

            </h1>

        </div>
    </div>
</div>

<div class="container-fluid px-4 mt-4   ">
    <div class="shadow p-3 mb-4 bg-body-tertiary rounded-4  ">
        <div class="card-borderless text-center">

            <div class="card-header ">
                <?php alertMessage() ?>
                <h4 class="card-title text-primary mb-3 ">
                    <i class="fas fa-table me-1"></i>
                    The Invoices
                </h4>

            </div>
            <div class="card-body">
                <?php
                $invoices = getAll('invoices');
                if (mysqli_num_rows($invoices) > 0) { ?>
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>pin</th>
                                <th>player name </th>
                                <th>description</th>
                                <th>amount</th>
                                <th>signed by</th>
                                <th>created_at</th>

                                <th>action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>id</th>
                                <th>pin</th>
                                <th>player name </th>
                                <th>description</th>
                                <th>amount</th>
                                <th>signed by</th>
                                <th>created_at</th>

                                <th>action</th>
                            </tr>
                        </tfoot>
                        <tbody>

                            <?php foreach ($invoices as $invoice) : ?>
                                <tr>
                                    <td><?= $invoice['id'] ?></td>
                                    <td><?= $invoice['pin'] ?></td>
                                    <td><?php $playerId =  $invoice['player_id'];
                                        $playerData = getById('players', $playerId);
                                        echo  $playerData['data']['first_name'] . ' ' . $playerData['data']['last_name']
                                        ?></td>
                                    <td><?= $invoice['description'] ?></td>
                                    <td><?= $invoice['amount'] ?> $</td>
                                    <td><?php $adminId =  $invoice['admin_id'];
                                        $adminrData = getById('admins', $adminId);
                                        echo  $adminrData['data']['name']
                                        ?></td>
                                    <td><?= $invoice['created_at'] ?></td>

                                    <td>

                                        <a href="invoices-delete.php?id=<?= $invoice['id']; ?>" class="btn btn-danger btn-sm rounded-5"><i class="bi bi-trash"></i></a>
                                    </td>

                                </tr>
                            <?php endforeach; ?>

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
<?php else: ?>
    
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <div class="badge bg-danger "><?= $invoicesCount ?></div>
            <h1><i class="bi bi-receipt-cutoff"></i>وصولات الاعبين

            </h1>

        </div>
    </div>
</div>

<div class="container-fluid px-4 mt-4   ">
    <div class="shadow p-3 mb-4 bg-body-tertiary rounded-4  ">
        <div class="card-borderless text-center">

            <div class="card-header ">
                <?php alertMessage() ?>
                <h4 class="card-title text-primary mb-3 ">
                    <i class="fas fa-table me-1"></i>
                   الوصولات
                </h4>

            </div>
            <div class="card-body">
                <?php
                $invoices = getAll('invoices');
                if (mysqli_num_rows($invoices) > 0) { ?>
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>رقم الوصل الورقي</th>
                                <th>اسم الاعب </th>
                                <th>وصف الوصل</th>
                                <th>القيمه</th>
                                <th>موقع من قبل</th>
                                <th>تاريخ الوصل</th>

                                <th>action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                            <th>id</th>
                                <th>رقم الوصل الورقي</th>
                                <th>اسم الاعب </th>
                                <th>وصف الوصل</th>
                                <th>القيمه</th>
                                <th>موقع من قبل</th>
                                <th>تاريخ الوصل</th>

                                <th>action</th>
                            </tr>
                        </tfoot>
                        <tbody>

                            <?php foreach ($invoices as $invoice) : ?>
                                <tr>
                                    <td><?= $invoice['id'] ?></td>
                                    <td>#<?= $invoice['pin'] ?></td>
                                    <td><?php $playerId =  $invoice['player_id'];
                                        $playerData = getById('players', $playerId);
                                        echo  $playerData['data']['first_name'] . ' ' . $playerData['data']['last_name']
                                        ?></td>
                                    <td><?= $invoice['description'] ?></td>
                                    <td><?= $invoice['amount'] ?> $</td>
                                    <td><?php $adminId =  $invoice['admin_id'];
                                        $adminrData = getById('admins', $adminId);
                                        echo  $adminrData['data']['name']
                                        ?></td>
                                    <td><?= $invoice['created_at'] ?></td>

                                    <td>

                                        <a href="invoices-delete.php?id=<?= $invoice['id']; ?>" class="btn btn-danger btn-sm rounded-5"><i class="bi bi-trash"></i></a>
                                    </td>

                                </tr>
                            <?php endforeach; ?>

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
<?php endif; ?>
<?php include "includes/footer.php"; ?>
<?php
include 'includes/header.php';
$warehousesCount = countRecords('warehouses');
?>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <div class="badge bg-danger "><?= $warehousesCount ?></div>
            <h1><i class="bi bi-building"></i> Warehouses
                <a href="warehouse-create.php" class="btn btn-dark btn-sm  rounded-5"><i class="bi bi-plus-lg"></i>
                </a>
            </h1>

        </div>
    </div>
</div>
<div class="container-fluid px-4 mt-4   ">
    <div class="shadow p-3 mb-4 bg-body-tertiary rounded-4  ">
        <div class="card-borderless text-center">

            <div class="card-header">
                <?php alertMessage() ?>
                <i class="fas fa-table me-1"></i>
                The warehouses


            </div>
            <div class="card-body">
                <?php
                $warehouses = getAll('warehouses');
                if (mysqli_num_rows($warehouses) > 0) { ?>
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Name</th>
                                <th>location</th>
                                <th>status</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>id</th>
                                <th>Name</th>
                                <th>location</th>
                                <th>status</th>
                                <th>action</th>
                            </tr>
                        </tfoot>
                        <tbody>

                            <?php foreach ($warehouses as $warehouse) : ?>
                                <tr>
                                    <td><?= $warehouse['id'] ?></td>
                                    <td><?= $warehouse['name'] ?></td>
                                    <td><?= $warehouse['location'] ?></td>

                                    <td><?php
                                        if ($warehouse['status'] == 1) {
                                            echo '<span class="badge bg-danger">Hidden</span>';
                                        } else {
                                            echo '<span class="badge bg-success">Visible</span>';
                                        }
                                        ?></td>

                                    <td>
                                        <a href="warehouse-edit.php?id=<?= $warehouse['id']; ?>" class="btn btn-primary btn-sm rounded-5"><i class="bi bi-pencil-square"></i></a>
                                        <a href="warehouse-delete.php?id=<?= $warehouse['id']; ?>" class="btn btn-danger btn-sm rounded-5"><i class="bi bi-trash"></i></a>
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
<?php include 'includes/footer.php' ?>
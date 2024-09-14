<?php
include 'includes/header.php';
$adminsCount = countRecords('admins');
?>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 ">
            <div class="badge bg-danger "><?= $adminsCount ?></div>
            <h1><i class="bi bi-people"></i> Admins/staff <a href="admins-create.php" class="btn btn-dark btn-sm  rounded-5"><i class="bi bi-plus-lg"></i>
                </a>
            </h1>


        </div>
    </div>
</div>
<div class="container-fluid px-4 mt-4   ">
<div class="shadow p-3 mb-4 bg-body-tertiary rounded-4  " >
    <div class="card-borderless text-center">

        <div class="card-header "">
                            <?php alertMessage() ?>
                                <i class=" fas fa-table me-1"></i>
            The admins


        </div>
        <div class="card-body">
        <?php
                    $admins = getAll('admins');
                    if (mysqli_num_rows($admins) > 0) { ?>
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>salary</th>
                        <th>status</th>
                        <th>Created at</th>
                        </th>
                        <th>action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>salary</th>
                        <th>status</th>
                        <th>Created at</th>
                        </th>
                        <th>action</th>
                    </tr>
                </tfoot>
                <tbody>
           
                        <?php foreach ($admins as $admin) : ?>
                            <tr>
                                <td><?= $admin['id'] ?></td>
                                <td><?= $admin['name'] ?></td>
                                <td><?= $admin['email'] ?></td>
                                <td><?= $admin['phone'] ?></td>
                                <td><?= $admin['salary'] ?> $</td>
                                <td><?php
                                    if ($admin['is_ban'] == 1) {
                                        echo '<span class="badge bg-danger">banned</span>';
                                    } else {
                                        echo '<span class="badge bg-success">active</span>';
                                    }
                                    ?></td>
                                <td><?= $admin['created_at'] ?></td>
                                <td>
                                    <a href="admins-edit.php?id=<?= $admin['id']; ?>" class="btn btn-primary btn-sm rounded-5"><i class="bi bi-pencil-square"></i></a>
                                    <a href="admins-delete.php?id=<?= $admin['id']; ?>" class="btn btn-danger btn-sm rounded-5"><i class="bi bi-trash"></i></a>
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
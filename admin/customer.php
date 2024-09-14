<?php
include 'includes/header.php';
$customersCount = countRecords('customers');
?>
<?php if($_SESSION['lang'] == 'en'): ?>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <div class="badge bg-danger "><?= $customersCount ?></div>
            <h1><i class="bi bi-people-fill"></i> Customers
                <a href="customer-create.php" class="btn btn-dark btn-sm rounded-5"><i class="bi bi-plus-lg"></i></a>
            </h1>

        </div>
    </div>
</div>
<div class="container-fluid px-4 mt-4   ">
    <div class="shadow p-3 mb-4 bg-body-tertiary rounded-4  ">
        <div class="card-borderless text-center">

            <div class="card-title text-primary mb-3 ">
                <?php alertMessage() ?>
                <h4 class="card-title text-primary mb-3 ">
                    <i class="fas fa-table me-1"></i>
                    The customers
                </h4>

            </div>
            <div class="card-body">
                <?php
                $customers = getAll('customers');
                if (mysqli_num_rows($customers) > 0) { ?>
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Name</th>
                                <th>email</th>
                                <th>phone</th>
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
                                <th>email</th>
                                <th>phone</th>
                                <th>status</th>
                                <th>Created at</th>
                                </th>
                                <th>action</th>
                            </tr>
                        </tfoot>
                        <tbody>

                            <?php foreach ($customers as $customer) : ?>
                                <tr>
                                    <td><?= $customer['id'] ?></td>
                                    <td><?= $customer['name'] ?></td>
                                    <td><?= $customer['email'] ?></td>
                                    <td><?= $customer['phone'] ?></td>
                                    <td><?php
                                        if ($customer['status'] == 1) {
                                            echo '<span class="badge bg-danger">Hidden</span>';
                                        } else {
                                            echo '<span class="badge bg-success">Visible</span>';
                                        }
                                        ?></td>
                                    <td><?= $customer['created_at'] ?></td>
                                    <td>
                                        <a href="customer-edit.php?id=<?= $customer['id']; ?>" class="btn btn-primary btn-sm rounded-5"><i class="bi bi-pencil-square"></i></a>
                                        <a href="customer-delete.php?id=<?= $customer['id']; ?>" class="btn btn-danger btn-sm rounded-5"><i class="bi bi-trash"></i></a>
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
            <div class="badge bg-danger "><?= $customersCount ?></div>
            <h1><i class="bi bi-people-fill"></i> اولياء الامور
                <a href="customer-create.php" class="btn btn-dark btn-sm rounded-5"><i class="bi bi-plus-lg"></i></a>
            </h1>

        </div>
    </div>
</div>
<div class="container-fluid px-4 mt-4   ">
    <div class="shadow p-3 mb-4 bg-body-tertiary rounded-4  ">
        <div class="card-borderless text-center">

            <div class="card-title text-primary mb-3 ">
                <?php alertMessage() ?>
                <h4 class="card-title text-primary mb-3 ">
                    <i class="fas fa-table me-1"></i>
                    اولياء الامور
                </h4>

            </div>
            <div class="card-body">
                <?php
                $customers = getAll('customers');
                if (mysqli_num_rows($customers) > 0) { ?>
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>الاسم</th>
                                <th>البريد</th>
                                <th>الهاتف</th>
                                <th>الحاله</th>
                                <th>تاريخ الاضافه</th>
                                </th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                            <th>id</th>
                                <th>الاسم</th>
                                <th>البريد</th>
                                <th>الهاتف</th>
                                <th>الحاله</th>
                                <th>تاريخ الاضافه</th>
                                </th>
                                <th>action</th>
                            </tr>
                        </tfoot>
                        <tbody>

                            <?php foreach ($customers as $customer) : ?>
                                <tr>
                                    <td><?= $customer['id'] ?></td>
                                    <td><?= $customer['name'] ?></td>
                                    <td><?= $customer['email'] ?></td>
                                    <td><?= $customer['phone'] ?></td>
                                    <td><?php
                                        if ($customer['status'] == 1) {
                                            echo '<span class="badge bg-danger">معلق</span>';
                                        } else {
                                            echo '<span class="badge bg-success">فعال</span>';
                                        }
                                        ?></td>
                                    <td><?= $customer['created_at'] ?></td>
                                    <td>
                                        <a href="customer-edit.php?id=<?= $customer['id']; ?>" class="btn btn-primary btn-sm rounded-5"><i class="bi bi-pencil-square"></i></a>
                                        <a href="customer-delete.php?id=<?= $customer['id']; ?>" class="btn btn-danger btn-sm rounded-5"><i class="bi bi-trash"></i></a>
                                    </td>

                                </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
            </div>
        <?php } else { ?>
            <tr>
                <td colspan="4">لايوجد بيانات</td>

            </tr>
        <?php } ?>
        </div>
    </div>
</div>

    <?php endif; ?>
<?php include 'includes/footer.php' ?>
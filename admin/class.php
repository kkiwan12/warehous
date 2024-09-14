<?php include "includes/header.php";
$classCount = countRecords('class');
?>
<?php if($_SESSION['lang'] == 'en'): ?>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <div class="badge bg-danger "><?= $classCount ?></div>
            <h1><i class="bi bi-calendar-week"></i> Classes
                <a href="class-create.php" class="btn btn-dark btn-sm rounded-5"><i class="bi bi-plus-lg"></i></a>
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
                    The Classes
                </h4>

            </div>
            <div class="card-body">
                <?php
                $classes = getAll('class');
                if (mysqli_num_rows($classes) > 0) { ?>
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Name</th>
                                <th>start at</th>
                                <th>end at</th>
                                <th>players number</th>
                                <th>days</th>
                                <th>status</th>

                                <th>action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>id</th>
                                <th>Name</th>
                                <th>start at</th>
                                <th>end at</th>
                                <th>players number</th>
                                <th>days</th>
                                <th>status</th>

                                <th>action</th>
                            </tr>
                        </tfoot>
                        <tbody>

                            <?php foreach ($classes as $class) : ?>
                                <tr>
                                    <td><?= $class['id'] ?></td>
                                    <td><?= $class['name'] ?></td>
                                    <td><?= $class['time'] ?></td>
                                    <td><?= $class['end_at'] ?></td>
                                    <td><?php 
                                    $numberOfPlayers = countOfPlayersInClass($class['id']);
                                    echo $numberOfPlayers;
                                    ?></td>
                                    <td><?= $class['days'] ?></td>
                                    <td><?php
                                        if ($class['status'] == 1) {
                                            echo '<span class="badge bg-danger">Hidden</span>';
                                        } else {
                                            echo '<span class="badge bg-success">Visible</span>';
                                        }
                                        ?></td>

                                    <td>
                                        <a href="class-edit.php?id=<?= $class['id']; ?>" class="btn btn-primary btn-sm rounded-5"><i class="bi bi-pencil-square"></i></a>
                                        <a href="class-delete.php?id=<?= $class['id']; ?>" class="btn btn-danger btn-sm rounded-5"><i class="bi bi-trash"></i></a>
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
            <div class="badge bg-danger "><?= $classCount ?></div>
            <h1><i class="bi bi-calendar-week"></i> الحصص
                <a href="class-create.php" class="btn btn-dark btn-sm rounded-5"><i class="bi bi-plus-lg"></i></a>
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
                    الحصص
                </h4>

            </div>
            <div class="card-body">
                <?php
                $classes = getAll('class');
                if (mysqli_num_rows($classes) > 0) { ?>
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>اسم الحصه</th>
                                <th>تبدا</th>
                                <th>تنتهي</th>
                                <th>عدد الطلاب في الحصه</th>
                                <th>الايام</th>
                                <th>الحاله</th>

                                <th>action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                            <th>id</th>
                                <th>اسم الحصه</th>
                                <th>تبدا</th>
                                <th>تنتهي</th>
                                <th>عدد الطلاب في الحصه</th>
                                <th>الايام</th>
                                <th>الحاله</th>

                                <th>action</th>
                        </tfoot>
                        <tbody>

                            <?php foreach ($classes as $class) : ?>
                                <tr>
                                    <td><?= $class['id'] ?></td>
                                    <td><?= $class['name'] ?></td>
                                    <td><?= $class['time'] ?></td>
                                    <td><?= $class['end_at'] ?></td>
                                    <td><?php 
                                    $numberOfPlayers = countOfPlayersInClass($class['id']);
                                    echo $numberOfPlayers;
                                    ?></td>
                                    <td><?= $class['days'] ?></td>
                                    <td><?php
                                        if ($class['status'] == 1) {
                                            echo '<span class="badge bg-danger">مخفيه</span>';
                                        } else {
                                            echo '<span class="badge bg-success">مرئيه</span>';
                                        }
                                        ?></td>

                                    <td>
                                        <a href="class-edit.php?id=<?= $class['id']; ?>" class="btn btn-primary btn-sm rounded-5"><i class="bi bi-pencil-square"></i></a>
                                        <a href="class-delete.php?id=<?= $class['id']; ?>" class="btn btn-danger btn-sm rounded-5"><i class="bi bi-trash"></i></a>
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
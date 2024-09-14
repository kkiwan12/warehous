<?php include "includes/header.php";
$eventsCount = countRecords('events');
?>
<?php if($_SESSION['lang'] == 'en'): ?>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <div class="badge bg-danger "><?= $eventsCount ?></div>
            <h1><i class="bi bi-calendar-week"></i> Events
                <a href="events-create.php" class="btn btn-dark btn-sm rounded-5"><i class="bi bi-plus-lg"></i></a>
            </h1>

        </div>
    </div>
</div>

<div class="container-fluid px-4 mt-4   ">
    <div class="shadow p-3 mb-4 bg-body-tertiary rounded-4  ">
        <div class="card-borderless text-center">

            <div class="card-header ">
                <?php alertMessage() ?>
                <i class="fas fa-table me-1"></i>
                The Events


            </div>
            <div class="card-body">
                <?php
                $events = getAll('events');
                if (mysqli_num_rows($events) > 0) { ?>
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Name</th>
                                <th>info</th>
                                <th>fees</th>
                                <th>time</th>
                                <th>date</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>id</th>
                                <th>Name</th>
                                <th>info</th>
                                <th>fees</th>
                                <th>time</th>
                                <th>date</th>
                                <th>action</th>
                            </tr>
                        </tfoot>
                        <tbody>

                            <?php foreach ($events as $event) : ?>
                                <tr>
                                    <td><?= $event['id'] ?></td>
                                    <td><?= $event['name'] ?></td>
                                    <td><?= $event['info'] ?></td>
                                    <td><?= $event['fees'] ?></td>
                                    <td><?= $event['time'] ?></td>
                                    <td><?= $event['date'] ?></td>


                                    <td>
                                        <a href="class-edit.php?id=<?= $event['id']; ?>" class="btn btn-primary btn-sm rounded-5"><i class="bi bi-pencil-square"></i></a>
                                        <a href="class-delete.php?id=<?= $event['id']; ?>" class="btn btn-danger btn-sm rounded-5"><i class="bi bi-trash"></i></a>
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
            <div class="badge bg-danger "><?= $eventsCount ?></div>
            <h1><i class="bi bi-calendar-week"></i> الانشطه
                <a href="events-create.php" class="btn btn-dark btn-sm rounded-5"><i class="bi bi-plus-lg"></i></a>
            </h1>

        </div>
    </div>
</div>

<div class="container-fluid px-4 mt-4   ">
    <div class="shadow p-3 mb-4 bg-body-tertiary rounded-4  ">
        <div class="card-borderless text-center">

            <div class="card-header ">
                <?php alertMessage() ?>
                <i class="fas fa-table me-1"></i>
                الانشطه


            </div>
            <div class="card-body">
                <?php
                $events = getAll('events');
                if (mysqli_num_rows($events) > 0) { ?>
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>اسم النشاط</th>
                                <th>معلومات النشاط</th>
                                <th>الرسوم</th>
                                <th>الوقت</th>
                                <th>التاريخ</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                            <th>id</th>
                                <th>اسم النشاط</th>
                                <th>معلومات النشاط</th>
                                <th>الرسوم</th>
                                <th>الوقت</th>
                                <th>التاريخ</th>
                                <th>action</th>
                            </tr>
                        </tfoot>
                        <tbody>

                            <?php foreach ($events as $event) : ?>
                                <tr>
                                    <td><?= $event['id'] ?></td>
                                    <td><?= $event['name'] ?></td>
                                    <td><?= $event['info'] ?></td>
                                    <td><?= $event['fees'] ?></td>
                                    <td><?= $event['time'] ?></td>
                                    <td><?= $event['date'] ?></td>


                                    <td>
                                       
                                        <a href="class-delete.php?id=<?= $event['id']; ?>" class="btn btn-danger btn-sm rounded-5"><i class="bi bi-trash"></i></a>
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
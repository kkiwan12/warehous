<?php
include 'includes/header.php';

$playerCount = countRecords('players');
checkAndUpdatePlayerStatus();
?>
<?php if($_SESSION['lang']=='en') : ?>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <div class="badge bg-danger "><?= $playerCount ?></div>
            <h1><i class="bi bi-person-raised-hand"></i> players
                <a href="players-create.php" class="btn btn-dark btn-sm  rounded-5"><i class="bi bi-plus-lg"></i>
                </a>
            </h1>

        </div>
    </div>
</div>
<div class="container-fluid px-4 mt-4   ">
    <div class="shadow p-3 mb-4 bg-body-tertiary rounded-4">
        <div class="card-borderless text-center">
            <div class="card-body">
                <h4 class="card-title text-warning mb-3 "><i class="bi bi-calendar-week"></i> Classes </h4>
                <p class="card-text "><?php
                                        $classes = getAll('class');
                                        ?>
                    <select id="ClassSelect" class="form-select" onchange="getPlayersByClass()">
                        <option value="">select class</option>
                        <?php
                        if (mysqli_num_rows($classes) > 0) {
                            foreach ($classes as $class) {
                                echo '<option value="' . $class['id'] . '">' . $class['name'] . '</option>';
                            }
                        } else {
                            echo '<option value="">No categories found</option>';
                        }
                        ?>
                    </select>
                </p>
            </div>
        </div>
    </div>

    <div class="shadow p-3 mb-4 bg-body-tertiary rounded-4  ">
        <div class="card-borderless text-center">

            <div class="card-header ">
                <?php alertMessage() ?>
                <h4 class="card-title text-primary mb-3 ">
                    <i class="fas fa-table me-1"></i>
                    The Players
                </h4>


            </div>
            <div class="card-body">
                <?php

                $classId = isset($_GET['class_id']) ? validate($_GET['class_id']) : '';

                if (!empty($classId)) {
                    $Players = getPlayersByClass($classId);
                } else {
                    $Players = getAll('players');
                }

                if (mysqli_num_rows($Players) > 0) { ?>
                    <table id="datatablesSimple" class="row-border" style="width:100%">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Image</th>
                                <th>first name</th>
                                <th>last name</th>
                                <th>belt</th>

                                <th>fees</th>
                                <th>bus</th>


                                <th>status</th>

                                <th>action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>id</th>
                                <th>Image</th>
                                <th>first name</th>
                                <th>last name</th>
                                <th>belt</th>
                                <th>fees</th>
                                <th>bus</th>


                                <th>status</th>

                                <th>action</th>
                            </tr>
                        </tfoot>
                        <tbody>

                            <?php foreach ($Players as $player) : ?>
                                <tr>
                                    <td><?= $player['id'] ?></td>
                                    <td>
                                        <?php
                                        if ($player['image']  == '') {
                                        ?> <img src="../assets//uploads/icons/taekwondo.jpg" style="width: 50px; height: 50px;   border-radius: 50%;" alt="">
                                        <?php
                                        } else {
                                        ?>
                                            <img src="<?= $player['image']; ?>" style="width: 50px; height: 50px;   border-radius: 50%;" alt="">
                                        <?php } ?>
                                    </td>
                                    <td><?= $player['first_name'] ?></td>
                                    <td><?= $player['last_name'] ?></td>
                                    <td> <?php
                                            $belt = $player['belt'];
                                            if ($belt == 1) {
                                            ?> <p class="card-text"><i class="bi bi-circle"></i> white</p> <?php
                                                                                                        } else if ($belt == 2) {
                                                                                                            ?> <p class="card-text"><i class="bi bi-circle-fill text-warning"> </i> yallow</p> <?php
                                                                                                                                                                                } else if ($belt == 3) {
                                                                                                                                                                                    ?> <p class="card-text"><i class="bi bi-circle-fill text-success"> </i> green</p> <?php
                                                                                                                                                                                                    } else if ($belt == 4) {
                                                                                                                                                                                                        ?> <p class="card-text"><i class="bi bi-circle-fill text-primary"> </i> blue</p> <?php
                                                                                                                                                                                                    } else if ($belt == 5) {
                                                                                                                                                                                                        ?> <p class="card-text"><i class="bi bi-circle-fill" style="color: #964B00;"></i> brown</p> <?php
                                                                                                                                                                                                            } else if ($belt == 6) {
                                                                                                                                                                                                                ?> <p class="card-text"><i class="bi bi-circle-fill text-danger"> </i> red</p> <?php
                                                                                                                                                                                                            } else if ($belt == 7) {
                                                                                                                                                                                                            ?> <p class="card-text"><i class="bi bi-1-circle-fill"></i> black</p> <?php
                                                                                                                                                                                                            } else if ($belt == 8) {
                                                                                                                                                                                        ?> <p class="card-text"><i class="bi bi-2-circle-fill"></i> </i> dan</p> <?php
                                                                                                                                                                                                            } else if ($belt == 9) {
                                                                                                                                                                                    ?> <p class="card-text"><i class="bi bi-3-circle-fill"></i> </i> dan</p> <?php
                                                                                                                                                                                                            } else if ($belt == 10) {
                                                                                                                                                                                        ?> <p class="card-text"><i class="bi bi-4-circle-fill"></i> dan</p> <?php
                                                                                                                                                                                                            } else if ($belt == 11) {
                                                                                                                                                                                ?> <p class="card-text"><i class="bi bi-5-circle-fill"></i> </i> dan</p> <?php
                                                                                                                                                                                                            } else if ($belt == 12) {
                                                                                                                                                                                ?> <p class="card-text"><i class="bi bi-6-circle-fill"></i> </i> dan</p> <?php
                                                                                                                                                                                                            }
                                                                                                                                                                                        ?>
                                    </td>
                                    <td><?= $player['fees'] ?> $$</td>
                                    <td><?php
                                        if ($player['bus'] == 0) {
                                            echo '<span class="badge bg-warning" ><i class="bi bi-person-walking"></i></span>';
                                        } else {
                                            echo '<span class="badge bg-primary"><i class="bi bi-bus-front"></i></span>';
                                        }
                                        ?></td>


                                    <td><?php
                                        if ($player['status'] == 1) {
                                            echo '<span class="badge bg-danger">suspended</span>';
                                        } else {
                                            echo '<span class="badge bg-success">active</span>';
                                        }
                                        ?></td>




                                    <td>

                                        <a href="players-edit.php?id=<?= $player['id']; ?>" class="btn btn-primary btn-sm" style=" border-radius: 50%;"><i class="bi bi-pencil-square"></i></a>
                                        <a href="players-delete.php?id=<?= $player['id']; ?>" class="btn btn-danger btn-sm" style=" border-radius: 50%;"><i class="bi bi-trash"></i></a>
                                        <a href="players-view.php?id=<?= $player['id']; ?>" class="btn btn-secondary btn-sm" style=" border-radius: 50%;"><i class="bi bi-eye-fill"></i></i></a>

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
            <div class="badge bg-danger "><?= $playerCount ?></div>
            <h1><i class="bi bi-person-raised-hand"></i> الاعبين
                <a href="players-create.php" class="btn btn-dark btn-sm  rounded-5"><i class="bi bi-plus-lg"></i>
                </a>
            </h1>

        </div>
    </div>
</div>
<div class="container-fluid px-4 mt-4   ">
    <div class="shadow p-3 mb-4 bg-body-tertiary rounded-4">
        <div class="card-borderless text-center">
            <div class="card-body">
                <h4 class="card-title text-warning mb-3 "><i class="bi bi-calendar-week"></i> الحصص </h4>
                <p class="card-text "><?php
                                        $classes = getAll('class');
                                        ?>
                    <select id="ClassSelect" class="form-select" onchange="getPlayersByClass()">
                        <option value="">اختر الحصه</option>
                        <?php
                        if (mysqli_num_rows($classes) > 0) {
                            foreach ($classes as $class) {
                                echo '<option value="' . $class['id'] . '">' . $class['name'] . '</option>';
                            }
                        } else {
                            echo '<option value="">لايوجد حصص متاحه</option>';
                        }
                        ?>
                    </select>
                </p>
            </div>
        </div>
    </div>

    <div class="shadow p-3 mb-4 bg-body-tertiary rounded-4  ">
        <div class="card-borderless text-center">

            <div class="card-header ">
                <?php alertMessage() ?>
                <h4 class="card-title text-primary mb-3 ">
                    <i class="fas fa-table me-1"></i>
                    اللاعبين
                </h4>


            </div>
            <div class="card-body">
                <?php

                $classId = isset($_GET['class_id']) ? validate($_GET['class_id']) : '';

                if (!empty($classId)) {
                    $Players = getPlayersByClass($classId);
                } else {
                    $Players = getAll('players');
                }

                if (mysqli_num_rows($Players) > 0) { ?>
                    <table id="datatablesSimple" class="row-border" style="width:100%">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>صورة اللاعب</th>
                                <th>الاسم الاول</th>
                                <th>الاسم الاخير</th>
                                <th>الحزام</th>

                                <th>الرسوم</th>
                                <th>باص</th>


                                <th>الحاله</th>

                                <th>action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                            <th>id</th>
                                <th>صورة اللاعب</th>
                                <th>الاسم الاول</th>
                                <th>الاسم الاخير</th>
                                <th>الحزام</th>

                                <th>الرسوم</th>
                                <th>باص</th>


                                <th>الحاله</th>

                                <th>action</th>
                            </tr>
                        </tfoot>
                        <tbody>

                            <?php foreach ($Players as $player) : ?>
                                <tr>
                                    <td><?= $player['id'] ?></td>
                                    <td>
                                        <?php
                                        if ($player['image']  == '') {
                                        ?> <img src="../assets//uploads/icons/taekwondo.jpg" style="width: 50px; height: 50px;   border-radius: 50%;" alt="">
                                        <?php
                                        } else {
                                        ?>
                                            <img src="<?= $player['image']; ?>" style="width: 50px; height: 50px;   border-radius: 50%;" alt="">
                                        <?php } ?>
                                    </td>
                                    <td><?= $player['first_name'] ?></td>
                                    <td><?= $player['last_name'] ?></td>
                                    <td> <?php
                                            $belt = $player['belt'];
                                            if ($belt == 1) {
                                            ?> <p class="card-text"><i class="bi bi-circle"></i> white</p> <?php
                                                                                                        } else if ($belt == 2) {
                                                                                                            ?> <p class="card-text"><i class="bi bi-circle-fill text-warning"> </i> yallow</p> <?php
                                                                                                                                                                                } else if ($belt == 3) {
                                                                                                                                                                                    ?> <p class="card-text"><i class="bi bi-circle-fill text-success"> </i> green</p> <?php
                                                                                                                                                                                                    } else if ($belt == 4) {
                                                                                                                                                                                                        ?> <p class="card-text"><i class="bi bi-circle-fill text-primary"> </i> blue</p> <?php
                                                                                                                                                                                                    } else if ($belt == 5) {
                                                                                                                                                                                                        ?> <p class="card-text"><i class="bi bi-circle-fill" style="color: #964B00;"></i> brown</p> <?php
                                                                                                                                                                                                            } else if ($belt == 6) {
                                                                                                                                                                                                                ?> <p class="card-text"><i class="bi bi-circle-fill text-danger"> </i> red</p> <?php
                                                                                                                                                                                                            } else if ($belt == 7) {
                                                                                                                                                                                                            ?> <p class="card-text"><i class="bi bi-1-circle-fill"></i> black</p> <?php
                                                                                                                                                                                                            } else if ($belt == 8) {
                                                                                                                                                                                        ?> <p class="card-text"><i class="bi bi-2-circle-fill"></i> </i> dan</p> <?php
                                                                                                                                                                                                            } else if ($belt == 9) {
                                                                                                                                                                                    ?> <p class="card-text"><i class="bi bi-3-circle-fill"></i> </i> dan</p> <?php
                                                                                                                                                                                                            } else if ($belt == 10) {
                                                                                                                                                                                        ?> <p class="card-text"><i class="bi bi-4-circle-fill"></i> dan</p> <?php
                                                                                                                                                                                                            } else if ($belt == 11) {
                                                                                                                                                                                ?> <p class="card-text"><i class="bi bi-5-circle-fill"></i> </i> dan</p> <?php
                                                                                                                                                                                                            } else if ($belt == 12) {
                                                                                                                                                                                ?> <p class="card-text"><i class="bi bi-6-circle-fill"></i> </i> dan</p> <?php
                                                                                                                                                                                                            }
                                                                                                                                                                                        ?>
                                    </td>
                                    <td><?= $player['fees'] ?> $$</td>
                                    <td><?php
                                        if ($player['bus'] == 0) {
                                            echo '<span class="badge bg-warning" ><i class="bi bi-person-walking"></i></span>';
                                        } else {
                                            echo '<span class="badge bg-primary"><i class="bi bi-bus-front"></i></span>';
                                        }
                                        ?></td>


                                    <td><?php
                                        if ($player['status'] == 1) {
                                            echo '<span class="badge bg-danger">متوقف</span>';
                                        } else {
                                            echo '<span class="badge bg-success">فعال</span>';
                                        }
                                        ?></td>




                                    <td>

                                        <a href="players-edit.php?id=<?= $player['id']; ?>" class="btn btn-primary btn-sm" style=" border-radius: 50%;"><i class="bi bi-pencil-square"></i></a>
                                        <a href="players-delete.php?id=<?= $player['id']; ?>" class="btn btn-danger btn-sm" style=" border-radius: 50%;"><i class="bi bi-trash"></i></a>
                                        <a href="players-view.php?id=<?= $player['id']; ?>" class="btn btn-secondary btn-sm" style=" border-radius: 50%;"><i class="bi bi-eye-fill"></i></i></a>

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
<?php include 'includes/footer.php' ?>
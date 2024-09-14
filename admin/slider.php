<?php include "includes/header.php";
$eventsCount = countRecords('events');
$countSliders = countRecords('slider');
?>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <div class="badge bg-danger "><?= $countSliders  ?></div>
            <h1><i class="bi bi-images"></i> Slider
                <a href="slider-create.php" class="btn btn-dark btn-sm rounded-5"><i class="bi bi-plus-lg"></i></a>
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
                The slider


            </div>
            <div class="card-body">
                <?php
                $slider = getAll('slider');
                if (mysqli_num_rows($slider) > 0) { ?>
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>image</th>
                                <th>tital</th>
                                <th>text</th>
                          
                                <th>action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                            <th>id</th>
                                <th>image</th>
                                <th>tital</th>
                                <th>text</th>
                          
                                <th>action</th>
                            </tr>
                        </tfoot>
                        <tbody>

                            <?php foreach ($slider as $slide) : ?>
                                <tr>
                                    <td><?= $slide['id'] ?></td>
                                    <td><img src="<?= $slide['image'] ?>" alt="" style="height: 100px; width:200px" ></td>
                                    <td><?= $slide['title'] ?></td>
                                    <td><?= $slide['text'] ?></td>
                                 


                                    <td>
                                      
                                        <a href="slider-delete.php?id=<?= $slide['id']; ?>" class="btn btn-danger btn-sm rounded-5"><i class="bi bi-trash"></i></a>
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
<?php include "includes/footer.php"; ?>
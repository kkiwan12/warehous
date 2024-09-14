<?php
include 'includes/header.php';
?>
<?php if($_SESSION['lang'] == 'en'): ?>
<div class="container-fluid px-4 py-4">
    <div class="shadow p-3 mb-4 bg-body-tertiary rounded-4 ">


        <div class="card-borderless text-center">
            <div class="card-title text-dark mb-4">
                <h4 class="mb-0"><i class="bi bi-calendar-plus"></i> Add class
                    <a href="class.php" class="btn btn-outline-danger rounded-5 float-start"><i class="bi bi-arrow-left"></i></a>
                </h4>
            </div>
            <div class="card-body">
                <?php alertMessage() ?>
                <form action="class-code.php" method="POST">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="form-floating ">
                                <input type="text" name="name" class="form-control" placeholder="name" required>
                                <label>class name</label>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-floating ">
                                <input type="text" name="days" class="form-control" placeholder="name" required>
                                <label>class days </label>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-floating ">
                                <input type="time" name="time" class="form-control" placeholder="name" required>
                                <label>class time</label>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-floating ">
                                <input type="time" name="end_at" class="form-control" placeholder="name" required>
                                <label>class end at</label>
                            </div>
                        </div>


            
                        <div class="col-md-3   text-start">
                        <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" name="status" >
                        <label class="form-check-label" name="status" for="flexSwitchCheckChecked"> <i class="bi bi-eye-slash-fill text-primary"></i>Make it unvisable</label>
                        </div>
                        </div>
            


                        <div class="col-md-12 mt-3 text-end">
                            <div class="form-floating ">
                                <button type="submit" name="saveClass" class="btn btn-warning w-100 rounded-4">Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

<?php else: ?>











    <div class="container-fluid px-4 py-4">
    <div class="shadow p-3 mb-4 bg-body-tertiary rounded-4 ">


        <div class="card-borderless text-center">
            <div class="card-title text-dark mb-4">
                <h4 class="mb-0"><i class="bi bi-calendar-plus"></i> اضافة حصه
                    <a href="class.php" class="btn btn-outline-danger rounded-5 float-start"><i class="bi bi-arrow-left"></i></a>
                </h4>
            </div>
            <div class="card-body">
                <?php alertMessage() ?>
                <form action="class-code.php" method="POST">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="form-floating ">
                                <input type="text" name="name" class="form-control" placeholder="name" required>
                                <label>اسم الحصه</label>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-floating ">
                                <input type="text" name="days" class="form-control" placeholder="name" required>
                                <label>ايام الحصه</label>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-floating ">
                                <input type="time" name="time" class="form-control" placeholder="name" required>
                                <label>تبداء على الساعه</label>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-floating ">
                                <input type="time" name="end_at" class="form-control" placeholder="name" required>
                                <label>تنتهي في الساعه</label>
                            </div>
                        </div>


            
                        <div class="col-md-3   text-start">
                        <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" name="status" >
                        <label class="form-check-label" name="status" for="flexSwitchCheckChecked"> <i class="bi bi-eye-slash-fill text-primary"></i>جعلها غير مرئيه</label>
                        </div>
                        </div>
            


                        <div class="col-md-12 mt-3 text-end">
                            <div class="form-floating ">
                                <button type="submit" name="saveClass" class="btn btn-warning w-100 rounded-4">حفظ</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

    <?php endif; ?>
<?php include 'includes/footer.php' ?>
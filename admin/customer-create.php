<?php 
include 'includes/header.php';
?>
<?php if($_SESSION['lang'] == 'en'): ?>
<div class="container-fluid px-4 py-4">
<div class="shadow p-3 mb-4 bg-body-tertiary rounded-4 ">
    <div class="card-borderless text-center">
        <div class="card-title text-dark mb-4 ">
            <h4 class="mb-0"><i class="bi bi-person-fill-add"></i> Add customer
                <a href="customer.php" class="btn btn-outline-danger rounded-5 float-start"><i class="bi bi-arrow-left"></i></a>
            </h4>
        </div>
        <div class="card-text">
            <?php alertMessage() ?>
            <form action="code.php" method="POST">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="form-floating ">
                            <input type="text" name="name" class="form-control"  placeholder="name" required>
                            <label >name</label>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-floating ">
                            <input type="email" name="email" class="form-control"  placeholder="name@example.com" required>
                            <label >Email address</label>
                        </div>
                    </div>
               
                    <div class="col-md-6 mb-3">
                        <div class="form-floating ">
                            <input type="number" name="phone" class="form-control"  placeholder="phone" required>
                            <label >phone</label>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-floating ">
                            <input type="password" name="password" class="form-control"  placeholder="password" required>
                            <label>password</label>
                        </div>
                    </div>

                 
                     <div class="col-md-12 mt-3 text-end">
                        <div class="form-floating ">
                          <button type="submit" name="saveCustomer" class="btn btn-warning w-100 rounded-4" >Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
</div>
<?php else: ?>










    <div class="container-fluid px-4 py-4">
<div class="shadow p-3 mb-4 bg-body-tertiary rounded-4 ">
    <div class="card-borderless text-center">
        <div class="card-title text-dark mb-4 ">
            <h4 class="mb-0"><i class="bi bi-person-fill-add"></i> اضافة ولي امر
                <a href="customer.php" class="btn btn-outline-danger rounded-5 float-start"><i class="bi bi-arrow-left"></i></a>
            </h4>
        </div>
        <div class="card-text">
            <?php alertMessage() ?>
            <form action="code.php" method="POST">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="form-floating ">
                            <input type="text" name="name" class="form-control"  placeholder="name" required>
                            <label >الاسم</label>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-floating ">
                            <input type="email" name="email" class="form-control"  placeholder="name@example.com" required>
                            <label >البريد الالكتروني</label>
                        </div>
                    </div>
               
                    <div class="col-md-6 mb-3">
                        <div class="form-floating ">
                            <input type="number" name="phone" class="form-control"  placeholder="phone" required>
                            <label >رقم الهاتف</label>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-floating ">
                            <input type="password" name="password" class="form-control"  placeholder="password" required>
                            <label>كلمة السر</label>
                        </div>
                    </div>

                 
                     <div class="col-md-12 mt-3 text-end">
                        <div class="form-floating ">
                          <button type="submit" name="saveCustomer" class="btn btn-warning w-100 rounded-4" >حفظ</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
</div>
    <?php endif; ?>
<?php include 'includes/footer.php'?>
<?php 
include 'includes/header.php';
?>
 
<div class="container-fluid px-4  py-4">
<div class="shadow p-3 mb-4 bg-body-tertiary rounded-4 ">
    <div class="card-borderless text-center">
        <div class="card-title text-dark mb-4 ">
            <h4 class="mb-0"><i class="bi bi-person-add"></i> Add admin
            <a href="admin.php" class="btn btn-outline-danger rounded-5 float-start"><i class="bi bi-arrow-left"></i></a>
            </h4>
          
        </div>
             
        <div class="card-text">
            <?php alertMessage() ?>
            <form action="code.php" method="POST">
                <div class="row">
                    <div class="col-md-12 mb-3">
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
                            <input type="password" name="password" class="form-control"  placeholder="password" required>
                            <label >password</label>
                        </div>
                    </div>
                    <div class="col-md-6 ">
                        <div class="form-floating ">
                            <input type="number" name="phone" class="form-control"  placeholder="phone" required>
                            <label >phone</label>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                    <label >$ salary</label>
                    <div class="input-group mb-3">
              
                        <span class="input-group-text">$</span>
                        <input type="text"  name="salary" class="form-control" aria-label="Amount (to the nearest dollar)">
                        <span class="input-group-text">.00</span>
                     </div>
                    </div>
                   
                     <div class="col-md-12 mt-3 text-end">
                        <div class="form-floating ">
                          <button type="submit" name="saveAdmin" class="btn btn-warning w-100 rounded-4" >Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>    
</div>
<?php include 'includes/footer.php'?>
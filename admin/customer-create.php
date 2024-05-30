<?php 
include 'includes/header.php';
?>

<div class="container-fluid px-4">
    <div class="card mt-4 shadow-sm">
        <div class="card-header">
            <h4 class="mb-0">Add customer
                <a href="customer.php" class="btn btn-outline-danger float-end">Back</a>
            </h4>
        </div>
        <div class="card-body">
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
                            <input type="number" name="phone" class="form-control"  placeholder="phone" required>
                            <label >phone</label>
                        </div>
                    </div>

                    <div class="col-md-3  mt-3">
                    <div class="form-check form-switch">
                    <label  for="flexSwitchCheckChecked" style="font:bold">Is Ban</label>
                         <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked"  style="width:30px;height: 30px;" name="status">
                
                        </div>
                     </div>
                     <div class="col-md-3 mt-3 text-end">
                        <div class="form-floating ">
                          <button type="submit" name="saveCustomer" class="btn btn-primary" >Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include 'includes/footer.php'?>
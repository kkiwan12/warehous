<?php 
include 'includes/header.php';
?>

<div class="container-fluid px-4">
    <div class="card mt-4 shadow-sm">
        <div class="card-header">
            <h4 class="mb-0">Add category
                <a href="category.php" class="btn btn-outline-danger float-end">Back</a>
            </h4>
        </div>
        <div class="card-body">
            <?php alertMessage() ?>
            <form action="code.php" method="POST">
                <div class="row">
                    <div class="col-md-10 mb-3">
                        <div class="form-floating ">
                            <input type="text" name="name" class="form-control"  placeholder="name" required>
                            <label >category name</label>
                        </div>
                    </div>
       
                 
                     <div class="col-md-2 mt-3 text-end">
                        <div class="form-floating ">
                          <button type="submit" name="savecategory" class="btn btn-primary" >Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include 'includes/footer.php'?>
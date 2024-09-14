<?php 
include 'includes/header.php';
?>

<div class="container-fluid px-4 py-4">
<div class="shadow p-3 mb-4 bg-body-tertiary rounded-4 ">


    <div class="card-borderless text-center">
        <div class="card-title text-dark mb-4">
            <h4 class="mb-0"><i class="bi bi-image"></i> Add slide
            <a href="slider.php" class="btn btn-outline-danger rounded-5 float-start"><i class="bi bi-arrow-left"></i></a>
            </h4>
        </div>
        <div class="card-body">
            <?php alertMessage() ?>
            <form action="slider-code.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                    
                <div class="col-md-12 mb-3  text-start border-start border-3">

                    <img src="assets/uploads/icons/no-image-icon-6.png" id="preview" class="rounded w-100   "  style="width: 350px; height:250px ;">
                    </div>
                    
                    <div class="col-md-4 mb-3 ">

                    <label for="formFile">Slide image</label>
                    <input class="form-control" type="file" id="filetag" name="image">

                 
                    </div>
                    <div class="col-md-4 mb-3">
                    <div class="form-floating ">
                            <input type="text" name="tital" class="form-control"  placeholder="name" required>
                            <label >slide tital</label>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="form-floating ">
                            <input type="text" name="text" class="form-control"  placeholder="name" required>
                            <label >slide text </label>
                        </div>
                    </div>
                   

       
                 
                     <div class="col-md-12 mt-3 text-end">
                        <div class="form-floating ">
                          <button type="submit" name="saveSlide" class="btn btn-warning w-100 rounded-4" >Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
</div>
<?php include 'includes/footer.php'?>
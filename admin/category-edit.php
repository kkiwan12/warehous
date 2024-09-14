<?php 
include 'includes/header.php';

?>

<div class="container-fluid px-4 py-4">
<div class="shadow p-3 mb-4 bg-body-tertiary rounded-4 ">
    <div class="card-borderless text-center">
        <div class="card-title text-dark mb-4">
            <h4 class="mb-0"> <i class="bi bi-tags"></i> Edit category
            <a href="category.php" class="btn btn-outline-danger rounded-5 float-start"><i class="bi bi-arrow-left"></i></a>
            </h4>
        </div>
        <div class="card-body">
            <?php alertMessage() ?>
            <form action="code.php" method="POST">

            <?php 
              if(isset($_GET['id'])){
                  if($_GET['id'] != ' '){

                    $categoryId = $_GET['id'];
                   

                   } else{
                    echo '<h5> No Id found</h5>';
                    return false;
                   }
              } else {
                echo '<h5> No Id given</h5>';
                return false;
              }    
              
              $categorydata = getById('categories',$categoryId);
              if($categorydata){

                if($categorydata['status'] == 200){
                    ?>
                    <input type="hidden" name="categoryId" value="<?= $categorydata['data']['id'] ?>">
                     <div class="row">
                    <div class="col-md-12 mb-3">
                        <div class="form-floating ">
                            <input type="text" name="name" class="form-control" id="floatingInput" value="<?= $categorydata['data']['categoryName'] ?>" placeholder="category name" required>
                            <label for="floatingInput">name</label>
                        </div>
                    </div>

                    
                    <div class="col-md-12 mb-3">
                        <div class="form-floating ">
                            <textarea name="description" class="form-control" rows="3"  placeholder="description" ><?= $categorydata['data']['description']?></textarea>
                            <label >category description</label>
                        </div>
                    </div>

                    <div class="col-md-6  mt-3 text-start" >
                    <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" name="status" value="1" 
                        <?= $categorydata['data']['status'] == true ? 'checked' : ''; ?>  >
                    <label class="form-check-label" name="status" for="flexSwitchCheckChecked">Make it unvisable</label>
                    </div>
                    </div>

                
                     <div class="col-md-12 mt-3 text-end">
                        <div class="form-floating ">
                          <button type="submit" name="updateCategory" class="btn btn-warning w-100 rounded-4" >Update</button>
                        </div>
                    </div>
                </div>
            </form>





                    <?php

                }else{
                    echo '<h5?>'.$categorydata['message'].'</h5>';
                }
              }else{
                echo 'somthig went wrong';
                return false;
              }
            ?>
  
        </div>
    </div>
</div>
</div>
<?php include 'includes/footer.php'?>
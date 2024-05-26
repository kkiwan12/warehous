<?php 
include 'includes/header.php';

?>

<div class="container-fluid px-4">
    <div class="card mt-4 shadow-sm">
        <div class="card-header">
            <h4 class="mb-0">Edit category
                <a href="category.php" class="btn btn-outline-danger float-end">Back</a>
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
                    <div class="col-md-9 mb-3">
                        <div class="form-floating ">
                            <input type="text" name="name" class="form-control" id="floatingInput" value="<?= $categorydata['data']['categoryName'] ?>" placeholder="category name" required>
                            <label for="floatingInput">name</label>
                        </div>
                    </div>


                
                     <div class="col-md-3 mt-3 text-end">
                        <div class="form-floating ">
                          <button type="submit" name="updateCategory" class="btn btn-primary" >Update</button>
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
<?php include 'includes/footer.php'?>
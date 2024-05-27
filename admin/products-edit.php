<?php 
include 'includes/header.php';

?>

<div class="container-fluid px-4">
    <div class="card mt-4 shadow-sm">
        <div class="card-header">
            <h4 class="mb-0">Edit product
                <a href="products.php" class="btn btn-outline-danger float-end">Back</a>
            </h4>
        </div>
        <div class="card-body">
            <?php alertMessage() ?>
            <form action="code.php" method="POST">

            <?php 
              if(isset($_GET['id'])){
                  if($_GET['id'] != ' '){

                    $productId = $_GET['id'];
                   

                   } else{
                    echo '<h5> No Id found</h5>';
                    return false;
                   }
              } else {
                echo '<h5> No Id given</h5>';
                return false;
              }    
              
              $productData = getById('products',$productId);
              if($productId){

                if($productData['status'] == 200){
              $selectedCategoryId = $productData['data']['category_id'];

                    ?>
                    <input type="hidden" name="categoryId" value="<?= $productData['data']['id'] ?>">
                     <div class="row">

                     <div class="col-md-12 mb-3">
                        <label >Select category</label>
                        <select name="category_id" class="form-select">
                       
                            <?php 
                                  $categories = getAll('categories');
                                  if($categories){
                                    if(mysqli_num_rows($categories)>0){
                                        foreach($categories as $category){
                                            $selected = ($category['id'] == $selectedCategoryId) ? 'selected' : '';
                                            echo '<option value="'.htmlspecialchars($category['id']).'" '.$selected.'>'.$category['categoryName'].'</option>';
                                        }
                                    }else{
                                      echo  '<option >No categories founded !!</option>';
                                    }
                                  }else{
                                      echo '<option value="">somthing went wrong !!</option>';
                                  }

                            ?>                            
                        </select>
                    </div>

                    <div class="col-md-12 mb-3">
                        <div class="form-floating ">
                            <input type="text" name="name" class="form-control" id="floatingInput" value="<?= $productData['data']['name'] ?>" placeholder="category name" required>
                            <label for="floatingInput">name</label>
                        </div>
                    </div>

                    
                   

                    <div class="col-md-12 mb-3">
                        <div class="form-floating ">
                            <textarea name="description" class="form-control" rows="3"  placeholder="description" >
                            <?= $productData['data']['description'] ?>
                            </textarea>
                            <label >product description</label>
                        </div>
                    </div>
                    
                    <div class="col-md-4 mb-3">
                    <label >Price</label>
                    <div class="input-group mb-3">
              
                        <span class="input-group-text">$</span>
                        <input type="text"  name="price" class="form-control" aria-label="Amount (to the nearest dollar)" value="<?= $productData['data']['price'] ?>">
                        <span class="input-group-text">.00</span>
                     </div>
                    </div>

                    <div class="col-md-4 mb-3">
                       
                        <label >Quantity *</label>
                            <input type="number" name="quantity" class="form-control"   value="<?= $productData['data']['quantity'] ?>">
                    </div>
                

                    <div class="col-md-4 mb-3">
                       
                        <label for="formFile" >product image</label>
                        <input class="form-control" type="file" id="formFile" name="image">
                      
                    </div>


                    <div class="col-md-3  mt-3">
                    <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" name="status" value="1"  <?= $productData['data']['status'] == true ? 'checked' : ''; ?> >
                    <label class="form-check-label" name="status" for="flexSwitchCheckChecked">Make it unvisable</label>
                    </div>
                    </div>
    

                
                     <div class="col-md-9 mt-3 text-end">
                        <div class="form-floating ">
                          <button type="submit" name="updateProduct" class="btn btn-primary" >Update</button>
                        </div>
                    </div>
                </div>
            </form>





                    <?php

                }else{
                    echo '<h5?>'.$productData['message'].'</h5>';
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
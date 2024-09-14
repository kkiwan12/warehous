<?php 
include 'includes/header.php';
?>

<div class="container-fluid px-4 py-4">
<div class="shadow p-3 mb-4 bg-body-tertiary rounded-4 ">

    <div class="card-borderless text-center">
      
        <div class="card-title text-dark mb-4 ">
            <h4 class=""><i class="bi bi-bag-plus-fill"></i> Add product 
                <a href="products.php" class="btn btn-outline-danger rounded-5 float-start"><i class="bi bi-arrow-left"></i></a>
            </h4>
      
        </div> 
        <div class="card-body">
            <?php alertMessage() ?>
            <form action="code.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                <div class="col-md-3 mb-3  text-center border-start border-3">
                     
                     <img src="../assets/uploads/players/1718001233.jpg" id="preview" style="width: 150px; height:150px ; border-radius: 20%;">
                     </div>
                     <div class="col-md-3  mt-5  text-start">
                        <div class="form-floating ">
                            <input type="text" name="name" class="form-control"  placeholder="name" required>
                            <label >product name</label>
                        </div>
                    </div>

                    <div class="col-md-3 mb-3 mt-5">
                       
                       <label >Quantity *</label>
                           <input type="number" name="quantity" class="form-control"   >
                   </div>
               

                    <div class="col-md-3 mb-3 mt-5">
                        <label >Select catgory</label>
                        <select name="category_id" class="form-select">
                       
                            <?php 
                                  $categories = getAll('categories');
                                  if($categories){
                                    if(mysqli_num_rows($categories)>0){
                                        foreach($categories as $category){
                                            echo '<option value="'.$category['id'].'">'.$category['categoryName'].'</option>';
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


                    <div class="col-md-6   mb-3 text-start">
                        <div class="form-floating ">
                            <textarea name="description" class="form-control" rows="3"  placeholder="description" ></textarea>
                            <label >product description</label>
                        </div>
                    </div>
               
                    
             

                
                              
                    <div class="col-md-6 mb-3">
                        <div class="form-floating ">
                            <input type="text" name="barcode" class="form-control"  placeholder="name" required>
                            <label >product barcode</label>
                        </div>
                    </div>

                    
                    <div class="col-md-4 mb-3">
                    <label ># cost</label>
                    <div class="input-group mb-3">
              
                        <span class="input-group-text">$</span>
                        <input type="text"  name="cost" class="form-control" aria-label="Amount (to the nearest dollar)">
                        <span class="input-group-text">.00</span>
                     </div>
                    </div>

                    
                    <div class="col-md-4 mb-3">
                    <label >$ Price</label>
                    <div class="input-group mb-3">
              
                        <span class="input-group-text">$</span>
                        <input type="text"  name="price" class="form-control" aria-label="Amount (to the nearest dollar)">
                        <span class="input-group-text">.00</span>
                     </div>
                    </div>

                   

                    <div class="col-md-4 mb-3">
                       
                        <label for="formFile" ><i class="bi bi-camera"></i> product image</label>
                        <input class="form-control" type="file" id="filetag" name="image">
                   
                    </div>
           


                    <div class="col-md-3  mt-3 text-start">
                    <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" name="status" >
                    <label class="form-check-label" name="status" for="flexSwitchCheckChecked">Make it unvisable</label>
                    </div>
                    </div>
       
                 
                     <div class="col-md-12 mt-3 text-end">
                        <div class="form-floating ">
                          <button type="submit" name="saveProduct" class="btn btn-warning w-100 rounded-4" >Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<?php include 'includes/footer.php'?>
<script>

</script>
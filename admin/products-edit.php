<?php
include 'includes/header.php';

?>

<div class="container-fluid px-4 py-4">
    <div class="shadow p-3 mb-4 bg-body-tertiary rounded-4 ">
        <div class="card-borderless text-center">
            <div class="card-title text-dark mb-4 ">
                <h4 class=""><i class="bi bi-bag"></i> Edit product
                    <a href="products.php" class="btn btn-outline-danger rounded-5 float-start"><i class="bi bi-arrow-left"></i></a>
                </h4>
            </div>
            <div class="card-body">
                <?php alertMessage() ?>
                <form action="code.php" method="POST">

                    <?php
                    if (isset($_GET['id'])) {
                        if ($_GET['id'] != ' ') {

                            $productId = $_GET['id'];
                        } else {
                            echo '<h5> No Id found</h5>';
                            return false;
                        }
                    } else {
                        echo '<h5> No Id given</h5>';
                        return false;
                    }

                    $productData = getById('products', $productId);
                    if ($productId) {

                        if ($productData['status'] == 200) {
                            $selectedCategoryId = $productData['data']['category_id'];

                    ?>
                            <input type="hidden" name="productId" value="<?= $productData['data']['id'] ?>">
                            <div class="row">

                                <div class="col-md-3 mb-3  text-center border-start border-3">

                                    <img src="<?= $productData['data']['image'] ?>" style="width: 150px; height:150px ; border-radius: 20%;">
                                </div>
                                <div class="col-md-3 mt-5 text-start">
                                    <div class="form-floating ">
                                        <input type="text" name="name" class="form-control" id="floatingInput" value="<?= $productData['data']['name'] ?>" placeholder="category name" required>
                                        <label for="floatingInput">name</label>
                                    </div>
                                </div>


                                
                                <div class="col-md-6 mt-5 text-start">
                                    <div class="form-floating ">
                                        <textarea name="description" class="form-control" rows="3" placeholder="description">
                            <?= $productData['data']['description'] ?>
                            </textarea>
                                        <label>product description</label>
                                    </div>
                                </div>
                      

                                <div class="col-md-4 mb-3 ">

                                    <label>Quantity *</label>
                                    <input type="number" name="quantity" class="form-control" value="<?= $productData['data']['quantity'] ?>">
                                </div>


                                <div class="col-md-4 mb-3   ">
                                    <label>Select category</label>
                                    <select name="category_id" class="form-select">

                                        <?php
                                        $categories = getAll('categories');
                                        if ($categories) {
                                            if (mysqli_num_rows($categories) > 0) {
                                                foreach ($categories as $category) {
                                                    $selected = ($category['id'] == $selectedCategoryId) ? 'selected' : '';
                                                    echo '<option value="' . htmlspecialchars($category['id']) . '" ' . $selected . '>' . $category['categoryName'] . '</option>';
                                                }
                                            } else {
                                                echo  '<option >No categories founded !!</option>';
                                            }
                                        } else {
                                            echo '<option value="">somthing went wrong !!</option>';
                                        }

                                        ?>
                                    </select>
                                </div>



                                <div class="col-md-4 mb-3">
                       
                                    <label for="formFile" ><i class="bi bi-camera"></i> product image</label>
                                    <input class="form-control" type="file" id="filetag" name="image">
                                
                                </div>
                        

                                <div class="col-md-6 mb-3">
                                    <label>cost</label>
                                    <div class="input-group mb-3">

                                        <span class="input-group-text">$</span>
                                        <input type="text" name="cost" class="form-control" aria-label="Amount (to the nearest dollar)" value="<?= $productData['data']['cost'] ?>">
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>


                                <div class="col-md-6 mb-3">
                                    <label>Price</label>
                                    <div class="input-group mb-3">

                                        <span class="input-group-text">$</span>
                                        <input type="text" name="price" class="form-control" aria-label="Amount (to the nearest dollar)" value="<?= $productData['data']['price'] ?>">
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>









                                <div class="col-md-3  mt-3 text-start">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" name="status" value="1" <?= $productData['data']['status'] == true ? 'checked' : ''; ?>>
                                        <label class="form-check-label" name="status" for="flexSwitchCheckChecked">Make it unvisable</label>
                                    </div>
                                </div>



                                <div class="col-md-12 mt-3 text-end">
                                    <div class="form-floating ">
                                        <button type="submit" name="updateProduct" class="btn btn-warning w-100 rounded-4   ">Update</button>
                                    </div>
                                </div>
                            </div>
                </form>





        <?php

                        } else {
                            echo '<h5?>' . $productData['message'] . '</h5>';
                        }
                    } else {
                        echo 'somthig went wrong';
                        return false;
                    }
        ?>

            </div>
        </div>
    </div>
</div>
<?php include 'includes/footer.php' ?>

<script>
    var fileTag = document.getElementById("filetag"),
        preview = document.getElementById("preview");

    fileTag.addEventListener("change", function() {
        changeImage(this);
    });

    function changeImage(input) {
        var reader;

        if (input.files && input.files[0]) {
            reader = new FileReader();

            reader.onload = function(e) {
                preview.setAttribute('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
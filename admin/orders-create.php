<?php 
include 'includes/header.php';
?>

<div class="container-fluid px-4">
    <div class="card mt-4 shadow-sm">
        <div class="card-header">
            <h4 class="mb-0">Create Order
                <a href="category.php" class="btn btn-outline-danger float-end">Back</a>
            </h4>
        </div>
        <div class="card-body" id="">
            <?php alertMessage() ?>
            <form action="orders-code.php" method="POST">
                <div class="row">
                   
                    <div class="col-md-4 mb-3">
                    <label for="">select product</label>
                    <select name="product_id" class="form-control select2 ">
                        <option value="">-select product-</option>
                        <?php 
                        $products = getAll('products');
                        if($products){
                            if(mysqli_num_rows($products) > 0){
                                foreach($products as $product){
                                    ?>
                                    <option value="<?= $product['id'] ?>"><?= $product['name'] ?></option>
                                    <?php
                                }
                            }else{
                                echo '<option value=""> NO products found</option>';
                            }

                        }else{
                            echo '<option value="">somthing went wrong</option>';
                        }
                        ?>

                    </select>
                    </div>
                    
                   

                        <div class="col-md-2 mb-3">
                        <label for="">Quantity</label>
                            <input type="number" name="quantity" class="form-control" value="1">
                        </div>


                     <div class="col-md-3 mt-4 text-end">
                       
                          <button type="submit" name="addItem" class="btn btn-primary" >Add Item</button>
                      
                    </div>
                </div>
            </form>
        </div>
    </div>
 
    <div class="card mt-3 shadow-sm">
        <div class="card-header">
        <h4 class="mb-0">product</h4>
        </div>
        <div class="card-body" id="productArea ">

        <?php
        if(isset($_SESSION['productItems'])){
            $sessionProducts = $_SESSION['productItems'];
            if(empty($sessionProducts)){

                unset($_SESSION['productItems']);
                unset($_SESSION['productItemsId']);
                }
            ?>
            <div class="table-responsive mb-3" id="productContent">
                <table class="table  ">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>product name</th>
                            <th>price</th>
                            <th>Quantity</th>
                            <th>Total price</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $i =1;
                        foreach($sessionProducts as $key=>$item ):
                        ?>
                        <tr>
                        <td><?= $i++ ?></td>
                            <td><?= $item['name']; ?></td>
                            <td><?=number_format( $item['price']); ?> $</td>
                            <td>
                                <div class="input-group qtyBox">
                                    <input type="hidden" value="<?= $item['product_id']; ?>" class="productId" />
                                    <button class="input-group-text decremant">-</button>
                                    <input type="text" value="<?= $item['quantity']; ?>" class="qty quanttityInput ">
                                    <button class="input-group-text incremant">+</button>
                                </div>
                            </td>

                            <td><?= number_format($item['price'] * $item['quantity'],0) ?> $$</td>
                            <td>
                                <a href="order-item-delete.php?index=<?= $key; ?>" class="btn btn-danger"><i class="bi bi-trash-fill"></i></a>
                            </td>
                       
                        </tr>
                        <?php 
                        endforeach;
                        ?>
                    </tbody>
                </table>
            </div>

            <div class="mt-2">
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <label for="">Select payment mode </label>
                        <select id="payment_mode" class="form-select">
                            <option value="">-Select payment-</option>
                            <option value="cash">Cash payment</option>
                            <option value="cash">online payment</option>
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                    <label for="">select customer</label>
                    <select id="customerId" class="form-control select2 ">
                        <option value=" ">-select customer-</option>
                        <?php 
                        $customers = getAll('customers');
                        if($customers){
                            if(mysqli_num_rows($customers) > 0){
                                foreach($customers as $customer){
                                    ?>
                                    <option value="<?= $customer['id'] ?>"><?= $customer['name'] ?></option>
                                    <?php
                                }
                            }else{
                                echo '<option value=""> NO customers found</option>';
                            }

                        }else{
                            echo '<option value="">somthing went wrong</option>';
                        }
                        ?>

                    </select>
                    </div>
                    <div class="col-md-4">
                        <br/>
                        <button type="button" class="btn btn-warning w-100 proceedToPlace">proceed to plase order</button>
                    </div>
                </div>
            </div>
            <?php
        }else{
            echo '<h5>No Items added </h5>';
        }
        ?>
        </div>
    </div>
</div>
<?php include 'includes/footer.php'?>

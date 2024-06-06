<?php
include 'includes/header.php';

?>
<div class="container-fluid px-4 " >
    <div class="card mb-4 mt-3">
        <div class="card-header text-bg-primary">
            Warehouses
        </div>
        <div class="card-body">
            <?php
            $warehouses = getAll('warehouses');
            ?>
                 <?php alertMessage() ?>
            <select id="warehouseSelect" class="form-select" onchange="getWarehouseById()">
                <option value="">Select warehouse</option>
                <?php
                if (mysqli_num_rows($warehouses) > 0) {
                    foreach ($warehouses as $warehouse) {
                        echo '<option value="' . $warehouse['id'] . '">' . $warehouse['name'] . '</option>';
                    }
                } else {
                    echo '<option value="">No warehouses found</option>';
                }
                ?>
            </select>
        </div>
    </div>

    <div class="card mt-4 shadow-sm">
        <div class="card-header bg-warning">
            <h4 class="mb-0 d-flex justify-content-center">Warehouse Info</h4>
        </div>
        <form action="code.php" method="POST">      
        <div class="card-body">
            <div class="row">
          
                <div class="col-md-12">
                    <?php 
                    $warehouseId = isset($_GET['id']) ? validate($_GET['id']) : '';
                    if (!empty($warehouseId)) {
                        $warehouse = getById('warehouses', $warehouseId);
                        if ($warehouse) {

                            $productsCount = countProductsInWarehouse($warehouseId);
                           
                            // Add more fields as necessary?>
                         <div class="row">
                            <div class="col-md-4 p-3">
                            <div class="card" style="width: 18rem; ">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Warehouse Name: <span class="badge bg-dark "><?= $warehouse['data']['name'] ?></span></li>
                               
                              
                            </ul>
                            </div>
                            </div>
                            <div class="col-md-4 p-3">
                            <div class="card " style="width: 18rem;">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Warehouse location: <span class="badge bg-dark "><?= $warehouse['data']['location'] ?></span> </li>
                              
                              
                            </ul>
                            </div>
                            </div>

                            <div class="col-md-4 p-3">
                            <div class="card" style="width: 18rem;">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">count of products: <span class="badge bg-dark "><?= $productsCount ?></span> </li>
                                
                              
                            </ul>
                            </div>
                            </div>
                        

                            <div class="col-md-13">
                                <h4 class="mb-3 d-flex justify-content-center">--Add products to warehouse--</h4>
                            </div>

                         <input type="hidden" name="warehouseId2" value="<?= $warehouse['data']['id'] ?>">
                              
                            <div class="col-md-4 mb-3">
                                <label for="">select product</label>
                                <select name="product_id" class="form-control select2   ">
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

                    <div class="col-md-3 mb-3">
                    <label for="">Quantity</label>
                        <input type="number" name="quantity" class="form-control " value="1">
                    </div>
                    <div class="col-md-4    ">
                        <br/>
                        <button type="submit" name="addProductToWarehouse" class="btn btn-primary w-100 proceedToPlace">add product to this warehouse</button>
                    </div>

                        </div>
                                </form>
                            <?php
                        } else {
                            echo '<h5>No details found for the selected warehouse.</h5>';
                        }
                    } else {
                        echo '<h5>Select a warehouse to see details.</h5>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-4 shadow-sm">

                            <div class="card-header">
                        
                                <i class="fas fa-table me-1"></i>
                                The warehouse products 
                            
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                       <th>image</th>
                                            <th>product name</th>
                                            <th>price</th>
                                            <th>warehouse quantity</th>
                                           
                                            <th>action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                          <th>image</th>
                                            <th>product name</th>
                                            <th>price</th>
                                            <th>warehouse quantity</th>
                                           
                                            <th>action</th>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                        $warehousesProducts = getWarehouseProducts($warehouseId) ;
                                        if(mysqli_num_rows($warehousesProducts) > 0): ?>
                                            <?php while($item = mysqli_fetch_assoc($warehousesProducts)): ?>
                                        <tr>  
                                     
                                        <td>
                                            <img src="<?= $item['image']; ?>" style="width: 50px; height: 50px;" alt="">
                                        </td>
                                                <td><?= $item['name']; ?></td>
                                                <td><?= $item['price']; ?> $</td>
                                                <td><?= $item['quantity']; ?></td>
                                              
                                                
                                          
                                         
                                            <td>
                                                
                                              <!--  <a href="warehouse-products-edit.php?id=<?=  $item['id']; ?>" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></a> -->
                                                <a href="warehouse-products-delete.php?id=<?=  $item['id']; ?>&w-id=<?= $warehouseId ?>" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>
                                            </td>
                                       
                                        </tr>
                                        <?php endwhile; ?>
                                  
                                    </tbody>
                                </table>
                            </div>
                            <?php else: ?>
                                      
                                
                                         
                                       
                                        <?php endif; ?>
                        </div>
</div>


<?php include 'includes/footer.php'?>
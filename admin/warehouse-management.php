<?php
include 'includes/header.php';

?>
<div class="container-fluid px-4 " style="max-width: 1500px;">
    <div class="shadow p-3 mb-4 bg-body-tertiary rounded-bottom   mt-6">
        <div class="card-borderless text-center">
            <div class="card-body">
                <h4 class="card-title text-warning mb-3 "><i class="bi bi-building"></i> Warehouses </h4>
                <p class="card-text "> <?php
                                        $warehouses = getAll('warehouses');
                                        ?>
                    <?php alertMessage() ?>
                    <select id="warehouseSelect" class="form-select " onchange="getWarehouseById()">
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
                </p>
            </div>
        </div>
    </div>
    <div class="shadow p-3 mb-4 bg-body-tertiary rounded-4 mt-6">
        <div class="card-borderless text-center">

            <h4 class="card-title border-bottom text-primary mb-3"><i class="bi bi-building-exclamation"></i>Warehouse Info</h4>

            <form action="code.php" method="POST">
                <div class="card-text">
                    <div class="row">

                        <div class="col-md-12">
                            <?php
                            $warehouseId = isset($_GET['id']) ? validate($_GET['id']) : '';
                            if (!empty($warehouseId)) {
                                $warehouse = getById('warehouses', $warehouseId);
                                if ($warehouse) {

                                    $productsCount = countProductsInWarehouse($warehouseId);

                                    // Add more fields as necessary
                            ?>
                                    <div class="row">
                                        <div class="col-md-4 p-3">
                                            <div class="shadow p-3 mb-4 bg-body-tertiary rounded-4">
                                                <div class="card-borderless text-center">
                                                    <div class="card-body">
                                                        <h4 class="card-title  border-bottom">name</h4>
                                                        <p class="card-text text-warning"><?= $warehouse['data']['name'] ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 p-3">
                                            <div class="shadow p-3 mb-4 bg-body-tertiary rounded-4">
                                                <div class="card-borderless text-center">
                                                    <div class="card-body">
                                                        <h4 class="card-title  border-bottom">Warehouse location</h4>
                                                        <p class="card-text text-warning"><?= $warehouse['data']['location'] ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4 p-3">
                                            <div class="shadow p-3 mb-4 bg-body-tertiary rounded-4">
                                                <div class="card-borderless text-center">
                                                    <div class="card-body">
                                                        <h4 class="card-title  border-bottom">count of products</h4>
                                                        <p class="card-text text-warning"><?= $productsCount ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class=" p-3 mb-4 bg-body-tertiary rounded-4  ">
                                            <div class="card-borderless text-center">

                                                <div class="card-header border-buttom">

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
                                                            $warehousesProducts = getWarehouseProducts($warehouseId);
                                                            if (mysqli_num_rows($warehousesProducts) > 0) : ?>
                                                                <?php while ($item = mysqli_fetch_assoc($warehousesProducts)) : ?>
                                                                    <tr>

                                                                        <td>
                                                                            <img src="<?= $item['image']; ?>" style="width: 50px; height: 50px ; border-radius: 20%   ;" alt="">
                                                                        </td>
                                                                        <td><?= $item['name']; ?></td>
                                                                        <td><?= $item['price']; ?> $</td>
                                                                        <td><?= $item['quantity']; ?></td>




                                                                        <td>

                                                                            <!--  <a href="warehouse-products-edit.php?id=<?= $item['id']; ?>" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></a> -->
                                                                            <a href="warehouse-products-delete.php?id=<?= $item['id']; ?>&w-id=<?= $warehouseId ?>" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>
                                                                        </td>

                                                                    </tr>
                                                                <?php endwhile; ?>

                                                        </tbody>
                                                    </table>






                                                <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                <?php
                                } else {
                                    echo '<h5>No details found for the selected warehouse.</h5>';
                                }
                            } else {
                                echo '<h5>Select a warehouse to see details.</h5>';
                            }
                                ?>



                                <div class="col-md-12">
                                    <h4 class="mb-3 d-flex justify-content-center mb-3 border-bottom"><i class="bi bi-building-fill-add"></i>Add products to warehouse</h4>
                                </div>

                                <input type="hidden" name="warehouseId2" value="<?= $warehouse['data']['id'] ?>">

                                <div class="col-md-4 mb-3">
                                    <label for="product_id">select product</label>
                                    <br />
                                    <select name="product_id" class="form-control select2  w-100 mt-3 ">
                                        <option value="">-select product-</option>
                                        <?php

                                        $products = getAll('products');

                                        if ($products) {
                                            if (mysqli_num_rows($products) > 0) {
                                                foreach ($products as $product) {
                                        ?>
                                                    <option value="<?= $product['id'] ?>"><?= $product['name'] ?></option>
                                        <?php
                                                }
                                            } else {
                                                echo '<option value=""> NO products found</option>';
                                            }
                                        } else {
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
                                    <br />
                                    <button type="submit" name="addProductToWarehouse" class="btn btn-primary w-100 proceedToPlace">add product to this warehouse</button>
                                </div>
                                    </div>
                        </div>
            </form>

        </div>
    </div>
</div>

</div>


<?php include 'includes/footer.php' ?>
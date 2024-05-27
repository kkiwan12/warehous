<?php 
include 'includes/header.php';
?>
<div class="container-fluid px-4 mt-4   ">
<div class="card mb-4">

                            <div class="card-header">
                            <?php alertMessage() ?>
                                <i class="fas fa-table me-1"></i>
                                The Products 
                                
                                <a href="products-create.php" class="btn btn-dark btn-sm text-end"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                 <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                                </svg></a>
                               
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>quantity</th>
                                            <th>price</th>
                                            <th>status</th>
                                            <th>action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>id</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>quantity</th>
                                            <th>price</th>
                                            <th>status</th>
                                            <th>action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                        $products = getAll('products') ;
                                        if(mysqli_num_rows($products) > 0) {?>
                                        <?php foreach($products as $product):?>
                                        <tr>
                                            <td><?= $product['id'] ?></td>
                                            <td>
                                                <img src="<?=$product['image']; ?>" style="width: 50px; height: 50px;" alt="">
                                            </td>
                                            <td><?= $product['name'] ?></td>
                                            <td><?= $product['quantity'] ?></td>
                                            <td><?= $product['price'] ?> $$</td>
                                            <td><?php 
                                            if($product['status'] == 1){
                                               echo '<span class="badge bg-danger">Hidden</span>';
                                            }else{
                                                echo '<span class="badge bg-success">Visible</span>';
                                            }
                                            ?></td>
                                            
                                            <td>
                                                <a href="products-edit.php?id=<?=  $product['id']; ?>" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i></a>
                                                <a href="products-delete.php?id=<?=  $product['id']; ?>" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>
                                            </td>
                                       
                                        </tr>
                                        <?php endforeach; ?>
                                  
                                    </tbody>
                                </table>
                            </div>
                            <?php }else{ ?>
                                            <tr>
                                            <td colspan="4">No Records found</td>
                                       
                                        </tr>
                                        <?php } ?>
                        </div>
</div>
<?php include 'includes/footer.php'?>
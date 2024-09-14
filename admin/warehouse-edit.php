<?php 
include 'includes/header.php';
?>

<div class="container-fluid px-4 py-4">
<div class="shadow p-3 mb-4 bg-body-tertiary rounded-4 ">
    <div class="card-borderless text-center">
        <div class="card-title text-dark mb-4">
            <h4 class="mb-0"><i class="bi bi-building-fill-gear"></i> Edit warehouse
            <a href="warehouse.php" class="btn btn-outline-danger rounded-5 float-start"><i class="bi bi-arrow-left"></i></a>
            </h4>
        </div>
        <div class="card-body">
            <?php alertMessage() ?>
            
            <form action="code.php" method="POST">
                <?php 
                if(isset($_GET['id'])){
                    if($_GET['id'] != ""){
                        $warehouseId = $_GET['id'];
                    }else{
                        echo '<h5>No Id found</h5>';
                        return false;
                    }
                }else{
                    echo '<h5>No Id given</h5>';
                    return false;
                }

                $warehouseData = getById('warehouses',$warehouseId);
                if($warehouseData){
                    if($warehouseData['status'] ==200){
                        ?>
    <div class="row">
                    <div class="col-md-6 mb-3">
                        <input type="hidden" name="warehouseId" value="<?= $warehouseData['data']['id']; ?>">
                        <div class="form-floating ">
                            <input type="text" name="name" class="form-control" value="<?= $warehouseData['data']['name'];?>"  placeholder="name" required>
                            <label >name</label>
                        </div>
                    </div>
               
                    <div class="col-md-6 mb-3">
                        <div class="form-floating ">
                            <input type="text" name="location" class="form-control"  value="<?= $warehouseData['data']['location'];?>" placeholder="location" required>
                            <label >location</label>
                        </div>
                    </div>
                    <div class="col-md-3  mt-3 text-start">
                    <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" name="status" value="1"<?= $warehouseData['data']['status'] == true ? 'checked' : ''; ?>>
                    <label class="form-check-label" name="status" for="flexSwitchCheckChecked">Make it unvisable</label>
                    </div>
                    </div>

                     <div class="col-md-12 mt-3 text-end">
                        <div class="form-floating ">
                          <button type="submit" name="updateWarehouse" class="btn btn-warning w-100 rounded-4" >Save</button>
                        </div>
                    </div>
                </div>
            </form>
                        <?php
                    }else{
                        echo '<h5>'.$warehouseData['message'].'</h5>';
                    }
                }else{
                    echo '<h5> somthing went wrong</h5>';
                    return false;
                }
                ?>
            
        </div>
    </div>
</div>
</div>
<?php include 'includes/footer.php'?>
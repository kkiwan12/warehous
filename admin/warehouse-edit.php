<?php 
include 'includes/header.php';
?>

<div class="container-fluid px-4">
    <div class="card mt-4 shadow-sm">
        <div class="card-header">
            <h4 class="mb-0">Add warehouse
                <a href="warehouse.php" class="btn btn-outline-danger float-end">Back</a>
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
                    <div class="col-md-12 mb-3">
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

                    <div class="col-md-3  mt-3">
                    <div class="form-check form-switch">
                    <label  for="flexSwitchCheckChecked" style="font:bold">Is Ban</label>
                    <input 
                        class="form-check-input" 
                        name="status" 
                        type="checkbox" 
                        role="switch" 
                        id="flexSwitchCheckChecked" 
                        value="1" 
                        <?= $warehouseData['data']['status'] == true ? 'checked' : ''; ?> 
                        style="width:30px;height:30px;">
                        </div>
                     </div>
                     <div class="col-md-3 mt-3 text-end">
                        <div class="form-floating ">
                          <button type="submit" name="updateWarehouse" class="btn btn-primary" >Save</button>
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
<?php include 'includes/footer.php'?>
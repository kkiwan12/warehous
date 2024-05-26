<?php 
include 'includes/header.php';

?>

<div class="container-fluid px-4">
    <div class="card mt-4 shadow-sm">
        <div class="card-header">
            <h4 class="mb-0">Edit admin
                <a href="admin.php" class="btn btn-outline-danger float-end">Back</a>
            </h4>
        </div>
        <div class="card-body">
            <?php alertMessage() ?>
            <form action="code.php" method="POST">

            <?php 
              if(isset($_GET['id'])){
                  if($_GET['id'] != ''){

                    $adminId = $_GET['id'];

                   } else{
                    echo '<h5> No Id found</h5>';
                    return false;
                   }
              } else {
                echo '<h5> No Id given</h5>';
                return false;
              }    
              
              $adminData = getById('admins',$adminId);
              if($adminData){

                if($adminData['status'] == 200){
                    ?>
                    <input type="hidden" name="adminId" value="<?= $adminData['data']['id'] ?>">
                     <div class="row">
                    <div class="col-md-12 mb-3">
                        <div class="form-floating ">
                            <input type="text" name="name" class="form-control" id="floatingInput" value="<?= $adminData['data']['name'] ?>" placeholder="name" required>
                            <label for="floatingInput">name</label>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-floating ">
                            <input type="email" name="email" class="form-control" id="floatingInput"  value="<?= $adminData['data']['email'] ?>" placeholder="name@example.com" required>
                            <label for="floatingInput">Email address</label>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-floating ">
                            <input type="password" name="password" class="form-control" id="floatingInput"   placeholder="password" >
                            <label for="floatingInput">password</label>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-floating ">
                            <input type="number" name="phone" class="form-control" id="floatingInput"  value="<?= $adminData['data']['phone'] ?>" placeholder="phone" required>
                            <label for="floatingInput">phone</label>
                        </div>
                    </div>
                    <div class="col-md-3  mt-3">
                    <div class="form-check form-switch">
                    <label  for="flexSwitchCheckChecked" style="font:bold">Is Ban</label>
                    <input 
                        class="form-check-input" 
                        name="is_ban" 
                        type="checkbox" 
                        role="switch" 
                        id="flexSwitchCheckChecked" 
                        value="1" 
                        <?= $adminData['data']['is_ban'] == true ? 'checked' : ''; ?> 
                        style="width:30px;height:30px;">
                        </div>
                     </div>
                     <div class="col-md-3 mt-3 text-end">
                        <div class="form-floating ">
                          <button type="submit" name="updateAdmin" class="btn btn-primary" >Update</button>
                        </div>
                    </div>
                </div>
            </form>





                    <?php

                }else{
                    echo '<h5?>'.$adminData['message'].'</h5>';
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
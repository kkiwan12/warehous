<?php 
include 'includes/header.php';

?>

<div class="container-fluid px-4  mt-4">
<div class="shadow p-3 mb-4 bg-body-tertiary rounded-4 ">
    <div class="card-borderless text-center">
        <div class="card-title text-dark mb-4 ">
            <h4 class="mb-0"><i class="bi bi-person-gear"></i> Edit admin
            <a href="admin.php" class="btn btn-outline-danger rounded-5 float-start"><i class="bi bi-arrow-left"></i></a>
            </h4>
        </div>
        <div class="card-text">
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
                    <div class="col-md-6 mb-3">
                    <label >$ salary</label>
                    <div class="input-group mb-3">
              
                        <span class="input-group-text">$</span>
                        <input type="text"  name="salary" class="form-control" aria-label="Amount (to the nearest dollar) " value="<?= $adminData['data']['salary'] ?>">
                        <span class="input-group-text">.00</span>
                     </div>
                    </div>

                    <div class="col-md-3  mt-3">
                    <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" name="status" value="1" 
                        <?= $adminData['data']['is_ban'] == true ? 'checked' : ''; ?>  >
                    <label class="form-check-label" name="is_ban" for="flexSwitchCheckChecked"><i class="bi bi-person-dash"></i> band the admin</label>
                    </div>
                    </div>
              
                     <div class="col-md-12 mt-3 text-end">
                        <div class="form-floating ">
                          <button type="submit" name="updateAdmin" class="btn btn-warning w-100 rounded-4" >Update</button>
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
</div>
<?php include 'includes/footer.php'?>
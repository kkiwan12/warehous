<?php 
include 'includes/header.php';

?>
<?php if($_SESSION['lang'] == 'en'): ?>
<div class="container-fluid px-4  py-4">
<div class="shadow p-3 mb-4 bg-body-tertiary rounded-4 ">
    <div class="card-borderless text-center">
        <div class="card-title text-dark mb-4">
            <h4 class="mb-0"><i class="bi bi-person-fill-gear"></i> Edit customer
            <a href="customer.php" class="btn btn-outline-danger rounded-5 float-start"><i class="bi bi-arrow-left"></i></a>
            </h4>
        </div>
        <div class="card-text">
            <?php alertMessage() ?>
            <form action="code.php" method="POST">

            <?php 
              if(isset($_GET['id'])){
                  if($_GET['id'] != ' '){

                    $customerId = $_GET['id'];
                   

                   } else{
                    echo '<h5> No Id found</h5>';
                    return false;
                   }
              } else {
                echo '<h5> No Id given</h5>';
                return false;
              }    
              
              $customerData = getById('customers',$customerId);
              if($customerData){

                if($customerData['status'] == 200){
                    ?>
                    <input type="hidden" name="customerId" value="<?= $customerData['data']['id'] ?>">
                     <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="form-floating ">
                            <input type="text" name="name" class="form-control" id="floatingInput" value="<?= $customerData['data']['name'] ?>" placeholder="customer name" required>
                            <label for="floatingInput">name</label>
                        </div>
                    </div>

                    
                    <div class="col-md-6 mb-3">
                        <div class="form-floating ">
                            <input type="email" name="email" class="form-control"  placeholder="name@example.com" value="<?= $customerData['data']['email'] ?>" required>
                            <label >Email address</label>
                        </div>
                    </div>
               
                    <div class="col-md-6 mb-3">
                        <div class="form-floating ">
                            <input type="number" name="phone" class="form-control"  placeholder="phone" value="<?= $customerData['data']['phone'] ?>" required>
                            <label >phone</label>
                        </div>
                    </div> 
                    <div class="col-md-6 mb-3">
                        <div class="form-floating ">
                            <input type="password" name="password" class="form-control"  placeholder="password" value="<?= $customerData['data']['password'] ?>" required>
                            <label >password</label>
                        </div>
                    </div>

                    <div class="col-md-6  mt-3 text-start">
                    <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" name="status" value="1" 
                        <?= $customerData['data']['status'] == true ? 'checked' : ''; ?>  >
                    <label class="form-check-label" name="status" for="flexSwitchCheckChecked"><i class="bi bi-person-dash text-start"></i> band the customer</label>
                    </div>
                    </div>
                     <div class="col-md-12 mt-3 text-end">
                        <div class="form-floating ">
                          <button type="submit" name="updateCustomer" class="btn btn-warning w-100 rounded-4" >Update</button>
                        </div>
                    </div>
                </div>
            </form>





                    <?php

                }else{
                    echo '<h5?>'.$customerData['message'].'</h5>';
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

<?php else: ?>












    <div class="container-fluid px-4  py-4">
<div class="shadow p-3 mb-4 bg-body-tertiary rounded-4 ">
    <div class="card-borderless text-center">
        <div class="card-title text-dark mb-4">
            <h4 class="mb-0"><i class="bi bi-person-fill-gear"></i> نعديل ولي الامر
            <a href="customer.php" class="btn btn-outline-danger rounded-5 float-start"><i class="bi bi-arrow-left"></i></a>
            </h4>
        </div>
        <div class="card-text">
            <?php alertMessage() ?>
            <form action="code.php" method="POST">

            <?php 
              if(isset($_GET['id'])){
                  if($_GET['id'] != ' '){

                    $customerId = $_GET['id'];
                   

                   } else{
                    echo '<h5> No Id found</h5>';
                    return false;
                   }
              } else {
                echo '<h5> No Id given</h5>';
                return false;
              }    
              
              $customerData = getById('customers',$customerId);
              if($customerData){

                if($customerData['status'] == 200){
                    ?>
                    <input type="hidden" name="customerId" value="<?= $customerData['data']['id'] ?>">
                     <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="form-floating ">
                            <input type="text" name="name" class="form-control" id="floatingInput" value="<?= $customerData['data']['name'] ?>" placeholder="customer name" required>
                            <label for="floatingInput">الاسم</label>
                        </div>
                    </div>

                    
                    <div class="col-md-6 mb-3">
                        <div class="form-floating ">
                            <input type="email" name="email" class="form-control"  placeholder="name@example.com" value="<?= $customerData['data']['email'] ?>" required>
                            <label >البريد الالكتروني</label>
                        </div>
                    </div>
               
                    <div class="col-md-6 mb-3">
                        <div class="form-floating ">
                            <input type="number" name="phone" class="form-control"  placeholder="phone" value="<?= $customerData['data']['phone'] ?>" required>
                            <label >رقم الهاتف</label>
                        </div>
                    </div> 
                    <div class="col-md-6 mb-3">
                        <div class="form-floating ">
                            <input type="password" name="password" class="form-control"  placeholder="password" value="<?= $customerData['data']['password'] ?>" required>
                            <label >كلمة السر</label>
                        </div>
                    </div>

                    <div class="col-md-6  mt-3 text-start">
                    <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" name="status" value="1" 
                        <?= $customerData['data']['status'] == true ? 'checked' : ''; ?>  >
                    <label class="form-check-label" name="status" for="flexSwitchCheckChecked"><i class="bi bi-person-dash text-start"></i> تعليق ولي الامر</label>
                    </div>
                    </div>
                     <div class="col-md-12 mt-3 text-end">
                        <div class="form-floating ">
                          <button type="submit" name="updateCustomer" class="btn btn-warning w-100 rounded-4" >تحديث</button>
                        </div>
                    </div>
                </div>
            </form>





                    <?php

                }else{
                    echo '<h5?>'.$customerData['message'].'</h5>';
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


    <?php endif; ?>
<?php include 'includes/footer.php'?>
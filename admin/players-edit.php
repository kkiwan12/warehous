<?php 
include 'includes/header.php';
?>
<?php if($_SESSION['lang'] == 'en'): ?>
<div class="container-fluid px-4 py-4">
<div class="shadow p-3 mb-4 bg-body-tertiary rounded-4 ">
    <div class="card-borderless text-center">
        <div class="card-title text-dark mb-4 ">
        <h4 class=""><i class="bi bi-person-fill-gear"></i> edit player 
                <a href="players.php" class="btn btn-outline-danger rounded-5 float-start"><i class="bi bi-arrow-left"></i></a>
            </h4>
        </div> 
        <div class="card-body">
            <?php alertMessage() ?>
            <form action="players-code.php" method="POST" enctype="multipart/form-data">
                <?php 
                if(isset($_GET['id'])){
                    if($_GET['id'] != ''){
                        $playerId = $_GET['id'];
                    }else{
                        echo'<h5> No Id Found</h5>';
                    }
                }else{
                    echo'<h5> No Id Given</h5>';
                    return false;
                }

                $playerData = getById('players',$playerId);
                
                if($playerData['status'] == 200){
                    $selectedCustomerId = $playerData['data']['customer_id'];
                    $selectedBelt = $playerData['data']['belt'];
        
                ?>
                <div class="row">
                 
                <input type="hidden" name="player_id" value="<?= $playerData['data']['id'] ?>">

                <div class="col-md-2 mb-3  text-start border-start border-3">
                     <?php 
                     if(file_exists($playerData['data']['image'])){
                        ?>
                            <img src="<?= $playerData['data']['image'] ?>" style="width: 150px; height:150px ; border-radius: 50%;">
                        <?php
                     }else{
                        echo ' <img src="../assets/uploads/icons/taekwondo.jpg" style="width: 150px; height: 150px;   border-radius: 50%;" alt="">';

                     }
                     ?>
                     
                     </div>
                    <div class="col-md-3  mt-5  text-start">
                        <div class="form-floating ">
                            <input type="text" name="first_name" class="form-control"  value="<?= $playerData['data']['first_name'] ?>" placeholder="name" required>
                            <label >first name</label>
                        </div>
                    </div>
                    <div class="col-md-3 mt-5">
                        <div class="form-floating ">
                            <input type="text" name="last_name" class="form-control"  value="<?= $playerData['data']['last_name'] ?>"  placeholder="name" required>
                            <label >last name</label>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3 mt-5">
                        <div class="form-floating ">
                            <input type="date" name="birth_day" class="form-control"  value="<?= $playerData['data']['birth_day'] ?>" placeholder="name" required>
                            <label >birth day</label>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label >Select parentis</label>
                        <select name="customer_id" class="form-select">
                       
                            <?php 
                                  $customers = getAll('customers');
                                  if($customers){
                                    if(mysqli_num_rows($customers)>0){
                                        foreach($customers as $customer){
                                            $selected =($customer['id']==$selectedCustomerId) ? 'selected' : '';
                                            echo '<option value="' . htmlspecialchars($customer['id']) . '" ' . $selected . '>' . $customer['name'] . '</option>';
                                        }
                                    }else{
                                      echo  '<option >No classes founded !!</option>';
                                    }
                                  }else{
                                      echo '<option value="">somthing went wrong !!</option>';
                                  }

                            ?>                            
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label >Select belt</label>
                        <select name="belt" class="form-select">
                        <option value="1" <?php if ($playerData['data']['belt'] == '1') echo 'selected'; ?>><i class="bi bi-circle-fill"></i> white</option>
                <option value="2" class="text-warning" <?php if ($playerData['data']['belt'] == '2') echo 'selected'; ?>><i class="bi bi-circle-fill text-warning"></i> yallo</option>
                <option value="3" <?php if ($playerData['data']['belt'] == '3') echo 'selected'; ?>><i class="bi bi-circle-fill"></i> green</option>
                <option value="4" <?php if ($playerData['data']['belt'] == '4') echo 'selected'; ?>><i class="bi bi-circle-fill"></i> blue</option>
                <option value="5" <?php if ($playerData['data']['belt'] == '5') echo 'selected'; ?>><i class="bi bi-circle-fill"></i> brown</option>
                <option value="6" <?php if ($playerData['data']['belt'] == '6') echo 'selected'; ?>><i class="bi bi-circle-fill"></i> red</option>
                <option value="7" <?php if ($playerData['data']['belt'] == '7') echo 'selected'; ?>><i class="bi bi-circle-fill"></i> black</option>
                <option value="8" <?php if ($playerData['data']['belt'] == '8') echo 'selected'; ?>><i class="bi bi-circle-fill"></i> 2 dan</option>
                <option value="9" <?php if ($playerData['data']['belt'] == '9') echo 'selected'; ?>><i class="bi bi-circle-fill"></i> 3 dan</option>
                <option value="10" <?php if ($playerData['data']['belt'] == '10') echo 'selected'; ?>><i class="bi bi-circle-fill"></i> 4 dan</option>
                <option value="11" <?php if ($playerData['data']['belt'] == '11') echo 'selected'; ?>><i class="bi bi-circle-fill"></i> 5 dan</option>
                <option value="12" <?php if ($playerData['data']['belt'] == '12') echo 'selected'; ?>><i class="bi bi-circle-fill"></i> 6 dan</option>
                        </select>
                    </div>
                    
  
                    <div class="col-md-6 mb-3">
                    <label >Fees</label>
                    <div class="input-group mb-3">
              
                        <span class="input-group-text">$</span>
                        <input type="text" value="<?= $playerData['data']['fees'] ?>" name="fees" class="form-control" aria-label="Amount (to the nearest dollar)">
                        <span class="input-group-text">.00</span>
                     </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label >Select gender</label>
                        <select name="gender" class="form-select">
                     

                            <option  value="0" <?php if ($playerData['data']['gender'] == '0') echo 'selected'; ?>> male</option>
                            <option value="1" <?php if ($playerData['data']['gender'] == '1') echo 'selected'; ?>> female</option> 
                        
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-floating ">
                            <textarea name="nots"  class="form-control" rows="3"  placeholder="nots" value="<?= $playerData['data']['nots'] ?>" ></textarea>
                            <label >player nots</label>
                        </div>
                    </div>
                              
                    <div class="col-md-6">
                   <div class="form-floating ">
                            <input type="text" name="location" value="<?= $playerData['data']['location'] ?>" class="form-control"  placeholder="location" required>
                            <label >location</label>
                        </div>
                   </div>
                 

                    <div class="col-md-6 mb-3">
                       
                        <label for="formFile" ><i class="bi bi-camera"></i> player image</label>
                        <input class="form-control" type="file" id="filetag" name="image">
                   
                    </div>
                   
                    <div class="col-md-6 mb-3">
                       
                       <label for="formFile" ><i class="bi bi-folder-symlink"></i> player files</label>
                       <input class="form-control" type="file" id="filetag" name="file">
                  
                   </div>
                
            

                    <div class="col-md-3  mt-4  text-start">
                    <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" name="bus"  value="1" <?= $playerData['data']['bus'] == true ? 'checked' : ''; ?> >
                    <label class="form-check-label" name="bus" for="flexSwitchCheckChecked"><i class="bi bi-bus-front text-primary"></i> add bus </label>
                    </div>
                    </div>

                    <div class="col-md-3  mt-4 text-start">
                    <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" name="status"  value="1" <?= $playerData['data']['status'] == true ? 'checked' : ''; ?> >
                    <label class="form-check-label" name="status" for="flexSwitchCheckChecked"> <i class="bi bi-eye-slash-fill text-primary"></i>Make it unvisable</label>
                    </div>
                    </div>
           
       
                 
                     <div class="col-md-12 mt-3 text-end">
                        <div class="form-floating ">
                          <button type="submit" name="updatePlayer" class="btn btn-warning w-100 rounded-4"" >Save</button>
                        </div>
                    </div>
                </div>
                <?php }else{
                    echo '<h5?>' . $playerData['message'] . '</h5>';
                }?>
            </form>
        </div>
    </div>
</div>
</div>



<?php else: ?>

    <div class="container-fluid px-4 py-4">
<div class="shadow p-3 mb-4 bg-body-tertiary rounded-4 ">
    <div class="card-borderless text-center">
        <div class="card-title text-dark mb-4 ">
        <h4 class=""><i class="bi bi-person-fill-gear"></i> تعديل اللاعب    
                <a href="players.php" class="btn btn-outline-danger rounded-5 float-start"><i class="bi bi-arrow-left"></i></a>
            </h4>
        </div> 
        <div class="card-body">
            <?php alertMessage() ?>
            <form action="players-code.php" method="POST" enctype="multipart/form-data">
                <?php 
                if(isset($_GET['id'])){
                    if($_GET['id'] != ''){
                        $playerId = $_GET['id'];
                    }else{
                        echo'<h5> No Id Found</h5>';
                    }
                }else{
                    echo'<h5> No Id Given</h5>';
                    return false;
                }

                $playerData = getById('players',$playerId);
                
                if($playerData['status'] == 200){
                    $selectedCustomerId = $playerData['data']['customer_id'];
                    $selectedBelt = $playerData['data']['belt'];
        
                ?>
                <div class="row">
                 
                <input type="hidden" name="player_id" value="<?= $playerData['data']['id'] ?>">

                <div class="col-md-2 mb-3  text-start border-start border-3">
                     <?php 
                     if(file_exists($playerData['data']['image'])){
                        ?>
                            <img src="<?= $playerData['data']['image'] ?>" style="width: 150px; height:150px ; border-radius: 50%;">
                        <?php
                     }else{
                        echo ' <img src="../assets/uploads/icons/taekwondo.jpg" style="width: 150px; height: 150px;   border-radius: 50%;" alt="">';

                     }
                     ?>
                     
                     </div>
                    <div class="col-md-3  mt-5  text-start">
                        <div class="form-floating ">
                            <input type="text" name="first_name" class="form-control"  value="<?= $playerData['data']['first_name'] ?>" placeholder="name" required>
                            <label >الاسم الاول</label>
                        </div>
                    </div>
                    <div class="col-md-3 mt-5">
                        <div class="form-floating ">
                            <input type="text" name="last_name" class="form-control"  value="<?= $playerData['data']['last_name'] ?>"  placeholder="name" required>
                            <label >الاسم الاخير</label>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3 mt-5">
                        <div class="form-floating ">
                            <input type="date" name="birth_day" class="form-control"  value="<?= $playerData['data']['birth_day'] ?>" placeholder="name" required>
                            <label >تاريخ الميلاد</label>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label >اختر ولي الامر</label>
                        <select name="customer_id" class="form-select">
                       
                            <?php 
                                  $customers = getAll('customers');
                                  if($customers){
                                    if(mysqli_num_rows($customers)>0){
                                        foreach($customers as $customer){
                                            $selected =($customer['id']==$selectedCustomerId) ? 'selected' : '';
                                            echo '<option value="' . htmlspecialchars($customer['id']) . '" ' . $selected . '>' . $customer['name'] . '</option>';
                                        }
                                    }else{
                                      echo  '<option >No classes founded !!</option>';
                                    }
                                  }else{
                                      echo '<option value="">somthing went wrong !!</option>';
                                  }

                            ?>                            
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label >اختر الحزام</label>
                        <select name="belt" class="form-select">
                        <option value="1" <?php if ($playerData['data']['belt'] == '1') echo 'selected'; ?>><i class="bi bi-circle-fill"></i> ابيض</option>
                <option value="2" class="text-warning" <?php if ($playerData['data']['belt'] == '2') echo 'selected'; ?>><i class="bi bi-circle-fill text-warning"></i> اصفر</option>
                <option value="3" <?php if ($playerData['data']['belt'] == '3') echo 'selected'; ?>><i class="bi bi-circle-fill"></i> اخضر</option>
                <option value="4" <?php if ($playerData['data']['belt'] == '4') echo 'selected'; ?>><i class="bi bi-circle-fill"></i> ازرق</option>
                <option value="5" <?php if ($playerData['data']['belt'] == '5') echo 'selected'; ?>><i class="bi bi-circle-fill"></i> بني</option>
                <option value="6" <?php if ($playerData['data']['belt'] == '6') echo 'selected'; ?>><i class="bi bi-circle-fill"></i> احمر</option>
                <option value="7" <?php if ($playerData['data']['belt'] == '7') echo 'selected'; ?>><i class="bi bi-circle-fill"></i> اسود</option>
                <option value="8" <?php if ($playerData['data']['belt'] == '8') echo 'selected'; ?>><i class="bi bi-circle-fill"></i> 2 دان</option>
                <option value="9" <?php if ($playerData['data']['belt'] == '9') echo 'selected'; ?>><i class="bi bi-circle-fill"></i> 3 دان</option>
                <option value="10" <?php if ($playerData['data']['belt'] == '10') echo 'selected'; ?>><i class="bi bi-circle-fill"></i> 4 دان</option>
                <option value="11" <?php if ($playerData['data']['belt'] == '11') echo 'selected'; ?>><i class="bi bi-circle-fill"></i> 5 دان</option>
                <option value="12" <?php if ($playerData['data']['belt'] == '12') echo 'selected'; ?>><i class="bi bi-circle-fill"></i> 6 دان</option>
                        </select>
                    </div>
                    
  
                    <div class="col-md-6 mb-3">
                    <label >الرسوم</label>
                    <div class="input-group mb-3">
              
                        <span class="input-group-text">$</span>
                        <input type="text" value="<?= $playerData['data']['fees'] ?>" name="fees" class="form-control" aria-label="Amount (to the nearest dollar)">
                        <span class="input-group-text">.00</span>
                     </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label >اختر الجنس</label>
                        <select name="gender" class="form-select">
                     

                            <option  value="0" <?php if ($playerData['data']['gender'] == '0') echo 'selected'; ?>> ذكر</option>
                            <option value="1" <?php if ($playerData['data']['gender'] == '1') echo 'selected'; ?>> انثى</option> 
                        
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-floating ">
                            <textarea name="nots"  class="form-control" rows="3"  placeholder="nots" value="<?= $playerData['data']['nots'] ?>" ></textarea>
                            <label >ملاحظات الاعب</label>
                        </div>
                    </div>
                              
                    <div class="col-md-6">
                   <div class="form-floating ">
                            <input type="text" name="location" value="<?= $playerData['data']['location'] ?>" class="form-control"  placeholder="location" required>
                            <label >عنوان الاعب</label>
                        </div>
                   </div>
                 

                    <div class="col-md-6 mb-3">
                       
                        <label for="formFile" ><i class="bi bi-camera"></i> صورت الاعب</label>
                        <input class="form-control" type="file" id="filetag" name="image">
                   
                    </div>
                   
                    <div class="col-md-6 mb-3">
                       
                       <label for="formFile" ><i class="bi bi-folder-symlink"></i> ملفات الاعب </label>
                       <input class="form-control" type="file" id="filetag" name="file">
                  
                   </div>
                
            

                    <div class="col-md-3  mt-4  text-start">
                    <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" name="bus"  value="1" <?= $playerData['data']['bus'] == true ? 'checked' : ''; ?> >
                    <label class="form-check-label" name="bus" for="flexSwitchCheckChecked"><i class="bi bi-bus-front text-primary"></i> اضف موصلات </label>
                    </div>
                    </div>

                    <div class="col-md-3  mt-4 text-start">
                    <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" name="status"  value="1" <?= $playerData['data']['status'] == true ? 'checked' : ''; ?> >
                    <label class="form-check-label" name="status" for="flexSwitchCheckChecked"> <i class="bi bi-eye-slash-fill text-primary"></i>تعليق الاعب</label>
                    </div>
                    </div>
           
       
                 
                     <div class="col-md-12 mt-3 text-end">
                        <div class="form-floating ">
                          <button type="submit" name="updatePlayer" class="btn btn-warning w-100 rounded-4"" >حفظ</button>
                        </div>
                    </div>
                </div>
                <?php }else{
                    echo '<h5?>' . $playerData['message'] . '</h5>';
                }?>
            </form>
        </div>
    </div>
</div>
</div>





    <?php endif; ?>
<?php include 'includes/footer.php'?>
<script>

</script>
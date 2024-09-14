<?php
include 'includes/header.php';
checkAndUpdatePlayerStatus();
$paraRestultId = checkParamId('id');

if (is_numeric($paraRestultId)) {

    $playerId = validate($paraRestultId);

    $player = getById('players', $paraRestultId);
}

?>
<?php if($_SESSION['lang'] == 'en'): ?>
<div class="py-5">
    <div class="container ">
        <div class="row">
            <div class="col-md-2 mb-3 text-end">
                <?php if($player['data']['image'] == ''){
                    echo ' <img src="../assets/uploads/icons/taekwondo.jpg" style="width: 150px; height: 150px;   border-radius: 50%;" alt="">';
                }else{
                    echo ' <img src="'. $player['data']['image'] .'" style="width: 150px; height: 150px;   border-radius: 50%;" alt="">';
                 } ?>
               
            </div>
            <div class="col-md-8 py-6">
           

                <h1 class="mt-3"><?= $player['data']['first_name'] ?> <?= $player['data']['last_name'] ?></h1>
                <?php
                if ($player['data']['bus'] == 0) {
                    echo '<span class="badge bg-warning"><i class="bi bi-person-walking"></i></span>';
                } else {
                    echo '<span class="badge bg-primary"><i class="bi bi-bus-front"></i></span>';
                }
                ?>
            </div>
            <div class="col-md-2 text-end"> <a href="players.php"> <h1><i class="bi bi-arrow-left-circle-fill text-danger"></i></h1></a></div>
            
        </div>
    </div>

    <div class="container  mt-3">
    <span class="text-secondary mb-4">the player information :</span>
    <div class=" border-bottom border-secondary-subtle  mb-4   " style="--bs-border-opacity: .5;">
        <div class="row mt-3  px-3  ">

        
        <div class="col-md-3">
                <div class="shadow p-3 mb-4 bg-body-tertiary rounded-4">
                    <div class="card-borderless text-center  " >
                        <div class="card-body">
                            <h4 class="card-title  border-bottom">belt color</h4>
                            <?php 
                            $belt = $player['data']['belt'];
                            if($belt == 1){
                                ?> <p class="card-text"><i class="bi bi-circle"></i> white</p> <?php
                            }else if($belt == 2) {
                                ?> <p class="card-text"><i class="bi bi-circle-fill text-warning"> </i> yallow</p> <?php
                            }else if($belt == 3) { 
                                ?> <p class="card-text"><i class="bi bi-circle-fill text-success"> </i> green</p> <?php 
                            }else if($belt == 4) {
                                ?> <p class="card-text"><i class="bi bi-circle-fill text-primary"> </i> blue</p> <?php
                            }else if($belt == 5) {
                                ?> <p class="card-text"><i class="bi bi-circle-fill" style="color: #964B00;"></i> brown</p> <?php
                            }else if($belt == 6) {
                                ?> <p class="card-text"><i class="bi bi-circle-fill text-danger" > </i> red</p> <?php
                            }else if($belt == 7) {
                                ?> <p class="card-text"><i class="bi bi-1-circle-fill"></i> black</p> <?php
                            }else if($belt == 8) {
                                ?> <p class="card-text"><i class="bi bi-2-circle-fill"></i> </i> dan</p> <?php
                            }else if($belt == 9){
                                ?> <p class="card-text"><i class="bi bi-3-circle-fill"></i> </i> dan</p> <?php
                            }else if($belt == 10){
                                ?> <p class="card-text"><i class="bi bi-4-circle-fill"></i> dan</p> <?php
                            }else if($belt == 11) {
                                ?> <p class="card-text"><i class="bi bi-5-circle-fill"></i> </i> dan</p> <?php
                            }else if($belt == 12){
                                ?> <p class="card-text"><i class="bi bi-6-circle-fill"></i> </i> dan</p> <?php
                            }
                            ?>
                          
                            
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="shadow p-3 mb-4 bg-body-tertiary rounded-4">
                    <div class="card-borderless text-center">
                        <div class="card-body">
                            <h4 class="card-title  border-bottom">birth day</h4>
                            <p class="card-text"><?= $player['data']['birth_day'] ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="shadow p-3 mb-4 bg-body-tertiary rounded-4">
                    <div class="card-borderless text-center">
                        <div class="card-body">
                            <h4 class="card-title  border-bottom">status</h4>
                            <?php
                                    if($player['data']['status'] != 1) {
                                        echo '<span class="badge bg-success">active </span>';
                                    } else {
                               
                                        echo '<span class="badge bg-danger">suspended</span>';
                                    }
                                    ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="shadow p-3 mb-4 bg-body-tertiary rounded-4">
                    <div class="card-borderless text-center">
                        <div class="card-body">
                            <h4 class="card-title  border-bottom">suspended at</h4>
                            <p class="card-text"><?= $player['data']['suspended_at'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="shadow p-3 mb-4 bg-body-tertiary rounded-4">
                    <div class="card-borderless text-center">
                        <div class="card-body">
                            <h4 class="card-title text-start border-bottom">notes :</h4>
                            <?php 
                            if($player['data']['nots'] == ""){
                                echo '<p class="card-text">No notes</p>';
                            }
                            ?>
                            <p class="card-text"><?= $player['data']['nots'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6    ">
                <div class="shadow p-3 mb-4 bg-body-tertiary rounded-4">
                    <div class="card-borderless text-center">
                        <div class="card-body">
                            <h4 class="card-title text-start  border-bottom">location :</h4>
                            <p class="card-text"><?= $player['data']['location'] ?></p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        </div>
        <span class="text-secondary mb-4 mt-5">the pirant information :</span>
        <div class="border-bottom border-secondary-subtle   mb-4   " style="--bs-border-opacity: .5;">
        <?php 
        $customerId = $player['data']['customer_id'];
        $customerData = getById('customers',$customerId);
        if($customerData){?>
            <div class="row mt-3 px-3">
             <div class="col-md-4">
                <div class="shadow p-3 mb-4 bg-body-tertiary rounded-4">
                    <div class="card-borderless text-center">
                        <div class="card-body">
                            <h4 class="card-title  border-bottom">name</h4>
                            <p class="card-text text-primary"><?= $customerData['data']['name'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="shadow p-3 mb-4 bg-body-tertiary rounded-4">
                    <div class="card-borderless text-center">
                        <div class="card-body">
                            <h4 class="card-title  border-bottom">phone </h4>
                            <p class="card-text text-primary"><?= $customerData['data']['phone'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="shadow p-3 mb-4 bg-body-tertiary rounded-4">
                    <div class="card-borderless text-center"  style="max-width: 18rem;">
                        <div class="card-body">
                            <h4 class="card-title  border-bottom">email</h4>
                            <p class="card-text text-primary fs-6-4"><?= $customerData['data']['email'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
  
            </div>
            </div>
          <?php
        }else{?>
            <div class="row mt-3">
       

            <div class="col-md-12 justify-content-center">
                <div class="shadow p-3 mb-5 bg-body-tertiary rounded">
                  <h1>No relation founded</h1>
                </div>
            </div>
        </div>  
        <?php }
        ?>
     
     <div class="row mt-3">
     <?php alertMessage() ?>

       <div class="col-md-8 justify-content-center">
       <span class="text-secondary mb-4">player invoices :</span>
           <div class="shadow p-3 mb-5 bg-body-tertiary rounded">
            <div class="table-responsive">
           <table class="table" >
            <thead>
                <tr>
                <th scope="col">#id</th>
                <th scope="col">pin</th>
                <th scope="col">started_at</th>
                <th scope="col">suspended_at</th>
                <th scope="col">amount</th>
                <th scope="col">disruption</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $invoices = getPlayerInvoices($playerId);
                if($invoices){
                    foreach($invoices as $invoice){
                    ?>
                       <tr>
                <th scope="row"><?= $invoice['id'] ?></th>
                <td># <?= $invoice['pin'] ?></td>
                <td><?= $invoice['started_at'] ?></td>
                <td><?= $invoice['suspended_at'] ?></td>
                <td><?= $invoice['amount'] ?> $</td>
                <td><?= $invoice['description'] ?></td>
                </tr>
                <tr>
            <?php }
                }else{
                    ?>
                    
                    <tr>
            <td colspan="6">No Records found</td>

        </tr>
                 
                    <?php
                }
                ?>
             
             
            </tbody>
            </table>
            </div>
           </div>
           <div class="row">
           <div class="col-md-4 text-center">
            
            <div class="shadow p-3 mb-5 bg-body-tertiary rounded-4">
            <div class="card-borderless text-center">
                        <div class="card-body">
                            <h4 class="card-title  "><i class="bi bi-folder"></i> player files</h4>
                            <?php
                            if(!file_exists($player['data']['file'])){  
                                echo '<p class="mt-4">No files</p>';
                            }else{
                                ?>
                                    <div class="py-3">
                            <img src="<?= $player['data']['file'] ?>" style="width: 150px; height: 150px;   border-radius: 25%;" alt="">
                            </div>
                            <a href="players-code.php?file=<?= urlencode($player['data']['file']) ?>" class="btn  btn-dark rounded-5"><i class="bi bi-download"></i> download</a>
                                <?php
                            }
                            ?>
                        
                        </div>
                    </div>
            </div>
           </div>
           <div class="col-md-8">
           <div class="shadow p-3 mb-5 bg-body-tertiary rounded-4">
           <div class="card-borderless text-center">
           <h4 class="card-title  mb-3"><i class="bi bi-calendar-week"></i> player class </h4>

           <div class="dropdown mb-3">
            <button type="button" class="btn btn-dark btn-sm   rounded-5" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
            <i class="bi bi-plus-lg"></i> Add player to class 
            </button>
            <form  action="players-code.php" method="POST" enctype="multipart/form-data" class="dropdown-menu p-4 w-50">
            <input type="hidden" name="player_id" value="<?= $player['data']['id']?>">
            <div class="mb-3 w-50 text-center" >
               <label for="class"> select class </label>
                <select name="class" class="form-select w-100 ">
              
                <?php 
                                  $classes = getAll('class');
                                  if($classes){
                                    if(mysqli_num_rows($classes)>0){
                                        foreach($classes as $class){
                                            echo '<option value="'.$class['id'].'" class="w-100">'.$class['name'].'</option>';
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
              <div class="text-center"> 
             <button type="submit" class="btn btn-warning rounded-5 w-100" name="addClass">add</button>
            </div>
              
            </form>
            </div>
            <?php  $classes = getPlayerClasses($playerId);
            if($classes){

        
            ?>
            
           <table class="table">
            <thead>
                <tr>
                    <th scope="col">name</th>
                    <th scope="col">time</th>
                    <th scope="col">days</th>
                    <th>action</th>
                </tr>
            </thead>
                <tbody>
             <?php 
      
                foreach($classes as $class){
                    ?>
                    <tr>
                        <td><?= $class['name'] ?></td>
                        <td><?= $class['time'] ?></td>
                        <td><?= $class['days'] ?></td>
                        <td><a href="plyersClass-delete.php?class_id=<?= $class['id'] ?>&player_id=<?= $playerId ?>" class="btn btn-danger btn-sm" style=" border-radius: 50%;"><i class="bi bi-trash"></i></a></td>
                    </tr>
                    <?php
                }

             ?>
                  
                </tbody>
           </table>
           <?php }?>
           </div>
           </div>
           </div>
           </div>
       </div>

       <div class="col-md-4 justify-content-center">
           <div class="shadow p-3 mb-5 bg-body-tertiary rounded">
           <div class="card-borderless text-center">
                        <div class="card-body">
                            <h4 class="card-title  border-bottom text-warning"> <i class="bi bi-receipt-cutoff"></i> create invoice</h4>
                            <form action="players-code.php" method="POST">
                                <input type="hidden" name="player_id" value="<?= $player['data']['id']?>">
                                <div class="contaner py-2">
                                <?php alertMessage() ?>
                                <div class="form-floating mt-3 mb-2">
                            <input type="text" name="pin" class="form-control"  placeholder="" required>
                            <label >#paper invoice number</label>
                        </div>
                                <div class="form-floating mb-3 ">
                            <textarea name="description" class="form-control" rows="3"  placeholder="discruption" required></textarea>
                            <label >invoice description</label>
                             </div>
                             <label >amount</label>
                    <div class="input-group mb-3">
              
                        <span class="input-group-text">$</span>
                        <input type="number "  name="amount" class="form-control" aria-label="Amount (to the nearest dollar)" required>
                        <span class="input-group-text">.00</span>
                     </div> 
                            <div class="form-floating  mb-2">
                            <input type="date" name="started_at" class="form-control"  placeholder="name" value="<?= $player['data']['suspended_at'] ?>" required>
                            <label >from :</label>
                             </div>
                             <div class="form-floating ">
                            <input type="date" name="suspended_at" class="form-control"  placeholder="name" required>
                            <label >to :</label>
                             </div>

                             <label class="text-primary mt-2" >signed by</label>
                        <select name="admin_id" class="form-select" required>
                       
                            <?php 
                                  $admins = getAll('admins');
                                  if($admins){
                                    if(mysqli_num_rows($admins)>0){
                                        foreach($admins as $admin){
                                            echo '<option value="'.$admin['id'].'">'.$admin['name'].'</option>';
                                        }
                                    }else{
                                      echo  '<option >No classes founded !!</option>';
                                    }
                                  }else{
                                      echo '<option value="">somthing went wrong !!</option>';
                                  }

                            ?>                            
                        </select>
                    
                        <div class="form-floating mt-3 text-end">
                          <button type="submit" name="createInvoice" class="btn btn-primary" >submit</button>
                        </div>
          
                             </div>
                            </form>
                        </div>
                    </div>
           </div>
     </div>
    </div>
</div>





<?php else: ?>


















    <div class="py-5">
    <div class="container ">
        <div class="row">
            <div class="col-md-2 mb-3 text-end">
                <?php if($player['data']['image'] == ''){
                    echo ' <img src="../assets/uploads/icons/taekwondo.jpg" style="width: 150px; height: 150px;   border-radius: 50%;" alt="">';
                }else{
                    echo ' <img src="'. $player['data']['image'] .'" style="width: 150px; height: 150px;   border-radius: 50%;" alt="">';
                 } ?>
               
            </div>
            <div class="col-md-8 py-6">
           

                <h1 class="mt-3"><?= $player['data']['first_name'] ?> <?= $player['data']['last_name'] ?></h1>
                <?php
                if ($player['data']['bus'] == 0) {
                    echo '<span class="badge bg-warning"><i class="bi bi-person-walking"></i></span>';
                } else {
                    echo '<span class="badge bg-primary"><i class="bi bi-bus-front"></i></span>';
                }
                ?>
            </div>
            <div class="col-md-2 text-end"> <a href="players.php"> <h1><i class="bi bi-arrow-left-circle-fill text-danger"></i></h1></a></div>
            
        </div>
    </div>

    <div class="container  mt-3">
    <span class="text-secondary mb-4">معلومات اللاعب:</span>
    <div class=" border-bottom border-secondary-subtle  mb-4   " style="--bs-border-opacity: .5;">
        <div class="row mt-3  px-3  ">

        
        <div class="col-md-3">
                <div class="shadow p-3 mb-4 bg-body-tertiary rounded-4">
                    <div class="card-borderless text-center  " >
                        <div class="card-body">
                            <h4 class="card-title  border-bottom">لون الحزام</h4>
                            <?php 
                            $belt = $player['data']['belt'];
                            if($belt == 1){
                                ?> <p class="card-text"><i class="bi bi-circle"></i> white</p> <?php
                            }else if($belt == 2) {
                                ?> <p class="card-text"><i class="bi bi-circle-fill text-warning"> </i> yallow</p> <?php
                            }else if($belt == 3) { 
                                ?> <p class="card-text"><i class="bi bi-circle-fill text-success"> </i> green</p> <?php 
                            }else if($belt == 4) {
                                ?> <p class="card-text"><i class="bi bi-circle-fill text-primary"> </i> blue</p> <?php
                            }else if($belt == 5) {
                                ?> <p class="card-text"><i class="bi bi-circle-fill" style="color: #964B00;"></i> brown</p> <?php
                            }else if($belt == 6) {
                                ?> <p class="card-text"><i class="bi bi-circle-fill text-danger" > </i> red</p> <?php
                            }else if($belt == 7) {
                                ?> <p class="card-text"><i class="bi bi-1-circle-fill"></i> black</p> <?php
                            }else if($belt == 8) {
                                ?> <p class="card-text"><i class="bi bi-2-circle-fill"></i> </i> dan</p> <?php
                            }else if($belt == 9){
                                ?> <p class="card-text"><i class="bi bi-3-circle-fill"></i> </i> dan</p> <?php
                            }else if($belt == 10){
                                ?> <p class="card-text"><i class="bi bi-4-circle-fill"></i> dan</p> <?php
                            }else if($belt == 11) {
                                ?> <p class="card-text"><i class="bi bi-5-circle-fill"></i> </i> dan</p> <?php
                            }else if($belt == 12){
                                ?> <p class="card-text"><i class="bi bi-6-circle-fill"></i> </i> dan</p> <?php
                            }
                            ?>
                          
                            
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="shadow p-3 mb-4 bg-body-tertiary rounded-4">
                    <div class="card-borderless text-center">
                        <div class="card-body">
                            <h4 class="card-title  border-bottom">تاريخ الميلاد</h4>
                            <p class="card-text"><?= $player['data']['birth_day'] ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="shadow p-3 mb-4 bg-body-tertiary rounded-4">
                    <div class="card-borderless text-center">
                        <div class="card-body">
                            <h4 class="card-title  border-bottom">الحاله</h4>
                            <?php
                                    if($player['data']['status'] != 1) {
                                        echo '<span class="badge bg-success">فعال </span>';
                                    } else {
                               
                                        echo '<span class="badge bg-danger">معلق</span>';
                                    }
                                    ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="shadow p-3 mb-4 bg-body-tertiary rounded-4">
                    <div class="card-borderless text-center">
                        <div class="card-body">
                            <h4 class="card-title  border-bottom">ينتهي الاشتراك </h4>
                            <p class="card-text"><?= $player['data']['suspended_at'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="shadow p-3 mb-4 bg-body-tertiary rounded-4">
                    <div class="card-borderless text-center">
                        <div class="card-body">
                            <h4 class="card-title text-start border-bottom">الملاحظات :</h4>
                            <?php 
                            if($player['data']['nots'] == ""){
                                echo '<p class="card-text">No notes</p>';
                            }
                            ?>
                            <p class="card-text"><?= $player['data']['nots'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6    ">
                <div class="shadow p-3 mb-4 bg-body-tertiary rounded-4">
                    <div class="card-borderless text-center">
                        <div class="card-body">
                            <h4 class="card-title text-start  border-bottom">العنوان :</h4>
                            <p class="card-text"><?= $player['data']['location'] ?></p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        </div>
        <span class="text-secondary mb-4 mt-5">معلومات ولي الامر :</span>
        <div class="border-bottom border-secondary-subtle   mb-4   " style="--bs-border-opacity: .5;">
        <?php 
        $customerId = $player['data']['customer_id'];
        $customerData = getById('customers',$customerId);
        if($customerData){?>
            <div class="row mt-3 px-3">
             <div class="col-md-4">
                <div class="shadow p-3 mb-4 bg-body-tertiary rounded-4">
                    <div class="card-borderless text-center">
                        <div class="card-body">
                            <h4 class="card-title  border-bottom">الاسم</h4>
                            <p class="card-text text-primary"><?= $customerData['data']['name'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="shadow p-3 mb-4 bg-body-tertiary rounded-4">
                    <div class="card-borderless text-center">
                        <div class="card-body">
                            <h4 class="card-title  border-bottom">رقم الهاتف </h4>
                            <p class="card-text text-primary"><?= $customerData['data']['phone'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="shadow p-3 mb-4 bg-body-tertiary rounded-4">
                    <div class="card-borderless text-center"  style="max-width: 18rem;">
                        <div class="card-body">
                            <h4 class="card-title  border-bottom">البريد الالكتروني</h4>
                            <p class="card-text text-primary fs-6-4"><?= $customerData['data']['email'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
  
            </div>
            </div>
          <?php
        }else{?>
            <div class="row mt-3">
       

            <div class="col-md-12 justify-content-center">
                <div class="shadow p-3 mb-5 bg-body-tertiary rounded">
                  <h1>No relation founded</h1>
                </div>
            </div>
        </div>  
        <?php }
        ?>
     
     <div class="row mt-3">
     <?php alertMessage() ?>

       <div class="col-md-8 justify-content-center">
       <span class="text-secondary mb-4">وصولات اللاعب :</span>
           <div class="shadow p-3 mb-5 bg-body-tertiary rounded">
            <div class="table-responsive">
           <table class="table" >
            <thead>
                <tr>
                <th scope="col">#id</th>
                <th scope="col">رثم الوصل الورقي</th>
                <th scope="col">من تاريخ</th>
                <th scope="col">الى تاريخ</th>
                <th scope="col">المبلغ</th>
                <th scope="col">الوصف</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $invoices = getPlayerInvoices($playerId);
                if($invoices){
                    foreach($invoices as $invoice){
                    ?>
                       <tr>
                <th scope="row"><?= $invoice['id'] ?></th>
                <td># <?= $invoice['pin'] ?></td>
                <td><?= $invoice['started_at'] ?></td>
                <td><?= $invoice['suspended_at'] ?></td>
                <td><?= $invoice['amount'] ?> $</td>
                <td><?= $invoice['description'] ?></td>
                </tr>
                <tr>
            <?php }
                }else{
                    ?>
                    
                    <tr>
            <td colspan="6">No Records found</td>

        </tr>
                 
                    <?php
                }
                ?>
             
             
            </tbody>
            </table>
            </div>
           </div>
           <div class="row">
           <div class="col-md-4 text-center">
            
            <div class="shadow p-3 mb-5 bg-body-tertiary rounded-4">
            <div class="card-borderless text-center">
                        <div class="card-body">
                            <h4 class="card-title  "><i class="bi bi-folder"></i>ملفات اللاعب</h4>
                            <?php
                            if(!file_exists($player['data']['file'])){  
                                echo '<p class="mt-4">No files</p>';
                            }else{
                                ?>
                                    <div class="py-3">
                            <img src="<?= $player['data']['file'] ?>" style="width: 150px; height: 150px;   border-radius: 25%;" alt="">
                            </div>
                            <a href="players-code.php?file=<?= urlencode($player['data']['file']) ?>" class="btn  btn-dark rounded-5"><i class="bi bi-download"></i> download</a>
                                <?php
                            }
                            ?>
                        
                        </div>
                    </div>
            </div>
           </div>
           <div class="col-md-8">
           <div class="shadow p-3 mb-5 bg-body-tertiary rounded-4">
           <div class="card-borderless text-center">
           <h4 class="card-title  mb-3"><i class="bi bi-calendar-week"></i> حصص اللاعب </h4>

           <div class="dropdown mb-3">
            <button type="button" class="btn btn-dark btn-sm   rounded-5" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
            <i class="bi bi-plus-lg"></i> اضافة اللاعب الى حصه
            </button>
            <form  action="players-code.php" method="POST" enctype="multipart/form-data" class="dropdown-menu p-4 w-50">
            <input type="hidden" name="player_id" value="<?= $player['data']['id']?>">
            <div class="mb-3 w-50 text-center" >
               <label for="class"> اختار حصه </label>
                <select name="class" class="form-select w-100 ">
              
                <?php 
                                  $classes = getAll('class');
                                  if($classes){
                                    if(mysqli_num_rows($classes)>0){
                                        foreach($classes as $class){
                                            echo '<option value="'.$class['id'].'" class="w-100">'.$class['name'].'</option>';
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
              <div class="text-center"> 
             <button type="submit" class="btn btn-warning rounded-5 w-100" name="addClass">اضافه</button>
            </div>
              
            </form>
            </div>
            <?php  $classes = getPlayerClasses($playerId);
            if($classes){

        
            ?>
            
           <table class="table">
            <thead>
                <tr>
                    <th scope="col">اسم الحصه</th>
                    <th scope="col">الساعه</th>
                    <th scope="col">الايام</th>
                    <th>action</th>
                </tr>
            </thead>
                <tbody>
             <?php 
      
                foreach($classes as $class){
                    ?>
                    <tr>
                        <td><?= $class['name'] ?></td>
                        <td><?= $class['time'] ?></td>
                        <td><?= $class['days'] ?></td>
                        <td><a href="plyersClass-delete.php?class_id=<?= $class['id'] ?>&player_id=<?= $playerId ?>" class="btn btn-danger btn-sm" style=" border-radius: 50%;"><i class="bi bi-trash"></i></a></td>
                    </tr>
                    <?php
                }

             ?>
                  
                </tbody>
           </table>
           <?php }?>
           </div>
           </div>
           </div>
           </div>
       </div>

       <div class="col-md-4 justify-content-center">
           <div class="shadow p-3 mb-5 bg-body-tertiary rounded">
           <div class="card-borderless text-center">
                        <div class="card-body">
                            <h4 class="card-title  border-bottom text-warning"> <i class="bi bi-receipt-cutoff"></i> اضافة وصل</h4>
                            <form action="players-code.php" method="POST">
                                <input type="hidden" name="player_id" value="<?= $player['data']['id']?>">
                                <div class="contaner py-2">
                                <?php alertMessage() ?>
                                <div class="form-floating mt-3 mb-2">
                            <input type="text" name="pin" class="form-control"  placeholder="" required>
                            <label >#رثم الوصل الورقي</label>
                        </div>
                                <div class="form-floating mb-3 ">
                            <textarea name="description" class="form-control" rows="3"  placeholder="discruption" required></textarea>
                            <label >الوصف</label>
                             </div>
                             <label >المبلغ</label>
                    <div class="input-group mb-3">
              
                        <span class="input-group-text">$</span>
                        <input type="number "  name="amount" class="form-control" aria-label="Amount (to the nearest dollar)" required>
                        <span class="input-group-text">.00</span>
                     </div> 
                            <div class="form-floating  mb-2">
                            <input type="date" name="started_at" class="form-control"  placeholder="name" value="<?= $player['data']['suspended_at'] ?>" required>
                            <label >من تاريخ :</label>
                             </div>
                             <div class="form-floating ">
                            <input type="date" name="suspended_at" class="form-control"  placeholder="name" required>
                            <label >الى  تاريخ :</label>
                             </div>

                             <label class="text-primary mt-2" >موقع من:</label>
                        <select name="admin_id" class="form-select" required>
                       
                            <?php 
                                  $admins = getAll('admins');
                                  if($admins){
                                    if(mysqli_num_rows($admins)>0){
                                        foreach($admins as $admin){
                                            echo '<option value="'.$admin['id'].'">'.$admin['name'].'</option>';
                                        }
                                    }else{
                                      echo  '<option >No classes founded !!</option>';
                                    }
                                  }else{
                                      echo '<option value="">somthing went wrong !!</option>';
                                  }

                            ?>                            
                        </select>
                    
                        <div class="form-floating mt-3 text-end">
                          <button type="submit" name="createInvoice" class="btn btn-primary" >تاكيد</button>
                        </div>
          
                             </div>
                            </form>
                        </div>
                    </div>
           </div>
     </div>
    </div>
</div>



    <?php endif; ?>
<?php include 'includes/footer.php' ?>
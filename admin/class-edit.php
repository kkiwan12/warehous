<?php 
include 'includes/header.php';

?>
<?php if($_SESSION['lang'] == 'en'): ?>
<div class="container-fluid px-4  py-4">
<div class="shadow p-3 mb-4 bg-body-tertiary rounded-4 ">

    <div class="card-borderless text-center">
        <div class="card-title text-dark mb-4">
            <h4 class="mb-0"><i class="bi bi-calendar-range"></i> Edit class
            <a href="class.php" class="btn btn-outline-danger rounded-5 float-start"><i class="bi bi-arrow-left"></i></a>
            </h4>
        </div>
        <div class="card-text">
            <?php alertMessage() ?>
            <form action="class-code.php" method="POST">

            <?php 
              if(isset($_GET['id'])){
                  if($_GET['id'] != ' '){

                    $classId = $_GET['id'];
                   

                   } else{
                    echo '<h5> No Id found</h5>';
                    return false;
                   }
              } else {
                echo '<h5> No Id given</h5>';
                return false;
              }    
              
              $classData = getById('class',$classId);
              if($classData){

                if($classData['status'] == 200){
                    ?>
                    <input type="hidden" name="classId" value="<?= $classData['data']['id'] ?>">
                     <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="form-floating ">
                            <input type="text" name="name" class="form-control" id="floatingInput" value="<?= $classData['data']['name'] ?>" placeholder="category name" required>
                            <label for="floatingInput">name</label>
                        </div>
                    </div>

                    
                    <div class="col-md-6 mb-3">
                        <div class="form-floating ">
                            <input type="time" name="time" class="form-control"  placeholder="class time"  value="<?= $classData['data']['time'] ?>"required>
                            <label >class time</label>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-floating ">
                            <input type="time" name="end_at" class="form-control"  placeholder="class time"  value="<?= $classData['data']['end_at'] ?>"required>
                            <label >end at</label>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-floating ">
                            <input type="text" name="days" class="form-control"  placeholder="days" value="<?= $classData['data']['days'] ?>" required>
                            <label >class days </label>
                        </div>
                    </div>



              
                    <div class="col-md-6  mt-3 text-start">
                    <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" name="status" value="1" 
                        <?= $classData['data']['status'] == true ? 'checked' : ''; ?>  >
                    <label class="form-check-label" name="status" for="flexSwitchCheckChecked">Make it unvisable</label>
                    </div>
                    </div>
                 
                     <div class="col-md-12 mt-3 text-end">
                        <div class="form-floating ">
                          <button type="submit" name="updateClass" class="btn btn-warning w-100 rounded-4" >Update</button>
                        </div>
                    </div>

                    

                </div>
            </form>





                    <?php

                }else{
                    echo '<h5?>'.$classData['message'].'</h5>';
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
            <h4 class="mb-0"><i class="bi bi-calendar-range"></i> تعديل الحصه
            <a href="class.php" class="btn btn-outline-danger rounded-5 float-start"><i class="bi bi-arrow-left"></i></a>
            </h4>
        </div>
        <div class="card-text">
            <?php alertMessage() ?>
            <form action="class-code.php" method="POST">

            <?php 
              if(isset($_GET['id'])){
                  if($_GET['id'] != ' '){

                    $classId = $_GET['id'];
                   

                   } else{
                    echo '<h5> No Id found</h5>';
                    return false;
                   }
              } else {
                echo '<h5> No Id given</h5>';
                return false;
              }    
              
              $classData = getById('class',$classId);
              if($classData){

                if($classData['status'] == 200){
                    ?>
                    <input type="hidden" name="classId" value="<?= $classData['data']['id'] ?>">
                     <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="form-floating ">
                            <input type="text" name="name" class="form-control" id="floatingInput" value="<?= $classData['data']['name'] ?>" placeholder="category name" required>
                            <label for="floatingInput">اسم الحصه</label>
                        </div>
                    </div>

                    
                    <div class="col-md-6 mb-3">
                        <div class="form-floating ">
                            <input type="time" name="time" class="form-control"  placeholder="class time"  value="<?= $classData['data']['time'] ?>"required>
                            <label >تبدأ على الساعه</label>
                        </div>
                    </div>
                        
                    <div class="col-md-6 mb-3">
                        <div class="form-floating ">
                            <input type="time" name="end_at" class="form-control"  placeholder="class time"  value="<?= $classData['data']['end_at'] ?>"required>
                            <label >تنتهي على الساعه</label>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-floating ">
                            <input type="text" name="days" class="form-control"  placeholder="days" value="<?= $classData['data']['days'] ?>" required>
                            <label >ايام الحصه </label>
                        </div>
                    </div>



              
                    <div class="col-md-6  mt-3 text-start">
                    <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" name="status" value="1" 
                        <?= $classData['data']['status'] == true ? 'checked' : ''; ?>  >
                    <label class="form-check-label" name="status" for="flexSwitchCheckChecked">جعلها غير مرئيه</label>
                    </div>
                    </div>
                 
                     <div class="col-md-12 mt-3 text-end">
                        <div class="form-floating ">
                          <button type="submit" name="updateClass" class="btn btn-warning w-100 rounded-4" >تحديث</button>
                        </div>
                    </div>

                    

                </div>
            </form>





                    <?php

                }else{
                    echo '<h5?>'.$classData['message'].'</h5>';
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
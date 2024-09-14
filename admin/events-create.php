<?php 
include 'includes/header.php';
?>
<?php if($_SESSION['lang'] == 'en'): ?>
<div class="container-fluid px-4 py-4">
<div class="shadow p-3 mb-4 bg-body-tertiary rounded-4 ">


    <div class="card-borderless text-center">
        <div class="card-title text-dark mb-4">
            <h4 class="mb-0"><i class="bi bi-card-text"></i> Add Event
            <a href="events.php" class="btn btn-outline-danger rounded-5 float-start"><i class="bi bi-arrow-left"></i></a>
            </h4>
        </div>
        <div class="card-body">
            <?php alertMessage() ?>
            <form action="events-code.php" method="POST">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="form-floating ">
                            <input type="text" name="name" class="form-control"  placeholder="name" required>
                            <label >event name</label>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-floating ">
                            <input type="text" name="info" class="form-control"  placeholder="name" required>
                            <label >event info </label>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                    <label >Fees</label>
                    <div class="input-group mb-3">
              
                        <span class="input-group-text">$</span>
                        <input type="text"  name="fees" class="form-control" aria-label="Amount (to the nearest dollar)">
                        <span class="input-group-text">.00</span>
                     </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="form-floating ">
                            <input type="time" name="time" class="form-control"  placeholder="name" required>
                            <label >event time</label>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="form-floating ">
                            <input type="date" name="date" class="form-control"  placeholder="name" required>
                            <label >event date</label>
                        </div>
                    </div>
                  



       
                 
                     <div class="col-md-12 mt-3 text-end">
                        <div class="form-floating ">
                          <button type="submit" name="saveEvent" class="btn btn-warning w-100 rounded-4" >Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
</div>
<?php else: ?>









    <div class="container-fluid px-4 py-4">
<div class="shadow p-3 mb-4 bg-body-tertiary rounded-4 ">


    <div class="card-borderless text-center">
        <div class="card-title text-dark mb-4">
            <h4 class="mb-0"><i class="bi bi-card-text"></i> اضافة نشاط
            <a href="events.php" class="btn btn-outline-danger rounded-5 float-start"><i class="bi bi-arrow-left"></i></a>
            </h4>
        </div>
        <div class="card-body">
            <?php alertMessage() ?>
            <form action="events-code.php" method="POST">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="form-floating ">
                            <input type="text" name="name" class="form-control"  placeholder="name" required>
                            <label >اسم النشاط</label>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-floating ">
                            <input type="text" name="info" class="form-control"  placeholder="name" required>
                            <label >معلومات النشاط </label>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                    <label >الرسوم</label>
                    <div class="input-group mb-3">
              
                        <span class="input-group-text">$</span>
                        <input type="text"  name="fees" class="form-control" aria-label="Amount (to the nearest dollar)">
                        <span class="input-group-text">.00</span>
                     </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="form-floating ">
                            <input type="time" name="time" class="form-control"  placeholder="name" required>
                            <label >وقت النشاط</label>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="form-floating ">
                            <input type="date" name="date" class="form-control"  placeholder="name" required>
                            <label >تاريخ النشاط</label>
                        </div>
                    </div>
                  



       
                 
                     <div class="col-md-12 mt-3 text-end">
                        <div class="form-floating ">
                          <button type="submit" name="saveEvent" class="btn btn-warning w-100 rounded-4" >حفظ</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
</div>
    <?php endif; ?>
<?php include 'includes/footer.php'?>
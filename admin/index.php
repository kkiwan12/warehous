<?php
include 'includes/header.php';
//plysersChart();

if (isset($_SESSION['status'])) {
    unset($_SESSION['status']);
}
?>
<?php if($_SESSION['lang'] == 'en'):?>
<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">The most important vital information</li>
    </ol>
    <div class="row">
        <div class="col-xl-6">
            <div class="container mt-5">
                <div class="shadow p-3  bg-body-tertiary rounded-4">
                    <div class="card-borderless text-center">
                        <div class="card-body">
                            <h4 class="card-title  border-bottom mb-3">New plyers chart</h4>
                            <div class="card-text">
                                <canvas id="playerCountChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 text-center">
            <div class="container mt-5">
                <div class="shadow p-3 mb-4 bg-body-tertiary rounded-4">
                    <div class="card-borderless text-center">
                        <div class="card-body">
                            <h4 class="card-title  border-bottom mb-3">center counts</h4>
                            <div class="card-text">
                            <div class=" col-md-12">
                                    <div class="card bg-success bg-gradient text-white mb-4 rounded-pill border border-0  text-center ">
                                        <?php $playersCount = countRecords('players') ?>
                                        <div class="card-body"><h5>total plyers : <?= $playersCount; ?> </h5></div>
                                    </div>
                                        <div class="card-borderless text-center">
                                      
                                        <div class="card-header ">
                                        <h4 class="text-success">
                                        <i class="bi bi-cash-coin"></i>
                                            The monthley incomes
                                            </h4>

                                        </div>
                                        <div class="card-body">
                                        <?php
                                                    $incomes = getAll('income');
                                                    if (mysqli_num_rows($incomes) > 0) { ?>
                                            <table  class="table    ">
                                                <thead>
                                                    <tr>

                                                        <th>month</th>
                                                        <th>total income</th>
                                                        <th>updated at</th>
                                                      
                                                    
                                                    </tr>
                                                </thead>
                                                <tbody>
                                             
                                                        <?php foreach ($incomes as $income) : ?>
                                                            <tr>
                                                        
                                                                <td><?= $income['month'] ?></td>
                                                                <td><?= $income['total_income'] ?> $</td>
                                                                <td><?= $income['updated_at'] ?></td>
                                                              


                                                            </tr>
                                                        <?php endforeach; ?>

                                                </tbody>
                                            </table>
                                        </div>
                                        <?php } else { ?>
                                        
                                            <p>No Records found</p>

                                 
                                        <?php } ?>
                                        </div>

                                    </div>
                              
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="container mt-5  ">
                <div class="shadow p-3 mb-4 bg-body-tertiary rounded-4  " >
                    <div class="card-borderless text-center ">
                        <div class="card-body ">
                            <h4 class="card-title  border-bottom mb-3">gender chart </h4>
                            <div class="card-text " >
                                <canvas id="genderPieChart" ></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="container mt-5  ">
                <div class="shadow p-3 mb-4 bg-body-tertiary rounded-4  " >
                    <div class="card-borderless text-center ">
                        <div class="card-body ">
                            <h4 class="card-title  border-bottom mb-3">bus chart </h4>
                            <div class="card-text " >
                                <canvas id="busPieChart" ></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
     
        </div>

        <div class="container-fluid px-4 mt-4   ">
        <div class="shadow p-3 mb-4 bg-body-tertiary rounded-4  " >
           <div class="card-borderless text-center">

        <div class="card-header ">
            <?php alertMessage() ?><h4 class="text-danger">
            <i class="fas fa-table me-1"></i>
            The Events
            </h4>

        </div>
        <div class="card-body">
        <?php
                    $events = getAll('events');
                    if (mysqli_num_rows($events) > 0) { ?>
            <table  class="table table-striped table-hover">
                <thead>
                    <tr>

                        <th>Name</th>
                        <th>info</th>
                        <th>fees</th>
                        <th>time</th>
                        <th>date</th>
                       
                    </tr>
                </thead>
                <tbody>
           
                        <?php foreach ($events as $event) : ?>
                            <tr>
                          
                                <td><?= $event['name'] ?></td>
                                <td><?= $event['info'] ?></td>
                                <td><?= $event['fees'] ?></td>
                                <td><?= $event['time'] ?></td>
                                <td><?= $event['date'] ?></td>



                            </tr>
                        <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    <?php } else { ?>
      
            <p >No Records found</p>

    <?php } ?>
    </div>
        </div>
</div>

<div class="container-fluid px-4 mt-4   ">
<div class="shadow p-3 mb-4 bg-body-tertiary rounded-4  "  >
    <div class="card-borderless text-center">

        <div class="card-title text-warning mb-3 ">
            <?php alertMessage() ?><h4>
            <i class="fas fa-table me-1"></i>
            The Orders Manager  
            </h4>
           
        </div>

        <div class="card-body">
        <?php
            
            $orders = getAll('orders');
            if (mysqli_num_rows($orders) > 0) { ?>
        <table id="datatablesSimple"   class="display compact" style="width:100%" >
                <thead>
                    <tr>
                        <th>id</th>
                        <th>warehouse </th>
                        <th>Customer </th>
                        <th>Payment type</th>
                        <th>Total amount</th>
                    
                        <th>Status</th>
                        <th>Created at</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>id</th>
                        <th>warehouse </th>
                        <th>Customer </th>
                        <th>Payment type</th>
                        <th>Total amount</th>
                     
                        <th>Status</th>
                        <th>Created at</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                

                        <?php foreach ($orders as $order) {
                            
                            $warehouse = getById('warehouses',$order['warehouse_id']);
                            $customer = getById('customers',$order['customer_id']);

                            ?>
                            <tr>
                                <td><?= $order['id'] ?></td>
                              
                                <td><?= $warehouse['data']['name'] ?></td>
                                <td><?= $customer['data']['name'] ?></td>
                                <td><?= $order['payment_type'] ?></td>
                                <td><?= $order['total_amount'] ?> $$</td>
                              
                                <td><?php
                                    if ($order['status'] == 1) {
                                        echo '<span class="badge  bg-success">Delivered</span>';
                                    } else {
                                        echo '<span class="badge bg-danger">Hold</span>';
                                    }
                                    ?></td>
                                <td><?= $order['created_at'] ?></td>
                                <td>
                                   
                                    <a href="orders-delete.php?id=<?= $order['id']; ?>" class="btn btn-danger btn-sm rounded-5"><i class="bi bi-trash"></i></a>
                                    <a href="orders-edit.php?id=<?= $order['id']; ?>" class="btn btn-primary btn-sm rounded-5">delivery <i class="bi bi-truck"></i></a>

                                </td>

                            </tr>
                        <?php } ?>

                </tbody>
            </table>
        </div>
    <?php } else { ?>
        <p>No orders</p>
    <?php } ?>
    </div>
</div>
</div>


</div>




<?php else :?>




    <div class="container-fluid px-4 text-end">
    <h1 class="mt-4">مركز التحكم</h1>
    <ol class="breadcrumb mb-4 text-end">
        <li class="breadcrumb-item active ">اهم المعلومات الحيويه</li>
    </ol>
    <div class="row">
        <div class="col-xl-6">
            <div class="container mt-5">
                <div class="shadow p-3  bg-body-tertiary rounded-4">
                    <div class="card-borderless text-center">
                        <div class="card-body">
                            <h4 class="card-title  border-bottom mb-3">نسب المشتركين الجدد</h4>
                            <div class="card-text">
                                <canvas id="playerCountChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 text-center">
            <div class="container mt-5">
                <div class="shadow p-3 mb-4 bg-body-tertiary rounded-4">
                    <div class="card-borderless text-center">
                        <div class="card-body">
                            <h4 class="card-title  border-bottom mb-3">حسابات المركز</h4>
                            <div class="card-text">
                            <div class=" col-md-12">
                                    <div class="card bg-success bg-gradient text-white mb-4 rounded-pill border border-0  text-center ">
                                        <?php $playersCount = countRecords('players') ?>
                                        <div class="card-body"><h5>مجموع الطلاب : <?= $playersCount; ?> </h5></div>
                                    </div>
                                        <div class="card-borderless text-center">
                                      
                                        <div class="card-header ">
                                        <h4 class="text-success">
                                        <i class="bi bi-cash-coin"></i>
                                           الدخل الشهري 
                                            </h4>

                                        </div>
                                        <div class="card-body">
                                        <?php
                                                    $incomes = getAll('income');
                                                    if (mysqli_num_rows($incomes) > 0) { ?>
                                            <table  class="table    ">
                                                <thead>
                                                    <tr>

                                                        <th>الشهر</th>
                                                        <th>مجموع الدخل</th>
                                                        <th>اخر تحديث</th>
                                                      
                                                    
                                                    </tr>
                                                </thead>
                                                <tbody>
                                             
                                                        <?php foreach ($incomes as $income) : ?>
                                                            <tr>
                                                        
                                                                <td><?= $income['month'] ?></td>
                                                                <td><?= $income['total_income'] ?> $</td>
                                                                <td><?= $income['updated_at'] ?></td>
                                                              


                                                            </tr>
                                                        <?php endforeach; ?>

                                                </tbody>
                                            </table>
                                        </div>
                                        <?php } else { ?>
                                        
                                            <p>لايوجد بيانات</p>

                                 
                                        <?php } ?>
                                        </div>

                                    </div>
                              
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="container mt-5  ">
                <div class="shadow p-3 mb-4 bg-body-tertiary rounded-4  " >
                    <div class="card-borderless text-center ">
                        <div class="card-body ">
                            <h4 class="card-title  border-bottom mb-3">نسب الذكور الى الاناث</h4>
                            <div class="card-text " >
                                <canvas id="genderPieChart" ></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="container mt-5  ">
                <div class="shadow p-3 mb-4 bg-body-tertiary rounded-4  " >
                    <div class="card-borderless text-center ">
                        <div class="card-body ">
                            <h4 class="card-title  border-bottom mb-3">نسب مشتركين الباص</h4>
                            <div class="card-text " >
                                <canvas id="busPieChart" ></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
     
        </div>

        <div class="container-fluid px-4 mt-4   ">
        <div class="shadow p-3 mb-4 bg-body-tertiary rounded-4  " >
           <div class="card-borderless text-center">

        <div class="card-header ">
            <?php alertMessage() ?><h4 class="text-danger">
            <i class="fas fa-table me-1"></i>
           الانشطه
            </h4>

        </div>
        <div class="card-body">
        <?php
                    $events = getAll('events');
                    if (mysqli_num_rows($events) > 0) { ?>
            <table  class="table table-striped table-hover">
                <thead>
                    <tr>

                        <th>اسم النشاط</th>
                        <th>معلومات النشاط</th>
                        <th>الرسوم</th>
                        <th>الساعه</th>
                        <th>التاريخ</th>
                       
                    </tr>
                </thead>
                <tbody>
           
                        <?php foreach ($events as $event) : ?>
                            <tr>
                          
                                <td><?= $event['name'] ?></td>
                                <td><?= $event['info'] ?></td>
                                <td><?= $event['fees'] ?></td>
                                <td><?= $event['time'] ?></td>
                                <td><?= $event['date'] ?></td>



                            </tr>
                        <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    <?php } else { ?>
      
            <p >لايوجد بيانات</p>

    <?php } ?>
    </div>
        </div>
</div>

<div class="container-fluid px-4 mt-4   ">
<div class="shadow p-3 mb-4 bg-body-tertiary rounded-4  "  >
    <div class="card-borderless text-center">

        <div class="card-title text-warning mb-3 ">
            <?php alertMessage() ?><h4>
            <i class="fas fa-table me-1"></i>
            ادارة الطلبات 
            </h4>
           
        </div>

        <div class="card-body">
        <?php
            
            $orders = getAll('orders');
            if (mysqli_num_rows($orders) > 0) { ?>
        <table id="datatablesSimple"   class="display compact" style="width:100%" >
                <thead>
                    <tr>
                        <th>id</th>
                        <th>المخزن </th>
                        <th>العميل </th>
                        <th>طريقة الدفع</th>
                        <th>المجموع</th>
                    
                        <th>الحاله</th>
                        <th>تاريخ الطلب</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>id</th>
                        <th>warehouse </th>
                        <th>Customer </th>
                        <th>Payment type</th>
                        <th>Total amount</th>
                     
                        <th>Status</th>
                        <th>Created at</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                

                        <?php foreach ($orders as $order) {
                            
                            $warehouse = getById('warehouses',$order['warehouse_id']);
                            $customer = getById('customers',$order['customer_id']);

                            ?>
                            <tr>
                                <td><?= $order['id'] ?></td>
                              
                                <td><?= $warehouse['data']['name'] ?></td>
                                <td><?= $customer['data']['name'] ?></td>
                                <td><?= $order['payment_type'] ?></td>
                                <td><?= $order['total_amount'] ?> $$</td>
                              
                                <td><?php
                                    if ($order['status'] == 1) {
                                        echo '<span class="badge  bg-success">تم التسليم</span>';
                                    } else {
                                        echo '<span class="badge bg-danger">معلق</span>';
                                    }
                                    ?></td>
                                <td><?= $order['created_at'] ?></td>
                                <td>
                                   
                                    <a href="orders-delete.php?id=<?= $order['id']; ?>" class="btn btn-danger btn-sm rounded-5"><i class="bi bi-trash"></i></a>
                                    <a href="orders-edit.php?id=<?= $order['id']; ?>" class="btn btn-primary btn-sm rounded-5">تسليم <i class="bi bi-truck"></i></a>

                                </td>

                            </tr>
                        <?php } ?>

                </tbody>
            </table>
        </div>
    <?php } else { ?>
        <p>No orders</p>
    <?php } ?>
    </div>
</div>
</div>


</div>


<?php endif; ?>    
<?php include 'includes/footer.php'; ?>
<script>
document.addEventListener('DOMContentLoaded', function () {
    // Line chart for player counts
    const playerCountCtx = document.getElementById('playerCountChart').getContext('2d');
    const genderPieCtx = document.getElementById('genderPieChart').getContext('2d');
    const busPieCtx = document.getElementById('busPieChart').getContext('2d');
    // Fetch player count data
    fetch('player_chart_data.php?type=players')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok ' + response.statusText);
            }
            return response.json();
        })
        .then(data => {
            if (!Array.isArray(data)) {
                throw new Error('Data is not in expected format');
            }

            // Prepare data for player count Chart.js
            const playerLabels = data.map(item => item.month);
            const playerCounts = data.map(item => item.count);

            // Create the player count chart
            const playerCountChart = new Chart(playerCountCtx, {
                type: 'bar',
                data: {
                    labels: playerLabels,
                    datasets: [{
                        label: 'Player Count',
                        data: playerCounts,
                        borderColor: 'rgba(75, 192, 192, 1)',
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderWidth: 1,
                        fill: true
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        x: {
                            beginAtZero: true
                        },
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        })
        .catch(error => console.error('Error fetching player count data:', error));

    // Fetch gender ratio data
    fetch('player_chart_data.php?type=gender')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok ' + response.statusText);
            }
            return response.json();
        })
        .then(data => {
            if (!Array.isArray(data)) {
                throw new Error('Data is not in expected format');
            }

            // Prepare data for gender ratio Chart.js
            const genderLabels = data.map(item => item.gender == 0 ? 'Male' : 'Female');
            const genderCounts = data.map(item => item.count);

            // Create the gender pie chart
            const genderPieChart = new Chart(genderPieCtx, {
                type: 'pie',
                data: {
                    labels: genderLabels,
                    datasets: [{
                        data: genderCounts,
                        backgroundColor: ['rgba(54, 162, 235, 0.2)', 'rgba(255, 99, 132, 0.2)'],
                        borderColor: ['rgba(54, 162, 235, 1)', 'rgba(255, 99, 132, 1)'],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                }
            });
        })
        .catch(error => console.error('Error fetching gender ratio data:', error));


        //bus
        fetch('player_chart_data.php?type=bus')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok ' + response.statusText);
            }
            return response.json();
        })
        .then(data => {
            if (!Array.isArray(data)) {
                throw new Error('Data is not in expected format');
            }

            // Prepare data for gender ratio Chart.js
            const busLabels = data.map(item => item.bus == 1 ? 'bus' : 'walking');
            const busCount = data.map(item => item.count);

            // Create the gender pie chart
            const busPieChart = new Chart(busPieCtx, {
                type: 'doughnut',
                data: {
                    labels: busLabels,
                    datasets: [{
                        data: busCount,
                        backgroundColor: [ 'rgba(240, 194, 50, 0.6)','rgba(46, 204, 113, 0.6)'],
                        borderColor: ['rgba(255, 205, 86, 1)', 'rgba(46, 204, 113, 1)'],
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                }
            });
        })
        .catch(error => console.error('Error fetching gender ratio data:', error));
});
</script>


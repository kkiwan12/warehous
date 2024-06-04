<?php
include 'includes/header.php';
//
if(isset($_SESSION['status'])){
    unset($_SESSION['status']); 
}
?>

<div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">admins/staff</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                    <?php $adminsCount = countRecords('admins') ?>
                                        <a class="small text-white stretched-link" href="#"><?= $adminsCount ?></a>
                                   
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body"> categories</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                    <?php $categoriesCount = countRecords('categories') ?>
                                        <a class="small text-white stretched-link" href="#"><?= $categoriesCount ?></a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body"> products</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                    <?php $productsCount = countRecords('categories') ?>
                                        <a class="small text-white stretched-link" href="#"><?= $productsCount ?></a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">warehouse</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                    <?php $warehouseCount = countRecords('warehouses') ?>
                                        <a class="small text-white stretched-link" href="#"><?= $warehouseCount ?></a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area me-1"></i>
                                        Area Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Bar Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                        </div>

                        <!-- the admins table  --> 
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DataTable Example
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>

                                            <th>Created at</th></th>
                                            <th>action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>id</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>

                                            <th>Created at</th></th>
                                            <th>action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                        $admins = getAll('admins') ;
                                        if(mysqli_num_rows($admins) > 0) {?>
                                        <?php foreach($admins as $admin):?>
                                        <tr>
                                            <td><?= $admin['id'] ?></td>
                                            <td><?= $admin['name'] ?></td>
                                            <td><?= $admin['email'] ?></td>
                                            <td><?= $admin['phone'] ?></td>
                                            <td><?= $admin['created_at'] ?></td>
                                            <td>
                                                <a href="admins-edit.php?id=<?=  $admin['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                                                <a href="admins-delete.php?id=<?=  $admin['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                                            </td>
                                       
                                        </tr>
                                        <?php endforeach; ?>
                                  
                                    </tbody>
                                </table>
                            </div>
                            <?php }else{ ?>
                                            <tr>
                                            <td colspan="4">No Records found</td>
                                       
                                        </tr>
                                        <?php } ?>

                        </div>
                    </div>
 <?php include 'includes/footer.php'; ?>
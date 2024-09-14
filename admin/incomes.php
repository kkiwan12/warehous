<?php include "includes/header.php";
$invoicesCount = countRecords('invoices');
?>
<?php if($_SESSION['lang'] == 'en'):?>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6  text-success ">

            <h1><i class="bi bi-cash-stack "></i> monthley incomes

            </h1>

        </div>
    </div>
</div>

<div class="container-fluid px-4 mt-4   ">
    <div class="shadow p-3 mb-4 bg-body-tertiary rounded-4  ">
        <div class="card-borderless text-center">

            <div class="card-header ">
                <?php alertMessage() ?>
                <h4 class="card-title text-primary mb-3 ">
                    <i class="fas fa-table me-1"></i>
                    The Incomes
                </h4>

            </div>
            <div class="card-body">
                <?php
                $incomes = getAll('income');
                if (mysqli_num_rows($incomes) > 0) { ?>
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>month</th>
                                <th>total income</th>
                                <th>products income</th>
                                <th>plyers income</th>
                                <th>updated at</th>

                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>month</th>
                                <th>total income</th>
                                <th>products income</th>
                                <th>plyers income</th>
                                <th>updated at</th>

                            </tr>
                        </tfoot>
                        <tbody>

                            <?php while ($income = mysqli_fetch_assoc($incomes)) : ?>
                                <tr>
                                    <td><?= htmlspecialchars($income['month']) ?></td>
                                    <td><?= htmlspecialchars($income['total_income']) ?> $</td>
                                    <td><?= htmlspecialchars($income['total_profit']) ?> $</td>
                                    <td><?= htmlspecialchars($income['total_fees']) ?> $ </td>
                                    <td><?= htmlspecialchars($income['updated_at']) ?> </td>



                                </tr>
                            <?php endwhile; ?>

                        </tbody>
                    </table>
            </div>
        <?php } else { ?>
            <tr>
                <td colspan="4">No Records found</td>
            </tr>
        <?php } ?>
        </div>
    </div>
</div>







<?php else: ?>







    <div class="container mt-5">
    <div class="row">
        <div class="col-md-6  text-success ">

            <h1><i class="bi bi-cash-stack "></i> الدخل الشهري

            </h1>

        </div>
    </div>
</div>

<div class="container-fluid px-4 mt-4   ">
    <div class="shadow p-3 mb-4 bg-body-tertiary rounded-4  ">
        <div class="card-borderless text-center">

            <div class="card-header ">
                <?php alertMessage() ?>
                <h4 class="card-title text-primary mb-3 ">
                    <i class="fas fa-table me-1"></i>
                    الايرادات
                </h4>

            </div>
            <div class="card-body">
                <?php
                $incomes = getAll('income');
                if (mysqli_num_rows($incomes) > 0) { ?>
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>الشهر</th>
                                <th>مجموع الايرادات</th>
                                <th>دخل المنتجات</th>
                                <th>دخل الاعبين</th>
                                <th>اخر تحديث</th>

                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                            <th>الشهر</th>
                                <th>مجموع الايرادات</th>
                                <th>دخل المنتجات</th>
                                <th>دخل الاعبين</th>
                                <th>اخر تحديث</th>

                            </tr>
                        </tfoot>
                        <tbody>

                            <?php while ($income = mysqli_fetch_assoc($incomes)) : ?>
                                <tr>
                                    <td><?= htmlspecialchars($income['month']) ?></td>
                                    <td><?= htmlspecialchars($income['total_income']) ?> $</td>
                                    <td><?= htmlspecialchars($income['total_profit']) ?> $</td>
                                    <td><?= htmlspecialchars($income['total_fees']) ?> $ </td>
                                    <td><?= htmlspecialchars($income['updated_at']) ?> </td>



                                </tr>
                            <?php endwhile; ?>

                        </tbody>
                    </table>
            </div>
        <?php } else { ?>
            <tr>
                <td colspan="4">لايوجد بيانات</td>
            </tr>
        <?php } ?>
        </div>
    </div>
</div>
 <?php endif; ?>
<?php include "includes/footer.php"; ?>
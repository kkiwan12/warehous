<?php
include 'includes/header.php';
$categoriesCount = countRecords('categories');
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <div class="badge bg-danger "><?= $categoriesCount ?></div>
            <h1><i class="bi bi-tags-fill"></i> Categories
                <a href="category-create.php" class="btn btn-dark btn-sm rounded-5"><i class="bi bi-plus-lg"></i></a>
            </h1>

        </div>
    </div>
</div>

<div class="container-fluid px-4 mt-4   ">
    <div class="card mb-4">

        <div class="card-header ">
            <?php alertMessage() ?>
            <i class="fas fa-table me-1"></i>
            The categories


        </div>
        <div class="card-body">
            <?php
            $categories = getAll('categories');
            if (mysqli_num_rows($categories) > 0) { ?>
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Name</th>
                            <th>description</th>
                            <th>status</th>
                            <th>Created at</th>
                            </th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>id</th>
                            <th>Name</th>
                            <th>description</th>
                            <th>status</th>
                            <th>Created at</th>
                            </th>
                            <th>action</th>
                        </tr>
                    </tfoot>
                    <tbody>

                        <?php foreach ($categories as $category) : ?>
                            <tr>
                                <td><?= $category['id'] ?></td>
                                <td><?= $category['categoryName'] ?></td>
                                <td><?= isset($category['description']) ? $category['description'] : 'n/a' ?></td>
                                <td><?php
                                    if ($category['status'] == 1) {
                                        echo '<span class="badge bg-danger">Hidden</span>';
                                    } else {
                                        echo '<span class="badge bg-success">Visible</span>';
                                    }
                                    ?></td>
                                <td><?= $category['created_at'] ?></td>
                                <td>
                                    <a href="category-edit.php?id=<?= $category['id']; ?>" class="btn btn-primary btn-sm  rounded-5"><i class="bi bi-pencil-square"></i></a>
                                    <a href="category-delete.php?id=<?= $category['id']; ?>" class="btn btn-danger btn-sm  rounded-5"><i class="bi bi-trash"></i></a>
                                </td>

                            </tr>
                        <?php endforeach; ?>

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
<?php include 'includes/footer.php' ?>
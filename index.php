<?php
require_once "init.php";
$titlePage = "Xstore | Home Page";
$queryString=$connection->prepare("select * from products Where status = ?");
$queryString->execute([1]);
$products=$queryString->fetchAll(PDO::FETCH_CLASS,'products');
require_once "include/template/header.php";
?>
<div class="container">
    <div class="row">
        <h2>Products Management System</h2>
        <h5><a href="insert.php">Insert some Products</a></h5>
        <h6><a href="softdelete.php">Show Deleted Products</a></h6>
        <table class="table table-success table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Products Name</th>
                <th scope="col">Products Brand</th>
                <th scope="col">Expird Date</th>
                <th scope="col">Available</th>
                <th scope="col">Manage</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($products as $product):?>
                <tr>
                    <th scope="row"><?= $product->ID;?></th>
                    <td><?= $product->pro_name?></td>
                    <td><?= $product->prod_brand?></td>
                    <td><?= $product->prod_expir_date?></td>
                    <td><?= $prod_availability=($product->prod_availability==1)?"Avaliable":"Not Avaliable";?></td>
                    <td><a href="edit.php?ID=<?= $product->ID;?>"><i class="material-icons" style="color: #069500">edit_note</i></a> |<a href="softdelete.php?do=softdelete&ID=<?= $product->ID;?>"><i class="material-icons" style="color: darkred;">delete_sweep</i></a> </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?
require_once "include/template/footer.php";
?>

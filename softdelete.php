<?php
require_once "init.php";
$titlePage = "Xstore | User Deleted";
$queryString=$connection->prepare("select * from products WHERE status = ?");
$queryString->execute([0]);
$products=$queryString->fetchAll(PDO::FETCH_CLASS,'products');
require_once "include/template/header.php";
?>
<div class="container">
    <div class="row">
        <h2>Deleted User Page</h2>
        <h6><a href="index.php">Show Products</a></h6>
        <table class="table table-success table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Products Name</th>
                <th scope="col">Products Brand</th>
                <th scope="col">Expird Date</th>
                <th scope="col">Available</th>
                <th scope="col">Restore</th>
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
                    <td><a href="softdelete.php?do=restore&ID=<?= $product->ID;?>"><i class="material-icons" style="color: #4f8b00;">delete_sweep</i></a> </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?
if (!empty($_GET)) {
  if (isset($_GET['do'])) {
    $do = $_GET['do'];
  }else {
    echo "there is no Action";
  }
  if ($do == "softdelete") {

    $queryString=$connection->prepare("UPDATE products SET status=? WHERE ID=?");
    $ID=$_GET["ID"];
    $status=0;
    $queryString->execute([$status,$ID]);
    $themsg = "Item Deleted";
    redirectHome($themsg,0);
  }elseif($do == "restore") {

    $queryString=$connection->prepare("UPDATE products SET status=? WHERE ID=?");
    $ID=$_GET["ID"];
    $status=1;
    $queryString->execute([$status,$ID]);
    $themsg = "Item restored";
    redirectHome($themsg,1);
  }else {
    echo "somethingworng";
    echo $do;
  }
}
require_once "include/template/footer.php";
?>

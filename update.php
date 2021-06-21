<?php
require_once "init.php";
$titlePage = "Xstore | Update Page";
$queryString=$connection->prepare("select * from products WHERE ID=?");
$ID = $_GET["ID"];
$queryString->execute([$ID]);
$products=$queryString->fetchAll(PDO::FETCH_CLASS,'products');
if(isset($_POST["update"])&& !empty($_POST)){
    $queryString=$connection->prepare("UPDATE products SET pro_name=?, prod_brand=? ,prod_expir_date=? ,prod_availability=? WHERE ID=?");
    $prod_name   =$_POST["prodname"];
    $brand_name  =$_POST["brandname"];
    $expire_date =$_POST["expire_date"];
    $available   =$_POST["available"];
    $queryString->execute([$prod_name,$brand_name,$expire_date,$available,$ID]);
    echo "Product Data Updated";
    header("Refresh: 2;URL=index.php");
}
require_once "include/template/footer.php";

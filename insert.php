<?php
require_once "init.php";
$titlePage = "Xstore | Insert Page";
require_once "include/template/header.php";
?>

<form class="row g-3 needs-validation" enctype="multipart/form-data" action="<?echo $_SERVER['PHP_SELF']; ?>" method="post" novalidate>
    <a href="index.php">Click to show the products</a>
    <div class="col-md-4">
        <label for="validationCustom01" class="form-label">Name of Product</label>
        <input type="text" name="prodname" class="form-control" id="validationCustom01"  required>
    </div>

    <div class="col-md-4">
        <label for="validationCustom01" class="form-label">Product Brand</label>
        <input type="text" name="brandname" class="form-control" id="validationCustom01" required>
    </div>

    <div class="col-md-6">
        <label for="validationCustom03" class="form-label">Expire date</label>
        <input type="date"  name="expire_date" class="form-control" id="validationCustom03" required>
    </div>

    <div class="col-md-3">
        <label for="validationCustom04" class="form-label">Avaliability</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="available" id="flexRadioDefault1" value="1" checked>
            <label class="form-check-label" for="flexRadioDefault1">
                Available
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="available" id="flexRadioDefault2" value="0" >
            <label class="form-check-label" for="flexRadioDefault2">
                Not Avaliable
            </label>
        </div>
    </div>
    <div class="col-12">
        <button class="btn btn-primary" name="insert" type="submit">Insert product</button>
    </div>
</form>

<?php
if(isset($_POST["insert"])&& !empty($_POST)){
    $queryString=$connection->prepare("INSERT INTO products (pro_name,prod_brand,prod_expir_date,prod_availability)VALUES(?,?,?,?)");
    $prod_name   =$_POST["prodname"];
    $brand_name  =$_POST["brandname"];
    $expire_date =$_POST["expire_date"];
    $available   =$_POST["available"];
    $queryString->execute([$prod_name,$brand_name,$expire_date,$available]);

}
  require_once "include/template/footer.php";
?>

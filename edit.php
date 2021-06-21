<?php
require_once "init.php";
$titlePage = "Xstore | Edit Page";
require_once "include/template/header.php";
$queryString=$connection->prepare("select * from products WHERE ID=?");
$ID = $_GET["ID"];
$queryString->execute([$ID]);
$products=$queryString->fetchAll(PDO::FETCH_CLASS,'products');
foreach ($products as $product):
?>
<form class="row g-3 needs-validation" enctype="multipart/form-data" action="update.php?ID=<?echo $ID;?>" method="post" novalidate>
    <a href="index.php">Click to show the products</a>
    <div class="col-md-4">
        <label for="validationCustom01" class="form-label">Name of Product</label>
        <input type="text" name="prodname" class="form-control" id="validationCustom01" value="<?=$product->pro_name;?>"  required>
    </div>

    <div class="col-md-4">
        <label for="validationCustom01" class="form-label">Product Brand</label>
        <input type="text" name="brandname" class="form-control" id="validationCustom01"  value="<?=$product->prod_brand;?>"required>
    </div>

    <div class="col-md-6">
        <label for="validationCustom03" class="form-label">Expire date</label>
        <input type="date"  name="expire_date" class="form-control" id="validationCustom03"  value="<?=$product->prod_expir_date;?>"required>
    </div>

    <div class="col-md-3">
        <label for="validationCustom04" class="form-label">Avaliability</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="available" id="flexRadioDefault1" value="1" <?=($product->prod_availability ==1)?"checked":""?> >
            <label class="form-check-label" for="flexRadioDefault1">
                Available
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="available" id="flexRadioDefault2" value="0" <?=($product->prod_availability ==0)?"checked":""?> >
            <label class="form-check-label" for="flexRadioDefault2">
                Not Avaliable
            </label>
        </div>
    </div>
    <div class="col-12">
        <button class="btn btn-primary" name="update" type="submit">Update product</button>
    </div>
</form>
<?endforeach;?>

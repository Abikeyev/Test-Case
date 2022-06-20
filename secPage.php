<?php
try{
    $conn = new PDO("mysql:host=localhost;dbname=newdb", 'root', '' );

    $query = "INSERT INTO product VALUES (;sku, NULL, NULL)";
    $prod = $conn->prepare($query);
    $prod->execute(['sku' => $_POST['sku']]);

    $query = "INSERT INTO product VALUES (NULL, ;name, NULL)";
    $prod = $conn->prepare($query);
    $prod->execute(['name' => $_POST['name']]);

    $query = "INSERT INTO product VALUES (NULL, NULL, ;price)";
    $prod = $conn->prepare($query);
    $prod->execute(['price' => $_POST['price']]);
}
catch(PDOException $e){
    echo "error" .$e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <style>
        .btn {
            display: inline-block;
            background: #8C959D;
            color: #fff;
            text-decoration: none;
            padding: 0.5rem 0.5rem;
            border-radius: 3px;
        }
    </style>
</head>
<body>
<a href="firstPage.php" class="btn">Product List</a>
<h3>Product Add</h3>
<hr size="4" color="#0000dd"><br>

<form action="secPage.php" method="POST">
    SKU<input type="text" name="sku" style="display: block"><br>
    Name<input type="text" name="name" style="display: block"><br>
    Price<input type="text" name="price" style="display: block"><br>
    <input type="submit" value="Отправить">
</form>
<br>

<select name="type">
    <option value="0">Select type</option>
    <option value="1">IT</option>
    <option value="2">WaP</option>
    <option value="3">furniture</option>
</select>
<br><br>

</body>
</html>
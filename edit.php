<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <div class="row">
            <?
            if (!isset($_POST["name"])) {
                $id = $_GET["id"];
                $link = mysqli_connect("localhost", "root", "", "shopdb", 3306);
                $queryText = "SELECT * FROM products WHERE id='$id'";
                $res = $link->query($queryText);
                $row = mysqli_fetch_assoc($res);
                $name = $row['name'];
                $price = $row['price'];
                $manufacturerId = $row['manufacturer_id'];
            ?>
                <div class="col">
                    <form method="post">
                        <div class="mb-3">
                            <label for="producttitle" class="form-label">Product name:</label>
                            <input type="text" class="form-control" id="productname" name="name" value="<?php echo $name ?>">
                        </div>
                        <div class="mb-3">
                            <label for="producttitle" class="form-label">Product price:</label>
                            <input type="text" class="form-control" id="productname" name="price" value="<?php echo $price ?>">
                        </div>
                        <select name="manufacturer" required>
                            <?
                            $manufacturerSql = 'SELECT * FROM manufacturers';
                            $link = mysqli_connect("localhost", "root", "", "shopdb", 3306);
                            $ins = mysqli_query($link, $manufacturerSql);

                            while ($manufacturerRow = mysqli_fetch_assoc($ins)) {
                                $selected = ($manufacturerId == $manufacturerRow['id']) ? 'selected' : '';
                                echo '<option value="' . $manufacturerRow['id'] . '" ' . $selected . '>' . $manufacturerRow['name'] . '</option>';
                            }

                            ?>
                        </select>
                        <button type="submit" class="btn btn-success">Edit Product</button>
                    </form>
                </div>
            <?
            } else {
                $id = $_GET["id"];
                $link = mysqli_connect("localhost", "root", "", "shopdb", 3306);
                $name = $_POST['name'];
                $price = $_POST['price'];
                $manufacturerId = $_POST['manufacturer'];
                $sql = "UPDATE products SET name='$name', price='$price', manufacturer_id='$manufacturerId' WHERE id='$id'";
                $ins = mysqli_query($link, $sql);

                if ($ins)
                    echo "<div class='alert alert-success' role='alert'>Product successfully inserted!</div>";
                else
                    echo "<div class='alert alert-warning' role='alert'>Error!</div>";
            }
            ?>

        </div>
        <a class="btn btn-primary" href="index.php">List</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>
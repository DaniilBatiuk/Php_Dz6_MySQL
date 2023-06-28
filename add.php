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
            ?>
                <div class="col">
                    <form method="post">
                        <div class="mb-3">
                            <label for="producttitle" class="form-label">Product name:</label>
                            <input type="text" class="form-control" id="productname" name="name" placeholder="Введіть name">
                        </div>
                        <div class="mb-3">
                            <label for="producttitle" class="form-label">Product price:</label>
                            <input type="text" class="form-control" id="productprice" name="price" placeholder="Введіть price">
                        </div>
                        <select name="manufacturer" required>
                            <?
                            $manufacturerSql = 'SELECT * FROM manufacturers';
                            $link = mysqli_connect("localhost", "root", "", "shopdb", 3306);
                            $ins = mysqli_query($link, $manufacturerSql);

                            while ($manufacturerRow = mysqli_fetch_assoc($ins)) {
                                echo '<option value="' . $manufacturerRow['id'] . '">' . $manufacturerRow['name'] . '</option>';
                            }

                            ?>
                        </select>
                        <button type="submit" class="btn btn-success">Add Product</button>
                        <a class="btn btn-primary" href="index.php">List</a>
                    </form>
                </div>
            <?
            } else {
                $link = mysqli_connect("localhost", "root", "", "shopdb", 3306);
                $productTitle = $_POST["name"];
                $producPrice = $_POST["price"];
                $producManufacturer = $_POST["manufacturer"];

                $queryText = "INSERT INTO products (name, price, manufacturer_id) VALUES ('$productTitle', '$producPrice', $producManufacturer)";
                $ins = mysqli_query($link, $queryText);
                if ($ins)
                    echo "<div class='alert alert-success' role='alert'>Product successfully inserted!</div>";
                else
                    echo "<div class='alert alert-warning' role='alert'>Error!</div>";

                echo "<a class='btn btn-primary' href='index.php'>List</a>";
                
            }

            
            ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>
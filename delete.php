<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <? {
                $id = $_GET["id"];

                $link = mysqli_connect("localhost", "root", "", "shopdb", 3306);
                $queryText = "DELETE FROM products WHERE id='$id'";
                $ins = mysqli_query($link, $queryText);
                if (!$ins) {
                    die('Ошибка подключения к базе данных: ' . mysqli_connect_error());
                } else {
                    echo "<div class='alert alert-success' role='alert'>Product successfully deleted!</div>";
                }
            }
            ?>
            <a class="btn btn-primary" href="index.php">List</a>
        </div>
    </div>
</body>

</html>
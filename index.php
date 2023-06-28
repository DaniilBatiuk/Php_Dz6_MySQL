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
            <div class="col">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>name</th>
                            <th>price</th>
                            <th>manufacturer</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?
                        $mysqli = new mysqli("localhost", "root", "", "shopdb", 3306);
                        if(!$mysqli->connect_errno)
                        {
                        $queryStr = "SELECT p.id, p.name AS product_name, p.price, m.name AS manufacturer_name FROM products p INNER JOIN manufacturers m ON p.manufacturer_id = m.id";
                        $res = $mysqli->query($queryStr);
                        while($row = $res->fetch_array(MYSQLI_NUM)){
                            echo "<tr>";
                            foreach($row as $val)
                            echo "<td>".$val."</td>";
                            echo "<td><a href='edit.php?id=".$row[0]."'>Edit</td>";
                            echo "<td><a href='delete.php?id=".$row[0]."'>Delete</td>";
                            echo "</tr>";
                        }
                        }
                        else
                        echo var_dump($mysqli->connect_error);
                        
                        ?></tbody>
                </table>
            </div>
        </div>
        <a class="btn btn-primary" href="add.php">Add</a>
    </div>
</body>
</html>
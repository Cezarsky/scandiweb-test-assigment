<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Product List</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='public/style.css'>
</head>

<body>
    <div id="container">
        <div id="header">



            <h2>Product List</h2>

            <button id="delete-product-btn" onclick='document.getElementById("checkbox-form").submit()'>MASS DELETE</button>
            <button onclick='location.href="product-add.php"'>ADD</button>
        </div>
        <div id="main">
            <form method="POST" id="checkbox-form" action="/?action=delete">
                <?php
                foreach ($params['products'] as $product => $key) {
                ?>
                    <div class="box">

                        <input class="delete-checkbox" type="checkbox" name="ID[]" value="<?php echo $key['ID'] ?>">

                        <p><?php echo $key['SKU'] ?></p>
                        <p><?php echo $key['name'] ?></p>
                        <p><?php echo number_format($key['price'], 2) . " $" ?></p>
                        <p><?php if ($key['category'] == "Furniture") {
                                echo ("Dimensions: " . $key['height'] . "x" . $key['width'] . "x" . $key['length']);
                            } else if ($key['category'] == "DVD") {
                                echo ("Size: " . $key['size'] . " MB");
                            } else if ($key['category'] == "Book") {
                                echo ("Weight: " . $key['weight'] . "KG");
                            } ?>
                        </p>

                    </div>
                <?php
                }
                ?>
        </div>
        </form>

    </div>
    <div id="footer">
        <p>Scandiweb Test Assigment</p>

    </div>
    </div>
</body>

</html>
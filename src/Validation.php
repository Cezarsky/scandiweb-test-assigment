<?php

$sku = $_POST['sku'];
$name = $_POST['name'];
$price = $_POST['price'];
$productType = $_POST['productType'];
$size = $_POST['size'];
$height = $_POST['height'];
$width = $_POST['width'];
$length = $_POST['length'];
$weight = $_POST['weight'];
$send = $_POST['send'];


if (!empty($sku) && !empty($name) && !empty($price) && $productType !== 'Select') {

    if ($sku !== ' ' || $name !== ' ' || $price !== ' ') {

        if (is_numeric($price)) {

            if ($productType == "Furniture") {
                if (empty($height) || empty($width) || empty($length)) {
                    echo "Please, submit required data <br>";
                }

                //dodać walidację spacji
                else if ($height == " " || $width == " " || $length == " ") {
                    echo "Please, submit required data";
                } else if (!is_numeric($height) || !is_numeric($width) || !is_numeric($length)) {
                    echo "Please, provide the data of indicated type <br>";
                } else echo '<script> let form = document.getElementById("product_form").submit() </script>';
            }

            if ($productType == "DVD") {
                if (empty($size)) {
                    echo "Please, submit required data <br>";
                }

                //dodać walidację spacji
                else if ($size == " ") {
                    echo "Please, submit required data <br>";
                } else if (!is_numeric($size)) {
                    echo "Please, provide the data of indicated type <br>";
                } else echo '<script> let form = document.getElementById("product_form").submit() </script>';
            }

            if ($productType == "Book") {
                if (empty($weight)) {
                    echo "Please, submit required data <br>";
                }

                //dodać walidację spacji
                else if ($weight == " ") {
                    echo "Please, submit required data <br>";
                } else if (!is_numeric($weight)) {
                    echo "Please, provide the data of indicated type <br>";
                } else echo '<script> let form = document.getElementById("product_form").submit() </script>';
            }
        } else echo "Please, provide the data of indicated type <br>";
    } else echo "Please, submit required data <br>";
} else echo "Please, submit required data <br>";



        /*
<?php
$sku = $_POST['sku'];
$name = $_POST['name'];
$price = $_POST['price'];
$productType = $_POST['productType'];
$size = $_POST['size'];
$height = $_POST['height'];
$width = $_POST['width'];
$length = $_POST['length'];
$weight = $_POST['weight'];


if (empty($sku) || empty($name) || empty($price) || $productType == 'Select') {
    echo "Please, submit required data <br>";
} else if (!is_numeric($price)) {
    echo "Please, provide the data of indicated type <br>";
}

if ($sku == ' ' || $name == ' ' || $price == ' ') {
    echo "Please, submit required data <br>";
}



if ($productType == "Furniture") {
    if (empty($height) || empty($width) || empty($length)) {
        echo "Please, submit required data <br>";
    }

    //dodać walidację spacji
    else if ($height == " " || $width == " " || $length == " ") {
        echo "Please, submit required data";
    } else if (!is_numeric($height) || !is_numeric($width) || !is_numeric($length)) {
        echo "Please, provide the data of indicated type <br>";
    }
}

if ($productType == "DVD") {
    if (empty($size)) {
        echo "Please, submit required data <br>";
    }

    //dodać walidację spacji
    if ($size == " ") {
        echo "Please, submit required data <br>";
    }

    if (!is_numeric($size)) {
        echo "Please, provide the data of indicated type <br>";
    }
}

if ($productType == "Book") {
    if (empty($weight)) {
        echo "Please, submit required data <br>";
    }

    //dodać walidację spacji
    if ($weight == " ") {
        echo "Please, submit required data <br>";
    }
    if (!is_numeric($weight)) {
        echo "Please, provide the data of indicated type <br>";
    }
}


*/

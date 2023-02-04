<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Product List</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='public/style.css'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"> </script>
    <script>
        function prodType(prod) {
            document
                .querySelectorAll(".fieldbox")
                .forEach((node) => (node.style.display = "none"));

            document.getElementById(prod).style.display = "block";



        }

        $(document).ready(function() {
            $("form").submit(function(event) {
                event.preventDefault();
                var form = $("#product_form");
                var sku = $("#sku").val();
                var name = $("#name").val();
                var price = $("#price").val();
                var productType = $("#productType").val();
                var size = $("#size").val();
                var height = $("#height").val();
                var width = $("#width").val();
                var length = $("#length").val();
                var weight = $("#weight").val();
                var send = $('#send').val();
                $("#validation-text").load("src/validation.php", {
                    sku: sku,
                    name: name,
                    price: price,
                    productType: productType,
                    size: size,
                    height: height,
                    width: width,
                    length: length,
                    weight: weight,
                    send: send,
                });


            })
        });
    </script>
</head>

<body>
    <div id="container">
        <div id="header">
            <h2>Product Add</h2>

            <a href="/"><button id="delete-product-btn">Cancel</button></a>
            <button type="submit" form="product_form">Save</button>
        </div>
        <div id="main">
            <form id="product_form" method="POST" action="/?action=create">
                <input type="hidden" id="send" value="0">
                <label for="sku">SKU</label><input type="text" id="sku" name="sku"> <?php if (!empty($_GET['sku'])) echo $_GET['sku'] ?><br><br>
                <label for="name">Name</label><input type="text" id="name" name="name"><br><br>
                <label for="price">Price ($)</label><input type="text" id="price" name="price"><br><br>
                <label for="productType">Type Switcher</label>
                <select id="productType" name="productType" onChange="prodType(this.value);">
                    <option value="Select">Select</option>
                    <option value="DVD">DVD</option>
                    <option value="Furniture">Furniture</option>
                    <option value="Book">Book</option>
                </select> <br><br>

                <div class="fieldbox" id="DVD">
                    <label>Size (MB)</label>
                    <input type="text" name="size" id="size">
                    <b>
                        <p>Please, provide disc space in MB</p>
                    </b>
                </div>

                <div class="fieldbox" id="Furniture">
                    <label>Height (CM)</label>
                    <input type="text" name="height" id="height"> <br><br>
                    <label>Width (CM)</label>
                    <input type="text" name="width" id="width"><br><br>
                    <label>Length (CM)</label>
                    <input type="text" name="length" id="length">
                    <b>
                        <p>Please, provide dimensions in HxWxL format.</p>
                    </b>

                </div>

                <div class="fieldbox" id="Book">
                    <label>Weight (KG)</label>
                    <input type="text" name="weight" id="weight">
                    <b>
                        <p>Please, provide weight in Kg</p>
                    </b>
                </div>
                <div id="validation-text"></div>
            </form>
        </div>
        <div id="footer">
            <p>Scandiweb Test Assigment</p>

        </div>
    </div>

</body>

</html>
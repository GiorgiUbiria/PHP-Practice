    <html>

    <head>
        <title>Add Product</title>
    </head>

    <body>
        <form id="product-form" method="POST">
            <label for="sku">SKU:</label><br>
            <input type="text" id="sku" name="sku"><br>
            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name"><br>
            <label for="price">Price:</label><br>
            <input type="number" id="price" name="price"><br>
            <label for="product-type">Product Type:</label><br>
            <select id="product-type" name="product-type">
                <option value="DVD">DVD</option>
                <option value="Book">Book</option>
                <option value="Furniture">Furniture</option>
            </select><br>
            <div id="product-type-attributes">
                <!-- Product type-specific attributes will be added here -->
            </div>
            <button type="submit">Save</button>
            <button type="button" id="close-button">Close</button>
        </form>
    </body>

    <script>
        document.getElementById("product-type").addEventListener("change", function() {
            let productType = this.value;
            document.getElementById("product-type-attributes").innerHTML = "";
            if (productType === "DVD") {
                document.getElementById("product-type-attributes").innerHTML =
                    "<label for='size'>Size (MB):</label><br>" +
                    "<input type='number' id='size' name='size'><br>";
            } else if (productType === "Book") {
                document.getElementById("product-type-attributes").innerHTML =
                    "<label for='weight'>Weight (Kg):</label><br>" +
                    "<input type='number' id='weight' name='weight'><br>";
            } else if (productType === "Furniture") {
                document.getElementById("product-type-attributes").innerHTML =
                    "<label for='height'>Height (cm):</label><br>" +
                    "<input type='number' id='height' name='height'><br>" +
                    "<label for='width'>Width (cm):</label><br>" +
                    "<input type='number' id='width' name='width'><br>" +
                    "<label for='length'>Length (cm):</label><br>" +
                    "<input type='number' id='length' name='length'><br>";
            }
        });

        document.getElementById("close-button").addEventListener("click", function() {
            document.getElementById("product-form").reset();
            location.href = "/";
        });

        document.getElementById("product-form").addEventListener("submit", function(event) {
            event.preventDefault();
            let formData = new FormData(this);
            fetch("/product-add.php", {
                method: "POST",
                body: formData
            }).then(function(response) {
                if (response.ok) {
                    location.href = "/";
                }
            });
        });
    </script>


    </html>
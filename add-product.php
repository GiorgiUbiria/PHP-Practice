<html>

<head>
    <title>Add Product</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Roboto', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #product_form {
            display: flex;
            flex-direction: column;
        }

        input {
            margin-bottom: 1rem;
        }

        button {
            margin-bottom: 0.5rem;
            border: 1px solid black;
            outline: none;
            background-color: white;
            color: black;
            border-radius: 2px;
            height: 30px;
        }
    </style>
</head>

<body>
    <form id="product_form" method="POST">
        <label for="sku">SKU:</label><br>
        <input type="text" id="sku" name="sku" required><br>
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br>
        <label for="price">Price:</label><br>
        <input type="number" id="price" name="price" required><br>
        <label for="product-type">Product Type:</label><br>
        <select id="productType" name="product-type" required>
            <option value="">-- Select a product type --</option>
            <option value="DVD">DVD</option>
            <option value="Book">Book</option>
            <option value="Furniture">Furniture</option>
        </select><br>
        <p id="product-type-description"></p>
        <div id="product-type-attributes"></div>
        <button type="button" id="save-button">Save</button>
        <button type="button" id="cancel-button">Cancel</button>
    </form>
    <div id="notification-message"></div>
</body>

<script>
    document.getElementById("sku").addEventListener("change", function() {
        document.getElementById("notification-message").innerHTML = "";

        let sku = this.value;
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "/check-sku.php");
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onload = function() {
            if (xhr.status === 200) {
                let response = JSON.parse(xhr.responseText);
                if (response.skuExists) {
                    let notificationElement = document.getElementById("notification-message");
                    notificationElement.innerHTML = "The SKU is not unique.";
                    notificationElement.style.color = "red";
                    document.getElementById("save-button").disabled = true;
                } else {
                    document.getElementById("save-button").disabled = false;
                }
            }
        };
        xhr.send("sku=" + encodeURIComponent(sku));
    });

    document.getElementById("productType").addEventListener("change", function() {
        let productType = this.value;
        let descriptionElement = document.getElementById("product-type-description");
        descriptionElement.innerHTML = "";
        if (productType === "DVD") {
            descriptionElement.innerHTML = "Please, provide the size (MB) of the DVD.";
            document.getElementById("product-type-attributes").innerHTML =
                "<label for='size'>Size (MB):</label><br>" +
                "<input type='number' id='size' name='size' required><br>";
        } else if (productType === "Book") {
            descriptionElement.innerHTML = "Please, provide the weight (Kg) of the book.";
            document.getElementById("product-type-attributes").innerHTML =
                "<label for='weight'>Weight (Kg):</label><br>" +
                "<input type='number' id='weight' name='weight' required><br>";
        } else if (productType === "Furniture") {
            descriptionElement.innerHTML = "Please, provide the dimensions (cm) of the furniture.";
            document.getElementById("product-type-attributes").innerHTML =
                "<label for='height'>Height (cm):</label><br>" +
                "<input type='number' id='height' name='height' required><br>" +
                "<label for='width'>Width (cm):</label><br>" +
                "<input type='number' id='width' name='width' required><br>" +
                "<label for='length'>Length (cm):</label><br>" +
                "<input type='number' id='length' name='length' required><br>";
        }
        let selectElement = document.getElementById("productType");
        let firstOption = selectElement.options[0];
        if (firstOption.value === "") {
            selectElement.remove(0);
        }
    });

    document.getElementById("cancel-button").addEventListener("click", function() {
        document.getElementById("product_form").reset();
        location.href = "/";
    });

    document.getElementById("save-button").addEventListener("click", function() {
        let form = document.getElementById("product_form");
        let formData = new FormData(form);
        let notificationElement = document.getElementById("notification-message");
        notificationElement.innerHTML = "";

        let requiredInputs = form.querySelectorAll("[required]");
        let requiredInputsFilled = true;
        for (let i = 0; i < requiredInputs.length; i++) {
            if (requiredInputs[i].value === "") {
                requiredInputsFilled = false;
                break;
            }
        }
        if (!requiredInputsFilled) {
            notificationElement.innerHTML = "Please, submit required data.";
            return;
        }

        fetch("/product-add.php", {
            method: "POST",
            body: formData
        }).then(function(response) {
            if (response.ok) {
                location.href = "/";
            } else {
                notificationElement.innerHTML = "Failed to save the product. Please, try again.";
            }
        });
    });
</script>

</html>
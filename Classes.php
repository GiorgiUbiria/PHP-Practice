    <?php

    /**
     * Class representing a product in the database.
     */
    abstract class Product
    {
        // Properties
        protected $sku;
        protected $name;
        protected $price;
        protected $type;

        /**
         * Constructor for a product.
         *
         * @param string $sku The SKU of the product.
         * @param string $name The name of the product.
         * @param float $price The price of the product.
         * @param string $type The type of the product.
         */
        // Constructor
        public function __construct(string $sku, string $name, float $price, string $type)
        {
            $this->sku = $sku;
            $this->name = $name;
            $this->price = $price;
            $this->type = $type;
        }

        /**
         * Returns the description specific to the product.
         *
         * @return mixed The description specific to the product.
         */
        abstract public function getDescription();

        /**
         * Returns the additional properties specific to the product type.
         *
         * @return mixed The additional properties specific to the product type.
         */
        abstract public function getAdditionalProperties();

        /**
         * Returns the SKU of the product.
         *
         * @return string The SKU of the product.
         */
        public function getSKU(): string
        {
            return $this->sku;
        }

        /**
         * Returns the Name of the product.
         *
         * @return string The Name of the product.
         */
        public function getName(): string
        {
            return $this->name;
        }

        /**
         * Returns the Price of the product.
         *
         * @return float The Price of the product.
         */
        public function getPrice(): float
        {
            return $this->price;
        }

        /**
         * Returns the Type of the product.
         *
         * @return string The Type of the product.
         */
        public function getType(): string
        {
            return $this->type;
        }

        abstract public function getMass();
        abstract public function getSize();
        abstract public function getHeight();
        abstract public function getWidth();
        abstract public function getLength();
    }

    /**
     * Class representing a book in the database.
     */ class Book extends Product
    {
        // Properties
        protected $mass;

        /**
         * Constructor for a book.
         *
         * @param string $sku The SKU of the book.
         * @param string $name The name of the book.
         * @param float $price The price of the book.
         * @param int $mass The mass of the book.
         */
        public function __construct(string $sku, string $name, float $price, int $mass)
        {
            // Call the parent constructor to set the shared properties
            parent::__construct($sku, $name, $price, 'Book');

            // Set the book-specific property
            $this->mass = $mass;
        }

        /**
         * Returns the description specific to the book.
         *
         * @return string The description specific to the book.
         */
        public function getDescription()
        {
            return "This is a book.";
        }

        /**
         * Returns the additional properties specific to the book.
         *
         * @return string The additional properties specific to the book.
         */
        public function getAdditionalProperties()
        {
            return "Mass: " . $this->mass . " Kg";
        }

        public function getMass(): int
        {
            return $this->mass;
        }

        public function getSize(): int
        {
            return 0;
        }

        public function getHeight(): int
        {
            return 0;
        }

        public function getWidth(): int
        {
            return 0;
        }

        public function getLength(): int
        {
            return 0;
        }
    }

    /**
     * Class representing a DVD in the database.
     */
    class DVD extends Product
    {
        // Properties
        protected $size;

        /**
         * Constructor for a book.
         *
         * @param string $sku The SKU of the book.
         * @param string $name The name of the book.
         * @param float $price The price of the book.
         * @param int $size The mass of the book.
         */
        public function __construct(string $sku, string $name, float $price, int $size)
        {
            // Call the parent constructor to set the shared properties
            parent::__construct($sku, $name, $price, 'DVD');

            // Set the book-specific property
            $this->size = $size;
        }

        /**
         * Returns the description specific to the DVD.
         *
         * @return string The description specific to the DVD.
         */
        public function getDescription()
        {
            return "This is a DVD.";
        }

        /**
         * Returns the additional properties specific to the DVD.
         *
         * @return string The additional properties specific to the DVD.
         */
        public function getAdditionalProperties()
        {
            return "Size: " . $this->size . " MB";
        }

        public function getMass(): int
        {
            return 0;
        }

        public function getSize(): int
        {
            return $this->size;
        }

        public function getHeight(): int
        {
            return 0;
        }

        public function getWidth(): int
        {
            return 0;
        }

        public function getLength(): int
        {
            return 0;
        }
    }

    /**
     * Class representing a piece of furniture in the database.
     */
    class Furniture extends Product
    {
        // Properties
        protected $height;
        protected $width;
        protected $length;

        /**
         * Constructor for a Furniture.
         *
         * @param string $sku The SKU of the Furniture.
         * @param string $name The name of the Furniture.
         * @param float $price The price of the Furniture.
         * @param int $height The mass of the Furniture.
         * @param int $width The mass of the Furniture.
         * @param int $length The mass of the Furniture.
         */
        public function __construct(string $sku, string $name, float $price, int $height, int $width, $length)
        {
            // Call the parent constructor to set the shared properties
            parent::__construct($sku, $name, $price, 'Furniture');

            // Set the book-specific property
            $this->height = $height;
            $this->width = $width;
            $this->length = $length;
        }

        /**
         * Returns the description specific to the Furniture.
         *
         * @return string The description specific to the Furniture.
         */
        public function getDescription()
        {
            return "This is a Furniture.";
        }

        /**
         * Returns the additional properties specific to the Furniture.
         *
         * @return string The additional properties specific to the Furniture.
         */
        public function getAdditionalProperties()
        {
            return "Dimensions: " . $this->height . "x" . $this->width . "x" . $this->length;
        }

        public function getMass(): int
        {
            return 0;
        }

        public function getSize(): int
        {
            return 0;
        }

        public function getHeight(): int
        {
            return $this->height;
        }

        public function getWidth(): int
        {
            return $this->width;
        }

        public function getLength(): int
        {
            return $this->length;
        }
    }

    /**
     * Class representing a product database.
     */
    class ProductDatabase
    {
        // Properties
        protected $host;
        protected $username;
        protected $password;
        protected $database;
        protected $connection;

        /**
         * Constructor for a product database.
         *
         * @param string $host The hostname of the database.
         * @param string $username The username for the database.
         * @param string $password The password for the database.
         * @param string $database The name of the database.
         */
        // Constructor
        public function __construct($host, $username, $password, $database)
        {
            $this->host = $host;
            $this->username = $username;
            $this->password = $password;
            $this->database = $database;
            $this->connect();
        }

        /**
         * Connects to the database.
         */
        public function connect()
        {
            $this->connection = mysqli_connect($this->host, $this->username, $this->password, $this->database);
            if (mysqli_connect_error()) {
                die("Failed to connect to MySQL: " . mysqli_connect_error());
            }
        }
        /**
         * Closes the connection to the database.
         */
        public function close()
        {
            mysqli_close($this->connection);
        }

        /**
         * Destructor for a product database. Closes the connection to the database.
         */
        public function destruct()
        {
            $this->close();
        }

        /**
         * Returns an array of all products in the database.
         *
         * @return array An array of all products in the database.
         */
        public function getProducts()
        {
            $products = array();
            $result = mysqli_query($this->connection, "SELECT * FROM products_list");
            while ($row = mysqli_fetch_assoc($result)) {
                $productType = $row['product_type'];
                if ($productType === 'Book') {
                    $product = new Book($row['SKU'], $row['product_name'], (float) $row['product_price'], (int) $row['product_mass']);
                } elseif ($productType === 'DVD') {
                    $product = new DVD($row['SKU'], $row['product_name'], (float) $row['product_price'], (int) $row['product_size']);
                } elseif ($productType === 'Furniture') {
                    $product = new Furniture($row['SKU'], $row['product_name'], (float) $row['product_price'], (int) $row['product_height'], (int) $row['product_length'], (int) $row['product_width']);
                }
                array_push($products, $product);
            }
            return $products;
        }

        /**
         * Adds a product to the database.
         *
         * @param Product $product The product to add to the database.
         */
        public function addProduct(Product $product)
        {
            $sku = $product->getSKU();
            $name = $product->getName();
            $price = $product->getPrice();
            $type = $product->getType();

            switch ($type) {
                case 'Book':
                    $mass = $product->getMass();
                    $query = "INSERT INTO products_list (SKU, product_name, product_price, product_type, product_mass, product_height, product_length, product_width, product_size) VALUES (?, ?, ?, 'Book', ?, NULL, NULL, NULL, NULL)";
                    break;
                case 'DVD':
                    $size = $product->getSize();
                    $query = "INSERT INTO products_list (SKU, product_name, product_price, product_type, product_mass, product_height, product_length, product_width, product_size) VALUES (?, ?, ?, 'DVD', NULL, NULL, NULL, NULL, ?)";
                    break;
                case 'Furniture':
                    $height = $product->getHeight();
                    $width = $product->getWidth();
                    $length = $product->getLength();
                    $query = "INSERT INTO products_list (SKU, product_name, product_price, product_type, product_mass, product_height, product_length, product_width, product_size) VALUES (?, ?, ?, 'Furniture', NULL, ?, ?, ?, NULL)";
                    break;
            }

            $statement = $this->connection->prepare($query);

            switch ($type) {
                case 'Book':
                    $statement->bind_param('ssdi', $sku, $name, $price, $mass);
                    break;
                case 'DVD':
                    $statement->bind_param('ssdi', $sku, $name, $price, $size);
                    break;
                case 'Furniture':
                    $statement->bind_param('ssdii', $sku, $name, $price, $height, $length, $width);
                    break;
            }

            try {
                $statement->execute();
            } catch (Exception $e) {
                // Display or log the error message
                echo "Error: " . $e->getMessage();
            }
        }


        /**
         * Deletes a product from the database.
         *
         * @param int $sku The SKU of the product to delete.
         */
        public function deleteProduct(string $sku)
        {
            // Check if the product with the given SKU exists in the database
            $query = "SELECT * FROM products_list WHERE sku = ?";
            $statement = $this->connection->prepare($query);
            $statement->bind_param('s', $sku);
            $statement->execute();
            $result = $statement->get_result();
            if ($result->num_rows == 0) {
                // The product does not exist, return false
                return false;
            }

            // The product exists, proceed with the DELETE query
            $query = "DELETE FROM products_list WHERE sku = ?";
            $statement = $this->connection->prepare($query);
            $statement->bind_param('s', $sku);
            $statement->execute();
            return true;
        }
    }

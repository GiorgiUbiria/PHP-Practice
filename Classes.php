<?php

// Abstract base class for all products
abstract class Product
{
    // Properties
    protected $sku;
    protected $name;
    protected $price;

    // Constructor
    public function __construct($sku, $name, $price)
    {
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
    }

    // Abstract method to be implemented by subclasses
    abstract public function getDescription();

    // Abstract method to be implemented by subclasses
    abstract public function getAdditionalProperties();

    // Getters and setters for properties
    public function getSKU()
    {
        return $this->sku;
    }
    public function setSKU($sku)
    {
        $this->sku = $sku;
    }
    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
    }
    public function getPrice()
    {
        return $this->price;
    }
    public function setPrice($price)
    {
        $this->price = $price;
    }
}

// Subclass for DVD products
class DVD extends Product
{
    // Additional property
    protected $size;

    // Constructor
    public function __construct($sku, $name, $price, $size)
    {
        // Call parent constructor
        parent::__construct($sku, $name, $price);
        // Set additional property
        $this->size = $size;
    }

    // Override abstract method
    public function getDescription()
    {
        return "DVD: $this->name ($this->size MB) - $this->price";
    }

    public function getAdditionalProperties()
    {
        return 'Mass: ' . $this->size;
    }


    // Getter and setter for additional property
    public function getSize()
    {
        return $this->size;
    }
    public function setSize($size)
    {
        $this->size = $size;
    }
}

// Subclass for book products
class Book extends Product
{
    // Additional property
    protected $mass;

    // Constructor
    public function __construct($sku, $name, $price, $mass)
    {
        // Call parent constructor
        parent::__construct($sku, $name, $price);
        // Set additional property
        $this->mass = $mass;
    }

    // Override abstract method
    public function getDescription()
    {
        return "Book: $this->name ($this->mass Kg) - $this->price";
    }

    public function getAdditionalProperties()
    {
        return 'Mass: ' . $this->mass;
    }


    // Getter and setter for additional property
    public function getMass()
    {
        return $this->mass;
    }
    public function setMass($mass)
    {
        $this->mass = $mass;
    }
}

// Subclass for furniture products
class Furniture extends Product
{
    // Additional properties
    protected $height;
    protected $width;

    // Constructor
    public function __construct($sku, $name, $price, $height, $width)
    {
        // Call parent constructor
        parent::__construct($sku, $name, $price);
        // Set additional properties
        $this->height = $height;
        $this->width = $width;
    }

    // Override abstract method
    public function getDescription()
    {
        return "Furniture: $this->name ($this->height x $this->width) - $this->price";
    }

    public function getAdditionalProperties()
    {
        return 'Height: ' . $this->height . ' Width: ' . $this->width;
    }

    // Getters and setters for additional properties
    public function getHeight()
    {
        return $this->height;
    }
    public function setHeight($height)
    {
        $this->height = $height;
    }
    public function getWidth()
    {
        return $this->width;
    }
    public function setWidth($width)
    {
        $this->width = $width;
    }
}

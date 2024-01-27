<?php

class Catalog
{
    private $products;

    // Initialize the catalog with an array of products
    public function __construct(array $products)
    {
        $this->products = $products;
    }

    // This method will get sorted products based on the sorter passed
    public function getSortedProducts($sorter)
    {
        // this will create a copy of the products array to avoid modifying the original product array
        $sortedProducts = $this->products;

        // check to ensure that the sorter is a valid function that can be used for sorting.
        if (is_callable($sorter)) {
            // Use the usort function to sort the products array using the provided sorter
            usort($sortedProducts, $sorter);
        }

        // Return the sorted products array
        return $sortedProducts;
    }
}

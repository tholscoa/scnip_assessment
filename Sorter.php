<?php

include 'Product.php';
include 'Catalog.php';

// Sort by price
$productPriceSorter = function ($a, $b) {
    // use spaceship operator to compare prices
    return $a->price <=> $b->price;
};

// Sort by sales per view ratio
$productSalesPerViewSorter = function ($a, $b) {
    $ratioA = $a->sales_count / $a->views_count;
    $ratioB = $b->sales_count / $b->views_count;

    // use spaceship operator to compare ratios
    return $ratioA <=> $ratioB;
};

// Array of products given in this assessment
$productsGiven = [
    [
        'id' => 1,
        'name' => 'Alabaster Table',
        'price' => 12.99,
        'created' => '2019-01-04',
        'sales_count' => 32,
        'views_count' => 730,
    ],
    [
        'id' => 2,
        'name' => 'Zebra Table',
        'price' => 44.49,
        'created' => '2012-01-04',
        'sales_count' => 301,
        'views_count' => 3279,
    ],
    [
        'id' => 3,
        'name' => 'Coffee Table',
        'price' => 10.00,
        'created' => '2014-05-28',
        'sales_count' => 1048,
        'views_count' => 20123,
    ]
];

$products = array_map(function ($prod) {
    return new Product($prod['id'], $prod['name'], $prod['price'], $prod['created'], $prod['sales_count'], $prod['views_count']);
}, $productsGiven);

// Create a catalog with the array of products
$catalog = new Catalog($products);

// Get and display products sorted by price
$productsSortedByPrice = $catalog->getSortedProducts($productPriceSorter);
echo "Products Sorted by Price:\n";
print_r($productsSortedByPrice);


// Get and display products sorted by sales per view ratio
$productsSortedBySalesPerView = $catalog->getSortedProducts($productSalesPerViewSorter);
echo "\nProducts Sorted by Sales Per View Ratio:\n";
print_r($productsSortedBySalesPerView);

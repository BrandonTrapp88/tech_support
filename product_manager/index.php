<?php
require('../model/database.php');
require('../model/product_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'list_products';
    }
}

if ($action == 'list_products') {
    
    $products = get_product();
    include('product_list.php');
}else if ($action == 'delete_product') {
    $product_id = filter_input(INPUT_POST, 'product_id', 
            );
   
    if ($product_id == NULL || $product_id == FALSE) {
        $error = "Missing or incorrect product id or category id.";
        include('../errors/error.php');
    } else { 
        delete_product($product_id);
        header("Location: .?product_id=$product_id");
    }
}else if ($action == 'show_add_form') {
    
    include('product_add.php');    
} else if ($action == 'add_product') {
    $product_id = filter_input(INPUT_POST, 'product_id', );
    $name = filter_input(INPUT_POST, 'name');
    $version = filter_input(INPUT_POST, 'version', );
    $release_date = filter_input(INPUT_POST, 'release_date',);
    

    

    if ($product_id == NULL || $product_id == FALSE || $name == NULL || 
            $version == NULL || $release_date == NULL || $release_date == FALSE) {
        $error = "Invalid product data. Check all fields and try again.";
        include('../errors/error.php');
    } else { 
        add_product($product_id, $name, $version, $release_date);
        header("Location: .");
        
    }

    

}    


?>
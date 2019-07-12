<?php
require('../model/database.php');
require('../model/product_db.php');
require('../model/category_db.php');

// THE REQUIRES ABOVE ARE GOING TO BE JUST ACKNOWLEGED BUT BY-PASSED WHILE DEBUGGING!

//  setting the value of the Saction variable

$action = filter_input(INPUT_POST, 'action');

// simple validation

if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_emp';
    }
}

// Default action 'list_products'. It displays the Product List page
// change in name of emoloyee id=2

if ($action == 'list_emp') {
    $dept_id = filter_input(INPUT_GET, 'dept_id', FILTER_VALIDATE_INT);
    if ($dept_id == NULL || $dept_id == FALSE) {
        $dept_id = 2;
    }
    echo "The department ID of Trains is $dept_id.";

// Get the product and category data

    $dept_name = get_dept_name($dept_id);
    //$categories = get_categories();
    $emp = get_products_by_category($dept_id);

// Display the Product List

    include('product_list.php');


    // DELETE


} else if ($action == 'delete_emp') {
    $emp_id = filter_input(INPUT_POST, 'emp_id', FILTER_VALIDATE_INT);
    $dept_id = filter_input(INPUT_POST, 'dept_id', FILTER_VALIDATE_INT);
    if ($dept_id == NULL || $dept_id == FALSE ||
            $emp_id == NULL || $emp_id == FALSE) {
        $error = "Missing or incorrect employee id or department id.";
        include('../errors/error.php');
    } else { 
        delete_emp($emp_id);
        leader("Location: .?dept_id=$dept_id");
    }

}    
?>
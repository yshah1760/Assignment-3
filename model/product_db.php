<?php
function get_products_by_category($dept_id) {
    global $db;
    $query = 'SELECT * FROM emps
              WHERE emps.deptID = :dept_id
              ORDER BY empID';
    $statement = $db->prepare($query);
    $statement->bindValue(":dept_id", $dept_id); //Values are not binding.... which has to be
        $statement->execute();
    $products = $statement->fetchAll();
    $statement->closeCursor();
    return $products;
}

function get_emp($emp_id) {
    global $db;
    $query = 'SELECT * FROM emps
              WHERE empID = :emp_id';
    $statement = $db->prepare($query);
    $statement->bindValue(":emp_id", $emp_id);
    $statement->execute();
    $product = $statement->fetch();
    $statement->closeCursor();
    return $product;
}

function delete_emp($emp_id) {
    global $db;
    $query = 'DELETE FROM emps
              WHERE empID = :emp_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':emp_id', $emp_id);
    $statement->execute();
    $statement->closeCursor();
}

?>
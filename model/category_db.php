<?php
function get_dept() {
    global $db;
    $query = 'SELECT * FROM depts
              ORDER BY deptID';
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement;    
}

function get_dept_name($dept_id) {
    global $db;
    $query = 'SELECT * FROM depts
              WHERE deptID = dept_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':dept_id', $dept_id);
    $statement->execute();    
    $dept = $statement->fetch();
    $statement->CloseCursor(); //Cursor needs to be closed
    $dept_name = $dept['deptName'];
    return $dept_name;
}
?>
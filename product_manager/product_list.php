<?php include '../view/header.php'; ?>
<main>
    <h1>List of Employee by Department</h1>
    <h1>Accounting</h1>
    <section>
        <!-- display a table of products -->
        <h2><?php echo $dept_name; ?></h2>
        <table>
            <tr>
                <th>EmployeeCode</th>
                <th>EmployeeName</th>
                <th class="right">EmployeeSalary</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($emp as $emps) : ?>
            <tr>
                <td><?php echo $emps['empCode']; ?></td>
                <td><?php echo $emps['empName']; ?></td>
                <td class="right"><?php echo $emps['empSalary']; ?></td>

                <td><form action="." method="post">
                    <input type="hidden" name="action" value="delete_emp">
                    <input type="hidden" name="emp_id" value="<?php echo $emp['empID']; ?>">
                    <input type="hidden" name="dept_id" value="<?php echo $emp['deptID']; ?>">
                    <input type="submit" value="Press to delete product">
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>

    </section>
</main>
<?php include '../view/footer.php'; ?>
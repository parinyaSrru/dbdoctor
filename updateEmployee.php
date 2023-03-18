<?php
require_once "db/connect.php";
if(isset($_POST["submit"])){
    $emp_id=$_POST["emp_id"];
    $name=$_POST["name"];
    $sname=$_POST["sname"];
    $email=$_POST["email"];
    $department_id=$_POST["department_id"];

    $result=$controller->update($name,$sname,$email,$department_id,$emp_id);
    if($result){
        header("Location:index.php");
    }
}
?>
<?php
class Controller{
    private $db;

    function __construct($con){
        $this->db=$con;
    }

    function getBook(){
        try{
            $sql = "SELECT * FROM department";
            $result=$this->db->query($sql);
            return $result;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    function getEmployees(){
        try{
            $sql = "SELECT * FROM doctor a INNER JOIN department b ON a.department_id = b.department_id ";
            $result=$this->db->query($sql);
            return $result;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }  
    }
    
    function insert($name,$sname,$email,$department_id){
        try{
            $sql="INSERT INTO doctor(name,sname,email,department_id) VALUES (:name,:sname,:email,:department_id)";
            $stmt=$this->db->prepare($sql);
            $stmt->bindParam(":name",$name);
            $stmt->bindParam(":sname",$sname);
            $stmt->bindParam(":email",$email);
            $stmt->bindParam(":department_id",$department_id);   
            $stmt->execute();
            return true;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }

    }
    function delete($id){
        try{
            $sql="DELETE FROM doctor WHERE id=:id ";
            $stmt=$this->db->prepare($sql);
            $stmt->bindParam(":id",$id);
            $stmt->execute();
            return true;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }
    function getEmployeeDetail($id){
        try{
            $sql="SELECT * FROM doctor a 
            INNER JOIN department b
            ON a.department_id = b.department_id WHERE id =:id";
            $stmt=$this->db->prepare($sql);
            $stmt->bindParam(":id",$id);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }
    function update($fname,$sname,$email,$department_id,$id){
        try{
            $sql="UPDATE doctor 
            SET name=:name, sname=:sname, email=:email, department_id=:department_id 
            WHERE id = :id";
            $stmt=$this->db->prepare($sql);
            $stmt->bindParam(":name",$fname);
            $stmt->bindParam(":sname",$sname);
            $stmt->bindParam(":email",$email);
            $stmt->bindParam(":department_id",$department_id);
            $stmt->bindParam(":id",$id);
            $stmt->execute();
            return true;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }
}




?>
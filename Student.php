<?php


class Student{
    private $mySql='';

    function __construct()
    {
        $this->mySql = new mysqli('localhost', 'root','','batch_13');
    }

    function insert($all){
        $name = $all['name'];
        $phone = $all['phone'];
        $email = $all['email'];
        $status = $all['status'];

        if(empty($name)){
            return '<div class="alert alert-danger">Name is required</div>';
        }
        else if(empty($phone)){
            return '<div class="alert alert-danger">Phone is required</div>';
        }
        else if(empty($email)){
            return '<div class="alert alert-danger">Email is required</div>';
        }
        else if(empty($status)){
            return '<div class="alert alert-danger">Status is required</div>';
        }
        else{
            $this->mySql->query("INSERT INTO tbl_student (
                Name, Phone, Email, Status
            ) VALUES ('$name',' $phone','$email','$status')");
            return '<div class="alert alert-success">Data saved</div>';
        } 
    }
    function check($id){

    }
    function view(){
        return $this->mySql->query("SELECT * FROM tbl_student");
    }
    function find($id){
        return $this->mySql->query("SELECT * FROM tbl_student WHERE student_id='$id'");
    }
    function update($all,$id){
        $name = $all['name'];
        $phone = $all['phone'];
        $email = $all['email'];
        $status = $all['status'];
        $this->mySql->query("UPDATE tbl_student SET 
        Name = '$name',Phone = '$phone',Email = '$email' ,Status ='$status'
        WHERE student_id = '$id'
         ");

         return header('location: index.php');
    }
    function delete($id){
        return $this->mySql->query("DELETE FROM tbl_student WHERE student_id = '$id' ");
    }
    function active($id){
        return $this->mySql->query("UPDATE tbl_student SET Status = '0' WHERE student_id = '$id' ");
    }
    function inActive($id){
        return $this->mySql->query("UPDATE tbl_student SET Status = '1' WHERE student_id = '$id' ");
    }
}
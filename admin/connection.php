<?php
$host="localhost:3306";
$user="root";
$password="";
$dbname="parasdb";

$con=mysqli_connect("localhost:3306","root","","parasdb");
//sssss$conn=mysqli_connect($host,$user,$password,$dbname);

if($con==TRUE){
}
 else{
    echo"not connected";

 }
 

 ?>
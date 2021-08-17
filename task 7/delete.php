<?php 
 require 'dbConnection.php';

$id = $_GET['id'];

$id = filter_var($id,FILTER_SANITIZE_NUMBER_INT);


if(filter_var($id,FILTER_VALIDATE_INT)){

   // CODE ..... 
   $sql = "delete from post where id = ".$id;


   $op = mysqli_query($con,$sql);

   if($op){
    header("Location: index.php ");
   }else{
       echo 'error';
   }

}else{

    header("Location: index.php ");
}



?>
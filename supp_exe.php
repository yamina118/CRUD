<?php
include 'connect.php';
if(isset($_GET['sup']))
{
    $id=$_GET['sup'];
    $req="delete from `exercice` where id=$id";
    $res=mysqli_query($conn,$req);
    if($res){
        header('location:formulaire.php');
    }
    else{
        die (mysqli_error($conn));
    }
}
?>
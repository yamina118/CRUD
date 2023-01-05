<?php
include 'connect.php';
$id=$_GET['mod'];
$dis = "select * from `exercice` where id=$id";
$resp = mysqli_query($conn,$dis);
$som=mysqli_fetch_assoc($resp);
$titre=$som['titre'];
$auteur=$som['auteur'];
$date=$som['date_creation'];
if(isset($_POST['modifier']))
{
$titre=$_POST['titre'];
$auteur=$_POST['auteur'];
$date=$_POST['date'];
$req="update `exercice` set id='$id',titre='$titre',auteur='$auteur',date_creation='$date' where id=$id";
$res = mysqli_query($conn,$req);
if($res){
    header('location:formulaire.php');
}
else{
    die (mysqli_error($conn));
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form  method="post"  >
<fieldset>
<legend>Modifier un exercice</legend>
Titre de l'exercice: <input type = "text" name ="titre" value=<?php echo $titre ?> >
<br/>
<br/>
Auteur de l'exercice: <input type = "text" name ="auteur" value=<?php echo $auteur ?> >
<br/>
<br/>
Date de creation: <input type = "date" name ="date" value=<?php echo $date ?> >
<br/>
<br/>
<input name="modifier" type="submit" value="modifier"/>
</fieldset>
</form>
</body>
</html>
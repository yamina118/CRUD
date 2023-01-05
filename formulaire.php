<?php
include 'connect.php';
if(isset($_POST['envoyer']))
{
$titre=$_POST['titre'];
$auteur=$_POST['auteur'];
$date=$_POST['date'];
$req="insert into `exercice` (`titre`,`auteur`,`date_creation`)
VALUES ('$titre','$auteur','$date')";
$res = mysqli_query($conn,$req);
if($res){
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
        <legend>Ajouter un exercice</legend>
        Titre de l'exercice: <input type = "text" name ="titre" value="" >
        <br/>
        <br/>
        Auteur de l'exercice: <input type = "text" name ="auteur" value="" >
        <br/>
        <br/>
        Date de creation: <input type = "date" name ="date" value="" >
        <br/>
        <br/>
        <input name="envoyer" type="submit" value="Envoyer"/>
        </fieldset>
    </form>
<br>
<br>
    <table>
        <thead>
        <tr>
            <th>id</th>
            <th>titre</th>
            <th>auteur</th>
            <th>date_creation</th>
            <th colspan="2">actions</th>
        </tr></thead>
        <tbody>
            <?php
            $req="Select * from `exercice`";
            $res=mysqli_query($conn,$req);
            if($res)
            {
                while($row=mysqli_fetch_assoc($res))
                {
                    $id=$row['id'];
                    $titre=$row['titre'];
                    $auteur=$row['auteur'];
                    $date=$row['date_creation'];
                    echo'<tr>
                    <td scope="row">'.$id.'</td>
                    <td>'.$titre.'</td>
                    <td>'.$auteur.'</td>
                    <td>'.$date.'</td>
                    <td><a href="modif_exe.php?mod='.$id.'">Modifier</a></td>
                    <td><a href="supp_exe.php?sup='.$id.'">Supprimer</a></td>'
                    ;
                }
            }
            ?>
            
        </tbody>
    </table>
    <style>
        a{
            color:white;
        }
        fieldset {
            border: 1px solid #000;
            width:30%;
        }      
        table{
    
            border-collapse: collapse;
            width: 60%;
        }
        th{
            border : 1px solid white;
            color: black;
            background-color:  orange;
        }
        td{
            border : 1px solid white;
            color: white;
            background-color: blue;
        }
    </style>
</body>
</html>

<?php  $desc_ID= $_GET['desc_ID'] ; //echo " .$desc_ID"; ?>
<?php
        try
    {
    $bdd = new PDO('mysql:host=localhost;dbname=hapiam;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch(Exception $e)
    {

        die('Erreur : '.$e->getMessage());
    }

       /* $reponse1 = $bdd->prepare("SELECT * FROM description");
        $reponse1 = $bdd->query('SELECT * FROM description' );
        while($don =$reponse1 -> fetch()){*/
$reponse = $bdd->query('SELECT * FROM contenu WHERE cours_id ="'.$desc_ID.'" ORDER BY rang');          
  ?>  

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="../css/apercuStyle.css">
        <title>Apérçu du cours</title>

    </head>
    <body>
<input type="hidden" name="desc_ID" value="<?php echo $_GET['desc_ID'];?>">

<!-- /.panel-heading -->
<div class="panel-body">
<div class="table-responsive">

<table class="planaperçu">
<thead>
                <tr>
                   <!--   <td>Type</td>
                    <td>Ordre</td>
                    <td>Contenu</td>
                  <td>Visibilité</td> -->
                </tr>
</thead>
<?php
while ($donnees = $reponse->fetch())
{ 
?>              
                <tr class="success">
                   <!-- <td><?php echo $donnees['type'];?></td>
                    <td><?php echo $donnees['rang'];?></td> -->
                    <td class="<?php echo $donnees['type'];?>"><?php echo $donnees['contenu'];?></td>                 
                  <?php echo '<td><a  href="SupUnChamp.php?champ_ID='.$donnees['contenu_id'].'&desc_ID='.$donnees['cours_id'].'" >X</a></td>';  //supunchamp ?>
                </tr>
            <?php }  
$reponse->closeCursor(); // Termine le traitement de la requête
            ?>
</table>
</div>
</div>
    <a  href="link_index.php">Retour à vos cours</a>
    </body>
</html>
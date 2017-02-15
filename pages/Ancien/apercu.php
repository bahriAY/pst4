<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="../css/apercuStyle.css">
        <title>apercu.php</title>

    </head>

    <body>

    <input type="hidden" name="desc_ID" value="<?php echo $_GET['desc_ID'];?>">
    
    <?php  $desc_ID= $_GET['desc_ID'] ; 
            //echo " .$desc_ID"; ?>
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

<!-- /.panel-heading -->
<div class="panel-body">
<div class="table-responsive">

<table class="table">
<thead>
                <tr>
                    <td>Type</td>
                    <td>Ordre</td>
                    <td>Contenu</td>
                   <!-- <td>Visibilité</td> -->
                </tr>
</thead>
<?php
while ($donnees = $reponse->fetch())
{ 
?>              
                <tr class="success">
                    <td><?php echo $donnees['type'];?></td>
                    <td><?php echo $donnees['rang'];?></td>
                    <td class="<?php echo $donnees['type'];?>"><?php echo $donnees['contenu'];?></td>

                   <!-- <td><input type="checkbox" name="visibilité" ></td> -->
                   <!-- <?php echo '<td><a href="creation.php?desc_ID='.$donnees['cours_id'].'">Modifier/Completer</a></td>';  //Modifier ?> -->
                    
                  <?php echo '<td><a href="SupUnChamp.php?champ_ID='.$donnees['contenu_id'].'&desc_ID='.$donnees['cours_id'].'"  >Supprimer ce champ</a></td>';  //supunchamp ?>

                    

                </tr>
                </br>
            <?php }
             //fin de la boucle, le tableau contient toute la BDD
           // @mysql_close(); //deconnection de mysql
            
$reponse->closeCursor(); // Termine le traitement de la requête

            ?>
</table>
</div>
</div>
    </body>
</html>
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
$reponse = $bdd->query('SELECT * FROM contenu WHERE cours_id ="'.$desc_ID.'" ORDER BY rang, Date DESC');          
  ?>  

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
         <!-- Bootstrap Core CSS -->
        <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

        <!-- Timeline CSS -->
        <link href="../dist/css/timeline.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="../bower_components/morrisjs/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <link rel="stylesheet" type="text/css" href="../css/apercuStyle.css">
        <link rel="stylesheet" type="text/css" href="../css/apercuMeP.css">
        <title>Aperçu du cours</title>
        <link rel="shortcut icon" type="image/x-icon" href="logo-hapiam.jpg" />

    </head>
    <body>
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0; background-color: #000000">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.html" style="font-weight:bold;">COURS HAPIAM</a>
            </div>
        <ul class="nav navbar-top-links navbar-right">
        <li>
        <a  href="link_index.php"><button  type="button" class="btn btn-info" style="font-weight: bold; color: #000000; border-radius: 12px">Retour à vos cours</button></a>
        </li>
        <li>
        <a href="faq.php"><button  type="button" class="btn btn-outline btn-info" style="border-radius: 12px">FAQ</button></a>
        </li>
        </ul>                

            <!-- /.navbar-header -->
        </nav>


<div id="main">

<div id="formulaire" style="background-color: white; ">
<div class="panel-heading" style="font-weight: bold;background-color: #81D4FA ; color: #000000">Aperçu du cours</div>
<input type="hidden" name="desc_ID" value="<?php echo $_GET['desc_ID'];?>">

<!-- /.panel-heading -->
<div class="panel-body">
<div >

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

                <!--  <?php echo '<td><a class="BoutonSup" href="SupUnChamp.php?champ_ID='.$donnees['contenu_id'].'&desc_ID='.$donnees['cours_id'].'" style="border-radius: 13px">X</a></td>';  //supunchamp ?> -->


                </tr>
            <?php }  
$reponse->closeCursor(); // Termine le traitement de la requête
            ?>
</table>
</div>
</div>

</div> <!-- form> -->



<div id="visualiser" style="background-color: white; "> <!-- Feedbacks -->
<div class="panel-heading" style="font-weight: bold;background-color: #81D4FA ; color: #000000">Feedback</div>
</br>
<table id="Feedbacks">
    <thead>
                <tr>
                <td rowspan="2" style="text-align: center; font-weight: bold; width: 100px;border-color: black;background-color: ">Nombre de vue</td>
                <td rowspan="2" style="text-align: center; font-weight: bold;width: 50px;border-color: black;">Note globale

                </td>
                <td colspan="2" style="text-align: center; font-weight: bold;width: 400px;border-color: black;">Remarques</td>
                <tr>
                <td style="text-align: center; font-weight: bold;border-color: black;">Positives</td>
                <td style="text-align: center; font-weight: bold;border-color: black;">Negatives</td>
                </tr>
                </tr>

</thead>
</table>
</div></div>

    </body>
</html>
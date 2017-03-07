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

        <link rel="stylesheet" type="text/css" href="../css/ajoutStyle.css">
        <link rel="stylesheet" type="text/css" href="../css/apercuStyle.css">
         <link rel="shortcut icon" type="image/x-icon" href="logo-hapiam.jpg" />

    	<title>Création Cours</title>
    <script type="text/javascript">


    var i = 1; // on inialise le nombre de champs "i"
    

    </script>
   
	</head>

	<body>
       <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0; background-color: #000000">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.html" style="font-weight:bold;">COURS HAPIAM</a>
            </div>
        <ul class="nav navbar-top-links navbar-right">
        <li>
        <a href="faq.php"><button  type="button" class="btn btn-outline btn-info" style="border-radius: 12px">FAQ</button></a>
        </li>
        <li>
           <button class="btn btn-info" style="border-radius: 12px; font-weight: bold; color: #000000"><a  href="link_index.php">Retour à vos cours</a></button
        </li>
        </ul>                

            <!-- /.navbar-header -->

        </nav>
<div id="main">


<div id="formulaire" style="background-color: #E5E7E9; height: 600px; padding-left: 12px">

        <?php 
           try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=hapiam;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
         }
            catch(Exception $e)
        {

            die('Erreur : '.$e->getMessage());
        }?>
        <h2 style="text-align: center;"> Formulaire de création du contenu </h2><Br/><Br/>
        <div>
		<input type="button" onclick="addField()" value=" + Ajouter des champs"  class="btn btn-primary" style="border-radius: 12px"/>
        </div>
		<form method="post" action="creation_cours.php">
    	<div id="champs">
    	<table id="matable">
   		<tr style="font-weight: bold; color: #424949; text-align: center;border-color: #424949;">
       		<td>Type</td>
       		<td>Rang</td>
       		<td>Contenu</td>
       	<!--	<td>Visibilité</td> -->
   		</tr>
   		<tr>
        	<td>
        		
        		<SELECT name="Type[]" style="border-radius: 10px">
                        <OPTION>Grand-titre
        				<OPTION>Titre
        				<OPTION>Sous-titre
        				<OPTION>Exemple
                        <OPTION>Propriété
                        <OPTION>Définition
                        <OPTION>Paragraphe
        		</SELECT>

        		
			</td>
        	<td><input type="text" name="Rang[]"  style="border-radius: 10px; width: 80px"/></td>
            <td><textarea rows="6" cols="30" type="text" name="Contenu[]"  style="border-radius: 10px"> </textarea></td>
        	<!--<td><input type="text" name="Contenu[]" /></td> -->
       <!-- 	<td><input type="checkbox" value="" name="vis[]"></td> -->
        	<br>
    	
    	</table>
    	</div>

    <script type="text/javascript">

        function addField(){


        var newRow = document.getElementById('matable').insertRow(-1);

        var newCell = newRow.insertCell(0);

        newCell.innerHTML = '<input type="text"/>';
        var ajout='<select name="Type[]" style="border-radius: 10px">';
        ajout+='<option>Grand-titre</option>';
        ajout+='<option>Titre</option>';
        ajout+='<option>Sous-titre</option>';
        ajout+='<option>Exemple</option>';
        ajout+='<option>Propriété</option>';
        ajout+='<option>Définition</option>';
        ajout+='<option>Paragraphe</option>';


        newCell.innerHTML = ajout;

        newCell = newRow.insertCell(1);

        newCell.innerHTML = '<input type="text" name="Rang[]" style="border-radius: 10px; width: 80px"/>';
        newCell = newRow.insertCell(2);

        newCell.innerHTML = '<textarea rows="6" cols="30" type="text" name="Contenu[]" style="border-radius: 10px" ></textarea>';
//<input type="text" name="Contenu[]"/>
     /*   newCell = newRow.insertCell(3);

        newCell.innerHTML = '<input type="checkbox" name="vis[]">';*/


    }

 
    </script>

    <p style="color: #000000; font-weight: bold; padding-left: 44px">Progression</p>
    <input type="text" name="progress" style="border-radius: 12px"></input>
    </br></br>
    <input type="hidden" name="desc_ID" value="<?php echo $_GET['desc_ID'];?>">
    <div>
    <input type="submit" href="apercu.php" class="btn btn-success" style="border-radius: 12px; font-weight: bold; color: #000000; background-color: #32CD32"/>
    </div>
    </br></br>
    <?php  $desc_ID= $_GET['desc_ID'] ;  //ajout desc_ID ?>
    
    </form>
</div>

<div id="visualiser" style="background-color: white">
    <h2 style="text-align: center;">Aperçu du cours</h2>
   <?php $reponse = $bdd->query('SELECT * FROM contenu WHERE cours_id ="'.$desc_ID.'" ORDER BY rang, Date DESC ');          
  ?>  
  <div class="panel-body">
<div>

<table class="planaperçu">
<thead>
                <tr>
                    
                    <td style="font-weight: bold; color: #000000">Rang</td>
                   <!--   
                    <td>Type</td>
                    <td>Visibilité</td> 
                    -->
                   <td style="font-weight: bold; color: #000000">Contenu</td>
                  
                </tr>
</thead>
<?php
while ($donnees = $reponse->fetch())
{ 
?>              
                <tr class="success">
                   <!-- <td><?php echo $donnees['type'];?></td>-->
                    <td style="font-weight: bold" class="badge"><?php echo $donnees['rang'];?></td> 
                    <td class="<?php echo $donnees['type'];?>"><?php echo $donnees['contenu'];?></td>                 
                  <?php echo '<td><a href="SupUnChampVisu.php?champ_ID='.$donnees['contenu_id'].'&desc_ID='.$donnees['cours_id'].'" class="btn btn-warning btn-rectangle" style="border-radius: 13px; background-color: #B22222; color: #FFFAFA ">X</a></td>';  //supunchamp ?>
                </tr>
            <?php }  
$reponse->closeCursor(); // Termine le traitement de la requête
            ?>
</table>
</div>
</div>
</div>
</div> <!-- main -->
	</body>
</html>
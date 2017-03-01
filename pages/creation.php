<!DOCTYPE html>
<html lang="en">

	<head>

    	<meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="../css/ajoutStyle.css">
        <link rel="stylesheet" type="text/css" href="../css/apercuStyle.css">

    	<title>Création Cours</title>
    <script type="text/javascript">


    var i = 1; // on inialise le nombre de champs "i"
    

    </script>
	</head>

	<body>
<div id="main">


<div id="formulaire">
        <?php 
           try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=hapiam;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
         }
            catch(Exception $e)
        {

            die('Erreur : '.$e->getMessage());
        }?>
        <h1> Formulaire de création du contenu </h1>
		<input type="button" onclick="addField()" value=" + Ajouter des champs"/>
		<form method="post" action="creation_cours.php" >
    	<div id="champs" >
    	<table id="matable">
   		<tr>
       		<td>Type</td>
       		<td>Rang</td>
       		<td>Contenu</td>
       		<td>Visibilité</td>
   		</tr>
   		<tr>
        	<td>
        		
        		<SELECT name="Type[]">
                        <OPTION>Grand-titre
        				<OPTION>Titre
        				<OPTION>Sous-titre
        				<OPTION>Exemple
                        <OPTION>Propriété
                        <OPTION>Définition
                        <OPTION>Paragraphe
        		</SELECT>

        		
			</td>
        	<td><input type="text" name="Rang[]" /></td>
        	<td><input type="text" name="Contenu[]" /></td>
        	<td><input type="checkbox" value="" name="vis[]"></td>
        	<br>
    	
    	</table>
    	</div>

    <script type="text/javascript" >

        function addField(){


        var newRow = document.getElementById('matable').insertRow(-1);

        var newCell = newRow.insertCell(0);

        newCell.innerHTML = '<input type="text"/>';
        var ajout='<select name="Type[]">';
        ajout+='<option>Grand-titre</option>';
        ajout+='<option>Titre</option>';
        ajout+='<option>Sous-titre</option>';
        ajout+='<option>Exemple</option>';
        ajout+='<option>Propriété</option>';
        ajout+='<option>Définition</option>';
        ajout+='<option>Paragraphe</option>';


        newCell.innerHTML = ajout;

        newCell = newRow.insertCell(1);

        newCell.innerHTML = '<input type="text" name="Rang[]"/>';
        newCell = newRow.insertCell(2);

        newCell.innerHTML = '<input type="text" name="Contenu[]"/>';

        newCell = newRow.insertCell(3);

        newCell.innerHTML = '<input type="checkbox" name="vis[]">';


    }

 
    </script>

    <p>Progression</p>
    <input type="text" name="progress"></input>
    </br></br>
    <input type="hidden" name="desc_ID" value="<?php echo $_GET['desc_ID'];?>">
    <input type="submit" href="apercu.php"/>
    </br></br>
    <button><a  href="link_index.php">Retour à vos cours</a></button>
    <?php  $desc_ID= $_GET['desc_ID'] ;  //ajout desc_ID ?>
    
    </form>
</div>

<div id="visualiser">

    <h1>Visualisation en direct</h1>
   <?php $reponse = $bdd->query('SELECT * FROM contenu WHERE cours_id ="'.$desc_ID.'" ORDER BY rang');          
  ?>  
  <div class="panel-body">
<div class="table-responsive">

<table class="planaperçu">
<thead>
                <tr>
                    
                    <td>Rang</td>
                   <!--   
                    <td>Type</td>
                    <td>Visibilité</td> 
                    -->
                   <td>Contenu</td>
                  
                </tr>
</thead>
<?php
while ($donnees = $reponse->fetch())
{ 
?>              
                <tr class="success">
                   <!-- <td><?php echo $donnees['type'];?></td>-->
                    <td><?php echo $donnees['rang'];?></td> 
                    <td class="<?php echo $donnees['type'];?>"><?php echo $donnees['contenu'];?></td>                 
                  <?php echo '<td><a href="SupUnChampVisu.php?champ_ID='.$donnees['contenu_id'].'&desc_ID='.$donnees['cours_id'].'" >X</a></td>';  //supunchamp ?>
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
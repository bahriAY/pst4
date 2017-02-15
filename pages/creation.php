<!DOCTYPE html>
<html lang="en">

	<head>

    	<meta charset="utf-8">
    	<title>Création Cours</title>
    <script type="text/javascript">


    var i = 1; // on inialise le nombre de champs "i"
    

    </script>
	</head>

	<body>

        <?php // auto complétion des textes

           try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=hapiam;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
         }
            catch(Exception $e)
        {

            die('Erreur : '.$e->getMessage());
        }

           // $reponse = $bdd->query('SELECT *  FROM contenu WHERE cours_id='.$_GET['desc_ID']);

        // rrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr?>

		<input type="button" onclick="addField()" value="Ajouter"/>
       
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
    <input type="hidden" name="desc_ID" value="<?php echo $_GET['desc_ID'];?>">
    <input type="submit" href="apercu.php"/>
    
    <?php  $desc_ID= $_GET['desc_ID'] ;  //ajout desc_ID ?>
    
    </form>
	

	</body>
</html>
<?php

// Effectuer ici la requête qui insère le message
if (isset($_POST['titre']) AND isset($_POST['matiere']) AND isset($_POST['competence']) AND isset($_POST["nom_prof"]) AND isset($_POST['videolink']) AND isset($_POST['objectif']) AND (isset($_POST["case_texte"]) OR isset($_POST["case_video"])) ){

	try
	{
	$bdd = new PDO('mysql:host=localhost;dbname=hapiam;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch(Exception $e)
	{

		die('Erreur : '.$e->getMessage());
	}
	//vérification pour les checkbox 'type'
    if(isset($_POST["case_texte"]) AND  isset($_POST["case_video"]) ){
    	$type = "2"; // 2 = video et texte
    }
    elseif (isset($_POST["case_texte"])) {
    	$type ="0"; // 0 = texte ONLY
    }
    elseif (isset($_POST["case_video"])) {
    	$type ="1"; // 1 = video ONLY
    }

    /* PROBLEME : 
    - RAJOUTER NIVEAU(description) DANS LE FORMULAIRE
	-RAJOUTER plan_ID et desc_ID (cours) DANS LE FORMULAIRE
	OU PERMETTRE UNE VALEUR PAR DEFAUT NULL


//ajout d'un niveau arbitraire, A RETIRER PLUS TARD
    $niveau="4A";
    $plan_ID=20;
    $desc_ID=10;


*/
    

	//insertion dans la bdd cours
	/*$req = $bdd->prepare('INSERT INTO description(URL_vid) VALUES(:URL_vid)');
	$req->execute(array(
		'URL_vid' => $_POST['videolink']
		));*/

	// récupération du cours_ID
	//$reponse = $bdd->query('SELECT cours_ID FROM cours ORDER BY cours_ID DESC LIMIT 0,1' );
	//while($données =$reponse -> fetch()){
	//	$cours_ID=$données['cours_ID'];
	//}



	//insertion dans la bdd descritpion
    
	$req = $bdd->prepare('INSERT INTO cours(titre, matiere, competence, nom_prof, objectif, type, URL_vid) VALUES(:titre, :matiere, :competence, :nom_prof, :objectif, :type, :URL_vid)');


	$req->execute(array(
		'titre' => $_POST['titre'],
		'matiere' => $_POST['matiere'],
		'competence' => $_POST['competence'],
		'nom_prof' => $_POST['nom_prof'],
		'objectif' => $_POST['objectif'],
		'type' => $type,
        'URL_vid' => $_POST['videolink']
         //,
		//'cours_ID' => $cours_ID
		));
	// Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
/*	if (isset($_FILES['monfichier']) AND $_FILES['monfichier']['error'] == 0)
	{		
			   	    // Testons si le fichier n'est pas trop gros
        	if ($_FILES['monfichier']['size'] <= 7000000) //7Mo
        	{
            	    // Testons si l'extension est autorisée
        			echo "test";
            	    $infosfichier = pathinfo($_FILES['monfichier']['name']);
                	$extension_upload = $infosfichier['extension'];
                	$extensions_autorisees = array('txt', 'pdf');
                	if (in_array($extension_upload, $extensions_autorisees))
                	{
                	        // On peut valider le fichier et le stocker définitivement
                	        move_uploaded_file($_FILES['monfichier']['tmp_name'], 'uploads/' . basename($_FILES['monfichier']['name']));
                	        echo "L'envoi a bien été effectué !";
                	}
        	}
	} */


}


else{

	echo 'Tu n\'as pas rempli tout les champs';
}
// Puis rediriger vers une autre page comme ceci :

//header('Location: autre_page.php');



?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Hapiam Cours</title>

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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->




</head>

<body>

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.html">COURS HAPIAM</a>
            </div>
        <ul class="nav navbar-top-links navbar-right">
        <li>
        <a href="link_index.php"><button  type="button" class="btn btn-info">Mes cours ajoutés</button></a>
        </li>
        <li>
        <a href="faq.php"><button  type="button" class="btn btn-outline btn-info">FAQ</button></a>
        </li>
        </ul>                

            <!-- /.navbar-header -->

        </nav>
    <div class="row">
            <div class="col-lg-12">
        <div class="panel panel-default">
<div class="panel-heading">
                            Mes cours postés
                        </div>
            <div class="panel-body">
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
$reponse = $bdd->query('SELECT * FROM cours ');          
  ?>    
                        <!-- /.panel-heading -->
<div class="panel-body">
<div class="table-responsive">

<table class="table">
<thead>
                <tr>
                    <td>titre</td>
                    <td>matiere</td>
                    <td>competence</td>
                    <td>nom_prof</td>
                    <td>objectif</td>
                    <td>type</td>
                    <td>Progression du contenu </td>
                    <td>Rendre visible</td>
                </tr>
</thead>
<?php
while ($donnees = $reponse->fetch())
{ 
?>              
                <tr class="success">
                    <td><?php echo $donnees['titre'];?></td>
                    <td><?php echo $donnees['matiere'];?></td>
                    <td><?php echo $donnees['competence'];?></td>
                    <td><?php echo $donnees['nom_prof'];?></td>
                    <td><?php echo $donnees['objectif'];?></td>

                    <td>
                    <?php 
                    if ($donnees['type']== 0) {
                        # code....
                        echo "texte";
                    }
                    elseif ($donnees['type']== 1) {
                        # code...
                        echo "contenu video";
                    }
                    else{
                        echo "Video et Texte";
                    }
                    ?>
                        
                    </td>


                   <td><progress max="100" value="<?php echo $donnees['progression'];?>" form="form-id"></progress> </td> 
                    
                    
                    <td><input type="checkbox" name="visibilité" ></td>
                    <td><a href="Apercu.php">Apercu</a></td>
                    <?php echo '<td><a href="creation.php?desc_ID='.$donnees['cours_id'].'" >Modifier/Completer</a></td>';  // okddozkozkdozkdszd  ?>
                    <td>
                    <input type="button" name="supligne" value="supprimer le cours">
                    <?php/*
                     // $cnx = mysql_connect( "localhost", "root", "" ) ;
                      $db = mysql_select_db( "bdd_pst" ) ;
 
                    $id = $donnees['desc_ID'];

                    if(isset($_POST['supligne'])){
                        $sql = "DELETE * FROM description WHERE id = ".$id ;
                        $requete = mysql_query( $sql) ;
                    } */
                    ?>
                    </td>

                </tr>
                </br>
            <?php }
             //fin de la boucle, le tableau contient toute la BDD
           // @mysql_close(); //deconnection de mysql
            
$reponse->closeCursor(); // Termine le traitement de la requête

            ?>
</table>
</div>
<button><a href="index.html">AJOUTER UN COURS</a></button>
</div>
                

</div></div></div></div>
</body>
</html>

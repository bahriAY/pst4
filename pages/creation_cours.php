<?php
//$i =0;

  header('Location: link_index.php');


if (isset($_POST['Type']))

{	
	print_r($_POST);
	echo 'OK1';
	/*$i = count($_POST['Type']);
	$i++;*/
}

echo '545155';



try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=hapiam;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch(Exception $e)
	{

		die('Erreur : '.$e->getMessage());
	}
	/*$reponse = $bdd->query('SELECT desc_ID FROM cours WHERE desc_ID.cours = desc_ID.description ' );
	while($données =$reponse -> fetch())
	{
		$cours_ID=$données['cours_ID'];
	} */


//si on modifie du contenu
$reponse = $bdd->query('SELECT cours_id FROM cours '); 
while ($donnees = $reponse->fetch()){
	if ($_POST['desc_ID'] == $donnees){
		//eeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee
	}
}

	$descid= $_POST['desc_ID'];
	//$prog= $_POST['progress'];
	echo "$descid";

	if (isset($_POST['progress'])) {
		# code...$$
		$req = $bdd->prepare('UPDATE  cours SET progression = :prog WHERE cours_id ="'.$descid.'" ');
		$req->execute(array(
		'prog' => $_POST['progress']
		));
	}


// si on creer du contenu
$i = count($_POST['Type']);
for($n=0;$n<$i;$n++)
{	
	if (isset($_POST['Type'][$n]) AND isset($_POST['Rang'][$n]) AND isset($_POST['Contenu'][$n]) AND isset($_POST['desc_ID'])) //
	{

		$req = $bdd->prepare('INSERT INTO contenu(type, rang, contenu, visibilite, cours_id/*, progression*/) VALUES(:Type, :Rang, :Contenu, :vis, :desc_ID/*, :prog*/)');
		$req->execute(array(
		'Type' => $_POST['Type'][$n],
		'Rang' => $_POST['Rang'][$n],
		'Contenu' => $_POST['Contenu'][$n],
		'vis' => 0,
		'desc_ID' => $_POST['desc_ID'], // desc_id = cours id
		//'prog' => $_POST['prog'],
		));
		echo "OK2";
	}
	else
	{
		echo "Tu n\'as pas rempli tout les champs";
		echo "<a href='link_index.php'> revenir </a>";
		return 0;
	} 
}
	
exit();

?>
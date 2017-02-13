<?php
$i =0;

if (isset($_POST['Type']))
{	
	print_r($_POST);
	echo 'parout1';
	$i = count($_POST['Type']);
}
echo '545155';
try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=bdd_pst;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
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
for($n=0;$n<$i;$n++)
{	
	if (isset($_POST['Type'][$n]) AND isset($_POST['Rang'][$n]) AND isset($_POST['Contenu'][$n]) AND isset($_POST['prog']) AND isset($_POST['desc_ID']))
	{

		$req = $bdd->prepare('INSERT INTO creation_cours(type, rang, contenu, hidden_elmt, progression, desc_ID) VALUES(:Type, :Rang, :Contenu, :vis, :prog, :desc_ID)');
		$req->execute(array(
		'Type' => $_POST['Type'][$n],
		'Rang' => $_POST['Rang'][$n],
		'Contenu' => $_POST['Contenu'][$n],
		'vis' => 0,
		'desc_ID' => $_POST['desc_ID'],
		'prog' => $_POST['prog']
		));
		echo "fin";
		echo 'tamere';
	}
	else
	{
		echo "Tu n\'as pas rempli tout les champs";
		echo "<a href='page retour'> revenir </a>";
		return 0;
	}
}
	
	
?>
<input type="hidden" name="desc_ID" value="<?php echo $_GET['desc_ID'];?>">  
<?php
try
{
$bdd = new PDO('mysql:host=localhost;dbname=hapiam;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
die('Erreur : '.$e->getMessage());
}
$desc_ID= $_GET['desc_ID'] ; 
echo "$desc_ID"; 
$req = $bdd->prepare('DELETE FROM cours WHERE cours_id ="'.$desc_ID.'" ');
$req->execute();

$reqb = $bdd->prepare('DELETE FROM contenu WHERE cours_id ="'.$desc_ID.'"');
$reqb->execute();

exit(header("Location:link_index.php"));
?>    

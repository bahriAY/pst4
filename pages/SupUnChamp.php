<input type="hidden" name="champ_ID" value="<?php echo $_GET['champ_ID'];?>">  
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

$champ_ID= $_GET['champ_ID'] ; 
$desc_ID= $_GET['desc_ID'] ;
echo "$champ_ID"; 
echo "$desc_ID";
$reqb = $bdd->prepare('DELETE FROM contenu WHERE contenu_id ="'.$champ_ID.'"');
$reqb->execute();
exit(header( 'Location:apercu.php?desc_ID='.$desc_ID)); 

?>    

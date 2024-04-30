<?php
try
{
$db=new PDO('mysql:host=localhost ;dbname=user;charset=uft0','root','');
}
catch (exception $e  )
{
    die('erreur :'.$e->getmessage());

}
$nom=$_post["first-name"];
$prenom=$_post["last-name"];
$datenais=$_post["dob"];
$city=$_post["city "];
$adresse=$_post["adresse"];
$school=$_post["school"];
$college=$_post["college"];
$degree=$_post["degree"];


$db->exec("insert into user (nom,prenom,date,city,adress,school,college,degree)values (' ".$nom" ',' ".$prenon" ',' ".$datenais" ',' ".$city" ',' ".$adress" ',
' ".$school" ' ' ".$college" ',' ".$degree" ')")
?> 
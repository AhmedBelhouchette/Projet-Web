<?php
try
{
$db=new PDO('mysql:host=localhost ;dbname=projet;'root',''');
}
catch (exception $e  )
{
    die('erreur :'.$e->getmessage());

}
?> 
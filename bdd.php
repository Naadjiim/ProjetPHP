<?php
    try
    {
        $bdd = new PDO('mysql:host=mysql-sedinsedir.alwaysdata.net;dbname=sedinsedir_jeuxvideo;charset=utf8', 
        '197430_adminjeux', 'Q1s2d3f4g5');
    }
    catch(Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }
?>
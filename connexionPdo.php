<?php
$hostnom = 'host=btssio.dedyn.io' ;
$usernom = 'KANCELT';
$password = '07042005';
$bdd = 'KANCELT_tp3';

try {
    $monPdo = new PDO("mysql:$hostnom;dbname=$bdd;charset=utf8" , $usernom,$password);
    $monPdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch ( PDOException $e) {
        echo $e->getMessage();
        $monPdo = null;
    }
?>
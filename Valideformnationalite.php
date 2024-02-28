<?php
include "header.php";
include "connexionPdo.php";

$action = $_GET['action'];
$num = $_POST['num'];
$libelle = $_POST['libelle'];
$continent=$_POST['continent'];

if ($action == "Modifier") {
    $req = $monPdo->prepare("UPDATE nationalite SET libelle = :libelle, numcontinent= :continent WHERE num = :num");
    $req->bindParam(':num', $num);
    $req->bindParam(':libelle', $libelle);
    $req->bindParam(':continent', $continent);
} else {
    $req = $monPdo->prepare("INSERT INTO nationalite(libelle,numcontinent) VALUES(:libelle, :continent)");
    $req->bindParam(':libelle', $libelle);
    $req->bindParam(':continent', $continent);
}

$nb = $req->execute();
$message = $action == "Modifier" ? "modifiée" : "ajoutée";

echo '<div class="container mt-5">';
echo '<div class="row">
    <div class="col mt-5">';

if ($nb == 1) {
    echo '<div class="alert alert-success" role="alert">
    La nationalité a bien été ' . $message . '</div>';
} else {
    echo '<div class="alert alert-danger" role="alert">
    La nationalité n\'a pas été ' . $message . '</div>';
}

echo '</div>
</div>
<a href="listeNationalites.php" class="btn btn-primary">Revenir à la liste des nationalités</a>
</div>';

include "footer.php";
?>

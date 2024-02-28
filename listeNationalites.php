<?php
include "header.php";
include "connexionPdo.php";

// Liste des nationalités
$libelle = "";
$continentSel = "Tous";

// Construction de la requête
$textereq = "select n.num, n.libelle as 'libnation', c.libelle as 'libcontinent' from nationalite n, continent c where n.numcontinent = c.num";

if (!empty($_GET)) {
    $libelle = $_GET['libelle'];
    $continentSel = $_GET['continent'];

    if ($libelle != "") {$textereq .= " and n.libelle like '%" . $libelle . "%'";}
    if ($continentSel != "Tous") {$textereq .= " and c.num = " . $continentSel;}
}

$textereq .= " order by n.libelle";

$req = $monPdo->prepare($textereq);
$req->setFetchMode(PDO::FETCH_OBJ);
$req->execute();
$lesnationalites = $req->fetchAll();

// Liste des continents
$reqcontinent = $monPdo->prepare("select * from continent");
$reqcontinent->setFetchMode(PDO::FETCH_OBJ);
$reqcontinent->execute();
$lescontinents = $reqcontinent->fetchAll();

if (!empty($_SESSION['message'])) {
    $mesmessages = $_SESSION['message'];
    foreach ($mesmessages as $key => $message) {
        echo '<div class="container pt-5">
                <div class="alert alert-' . $key . ' alert-dismissible fade show" role="alert">' . $message . '
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            </div>';
    }
    $_SESSION['message'] = [];
}
?>

<div class="container mt-5">
    <div class="row pt-3">
        <div class="col-9">
            <h2>Liste des nationalités</h2>
        </div>
        <div class="col-3">
            <a href="formnationalite.php?action=Ajouter" class="btn btn-success">
                <i class="fas fa-plus-circle"></i> Créer une nationalité
            </a>
        </div>
    </div>

    <form action="" method="get" class="border border-primary rounded p-3 mt-3 mb-3">
        <div class="row">
            <div class="col">
                <input type="text" name="libelle" placeholder="Rechercher par libellé" class="form-control"
                       value="<?= $libelle ?>">
            </div>
            <div class="col">
                <select name="continent" class="form-control">
                    <option value="Tous" <?= ($continentSel == "Tous") ? "selected" : "" ?>>Tous les continents</option>
                    <?php
                    foreach ($lescontinents as $continent) {
                        echo '<option value="' . $continent->num . '" ' . (($continentSel == $continent->num) ? "selected" : "") . '>' . $continent->libelle . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="col">
                <button type="submit" class="btn btn-success btn-block"> Rechercher</button>
            </div>
        </div>
    </form>


    <table class="table table-hover table-striped">
  <thead>
    <tr class="d-flex">
      <th scope="col"class="col-md-2">Numéro</th>
      <th scope="col"class="col-md-5">Libellé</th>
      <th scope="col"class="col-md-3">Continent</th>
      <th scope="col"class="col-md-2">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach($lesnationalites as $nationalite){
        echo "<tr class='d-flex'>";

            echo "<td class='col-md-2'>$nationalite->num</td>";
            echo "<td class='col-md-5'>$nationalite->libnation</td>";
            echo "<td class='col-md-3'>$nationalite->libcontinent</td>";
            echo "<td class='col-md-2'>
                <a href='formnationalite.php?action=Modifier&num=$nationalite->num' class='btn btn-primary'><i class='fas fa-pen'></i></a>
                <a href='#modalsuppression' data-toggle='modal'data-suppression='supprimernationalite.php?num=$nationalite->num' class='btn btn-danger'><i class='far fa-trash-alt'></i></a>
            </td>";
        echo "</tr>";


    }
    

    ?>
 
   
    
  </tbody>
</table>    






<?php include "footer.php";
?>
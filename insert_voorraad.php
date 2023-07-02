<html>
    <head>
        <link rel="stylesheet" href="herkansing.css">
    </head>
    <header>
            <div class="circle"></div>
            <div class="circles"></div>
            <a href="#" class="logo">TELEFOON ZAAK <span>ORGI  </span></a>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="producten.php">producten</a></li>
                <li><a href="voorraad.php">Voorraad</a></li>
                <li><a href="bestellingen.php">bestellingen</a></li>
</ul>

 
         
        </header>
</html>
<?php
require_once('functions.php');
if(isset($_POST) && isset($_POST['btn_toevoegen'])){
    $productnaam = $_POST['productnaam'];
    $prijs = $_POST['prijs'];
    $leveranciers_idleverancier = $_POST['leveranciers_idleverancier'];
    $categorieen_idcategorie = $_POST['categorieen_idcategorie'];
    $foto = $_POST['foto'];
    $idproduct = $_POST['idproduct'];

    insert_bier($idproduct, $productnaam, $prijs, $categorieen_idcategorie, $leveranciers_idleverancier, $foto);
    header('Location: crud_bieren.php');
}
?>

<html>
<body>
<form method="post">
idproduct:<input type="text" name="idproduct" required><br>
productnaam:<input type="text" name="productnaam" required><br>
prijs:<input type="text" name="prijs" required><br>
leveranciers_idleverancier:<input type="text" name="leveranciers_idleverancier" required><br>
categorieen_idcategorie:<input type="text" name="categorieen_idcategorie" required><br>
foto:<input type="text" name="foto" required><br>
<br>

<input type="submit" name="btn_toevoegen" value="Voeg toe"><br>

</form>
</body>
</html>
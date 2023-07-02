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
 echo "<h1>Delete Bier</h1>";
 require_once('functions.php');
 if(isset($_POST) && isset($_POST['btn_wzg'])){

 DeleteBier($_POST);
 header('Location: voorraad.php');
 }
 if(isset($_GET['idproduct']))

 {

echo "Data uit het vorige formulier:<br>";

 $idproduct = $_GET['idproduct'];

 $row = GetBier($idproduct);

}
?>

<html>
<body>
<form method="post">
idproduct:<input type="" name="idproduct" value="<?php echo $row['idproduct'];?>" readonly><br>
productnaam:<input type="" name="productnaam" value="<?php echo $row['productnaam'];?>" readonly><br>
prijs: <input type="text" name="prijs" value="<?= $row['prijs']?>" readonly><br>
leveranciers_idleverancier: <input type="text" name="leveranciers_idleverancier" value="<?= $row['leveranciers_idleverancier']?>" readonly><br>
categorieen_idcategorie: <input type="text" name="categorieen_idcategorie" value="<?= $row['categorieen_idcategorie']?>" readonly><br>
foto: <input type="text" name="foto" value="<?= $row['foto']?>" readonly><br><br>


<input type="submit" name="btn_wzg" value="Delete"><br>

</form>
</body>
</html>
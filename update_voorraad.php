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
    echo "<h1>Update Bier</h1>";
    require_once('functions.php');

    // Test of er op de wijzig-knop is gedrukt 
    if(isset($_POST) && isset($_POST['btn_wzg'])){
        UpdateBier($_POST);

        //header("location: update_voorraad.php?$_POST[NR]");
    }

    if(isset($_GET['idproduct'])){  
        echo "Data uit het vorige formulier:<br>";
        // Haal alle info van de betreffende idproduct $_GET['idproduct']
        $idproduct = $_GET['idproduct'];
        $row = GetBier($idproduct);
    }
   ?>

<html>
    <body>
        <form method="post">
        <br>
        idproduct:<input type="" name="idproduct" value="<?php echo $row['idproduct'];?>"><br>
        productnaam:<input type="" name="productnaam" value="<?php echo $row['productnaam'];?>"><br> 
        prijs: <input type="text" name="prijs" value="<?= $row['prijs']?>"><br>
        leveranciers_idleverancier: <input type="text" name="leveranciers_idleverancier" value="<?= $row['leveranciers_idleverancier']?>"><br>
        categorieen_idcategorie: <input type="text" name="categorieen_idcategorie" value="<?= $row['categorieen_idcategorie']?>"><br>
        foto: <input type="text" name="foto" value="<?= $row['foto']?>"><br><br>
        <input type="submit" name="btn_wzg" value="Wijzigen" onclick="window.location.href='voorraad.php'"><br>
        </form>
    </body>
</html>
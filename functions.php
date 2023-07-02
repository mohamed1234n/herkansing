<?php
// auteur: yasin
// functie: algemene functies tbv hergebruik
 function ConnectDb(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "esri";
   
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        echo "Connected successfully";
        return $conn;
    } 
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

 }

 
 
 function GetData($table){
    // Connect database
    $conn = ConnectDb();

    // Select data uit de opgegeven table methode query
    // query: is een prepare en execute in 1 zonder placeholders
    // $result = $conn->query("SELECT * FROM $table")->fetchAll();

    // Select data uit de opgegeven table methode prepare
    $query = $conn->prepare("SELECT * FROM $table");
    $query->execute();
    $result = $query->fetchAll();

    return $result;
 }

 function GetBier($idproduct){
    // Connect database
    $conn = ConnectDb();

    // Select data uit de opgegeven table methode query
    // query: is een prepare en execute in 1 zonder placeholders
    // $result = $conn->query("SELECT * FROM $table")->fetchAll();

    // Select data uit de opgegeven table methode prepare
    $query = $conn->prepare("SELECT * FROM producten WHERE idproduct = :idproduct");
    $query->execute([':idproduct'=>$idproduct]);
    $result = $query->fetch();

    return $result;
 }


 function OvzBieren(){

    // Haal alle bier record uit de tabel 
    $result = GetData("producten");
    
    //print table
    PrintTable($result);
    //PrintTableTest($result);
    
 }

 function OvzBrouwers(){
    // Haal alle bier record uit de tabel 
    $result = GetData("brouwer");
    
    //print table
    PrintTable($result);
     
 }

 function dropDown($label, $data) {
    foreach($data as $row){
        $text = "<option value= '$row[foto]'$row[foto]</option>";
        echo $text;

/*
        <option value='volvo'>Volvo</option>
        <option value='saab'>Saab</option>
        <option value='mercedes'>Mercedes</option>
        <option value='audi'>Audi</option>
*/ 

$text .= "</select>";

echo "$text";

    }
 }

 function insert_bier($idproduct, $productnaam, $prijs, $leveranciers_idleverancier, $categorieen_idcategorie, $foto) {
    $conn = ConnectDb();
    
    $query = $conn->prepare("INSERT INTO producten (idproduct, productnaam, prijs, categorieen_idcategorie, leveranciers_idleverancier, foto ) 
    VALUES (:idproduct, :productnaam, :prijs, :categorieen_idcategorie, :leveranciers_idleverancier, :foto)");
    $query->execute([
        ':idproduct'=>$idproduct, ':productnaam' => $productnaam, 
        ':prijs' => $prijs, ':categorieen_idcategorie' => $categorieen_idcategorie, ':leveranciers_idleverancier' => $leveranciers_idleverancier, ':foto' => $foto ]);
    
    return $query->rowCount() === 1; // return true if a single row was affected
}

 function PrintTableTest($result){
    // Zet de hele table in een variable en print hem 1 keer 
    $table = "<table border = 1px>";
    // print elke rij
    foreach ($result as $row) {
        echo "<br> rij:";
        
        foreach ($row as  $value) {
            echo "kolom" . "$value";
        }          
        
    }
}

// Function 'PrintTable' print een HTML-table met data uit $result.
function PrintTable($result){
    // Zet de hele table in een variable en print hem 1 keer 
    $table = "<table border = 1px>";

    // Print header table

    // haal de kolommen uit de eerste [0] van het array $result mbv array_keys
    $headers = array_keys($result[0]);
    $table .= "<tr>";
    foreach($headers as $header){
        $table .= "<th bgcolor=gray>" . $header . "</th>";   
    }

    // print elke rij
    foreach ($result as $row) {
        
        $table .= "<tr>";
        // print elke kolom
        foreach ($row as $cell) {
            $table .= "<td>" . $cell . "</td>";
        }
        $table .= "</tr>";
    }
    $table.= "</table>";

    echo $table;
}

function CrudBieren(){

   echo '<a href="insert_voorraad.php">Insert voorraad</a>';
   
    // Haal alle bier record uit de tabel 
    $result = GetData("producten");
    
    //print table
    PrintCrudBier($result);
    
 }
function PrintCrudBier($result){
    // Zet de hele table in een variable en print hem 1 keer 
    $table = "<table border = 1px>";

    // Print header table

    // haal de kolommen uit de eerste [0] van het array $result mbv array_keys
    $headers = array_keys($result[0]);
    $table .= "<tr>";
    foreach($headers as $header){
        $table .= "<th bgcolor=gray>" . $header . "</th>";   
    }

    // print elke rij
    foreach ($result as $row) {
        
        $table .= "<tr>";
        // print elke kolom
        foreach ($row as $cell) {
            $table .= "<td>" . $cell . "</td>";
        }
        // $table .= "</tr>";
        
        // Wijzig knopje
        $table .= "<td>". 
            "<form method='post' action='update_voorraad.php?idproduct=$row[idproduct]' >       
                    <button name='wzg'>Wzg</button>	 
            </form>" . "</td>";

        // Delete via linkje href
        $table .= '<td><a href="delete_voorraad.php?idproduct='.$row["idproduct"].'">verwijder</a></td>';
        $table .= '<td><a href="insert_voorraad.php?idproduct='.$row["idproduct"].'">Insert</a></td>';
        
        $table .= "</tr>";
    }
    $table.= "</table>";

    echo $table;
}

function UpdateBier($row){
    echo "Update row<br>";

    $conn = ConnectDb();

    $sql = "UPDATE `producten` 
    SET 
    `productnaam` = '$row[productnaam]', 
    `prijs` = '$row[prijs]', 
    `categorieen_idcategorie` = '$row[categorieen_idcategorie]', 
    `leveranciers_idleverancier` = '$row[leveranciers_idleverancier]', 
    `foto` = '$row[foto]'
    WHERE `producten`.`idproduct` = $row[idproduct]";
    $query = $conn->prepare($sql);
    $query->execute();
}

function DeleteBier($row){
    echo "delete row<br>";

    $conn = ConnectDb();

    $sql = "DELETE 
    FROM producten
    WHERE `producten`.`idproduct` = $row[idproduct]";
    $query = $conn->prepare($sql);
    $query->execute();
}


?>
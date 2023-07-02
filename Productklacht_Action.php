   
   <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Website</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <section>
    <header>
            <div class="circle"></div>
            <div class="circles"></div>
            <a href="#" class="logo">ESRI-<span>digitaal</span></a>
            <ul>
                <li><a href="index.php">Home</a></li>
             
                <li><a href="Producten.php">Producten</a></li>
                <li><a href="voorraad.php">Voorraad</a></li>
                <li><a href="bestellingen.php">bestellingen</a></li>
            </ul>
    
        </header>



        <h1>Uw klacht is verstuurd naar onze medewerkers! Dit is wat er is opgestuurd:</h1>
        <div class="background_image">
            <img src="image/background_image.webp">
        </div>


<!-- product complaint action page php code -->
<?php

function connectdb() {
    try {
        $db = new PDO("mysql:host=localhost;dbname=esri", "root", "");
        return $db;
    } catch (PDOException $e) {
        die("ERROR: " . $e->getMessage());
    }
}

function printtable() {
    echo "<div class='productklacht_action_container'><table>";
    echo "<tr><th>Voornaam: </th><td>" . $_POST["f_name"] . "</td></tr>";
    echo "<tr><th>Achternaam: </th><td>" . $_POST["l_name"] . "</td></tr>";
    echo "<tr><th>Telefoonnummer: </th><td>" . $_POST["phone"] . "</td></tr>";
    echo "<tr><th>Email: </th><td>" . $_POST["email"] . "</td></tr>";
    echo "<tr><th>Gender: </th><td>" . $_POST["gender"] . "</td></tr>";
    echo "<tr><th>Product: </th><td>" . $_POST["product_naam"] . "</td></tr>";
    echo "<tr><th>Het probleem: </th><td>" . $_POST["klacht_beschrijving"] . "</td></tr>";
    echo "<tr><th>De oplossing: </th><td>" . $_POST["klacht_oplossing"] . "</td></tr>";
    echo "</table></div>";
}

function queryinsert($conn) {
    $fname = $_POST["f_name"];
    $lname = $_POST["l_name"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $gender = $_POST["gender"];
    $product = $_POST["product_naam"];
    $probleem = $_POST["klacht_beschrijving"];
    $oplossing = $_POST["klacht_oplossing"];
    // query insert
    $queryinsert = $conn->prepare("INSERT INTO productklachten(voornaam, achternaam, telefoon, email, gender, product, probleem, oplossing) VALUES ('$fname', '$lname', '$phone', '$email', '$gender', '$product', '$probleem', '$oplossing')");
    $queryinsert->execute();
}

printtable();
$conn = connectdb();

if (isset($_POST["submit_btn"])) {
    queryinsert($conn);
}

?>

</main>

</section>

<footer class="footer">
        <div class="main">
            <div class="row">
                    
                <div class="footer_col">
                    <h4>Klantenservice</h4>
                    <ul>
                     
                        <li><a href="Contact.php">Contact</a></li>
                        <li><a href="Klacht.php">Klacht indienen?</a></li>
                        <li><a href="Review.php">Review</a></li>
                    </ul>
                </div>

            
                    
              
        </div>
    </footer>



</body>
</html>

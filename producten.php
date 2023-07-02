<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Website</title>
    <link rel="stylesheet" href="herkansing.css">
</head>  
<body>


    <section>
    <header>
            <div class="circle"></div>
            <div class="circles"></div>
            <a href="#" class="logo">TELEFOON ZAAK-<span>ORGI</span></a>
            <ul>
             
                <li><a href="index.php">Home</a></li>
            
                <li><a href="Producten.php">Producten</a></li>
                <li><a href="voorraad.php">Voorraad</a></li>
                <li><a href="bestellingen.php">bestellingen</a></li>
            </ul>

         
         
        </header>



        <div class="texts">
            <h1>TELEFOON ZAAK <span>ORGI</span></h1>
            <p>Voor ons is een goede service het allerbelangrijkste. Wanneer jij je abonnement op je favoriete telefoon
                 wilt verlengen <br> of een nieuwe telefoon wilt kopen, dan wil je niet lang wachten op je telefoon. <br>
                  Daarom is het onze missie om onze telefoons zo snel mogelijk uit te leveren. <br> Alle producten van TELEFOON ZAAK ORGI
                   leveren wij rechtstreeks vanuit onze leveranciers. <br> Snel, betrouwbaar en geen extra kosten. Wij garanderen je 
                   bovendien dat alle telefoons die je bij ons aanschaft altijd werken! <br> Loop je tegen een probleem aan? Dan staat onze
                    helpdesk voor je klaar om je zo goed mogelijk van dienst te zijn. <br> Omdat wij een officiële verkoper zijn en onze
                     eigen afspraken hebben met de aanbieders van onze telefoons, <br> kunnen wij de scherpste prijs en beste service aanbieden.<br>
                
            </p>
        </div> 
        <?php
         include 'functions.php';
        $result = GetData("producten");
       
       ?>

        
    </section>
    <div class="Cards">
            <h1>Products</h1>
            <p>----Trending Aankopen----</p>
            <div class="cards_box">

           <?php foreach ($result as $row){ ?>
                <div class="cards_card">
                    <img src="image/<?php echo $row ['foto'] ?>" >
                    <h1> <?php echo $row ['productnaam']?> </h1>
                    
                    <p>
                    <?php echo $row ['toelichting']?>
                    </p>
                    <a href="#" class="btn">Uitverkocht</a>
                </div>
            <?php } ?>

              

    



    

        <footer class="footer">
        <div class="main">
            <div class="row">
                       
              
        </div>
    </footer>



</body>
</html>

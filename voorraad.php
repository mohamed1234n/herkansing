<html>
    <head>
    <link rel="stylesheet" href="herkansing.css">
    </head>
    <body>
        
    <section>
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
        <?php
        // functie: programma overzicht bieren
        include 'functions.php';
// connect database bieren
        ConnectDb();
// print bieren
        CrudBieren();

        ?>
                    
                    <footer class="footer">
        <div class="main">
            <div class="row">
                    
                <div class="footer_col">
                    <ul>
                     
                        <li><a href="Klacht.php">Klacht indienen?</a></li>
                    
                    </ul>
                </div>

            
                    
              
        </div>
    </footer>
     


    </body>
</html>
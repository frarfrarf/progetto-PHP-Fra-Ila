<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Low budget travelling</title>
    <link rel="stylesheet" href="../style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

    <header class="header clearfix">
            <a href="https://www.airbnb.it/?c=.pi0.pk182361646_2299084126&gclsrc=aw.ds&&c=.pi0.pk182361646_2299084126&ghost=true&gad_source=1&gclid=EAIaIQobChMIyuqvgMPNhAMVPZODBx3dFAplEAAYASAAEgIrDPD_BwE" class="header_logo">⌂</a>
            <a href="" class="header_icon-bar">
                <span></span>
                <span></span>
                <span></span>
            </a>
            <ul class="header_menu animate" >
                <li class="header_menu_item"><a href="../index.php">Homepage</a></li>
                <li class="header_menu_item"><a href="Europa.php">Città europee</a></li>
                <li class="header_menu_item"><a href="Italia.php">Città italiane</a></li>
                <li class="header_menu_item"><a href="chi_siamo.php">Chi siamo</a></li>
                
            </ul>
    </header> 

    <section class="cover2">
        <div class="cover2_filter"></div>
        <div class="cover2_caption">
            <div class="cover2_caption_copy"> 
                <h2>Le nostre proposte</h2>
                <p> Scopri quali mete in Italia abbiamo selezionato!</p>
                
            </div>
        </div>
    </section>

    <section class="cards clearfix">
        <div class="card">

                <a href="bari.html"><img class="card_image" src="../immaginii/bari.jpg" alt="Nature"></a>
                <h3>Bari, Puglia</h3>

        </div>
        <div class="card">

                <a href="bergamo.html"><img class="card_image" src="../immaginii/bergamo.jpg" alt="Nature"></a>
                <h3>Bergamo, Lombardia</h3> 

        </div>
        <div class="card">

                <a href="catania.html"><img class="card_image" src="../immaginii/catania.jpg" alt="Nature"></a>
                <h3>Catania, Sicilia</h3>

        </div>
        <div class="card">

                <a href="costieramalfitana.html"><img class="card_image" src="../immaginii/costieramalfitana.jpg" alt="Nature"></a>
                <h3>Costiera Amalfitana, Campania</h3>

        </div>
        <div class="card">

                <a href="lecce.html"><img class="card_image" src="../immaginii/lecce.jpg" alt="Nature"></a>
                <h3>Lecce, Puglia</h3>

        </div>
        <div class="card">

                <a href="matera.html"><img class="card_image" src="../immaginii/matera.jpg" alt="Nature"></a>
                <h3>Matera, Basilicata</h3>

        </div>
        <div class="card">

                <a href="napoli.html"><img class="card_image" src="../immaginii/napoli.jpg" alt="Nature"></a>
                <h3>Napoli, Campania</h3>

        </div>
        <div class="card">

                <a href="palermo.html"><img class="card_image" src="../immaginii/palermo.jpg" alt="Nature"></a>
                <h3>Palermo, Sicilia</h3>

        </div>
        <div class="card">

                <a href="perugia.html"><img class="card_image" src="../immaginii/perugia.jpg" alt="Nature"></a>
                <h3>Perugia, Umbria</h3>

        </div>
        <div class="card">

                <a href="torino.html"><img class="card_image" src="../immaginii/torino.jpg" alt="Nature"></a>
                <h3>Torino, Piemonte</h3>

        </div>
    </section>

</body>



<footer class="footer">
    <p> Contattaci tramite il numero 329 417 5783, oppure scrivi all'indirizzo ilariafracesca@gmail.com per maggiori informazioni</p>
    <p> Copyright - Tieni Ilaria, Tornaghi Francesca</p>
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> 
    
    
    <script>
        $(document).ready(function(){
    
            $(".header_icon-bar").click(function(e){
    
                $(".header_menu").toggleClass('is-open');
                e.preventDefault();
            })
    
        });
    
    </script>  
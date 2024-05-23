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
                <p> Scopri quali mete in Europa abbiamo selezionato!</p>
                
            </div>
        </div>
    </section>


    <section class="cards clearfix">
        <div class="card">
                <a href="bucarest.html"><img class="card_image" src="../immaginii/bucarest.jpg" alt="Nature"></a>
                <h3>Bucarest, Romania</h3>
        </div>
        <div class="card">
            
                <a href="budapest.html"><img class="card_image" src="../immaginii/budapest.jpg" alt="Nature"></a>
                <h3>Budapest, Ungheria</h3>
            
        </div>
        <div class="card">
            
                <a href="bratislava.html"><img class="card_image" src="../immaginii/bratislava.jpg" alt="Nature"></a>
                <h3>Bratislava, Slovacchia</h3>
            
        </div>
        <div class="card">
            
                <a href="cracovia.html"><img class="card_image" src="../immaginii/cracovia.jpg" alt="Nature"></a>
                <h3>Cracovia, Polonia</h3>
            
        </div>
        <div class="card">
            
                <a href="porto.html"><img class="card_image" src="../immaginii/porto.jpg" alt="Nature"></a>
                <h3>Porto, Portogallo</h3>
            
        </div>
        <div class="card">
            
                <a href="riga.html"><img class="card_image" src="../immaginii/riga.jpg" alt="Nature"></a>
                <h3>Riga, Lettonia</h3>
             
        </div>
        <div class="card">
            
                <a href="sarajevo.html"><img class="card_image" src="../immaginii/sarajevo.jpg" alt="Nature"></a>
                <h3>Sarajevo, Bosnia Erzegovina</h3>
             
        </div>
        <div class="card">
            
                <a href="sofia.html"><img class="card_image" src="../immaginii/sofia.jpg" alt="Nature"></a>
                <h3>Sofia, Bulgaria</h3>
            
        </div>
        <div class="card">
            
                <a href="valencia.html"><img class="card_image" src="../immaginii/valencia.jpg" alt="Nature"></a>
                <h3>Valencia, Spagna</h3>
             
        </div>
        <div class="card">
            
                <a href="varsavia.html"><img class="card_image" src="../immaginii/varsavia.jpg" alt="Nature"></a>
                <h3>Varsavia,Polonia </h3>
           
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
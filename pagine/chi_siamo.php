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
                <li class="header_menu_item"><a href="login.php">Login</a></li>
                <li class="header_menu_item"><a href="profilo.php">Profilo</a></li>
                
    
            </ul>
            
     </header>
    
     <section class="cover3">
        <div class="cover3_filter"></div>
        <div class="cover3_caption">
            <div class="cover3_caption_copy"> 
                <h2>Chi siamo?</h2>
                <p>Due ragazze che amano viaggiare e hanno scelto di condividere i loro consigli con il web, perché certe esperienze sono meglio se condivise!! </p>
            </p>
                
            </div>
        </div>
    </section>
    
    <section class="banner2 clearfix">
        
        <div class="banner2_copy">
            <div class="banner2_copy_text">
                <h3>Tieni Ilaria</h3>
                <h4>travel blogger</h4>
                <p>"Travel: the only thing you buy that makes you richer"</p>
                <a href="https://www.instagram.com/ilariatieni/" class="button2">ig: ilariatieni</a>
            </div>  
        </div>
        <div class="banner2_image"></div>
    </section>

    <section class="banner3 clearfix">
        <div class="banner3_image"></div>
        <div class="banner3_copy">
            <div class="banner3_copy_text">
                <h3>Tornaghi Francesca</h3>
                <h4>photographer</h4>
                <p>"A curious girl, a wanderer..."</p>
                <a href="https://www.instagram.com/francesca_tornaghi/" class="button2">ig: francesca_tornaghi</a>
            </div>  
        </div> 
        
    </section>
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

    <?php
        require("footer.php");
    ?>

</body>
</html>






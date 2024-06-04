<?php
	
    session_start();
    //echo session_id();

    if(!isset($_SESSION['username'])){
        header('Refresh: 5; URL=login.php');
        die(" ERRORE! Accedere o registrarsi per visualizzare le mete.");
    }
    $username = $_SESSION["username"];
    //echo $username;

    require('connessione.php');

    $strmodifica = "Modifica";
    $strconferma = "Conferma";

    $modifica = false;
    if (isset($_POST["pulsante_modifica"])) {
        if($_POST["pulsante_modifica"] == $strmodifica){
            $modifica = true;
        } else {
            $modifica = false;
        }

        if ($modifica == false){
            $sql = "UPDATE utenti
                    SET password = '".$_POST["password"]."', 
                        nome = '".$_POST["nome"]."', 
                        cognome = '".$_POST["cognome"]."', 
                        email = '".$_POST["email"]."',
                        comune = '".$_POST["comune"]."', 
                        indirizzo = '".$_POST["indirizzo"]."' 
                    WHERE username = '".$username."'";
            if($conn->query($sql) === true) {
                //echo "Record updated successfully";
            } else {
                echo "Error updating record: " . $conn->error;
            }
        }
    }

    if (isset($_POST['cod'])) {
        $preferiti = $_POST['cod']; // Inizializza $preferiti con l'array dei codici dei preferiti
        foreach($preferiti as $cod) { // Scorri l'array dei preferiti
            //echo $cod . '<br/>';
            $sql = "UPDATE preferiti
                    SET username = NULL
                    WHERE cod = '".$cod."'";
            $conn->query($sql) or die("<p>Query fallita!!</p>");
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<title>Profilo</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
<header class="header clearfix">
    <a href="https://www.airbnb.it/?c=.pi0.pk182361646_2299084126&gclsrc=aw.ds&&c=.pi0.pk182361646_2299084126&ghost=true&gad_source=1&gclid=EAIaIQobChMIyuqvgMPNhAMVPZODBx3dFAplEAAYASAAEgIrDPD_BwE" class="header_logo">⌂</a>
    <a href="" class="header_icon-bar">
        <span></span>
        <span></span>
        <span></span>
    </a>
    <ul class="header_menu animate">
        <li class="header_menu_item"><a href="../index.php">Homepage</a></li>
        <li class="header_menu_item"><a href="Europa.php">Città europee</a></li>
        <li class="header_menu_item"><a href="Italia.php">Città italiane</a></li>
        <li class="header_menu_item"><a href="chi_siamo.php">Chi siamo</a></li>
        <li class="header_menu_item"><a href="logout.php">Logout</a></li>
    </ul>
</header>

<div class="contenuto">
    <h1 style = "text-align: center">Dati Personali</h1>
    <?php
        $sql = "SELECT username, password, nome, cognome, email, comune, indirizzo 
            FROM utenti 
            WHERE username='$username'";
        //echo $sql;
        $ris = $conn->query($sql) or die("<p>Query fallita!!!</p>");
        $row = $ris->fetch_assoc();
    ?>
    <form action="" method="post">
        <table id="tab_dati_personali" style="margin: auto">
            <tr>
                <td>Username:</td> <td><input class="input_dati_personali" type="text" name="username" value="<?php echo $row["username"]; ?>" disabled="disabled"></td>
            </tr>
            <tr>
                <td>Password:</td> <td><input class="input_dati_personali" type="text" name="password" value="<?php echo $row["password"]; ?>" <?php if(!$modifica) echo "disabled='disabled'"?>></td>
            </tr>
            <tr>
                <td>Nome:</td> <td><input class="input_dati_personali" type="text" name="nome" value="<?php echo $row["nome"]; ?>" <?php if(!$modifica) echo "disabled='disabled'"?>></td>
            </tr>
            <tr>
                <td>Cognome:</td> <td><input type="text" class="input_dati_personali" name="cognome" value="<?php echo $row["cognome"]; ?>" <?php if(!$modifica) echo "disabled='disabled'"?>></td>
            </tr>
            <tr>
                <td>Email:</td> <td><input type="text" class="input_dati_personali" name="email" value="<?php echo $row["email"]; ?>" <?php if(!$modifica) echo "disabled='disabled'"?>></td>
            </tr>
            <tr>
                <td>Comune:</td> <td><input type="text" class="input_dati_personali" name="comune" value="<?php echo $row["comune"]; ?>" <?php if(!$modifica) echo "disabled='disabled'"?>></td>
            </tr>
            <tr>
                <td>Indirizzo:</td> <td><input type="text" class="input_dati_personali" name="indirizzo" value="<?php echo $row["indirizzo"]; ?>" <?php if(!$modifica) echo "disabled='disabled'"?>></td>
            </tr>
        </table>
        <p style="text-align: center">
            <input type="submit" name="pulsante_modifica" value="<?php if($modifica==false) echo $strmodifica; else echo $strconferma; ?>">
        </p>
    </form>	
	
    <h1 style = "text-align: center">Mete preferite</h1>
    <div class="cards">
        <?php
            require("connessione.php");
            $sql = "SELECT città.cod, città.nome, stato_regione, foto
                    FROM utenti JOIN preferiti ON utenti.username = preferiti.username
                                    JOIN città ON preferiti.cod = città.cod
                    WHERE utenti.username='$username'";
                    
            $ris = $conn->query($sql) or die("<p>Query fallita</p>");
            if ($ris->num_rows == 0) {
                echo "<p>Non ci sono mete preferite</p>";
            }else{
                // echo "<form action='' method='post'>";
                    foreach($ris as $riga){
                        $cod = $riga["cod"];
                        $nome = $riga["nome"];
                        $foto = $riga["foto"];
                        $stato_regione = $riga["stato_regione"];

                        echo <<<EOD
                        <div class="card">
                            <a href="città.php?cod=$cod"><img class="card_image" src="../immaginii/$foto" alt="$nome"></a>
                            <h3>$nome</h3>
                        </div>
                        EOD;
                    }
                // echo "<p style='text-align: center; padding-top: 10px'><input type='submit' value='Conferma'/></p>";
                // echo "</form>";
            }
        ?>
    </div>
</div>
</body>
    <?php
        require("footer.php");
    ?>
</html>
<?php
session_start();
if (!isset($_SESSION["username"])) {
    header('Refresh: 5; URL=login.php');
    die("Accedere o registrarsi per visualizzare le mete.");
} else {
    $username = $_SESSION["username"];
    require("connessione.php");

    if (!isset($_GET["cod"])) {
        die("Errore!");
    } else {
        $cod = $_GET["cod"];

        // Query corretta
        $sql = "SELECT cod, nome, foto, descrizione, stato_regione
                FROM città
                WHERE cod = ?";

        // Preparare la query per evitare SQL injection
        $stmt = $conn->prepare($sql);
        if ($stmt === false) {
            die("<p>Preparazione della query fallita!</p>");
        }

        // Bind dei parametri e esecuzione
        $stmt->bind_param("s", $cod);
        $stmt->execute();
        $ris = $stmt->get_result();

        if ($ris->num_rows > 0) {
            $riga = $ris->fetch_assoc();
            $nome = $riga['nome'];
            $descrizione = $riga['descrizione'];
            $stato_regione = $riga["stato_regione"];
            $foto = $riga["foto"];
        } else {
            echo "<p>Nessun risultato trovato!</p>";
        }

        $stmt->close();
    }

    // Gestione preferiti
    if (isset($_POST['add_to_favorites'])) {
        require("connessione.php");
        $sql = "UPDATE utenti SET preferiti = ? WHERE username = ?";
        $stmt = $conn->prepare($sql);
        if ($stmt === false) {
            die("<p>Preparazione della query fallita!</p>");
        }
        $stmt->bind_param("ss", $cod, $username);
        $stmt->execute();
        $stmt->close();
        $conn->close();
    }
    
    // Controllo se la città è nei preferiti dell'utente
    $preferiti = null;
    $sql = "SELECT preferiti FROM utenti WHERE username = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt !== false) {
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->bind_result($preferiti);
        $stmt->fetch();
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<title>pagina città</title>
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
    </ul>
</header>

<div class="citta">
    <h1 style="text-align: center; margin-top: 0px; padding-top: 10px"><?php echo htmlspecialchars($nome); ?></h1>
    <form method="post">
        <button type="submit" name="add_to_favorites">
            <?php echo strpos($preferiti, $cod) !== false ? "♥" : "♡"; ?>
        </button>
    </form>
    <div class="copertina-fr">
        <?php echo "<img class='citta_immagine' src='../immaginii/" . htmlspecialchars($foto) . "' alt='" . htmlspecialchars($nome) . "'>"; ?>
    </div>
    <div class="citta_text">
        <?php
        if ($descrizione) {
            $paragrafi = explode("\n", $descrizione);
            foreach ($paragrafi as $paragrafo) {
                echo "<p>" . htmlspecialchars($paragrafo) . "</p>";
            }
        }
        ?>
    </div>
</div>

</body>
</html>
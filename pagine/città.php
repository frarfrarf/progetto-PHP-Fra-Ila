<?php
session_start();
if (!isset($_SESSION["username"])) {
    header('Refresh: 5; URL=login.php');
    die("ERRORE! Accedere o registrarsi per visualizzare le mete.");
}

$username = $_SESSION["username"];
require("connessione.php");

if (!isset($_GET["cod"])) {
    die("Errore!");
}

$cod = $_GET["cod"];

// Query corretta per ottenere le informazioni della città
$sql = "SELECT cod, nome, foto, descrizione, stato_regione FROM città WHERE cod = ?";
$stmt = $conn->prepare($sql);
if ($stmt === false) {
    die("<p>Preparazione della query fallita!</p>");
}

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

// Gestione preferiti
if (isset($_POST['add_to_favorites'])) {
    // $is_favorite = false;

    // qui fai una query per vedere com'è nel db
    // oppure con $ce = true false
    $sql = "SELECT cod, username 
            FROM preferiti
            WHERE cod = '$cod' AND username = '$username'";
    // $is_favorite = true false;
    $ris = $conn->query($sql) or die("Query fallita");
    // if rows > 0 ce quindi tolgo, se no aggiungo
    if($ris->num_rows > 0){
        // $add_to_favorites = false;
        $is_favorite = false;
        // $_POST['add_to_favorites'] = NULL;
        // $_POST['add_to_favorites'] = "";
        
        $sql = "DELETE FROM preferiti
        WHERE cod = '$cod' AND username = '$username'";
        $ris = $conn->query($sql) or die("<p>Query fallita!".$conn->error."</p>");
    } else{
        // $add_to_favorites = true;
        $is_favorite = true;

        $sql = "INSERT INTO preferiti (username, cod) VALUES (?, ?) ON DUPLICATE KEY UPDATE cod = ?";
        $stmt = $conn->prepare($sql);
        if ($stmt === false) {
            die("<p>Preparazione della query fallita!</p>");
        }
        $stmt->bind_param("sss", $username, $cod, $cod);
        $stmt->execute();
        $stmt->close();
    }
    
    // se è già preferito fai un altra query per toglierlo

    // se no fai quello che già c'è

}

// Controllo se la città è nei preferiti dell'utente
$is_favorite = false;
$sql = "SELECT * FROM preferiti WHERE username = ? AND cod = ?";
$stmt = $conn->prepare($sql);
if ($stmt !== false) {
    $stmt->bind_param("ss", $username, $cod);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $is_favorite = true;
    }
    $stmt->close();
}

$conn->close();
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
        <li class="header_menu_item"><a href="logout.php">Logout</a></li>
        <li class="header_menu_item"><a href="profilo.php">Profilo</a></li>
    </ul>
</header>

<div class="citta">
    <h1 style="text-align: center; margin-top: 0px; padding-top: 10px"><?php echo htmlspecialchars($nome); ?></h1>
    <form method="post">
        <button type="submit" name= "add_to_favorites">
            <?php echo $is_favorite ? "♥" : "♡"; ?>
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
<?php
        require("footer.php");
    ?>
</html>
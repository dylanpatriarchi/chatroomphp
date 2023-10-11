<?php
$targetDirectory = "uploads/";
$targetFile = $targetDirectory . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;

// Verifica se il file è un'immagine reale
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        echo "Il file è un'immagine - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "Il file non è un'immagine.";
        $uploadOk = 0;
    }
}

// Verifica se il file esiste già
if (file_exists($targetFile)) {
    echo "Spiacenti, il file esiste già.";
    $uploadOk = 0;
}

// Verifica la dimensione del file
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Spiacenti, il file è troppo grande.";
    $uploadOk = 0;
}

// Consentire solo determinati formati di file (esempio: JPEG)
$allowedExtensions = ["jpg", "jpeg"];
$fileExtension = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
if (!in_array($fileExtension, $allowedExtensions)) {
    echo "Spiacenti, sono ammessi solo file JPG e JPEG.";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo "Spiacenti, il file non è stato caricato.";
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
        echo "Il file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " è stato caricato con successo.";
    } else {
        echo "Si è verificato un errore durante il caricamento del file.";
    }
}
?>

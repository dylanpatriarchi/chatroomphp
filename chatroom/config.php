<?php
// Informazioni di connessione al database

// Connessione al database MySQL
$db = new mysqli($db_host, $db_username, $db_password, $db_name, $port);

if ($db->connect_error) {
    die("Connessione al database fallita: " . $db->connect_error);
}

// Resto del codice per ottenere i messaggi dalla tabella del database
?>

<?php
// Includi il file di configurazione del database
include('config.php');

// Connessione al database MySQL
$db = new mysqli($db_host, $db_username, $db_password, $db_name);

if ($db->connect_error) {
    die("Connessione al database fallita: " . $db->connect_error);
}

$sql = "SELECT username, message, timestamp FROM chat_messages ORDER BY timestamp DESC LIMIT 10";
$result = $db->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<strong>" . $row['username'] . ":</strong> " . $row['message'] . " (" . $row['timestamp'] . ")<br>";
    }
} else {
    echo "Nessun messaggio in chat.";
}

$db->close();
?>

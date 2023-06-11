<?php
include_once "config.php";

// Pobierz wszystkie wiadomości grupowe z bazy danych
$sql = "SELECT * FROM group_messages ORDER BY timestamp ASC";
$query = mysqli_query($conn, $sql);
$output = "";

while($row = mysqli_fetch_assoc($query)){
    $sender_id = $row['sender_id'];
    $message = $row['message'];

    // Pobierz informacje o nadawcy wiadomości
    $sender_sql = "SELECT * FROM users WHERE unique_id = {$sender_id}";
    $sender_query = mysqli_query($conn, $sender_sql);
    $sender_row = mysqli_fetch_assoc($sender_query);
    $sender_name = $sender_row['fname'] . " " . $sender_row['lname'];

    // Wyświetl informacje o wiadomości
    $output .= '<div class="message">
                    <span class="sender">'.$sender_name.': </span>
                    <span class="content">'.$message.'</span>
                    <span class="timestamp">'.$timestamp.'</span>
                </div>';
}

echo $output;
?>
<?php
session_start();
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['msg'])) {
        $message = $_POST['msg'];
		$outgoing_id = $_SESSION['unique_id'];
        $sql = "INSERT INTO group_messages VALUES (NULL, {$outgoing_id}, '$message', CURRENT_TIMESTAMP)";

        if ($conn->query($sql) === TRUE) {
            
            $response = array('status' => 'success', 'message' => 'Wiadomość została zapisana.');
            echo json_encode($response);
        } else {
            
            $response = array('status' => 'error', 'message' => 'Wystąpił błąd podczas zapisywania wiadomości.');
            echo json_encode($response);
        }
    } else {
        
        $response = array('status' => 'error', 'message' => 'Brak parametru "msg" w żądaniu POST.');
        echo json_encode($response);
    }
} else {
    
    $response = array('status' => 'error', 'message' => 'Nieprawidłowa metoda żądania.');
    echo json_encode($response);
}
?>
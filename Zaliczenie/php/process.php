<?php
include 'config.php';

$data = array();
$json = array();
$sql = "SELECT CONCAT(`fname`, ' ', `lname`) as user, `message`, `timestamp` FROM group_messages as gr JOIN users as us ON `us`.`unique_id` = `gr`.`unique_id` ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data["user"] = $row["user"];
        $data["message"] = $row["message"];
        $data["timestamp"] = $row["timestamp"];
        array_push($json, $data);
    }
    echo json_encode(array('status' => 'success', 'messages' => $json));
} else {
    echo json_encode(array('status' => 'error', 'message' => 'Brak wiadomości'));
}

mysqli_close($conn);
?>

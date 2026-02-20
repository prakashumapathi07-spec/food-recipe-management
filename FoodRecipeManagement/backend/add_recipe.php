<?php
include 'config.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$title = trim($_POST['title']);
$description = trim($_POST['description']);
if (!empty($title) && !empty($description)) {
$stmt = $conn->prepare("INSERT INTO recipes (title, description)
VALUES (?, ?)");
$stmt->bind_param("ss", $title, $description);
if ($stmt->execute()) {
echo json_encode(["message" => "Recipe added
successfully!"]);
} else {
echo json_encode(["message" => "Error adding recipe."]);
}
$stmt->close();
} else {
echo json_encode(["message" => "All fields are required."]);
}
$conn->close();
?>
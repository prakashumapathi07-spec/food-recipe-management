<?php
include 'config.php';
$result = $conn->query("SELECT * FROM recipes ORDER BY id DESC");
if ($result->num_rows > 0) {
while ($row = $result->fetch_assoc()) {
echo '<div class="recipe-item">
<h4>' . htmlspecialchars($row['title']) . '</h4>
<p>' . htmlspecialchars($row['description']) . '</p>
<button class="editRecipe" data-id="' . $row['id'] . '" datatitle="' . htmlspecialchars($row['title']) . '" data-description="' .
htmlspecialchars($row['description']) . '">,¸`‘ Edit</button>
<button class="deleteRecipe" data-id="' . $row['id'] . '">¯_
Delete</button>
</div>';
}
} else {
echo '<p>No recipesfound.</p>';
}
$conn->close();
?>
<?php
include 'db.php';
session_start();

$sql = "SELECT posts.*, users.username FROM posts 
        JOIN users ON posts.user_id = users.id 
        ORDER BY created_at DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div class='post'>";
        echo "<h3>" . htmlspecialchars($row['title']) . "</h3>";
        echo "<p>" . nl2br(htmlspecialchars($row['content'])) . "</p>";
        echo "<small>By " . htmlspecialchars($row['username']) . " on " . $row['created_at'] . "</small>";

        if ($_SESSION['user_id'] == $row['user_id']) {
            echo "<div class='post-actions'>
                    <a href='delete_post.php?id=" . $row['id'] . "'>Delete</a>
                  </div>";
        }
        echo "</div>";
    }
} else {
    echo "<p>No posts yet.</p>";
}
?>

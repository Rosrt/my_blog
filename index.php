<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>My Blog</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="navbar">
    <span>Welcome, <?php echo $_SESSION['username']; ?> 👋</span>
    <div>
      <a href="logout.php">Logout</a>
    </div>
  </div>

  <div class="container">
    <h2>Write a Post</h2>
    <form action="add_post.php" method="POST">
      <input type="text" name="title" placeholder="Enter title" required>
      <textarea name="content" placeholder="Write your post..." required></textarea>
      <button type="submit">Post</button>
    </form>

    <h2>All Posts</h2>
    <div id="posts">
      <?php include 'get_post.php'; ?>
    </div>
  </div>

<script>
function fetchPosts() {
  fetch("get_post.php")
    .then(res => res.text())
    .then(data => {
      document.getElementById("post").innerHTML = data;
    });
}
setInterval(fetchPosts, 5000);
</script>
</body>
</html>

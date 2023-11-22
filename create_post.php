<?php
session_start();
if (empty($_SESSION['username'])) {
  header("location: ../login.php?message=belum_login");
}

include('header.php');

$username = ((isset($_SESSION['username']))) ? $_SESSION['username'] : "";
?>

<title>Create Post</title>
</head>

<body class="padding-large">

  <?php include('navbar.php') ?>

  <div class="create-post-header">
    <h2>Create New Post</h2>
    <p>Share your thoughts and start a new discussion!</p>
  </div>

  <div class="container">
    <div class="create-post-form">
      <form method="POST" action="addpost_proses.php">
        <div class="form-group">
          <label for="postTitle">Post Title</label>
          <input type="text" class="form-control" id="postTitle" name="postTitle" placeholder="Enter the title of your post">
        </div>

        <div class="form-group">
          <label for="postContent">Post Content</label>
          <textarea class="form-control" id="postContent" name="postContent" placeholder="Enter the content of your post"></textarea>
        </div>

        <input type="text" name="username" value="<?= $username ?>" hidden>

        <button type="submit" class="btn btn-create-post">Create Post</button>
      </form>
    </div>
  </div>

  <footer class="footer py-4 mt-5 black">
    <div class="container text-center">
      <p class="h5">Daniel Hasiando Sinaga (123210047)</p>
      <span class="text-white">Kriptografi <?= date('Y'); ?></span>
    </div>
  </footer>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
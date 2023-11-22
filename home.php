<?php
session_start();
include('header.php');
include('koneksi.php');
if (isset($_GET['id'])) {
  $id_post = $_GET['id'];
}

$username = ((isset($_SESSION['username']))) ? $_SESSION['username'] : "";
?>

<title>Forum</title>
<script>
  function cekLogin() {
    const login = (<?= $username == NULL ?>) ? false : true;
    if (!login) {
      Swal.fire({
        title: "Login terlebih dahulu",
        icon: "error",
      });

      return false;
    }
    // return true;
  }
</script>
</head>

<body class="padding-large">
  <?php include('navbar.php') ?>

  <div class="forum-header">
    <h1>FORUM</h1>
    <p>Join the conversation and discuss various topics with the community.</p>
  </div>

  <div class="container">
    <div class="row">
      <div class="col">
        <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
          </ol>
        </nav>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-md-8 d-flex justify-content-start">
        <nav aria-label="Page navigation example">
          <!-- <div class="container"> -->
          <ul class="pagination">
            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">4</a></li>
            <li class="page-item"><a class="page-link" href="#">5</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
          </ul>
          <!-- </div> -->
        </nav>
      </div>
      <div class="col-md-4 d-flex justify-content-end align-items-center">
        <a href="create_post.php" onclick="return cekLogin()" class="btn warna">Create New Post</a>
      </div>
    </div>
    <hr class="py-2">
  </div>

  <div class="container">

    <ul class="thread-list">
      <?php
      $sql    = "SELECT * FROM posts";
      $query    = mysqli_query($connect, $sql);
      $i = 1;

      while ($data = mysqli_fetch_array($query)) {
        $user = $data['user'];
        $time = strtotime($data['posted']);
        $tahun = date('Y', $time);
        $bulan = date('F', $time);
        $tanggal = date('d', $time);
      ?>
        <li class="thread-item">
          <div class="row d-flex align-items-center">
            <?php
            $sql2    = "SELECT * FROM users WHERE username = '$user'";
            $query2    = mysqli_query($connect, $sql2);

            while ($data2 = mysqli_fetch_array($query2)) {
            ?>
              <div class="col-md-2 text-center">
                <img src="<?= $data2['photo']; ?>" width="100" alt="Profile Image" class="img-fluid rounded-circle">
              </div>
            <?php } ?>

            <div class="col-md-10">
              <h4><a href="post.php?id=<?= $data['id']; ?>"><?= $data['postTitle']; ?></a></h4>
              <p class="post-date">Author: <?= $user; ?> | Date: <?= $tanggal . " " . $bulan . " " . $tahun; ?></p>
              <span class="post-preview"><?= $data['postContent']; ?></span class="">
            </div>
          </div>
        </li>
      <?php } ?>
    </ul>

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
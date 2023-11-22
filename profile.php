<?php
session_start();
include('header.php');
include('koneksi.php');

if(!(isset($_SESSION['username']) || isset($_GET['user']))){
  echo '<script>window.location.href = "home.php";</script>';
}
else if (isset($_SESSION['username'])){
  $username = $_SESSION['username'];
}
else if(isset($_GET['user'])){
  $username = $_GET['user'];
}


$sql    = "SELECT * FROM users WHERE username = '$username'";
$query    = mysqli_query($connect, $sql);
$i = 1;

while ($data = mysqli_fetch_array($query)) {
  $time = strtotime($data['joined']);
  $tahun = date('Y', $time);
  $bulan = date('F', $time);
  $tanggal = date('d', $time);
?>

  <title>Profile</title>
  </head>

  <body>

    <?php include('navbar.php') ?>

    <section class="mt-5 py-5">
      <div class="container">
        <div class="row">
          <div class="col">
            <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
              <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">User</li>
              </ol>
            </nav>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-4">
            <div class="card mb-4 profile-card">
              <div class="card-body text-center">
                <img src="<?= $data['photo']; ?>" alt="avatar" class="rounded-circle img-fluid profile-image">
                <h5 class="my-3"><?= $data['username']; ?></h5>
                <p class="text-muted mb-1">Joined: <?= $tanggal . " " . $bulan . " " . $tahun; ?></p>
              </div>
            </div>
          </div>

          <div class="col-lg-8">
            <div class="card mb-4 profile-card">
              <div class="card-body">
                <!-- Rincian Profil -->
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Full Name</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0"><?= $data['name']; ?></p>
                  </div>
                </div>
                <hr>

                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Email</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0"><?= $data['email']; ?></p>
                  </div>
                </div>
                <hr>

                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Phone</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0"><?= $data['phone']; ?></p>
                  </div>
                </div>
                <hr>

                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Address</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0"><?= $data['country']; ?></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <footer class="footer py-4 mt-5 black">
      <div class="container text-center">
        <p class="h5">Daniel Hasiando Sinaga (123210047)</p>
        <span class="text-white">Kriptografi <?= date('Y'); ?></span>
      </div>
    </footer>

  </body>

<?php } ?>

</html>
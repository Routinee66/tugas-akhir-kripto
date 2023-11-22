<nav class="navbar navbar-expand-md navbar-dark fixed-top warna">
  <a class="navbar-brand" href="home.php">Forum <?= $username; ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="profile.php">
          <i class="bi bi-person-circle"></i>
          Profile
        </a>
      </li>
      <li class="nav-item">
        <?php
        if ($username == NULL) {
          echo '<a class="nav-link" href="login.php">Login</a>';
        } else {
          echo '<a class="nav-link" href="logout.php">Logout</a>';
        }
        ?>
      </li>
    </ul>
  </div>
</nav>
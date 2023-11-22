<style>
  :root{
    --warna: #3498db;
  }
  .warna{
    background-color: var(--warna);
    color: white;
  }

  .black{
    background-color: black;
    color: white;
  }

  body {
    font-size: 14px;
  }

  .padding-large{
    padding-top: 56px;
  }

  /* HOME */
  .navbar {
      background-color: #3498db;
    }

    .navbar-brand,
    .navbar-nav .nav-link {
      color: #fff;
    }

    .forum-header {
      background-color: #3498db;
      color: #fff;
      text-align: center;
      padding: 20px 0;
      margin-bottom: 20px;
    }

    .thread-list {
      list-style-type: none;
      padding: 0;
    }

    .thread-list li {
      border-bottom: 1px solid #ecf0f1;
      padding: 10px;
    }

    .thread-list li:last-child {
      border-bottom: none;
    }

    .pagination {
      margin-top: 20px;
      justify-content: center;
    }

    .post-date{
      margin: 0;
      font-size: .9em;
      font-weight: 300;
      font-style: italic;
    }

    .post-preview{
      display:inline-block;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
      max-width: 800px;
    }

  /* LOGIN */
  /* #login #sudah {
    right: 20%;
    top: 48%;
  } */

  #login #garis {
    padding: 5px;
    margin: 15px 0;
  }

  #login #login {
    border-radius: 0 25px 0 25px;
  }

  #login #halaman_kiri {
    box-shadow: 0 0px 15px .1px black;
    z-index: 1;
  }

  #icon {
    transform: scale(0.4);
    filter: invert(100%) sepia(0%) saturate(0%) hue-rotate(93deg) brightness(103%) contrast(103%);
  }

  #form-login {
    position: relative;
  }

  #form-login::before {
    position: absolute;
    top: 9.5%;
    text-align: center;
    padding: 4px;
    color: white;
  }

  <?php if ($pesan == "logout") { ?>#form-login::before {
    content: "Berhasil Logout";
    background-color: rgb(29, 206, 103);
    padding: 2px;
    top: 18%;
    left: 17%;
    right: 20%;
  }

  <?php }
  if ($pesan == "registrasi") { ?>#form-login::before {
    content: "Berhasil Registrasi";
    background-color: rgb(29, 206, 103);
    padding: 2px;
    top: 18%;
    left: 17%;
    right: 20%;
  }

  <?php }
  if ($pesan == "password_salah") { ?>#form-login::before {
    content: "Password Salah";
    background-color: rgb(184, 75, 75);
    padding: 2px;
    top: 18%;
    left: 17%;
    right: 20%;
  }

  <?php }
  if ($pesan == "username_salah") { ?>#form-login::before {
    content: "Username Tidak Terdaftar";
    background-color: rgb(184, 75, 75);
    padding: 2px;
    top: 18%;
    left: 17%;
    right: 20%;
  }

  <?php }
  if ($pesan == "terdaftar") { ?>#form-login::before {
    content: "Username Sudah Terdaftar";
    background-color: rgb(184, 75, 75);
    padding: 2px;
    top: 18%;
    left: 17%;
    right: 20%;
  }

  <?php }
  if ($pesan == "belum_login") { ?>#form-login::before {
    content: "Silahkan Login Terlebih Dahulu";
    background-color: rgb(184, 75, 75);
    padding: 2px;
    top: 18%;
    left: 17%;
    right: 20%;
  }

  <?php }
  if ($pesan == "failed") { ?>#form-login::before {
    content: "Gagal";
    font-size: .77rem;
    padding: 7px 1px;
    background-color: rgb(184, 75, 75);
    left: 57%;
    right: 27%;
  } 
  <?php 
    } ?>
  {}

  /* POST */

  .gembok {
    display: block;
    float: left;
    cursor: pointer;
    margin-top: 15px;
    font-size: 1.5em;
    border-radius: 5px;
    padding: 5px;
    background-color: rgb(22, 126, 22);
    color: white;
    font-weight: 900;
  }

  .gembok2 {
    display: inline-block;
    margin-top: 15px;
    font-size: 1.5em;
    border-radius: 5px;
    padding: 5px;
    color: white;
    font-weight: 400;
  }

  .gembok:hover {
    background-color: rgb(9, 44, 9);
    color: white;
  }

  .info-enkripsi {
    font-style: italic;
    color: white;
    position: relative;
    top: 5px;
    background-color: rgb(112, 24, 24);
    text-align: center;
  }

  .comment-details img {
    max-width: 300px;
  }

  /* .navbar {
    background-color: var(--warna);
  } */

  .thread-header {
    /* background-color: var(--warna); */
    color: #fff;
    text-align: center;
    padding: 20px 0;
    margin-bottom: 20px;
  }

  .post-list {
    list-style-type: none;
    padding: 0;
  }

  .post-list li {
    display: grid;
    grid-template-columns: 1fr 3fr;
    border-bottom: 1px solid #ecf0f1;
    padding: 20px 10px;
  }

  .post-list li:last-child {
    border-bottom: none;
  }

  .profile-details {
    text-align: center;
  }

  .profile-details img {
    max-width: 100px;
    border-radius: 50%;
  }

  .profile-details p {
    margin: 5px 0;
  }

  .profile-details small {
    font-size: 12px;
    color: #95a5a6;
  }

  .comment-details {
    padding: 10px;
  }

  .comment-details p {
    margin: 5px 0;
  }

  .comment-details small {
    font-size: 12px;
    color: #95a5a6;
    display: block;
    border-top: 1px solid #ecf0f1;
    padding-top: 10px;
    margin-top: 10px;
  }

  .reply-form {
    margin-top: 20px;
  }

  /* PROFILE */
  .breadcrumb {
      background-color: #fff !important;
    }

    .profile-card {
      background-color: #fff;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .profile-image {
      width: 150px;
      height: 150px;
      object-fit: cover;
      border-radius: 50%;
    }

  /* CREATE POST */
  .create-post-header {
      background-color: #3498db;
      color: #fff;
      text-align: center;
      padding: 20px 0;
      margin-bottom: 20px;
    }

    .create-post-form {
      max-width: 600px;
      margin: 0 auto;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      font-weight: bold;
    }

    .form-group input,
    .form-group textarea {
      width: 100%;
      padding: 10px;
      box-sizing: border-box;
    }

    .form-group.form-check input{
      width: 2%;
      padding: 10px;
    }

    .form-group textarea {
      resize: vertical;
      min-height: 150px;
    }

    .btn-create-post {
      background-color: #3498db;
      color: #fff;
      padding: 10px 20px;
      font-size: 16px;
    }
</style>
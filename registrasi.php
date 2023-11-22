<?php include "session_out.php";
if ($_GET) $pesan = $_GET['message'];
include "header.php"; ?>
<title>Registrasi</title>

<body>
  <main id="login">
    <div class="container-fluid">
      <div class="row vh-100">
        <div id="halaman_kiri" class="col-md-5 bg-info d-flex justify-content-center align-items-center bg-opacity-50">
          <img id="icon" src="" alt="">
        </div>
        <div id="halaman_kanan" class="col-md-7 bg-white d-flex justify-content-center align-items-center flex-column">
          <div id="form-login" class="container">
            <div class="mx-auto p-3 col-md-8 text-center">
              <div class="login-header mt-5 mb-3 text-start">
                <h2 class="text-info mb-5">Registrasi Akun</h2>
              </div>
              <div class="form">
                <form method="POST" action="registrasi_proses.php" enctype="multipart/form-data">
                  <div class="d-flex">
                    <div id="garis" class="bg-info"></div>
                    <input type="text" name="username" class="input form-control p-2 my-3" placeholder="Username" required>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="d-flex">
                        <div id="garis" class="bg-info"></div>
                        <input type="text" name="nama" class="input form-control p-2 my-3" placeholder="Nama" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="d-flex">
                        <div id="garis" class="bg-info"></div>
                        <input type="email" name="email" class="input form-control p-2 my-3" placeholder="Email" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="d-flex">
                        <div id="garis" class="bg-info"></div>
                        <input type="text" name="telepon" class="input form-control p-2 my-3" placeholder="Nomor Telepon" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="d-flex">
                        <div id="garis" class="bg-info"></div>
                        <input type="text" name="asal" class="input form-control p-2 my-3" placeholder="Asal" required>
                      </div>
                    </div>
                  </div>
                  <div class="d-flex">
                    <div id="garis" class="bg-info"></div>
                    <input type="password" name="password" class="input form-control p-2 my-3" placeholder="Password" required>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="gambar" name="gambar" accept="image/*" />
                        <label class="custom-file-label" for="gambar">
                          Upload foto profil
                        </label>
                      </div>
                    </div>
                  </div>
                  <hr>
                  <div class="row pt-3">
                    <div class="col-md-6">
                      <div class="d-flex">
                        <div class="d-grid gap-2">
                          <button id="login" class="btn btn-info text-white fw-bold mb-4 px-5 shadow-lg" type="submit">DAFTAR</button>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="d-flex">
                        <div id="sudah" class="right">
                          <p class="d-inline-block">Sudah punya akun?</p>
                          <a href="login.php" class="btn btn-outline-info">Login</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
</body>

</html>
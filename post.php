<?php
session_start();
include('header.php');
include('koneksi.php');
if (isset($_GET['id'])) {
  $id_post = $_GET['id'];
} else {
  echo '<script>window.location.href = "home.php";</script>';
}

$username = ((isset($_SESSION['username']))) ? $_SESSION['username'] : "";
?>

<title>Post</title>

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
  }
</script>
</head>

<body class="forum padding-large">
  <?php include('navbar.php') ?>

  <?php
  $sql0    = "SELECT * FROM posts WHERE id = $id_post";
  $query0    = mysqli_query($connect, $sql0);

  while ($data0 = mysqli_fetch_array($query0)) {
  ?>
    <div class="thread-header warna align-content-center">
      <div class="container">
        <h2><?= $data0['postTitle']; ?></h2>
        <p><?= $data0['postContent']; ?></p>
        <hr>
        <?php
        $time = strtotime($data0['posted']);
        $tahun = date('Y', $time);
        $bulan = date('F', $time);
        $tanggal = date('d', $time);
        $hari = date('l ', $time);
        $jam = date('H', $time);
        $menit = date('i', $time);
        ?>
        <p>Author: <a href=""><?= $data0['user']; ?> </a> | <?= $hari . ", " . $tanggal . " " . $bulan . " " . $tahun . " at " . $jam . ":" . $menit; ?></p>
      </div>
    </div>
  <?php } ?>

  <div class="container">
    <div class="row">
      <div class="col">
        <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Post</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>

  <div class="container">
    <ul class="post-list">
      <?php
      $sql    = "SELECT * FROM comments WHERE post = '$id_post'";
      $query    = mysqli_query($connect, $sql);
      $count  = mysqli_num_rows($query);

      if ($count == 0) {
        echo '<div class="container-fluid text-center justify-content-center d-flex align-items-center p-3">
          <h1>Komentar masih kosong</h1>
          </div>
          <hr class="mb-5">';
      }
      $i = 1;

      while ($data = mysqli_fetch_array($query)) {
        $user = $data['user'];
      ?>
        <li>
          <?php
          $sql2    = "SELECT * FROM users WHERE username = '$user'";
          $query2    = mysqli_query($connect, $sql2);

          while ($data2 = mysqli_fetch_array($query2)) {
          ?>
            <div class="profile-details">

              <img src="<?= $data2['photo']; ?>" alt="John Doe's Avatar" />
              <?php
              $time = strtotime($data2['joined']);
              $tahun = date('Y', $time);
              $bulan = date('F', $time);
              $tanggal = date('d', $time);
              ?>
              <p><?= $data2['username']; ?></p>
              <p><small>Joined: <?= $tanggal . " " . $bulan . " " . $tahun; ?></small></p>
            </div>
          <?php } ?>

          <div class="comment-details">
            <?php
            $comment = $data['comment'];
            $image = $data['image'];
            ?>

            <!-- <form method="POST" action="coba.php" enctype="multipart/form-data"> -->

            <div class="image-cipher-<?= $i; ?>" <?= ($data['isEncrypted2']) ? NULL : "hidden" ?>>
              <!-- <p class="info-enkripsi">Komentar terenkripsi</p> -->
              <div class="gembok2 bg-info">
                <div class="container">
                  <i id="unlocked2" class="bi bi-card-image"></i>
                  <span id="<?= $i; ?>" class="text-white">Gambar terenkripsi</span>
                </div>
              </div>
            </div>
            <img class="img-thumbnail" width="300" src="<?= $image ?>" alt="" <?= ($data['image'] && $data['isEncrypted2'] == false) ? "" : "hidden"; ?>>
            <p id="comment-<?= $i; ?>">
              <?= $comment ?>
            </p>
            <p id="encrypt-key-<?= $i; ?>" hidden><?= $data['keyText']; ?></p>
            <p id="image-key-<?= $i; ?>" hidden><?= $data['keyImage']; ?></p>

            <?php
            $time     = strtotime($data['posted']);
            $tahun    = date('Y', $time);
            $bulan    = date('F', $time);
            $hari     = date('l', $time);
            $tanggal  = date('d', $time);
            $jam      = date('H', $time);
            $menit    = date('i', $time);
            ?>

            <small>Date: <?= $hari . ", " . $tanggal . " " . $bulan . " " . $tahun . " at " . $jam . ":" . $menit; ?></small>
            <div class="cipher-key-<?= $i; ?>" <?= ($data['isEncrypted']) ? NULL : "hidden" ?>>
              <p class="info-enkripsi">Komentar terenkripsi</p>
              <div class="gembok" id="<?= $i; ?>" onclick="encrpyt(this.id)">
                <i id="unlocked" class="bi bi-unlock"></i>
              </div>
            </div>
          </div>
        </li>
        <?php $i++; ?>
      <?php } ?>
    </ul>

    <div class="reply-form p-4 border border-secondary" style="border-radius: 20px;">
      <h4>Reply to Thread</h4>
      <form method="POST" action="comment_proses.php" enctype="multipart/form-data">
        <div class="form-group">

          <label for="replyContent">Your Reply</label>
          <textarea name="comment" class="form-control" id="replyContent" rows="2" required></textarea>
        </div>
        <div class="form-group form-check">
          <input onclick="toggleEncryptionKey()" name="isEncrypted" type="checkbox" class="form-check-input" id="encryptCheckbox" value="1" />
          <label class="form-check-label" for="encryptCheckbox">Encrypt this comment</label>
        </div>

        <div id="encryptionKeyContainer" style="display: none">
          <div class="form-group">
            <label for="encryptionKey">Encryption Key</label>
            <input name="key" onkeydown="return /[a-z]/i.test(event.key)" class="form-control" id="encryptionKey" />
          </div>
        </div>

        <label for="gambar">Pilih Gambar</label>
        <div class="input-group">
          <div class="custom-file">
            <input type="file" class="custom-file-input" id="image" name="image" accept="image/*" />
            <label class="custom-file-label" for="gambar">Choose file</label>
          </div>
        </div>

        <div class="form-group form-check pt-3">
          <input onclick="toggleEncryptionKey2()" name="isEncrypted-image" type="checkbox" class="form-check-input" id="encryptCheckbox2" value="1" />
          <label class="form-check-label" for="encryptCheckbox2">Encrypt this comment</label>
        </div>

        <div id="encryptionKeyContainer2" style="display: none">
          <div class="form-group">
            <label for="encryptionKey2">Encryption Key</label>
            <input name="key2" onkeydown="return /[a-z]/i.test(event.key)" class="form-control" id="encryptionKey2" />
          </div>
        </div>

        <input type="hidden" name="post" value="<?= $id_post ?>">
        <input type="hidden" name="username" value="<?= $username ?>">
        <input type="hidden" name="id_post" value="<?= $id_post ?>">

        <button onclick="return cekLogin()" type="submit" class="btn btn-primary">Submit Reply</button>
      </form>
    </div>
  </div>

  <footer class="footer py-4 mt-5 black">
    <div class="container text-center">
      <p class="h5">Daniel Hasiando Sinaga (123210047)</p>
      <span class="text-white">Kriptografi <?= date('Y'); ?></span>
    </div>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>
    function vigenereDecrypt(ciphertext, key) {
      let result = '';
      const keyLength = key.length;

      for (let i = 0; i < ciphertext.length; i++) {
        const char = ciphertext.charAt(i);
        const keyChar = key.charAt(i % keyLength);
        result += String.fromCharCode((char.charCodeAt(0) - keyChar.charCodeAt(0) + 256) % 256);
      }

      return result;
    }

    function rc4(data, key) {
      let s = Array.from({
        length: 256
      }, (_, i) => i);
      let j = 0;
      const keyLength = key.length;

      for (let i = 0; i < 256; i++) {
        j = (j + s[i] + key.charCodeAt(i % keyLength)) % 256;
        const temp = s[i];
        s[i] = s[j];
        s[j] = temp;
      }

      let i = 0;
      j = 0;
      let result = '';

      for (let k = 0; k < data.length; k++) {
        i = (i + 1) % 256;
        j = (j + s[i]) % 256;
        const temp = s[i];
        s[i] = s[j];
        s[j] = temp;

        result += String.fromCharCode(data.charCodeAt(k) ^ s[(s[i] + s[j]) % 256]);
      }

      return result;
    }

    function hex2bin(n) {
      if (!checkHex(n)) return 0;
      return parseInt(n, 16).toString(2);
    }

    function hex2bin2(hex) {
      var bytes = [],
        str;

      for (var i = 0; i < hex.length - 1; i += 2)
        bytes.push(parseInt(hex.substr(i, 2), 16));

      return String.fromCharCode.apply(String, bytes);
    }

    function dekripsi(superCipher, key) {
      const bin = hex2bin2(superCipher);
      const vigenerePlaintext = rc4(bin, key);
      const plaintext = vigenereDecrypt(vigenerePlaintext, key);

      return plaintext;
    }

    function toggleEncryptionKey() {
      var encryptionKeyContainer = document.getElementById(
        "encryptionKeyContainer"
      );
      var encryptCheckbox = document.getElementById("encryptCheckbox");

      encryptionKeyContainer.style.display = encryptCheckbox.checked ?
        "block" :
        "none";

      document.getElementById("encryptionKey").required = encryptCheckbox.checked ?
        true : false;
    }

    function toggleEncryptionKey2() {
      var encryptionKeyContainer2 = document.getElementById(
        "encryptionKeyContainer2"
      );
      var encryptCheckbox2 = document.getElementById("encryptCheckbox2");

      encryptionKeyContainer2.style.display = encryptCheckbox2.checked ?
        "block" :
        "none";

      // if(encryptCheckbox2.checked){
      //   encryptionKeyContainer2.setAttribute("required");
      // }
      document.getElementById("encryptionKey2").required = encryptCheckbox2.checked ?
        // encryptionKeyContainer2.required = encryptCheckbox2.checked ?
        true : false;

    }

    function encrpyt(id) {
      Swal.fire({
        title: "Masukkan kunci enkripsi",
        input: "text",
      }).then((result) => {
        const encryptKey = $(`${'#encrypt-key-' + id}`).text();
        if (result.value === encryptKey) {
          Swal.fire({
            title: "Berhasil",
            icon: "success",
          });
          const cipherText = $(`${'#comment-' + id}`).text().trim();
          const plainText = dekripsi(cipherText, encryptKey);

          $(`${'#comment-' + id}`).text(plainText);
          $(`${'#' + id}`).hide();
          $(`${'.cipher-key-' + id}`).hide();
        } else {
          Swal.fire({
            title: "Kunci salah",
            icon: "error",
          });
        }
      });
    }

    function decryptText(encryptedText, decryptionKey) {
      return "Decrypted: " + encryptedText + " with key: " + decryptionKey;
    }
  </script>
</body>

</html>
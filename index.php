<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
  <div class="container mt-3">
    <h2>Rekord Tabel Mata Kuliah Mahasiswa</h2>
    <form action="" method="post">
      <div class="mb-3">
        <label for="NPM">Nomor Pokok Mahasiswa :</label>
        <input type="text" class="form-control" id="NPM" title="Enter NPM" name="NPM">
      </div>
      <div class="mb-3">
        <label for="NamaMahasiswa">Nama Mahasiswa :</label>
        <input type="text" class="form-control" id="NamaMahasiswa" placeholder="NamaMahasiswa" name="NamaMahasiswa">
      </div>
      <div class="mb-3">
        <label for="HariKuliah">Hari Kuliah :</label>
        <input type="date" class="form-control" id="HariKuliah" placeholder="HariKuliah" name="HariKuliah">
      </div>
      <div class="mb-3">
        <label for="MataKuliah">Mata Kuliah :</label>
        <input type="text" class="form-control" id="MataKuliah" placeholder="MataKuliah" name="MataKuliah">
      </div>
      <div class="mb-3">
        <label for="JamMataKuiah">Jam Mata Kuliah :</label>
        <input type="time" class="form-control" id="JamMataKuiah" placeholder="JamMataKuiah" name="JamMataKuiah">
      </div>
      <div class="mb-3">
        <label for="Alamat">Alamat :</label>
        <textarea class="form-control" rows="5" id="Alamat" name="Alamat" title="Ketik Alamat Mahasiswa"></textarea>
      </div>
      <button type="submit" class="btn btn-primary" name="bSimpan">Simpan Rekord</button>
      <a href="daftarmhs.php" target="_blank" class="btn btn-success">Lihat Yang Sudah Daftar</a>

    </form>
 <?php
 if (isset($_POST['bSimpan'])) {
  $NPM=filter_var($_POST['NPM'],FILTER_SANITIZE_STRING);
  $NamaMahasiswa=filter_var($_POST['NamaMahasiswa'],FILTER_SANITIZE_STRING);
  $HariKuliah=filter_var($_POST['HariKuliah'],FILTER_SANITIZE_STRING);
  $MataKuliah=filter_var($_POST['MataKuliah'],FILTER_SANITIZE_STRING);
  $JamMataKuiah=filter_var($_POST['JamMataKuiah'],FILTER_SANITIZE_STRING);
  $Alamat=filter_var($_POST['Alamat'],FILTER_SANITIZE_STRING);
  $kon=mysqli_connect("localhost","root","","rekordmahasiswa");
  $kunci="@#12345UMBOke";
  $sql="insert to tabelmk (NPM,NamaMahasiswa,HariKuliah,JamMataKuiah,Alamat) values
  ('".$NPM."',aes_encrypt('".$NamaMahasiswa."','".$kunci."'),aes_encrypt('".$HariKuliah."','".$kunci."'),'".$JamMataKuiah."',aes_encrypt('".$Alamat."','".$kunci."'))";
  $q=mysqli_query($kon,$sql);
  if ($q) {
    echo '<div class="alert alert-success alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Berhasil disimpan!</strong> Berhasil disimpan!</a>.
</div>';
  } else {
    echo '<div class="alert alert-danger alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Gagal disimpan!</strong> Gagal disimpan!</a>.
</div>';
  }

 }
 ?>

  </div>
</body>
</html>
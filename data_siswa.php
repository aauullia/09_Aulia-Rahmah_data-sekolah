<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "data_sekolah";

$koneksi = mysqli_connect($host,$user,$pass,$db);
if(!$koneksi) {
    die("Tidak bisa koneksi ke database");
} 
$nis  = "";
$nama = "";
$alamat = "";
$jurusan = "";
$sukses = "";
$error = "";

if(isset($_POST['simpan'])){
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jurusan = $_POST['jurusan'];

    if($nis && $nama && $alamat && $jurusan){
        $sql1 = "insert into data_siswa(nis,nama,alamat,jurusan) values('$nis','$nama','$alamat','$jurusan')";
        $q1 = mysqli_query($koneksi, $sql1);
        if($q1){
            $sukses = "Berhasil memasukkan data baru";
        } else{
            $error = "Gagal memasukkan data";
        }
    } else{
        $error = "Silahkan masukkan semua data";
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data siswa </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


<style>
    .mx-auto {width:800px}
    .card {margin-top: 20px;}
</style>

</head>
<body>
    <div class="mx-auto">

    <div class="card">
  <div class="card-header">
   Create / Edit Data
  </div>
  <div class="card-body">
      <?php
      if($error){
        ?>
        <div class="alert alert-danger" role="alert">
  </div>
  <?php
    }
    ?>

<?php
      if($sukses){
        ?>
        <div class="alert alert-succes" role="alert">
            <?php echo $sukses ?>
  </div>
  <?php
    }
    ?>

    <form action="" method="POST">

    <div class="mb-3 row">
  <label for="nis" class="form-label">NIS</label>
  <div class="col-sm-10">
  <input type="number" class="form-control" id="nis" name="nis" value="<?php echo $nim?>">
  </div>
</div>

<div class="mb-3 row">
  <label for="nama" class="form-label">Nama</label>
  <div class="col-sm-10">
  <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama?>">
  </div>
</div>

<div class="mb-3 row">
  <label for="alamat" class="form-label">Alamat</label>
  <div class="col-sm-10">
  <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $alamat?>">
  </div>
</div>

<div class="mb-3 row">
  <label for="jurusan" class="form-label">Jurusan</label>
  <div class="col-sm-10">
  <select class="form-control" name="jurusan" id="jurusan">
    <option value="">- Pilihlah jurusan Anda - </option>
    <option value="rpl" <?php if($jurusan == "rpl") echo "selected"?>>Rekayasa Perangkat Lunak</option>
    <option value="tkj" <?php if($jurusan == "tkj") echo "selected"?>>Teknik Komputer dan Jaringan</option>
  </select>
  </div>
</div>
<div class="col-12">
    <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary">
</div>
    </form>
  </div>
</div>

<div class="card">
  <div class="card-header text-white bg-secondary">
   Data Siswa
  </div>
  <div class="card-body">
     
  </div>
</div>


    </div>
</body>
</html>
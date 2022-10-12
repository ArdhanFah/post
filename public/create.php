<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <style>
    body {
        background-color: grey;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card mt-4">
                    <div class="card-header text-center">Form Tambah Data</div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="nim" class="form-label">NIM</label>
                                <input type="number" name="nim" id="nim" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" name="nama" id="nama" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="umur" class="form-label">Umur</label>
                                <input type="number" name="umur" id="umur" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea name="alamat" id="alamat" cols="30" rows="5" class="form-control"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="foto" class="form-label">Foto</label>
                                <input type="file" accept="images/*" name="foto" id="foto" class="form-control"
                                    required>
                            </div>
                            <button class="btn btn-sm btn-info" name="submit">Kirim</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>


<?php 
include('../database/config.php');

if(isset($_POST['submit'])){
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $umur = $_POST['umur'];
    $alamat = $_POST['alamat'];
    $foto = $_FILES['foto']['name'];
    $file = $_FILES['foto']['tmp_name'];
    $dir = "../foto/";

    move_uploaded_file($file, $dir . $foto);
    $query = ("INSERT INTO tabel_lks(nim,nama,umur,alamat,foto) VALUES ($nim,'$nama',$umur,'$alamat','$foto')");

    $result = pg_query($db_conn, $query);

    header("location: index.php");

}

?>
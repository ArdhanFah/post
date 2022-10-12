<?php 
error_reporting(0);
include('../database/config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>

<body>
    <h1 class="text-center mt-4">Warung 4.0</h1>
    <div class="container">
        <div class="row g-3 align-items-center">
            <div class="col-auto">
                <form action="" method="POST">
                    <input type="search" name="search" id="inputPassword6" class="form-control">
                </form>
            </div>
            <div class="col-auto">
            <a href="create.php" class="btn btn-sm btn-success">Tambah data</a>
            </div>
        </div>
        <table class="table">
            <tbody>
                <tr>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Umur</th>
                    <th>Alamat</th>
                    <th>Foto</th>
                    <th>Handle</th>
                </tr>
                <?php 
                $search = $_POST['search'];
                if($search != ''){
                    $result = pg_query($db_conn, "SELECT * FROM tabel_lks WHERE nama LIKE '%$search%'");
                }else{
                    $result = pg_query($db_conn, "SELECT * FROM tabel_lks");
                }
                while($row = pg_fetch_array($result)){
                ?>
                <tr>
                    <td><?php echo $row['nim']?></td>
                    <td><?php echo $row['nama']?></td>
                    <td><?php echo $row['umur']?></td>
                    <td><?php echo $row['alamat']?></td>
                    <td><?php echo "<img src='../foto/$row[foto]' width='70px'>"?></td>
                    <td>
                        <a href="update.php?id=<?php echo $row['id']?>" class="btn btn-sm btn-info">Update</a>
                        <a href="delete.php?id=<?php echo $row['id']?>&foto=<?php echo $row['foto']?>" class="btn btn-sm btn-danger" onclick="return confirm('apakah anda yakin ingin menghapus <?php echo $nama ?>')">Delete</a>
                    </td>
                </tr>
                <?php } ?>
                </tbody>
        </table>
    </div>
</body>

</html>
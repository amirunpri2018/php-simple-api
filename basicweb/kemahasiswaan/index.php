<?php
    $servername = "localhost";
    $username = "root";
    $password = "Adm1nroot";
    $dbnamea = "kemahasiswaan";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbnamea);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // membuat query
    $sql = "SELECT * FROM mahasiswa";
    // lakukan eksekusi query
    $result = $conn->query($sql);
?>

<html>
    <head>
        <title>
            Portal Kemahasiswaan
        </title>
        <link rel="stylesheet" href="style.css" type="text/css">
    </head>
    <body>

        <header>
            <h1>Kemahasiswaan Poltek</h1>
            <nav>
                <a href="index.php">Home</a>
            </nav>
        </header>

        <article>
            <a href="add.php">Tambah Mahasiswa</a><br/>
            <p>Dashboard</p><br/>

            <table width='100%' border=0>

                <thead bgcolor='#CCCCCC'>
                    <tr>
                        <td>Id</td>
                        <td>NIM</td>
                        <td>Nama</td>
                        <td>Alamat</td>
                        <td>Foto</td>
                        <td>Aksi</td>
                    </tr>
                </thead>
                <tbody>
<?php 

    if($result->num_rows > 0){
        while ($row = $result->fetch_assoc()) {
            echo '
            <tr>
                <td>'.$row['id_mhs'].'</td>
                <td>'.$row['nim'].'</td>
                <td>'.$row['nama_mhs'].'</td>
                <td>'.$row['alamat'].'</td>
<td>
    <div class="image-wrapper">
        <img src="foto/'.$row['foto'].'">
    </div>
</td>
<td>
    <a href="detail.php">Detail</a> |

    <a href="edit.php?id_mhs='.$row['id_mhs'].'">Edit</a> | 
    
    <a href="delete_aksi.php?id_mhs='.$row['id_mhs'].'&foto='.$row['foto'].'" onClick="return confirm(\'Apakah Anda Yakin Ingin Menghapus Berita Ini?\')">Delete</a>
</td>
            </tr>
            ';
        }
    }

?>
                </tbody>
            </table>
    
        </article>

        <footer class="article-meta">
            Poltek - 2018 - All Right Reserved
        </footer>

    </body>
</html>
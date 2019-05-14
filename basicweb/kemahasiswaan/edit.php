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

    // tangkap id yang mau di edit
    $id_mhs = $_GET['id_mhs'];

    // membuat query detail data mahasiswa
    $sql = "SELECT * FROM mahasiswa WHERE id_mhs='$id_mhs'";
    // eksekusi query
    $result = $conn->query($sql);

    // uraikan data dalam variable row
    $row = $result->fetch_assoc();
?>

<html>
    <head>
        <title>
            Tambah Mahasiswa
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
            <p>Edit Mahasiswa</p>
            <br/><br/>

            <form action="edit_aksi.php" method="post" name="form1" enctype="multipart/form-data">
                <table width="25%" border="0">

                    <input type="hidden" name="id_mhs" value="<?php echo $row['id_mhs']; ?>">
                    <input type="hidden" name="old_image" value="<?php echo $row['foto']; ?>">

                    <tr> 
                        <td>NIM</td>
                        <td><input type="text" name="nim" value="<?php echo $row['nim']; ?>"></td>
                    </tr>
                    <tr> 
                        <td>Nama Mahasiswa</td>
                        <td><input type="text" name="nama" value="<?php echo $row['nama_mhs']; ?>"></td>
                    </tr>
                    <tr> 
                        <td>Alamat</td>
                        <td><textarea name="alamat" cols="50" rows="5"><?php echo $row['alamat']; ?></textarea></td>
                    </tr>
                    <tr>
                        <td>Upload Foto</td>
                        <td>
                            <div class="image-wrapper">
                                <img src="<?php echo 'foto/'.$row['foto']; ?>">
                            </div>
                            <input type="file" name="fotomhs" id="fileToUpload">
                        </td>
                    </tr>
                    <tr> 
                        <td></td>
                        <td><input type="submit" name="submit" value="Add"></td>
                    </tr>
                </table>
            </form>
        </article>

        <footer class="article-meta">
            Poltek - 2018 - All Right Reserved
        </footer>

    </body>
</html>
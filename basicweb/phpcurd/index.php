<?php
    // buka koneksi data
    include_once("config.php");

    //fetching data dengan descending order (urut daru id belakang)
    // $result = mysqli_query($mysqli, "SELECT * FROM mahasiswa ORDER BY id_mhs DESC");

    $sql = "SELECT * FROM mahasiswa ORDER BY id_mhs ASC";
    $result = $conn->query($sql);

    // var_dump($result);
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
                        if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_array()) {
                                echo '
                                    <tr>
                                        <td>'.$row['id_mhs'].'</td>
                                        <td>'.$row['nim'].'</td>
                                        <td>'.$row['nama_mhs'].'</td>
                                        <td>'.$row['alamat'].'</td>
                                        <td>
                                            <div class="image-wrapper">
                                                <img src="http://peoplecancode-public.s3.amazonaws.com/cat.jpg">
                                            </div>
                                        </td>
                                        <td>
                                            <a href="detail.php?id_mhs='.$row['id_mhs'].'">Detail</a> | 
                                            <a href="edit.php?id_mhs='.$row['id_mhs'].'">Edit</a> | 
                                            <a href="delete.php?id_mhs='.$row['id_mhs'].'" onClick="return confirm(\'Apakah Anda Yakin Ingin Menghapus Berita Ini?\')">Delete</a>
                                        </td>
                                    </tr>
                                ';
                            }
                        } 

                        $conn->close();
                    ?>
                </tbody>
            </table>
    
        </article>

        <footer class="article-meta">
            Poltek - 2018 - All Right Reserved
        </footer>

    </body>
</html>
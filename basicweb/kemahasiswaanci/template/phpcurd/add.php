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
            <p>Tambah Mahasiswa</p>
            <br/><br/>

            <form action="#" method="post" name="form1" enctype="multipart/form-data">
                <table width="25%" border="0">
                    <tr> 
                        <td>NIM</td>
                        <td><input type="text" name="nim"></td>
                    </tr>
                    <tr> 
                        <td>Nama Mahasiswa</td>
                        <td><input type="text" name="nama"></td>
                    </tr>
                    <tr> 
                        <td>Alamat</td>
                        <td><textarea name="alamat" cols="50" rows="5"></textarea></td>
                    </tr>
                    <tr> 
                        <td>Upload Foto</td>
                        <td><input type="file" name="fotomhs" id="fileToUpload"></td>
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
<html>
    <head>
        <title>
            Tambah Mahasiswa
        </title>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/style.css" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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

            <form action="<?php echo base_url(); ?>add/aksi" method="post" name="form1" enctype="multipart/form-data">
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
                    <tr id='asd'> 
                        <td>Upload Foto</td> <div onclick="tambahgambar();" style="cursor:pointer">tambah</div>
                        <td><input type="file" name="fotomhs[]" id="fileToUpload"></td>
                        <td><input type="file" name="fotomhs[]" id="fileToUpload"></td>
                    </tr>
                    <tr> 
                        <td></td>
                        <td><input type="submit" name="submit" value="Add"></td>
                    </tr>
                </table>
            </form>
        </article>

        <script type="text/javascript">
            function tambahgambar(){
                $("#asd").append("<td><input type=\"file\" name=\"fotomhs[]\" id=\"fileToUpload\"></td>");
            }
        </script>

        <footer class="article-meta">
            Poltek - 2018 - All Right Reserved
        </footer>

    </body>
</html>
<html>
    <head>
        <title>
            Tambah Mahasiswa
        </title>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/style.css" type="text/css">
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

<form action="<?php echo base_url() ?>edit/aksi" method="post" name="form1" enctype="multipart/form-data">
    <table width="25%" border="0">

        <input type="hidden" name="id" value="<?php echo $dataMhs[0]['id_mhs'] ?>">

        <tr> 
            <td>NIM</td>
            <td><input type="text" name="nim" value="<?php echo $dataMhs[0]['nim'] ?>"></td>
        </tr>
        <tr> 
            <td>Nama Mahasiswa</td>
            <td><input type="text" name="nama" value="<?php echo $dataMhs[0]['nama_mhs'] ?>"></td>
        </tr>
        <tr> 
            <td>Alamat</td>
            <td><textarea name="alamat" cols="50" rows="5"><?php echo $dataMhs[0]['alamat'] ?></textarea></td>
        </tr>
        <tr>
            <td>Upload Foto</td>
            <td>
                <div class="image-wrapper">
<img src="<?php echo base_url() ?>images/<?php echo $dataMhs[0]['foto'] ?>">
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
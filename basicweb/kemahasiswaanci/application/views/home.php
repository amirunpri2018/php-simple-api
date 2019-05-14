Hiiiiii <?php echo $nama; ?>

<br/>

<html>
    <head>
        <title>
            Portal Kemahasiswaan
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
            <a href="<?php echo base_url();?>add">Tambah Mahasiswa</a><br/>
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
	foreach ($datamhs as $row) {
		echo '
			<tr>
                <td>'.$row['id_mhs'].'</td>
                <td>'.$row['nim'].'</td>
                <td>'.$row['nama_mhs'].'</td>
                <td>'.$row['alamat'].'</td>
<td>
    <div class="image-wrapper">
        <img src="'.base_url().'images/'.$row['foto'].'">
    </div>
</td>
                <td>
                    <a href="detail.php">Detail</a> | 
<a href="'.base_url().'edit/data/'.$row['id_mhs'].'">Edit</a> | 
                    <a href="'.base_url().'delete/data/'.$row['id_mhs'].'" onClick="return confirm(\'Apakah Anda Yakin Ingin Menghapus Berita Ini?\')">Delete</a>
                </td>
            </tr>
		';
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
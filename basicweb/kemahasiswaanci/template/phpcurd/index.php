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
                    <tr>
                        <td>01</td>
                        <td>42525001</td>
                        <td>Elon Musk</td>
                        <td>Bumi Tamalanrea Permai</td>
                        <td>
                            <div class="image-wrapper">
                                <img src="http://peoplecancode-public.s3.amazonaws.com/cat.jpg">
                            </div>
                        </td>
                        <td>
                            <a href="detail.php">Detail</a> | 
                            <a href="edit.php">Edit</a> | 
                            <a href="#" onClick="return confirm('Apakah Anda Yakin Ingin Menghapus Berita Ini?')">Delete</a>
                        </td>
                    </tr>
                    <tr>
                        <td>02</td>
                        <td>42525001</td>
                        <td>Elon Musk</td>
                        <td>Bumi Tamalanrea Permai</td>
                        <td>
                            <div class="image-wrapper">
                                <img src="http://peoplecancode-public.s3.amazonaws.com/cat.jpg">
                            </div>
                        </td>
                        <td>
                            <a href="detail.php">Detail</a> | 
                            <a href="edit.php">Edit</a> | 
                            <a href="#" onClick="return confirm('Apakah Anda Yakin Ingin Menghapus Berita Ini?')">Delete</a>
                        </td>
                    </tr>
                </tbody>
            </table>
    
        </article>

        <footer class="article-meta">
            Poltek - 2018 - All Right Reserved
        </footer>

    </body>
</html>
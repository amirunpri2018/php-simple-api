<?php 

echo "tes";

//Membaca nama file 
$file_name = $_FILES['fupload']['name']; 
//Membaca ukuran file 
$size = $_FILES['fupload']['size']; 
//Membaca jenis file 
$file_type = $_FILES['fupload']['type']; 
//Source tempat upload file sementara 
$berkas = $_FILES['fupload']['tmp_name'];
//Tempat upload file disimpan 
$direktori = "files/$file_name"; 

//Mengecek apakah file yang di upload sudah ada atau belum 
if(file_exists($direktori)) { 
	echo "file <strong>$file_name</strong> sudah ada, upload dengan nama lain <br/> <a href=\"form_uploadfile.php\">kembali</a>"; 
	exit(); 
}elseif ($file_type != "image/gif" && $file_type != "image/jpg" && $file_type != "image/jpeg" && $file_type != "image/png") { 
	echo $file_type."<br/>"; 
	echo "file <strong>$file_name</strong> tidak di support, hanya untuk upload 
gambar (gif, jpg,jpef,png)"; 
} else { 

//Memindahkan upload file dari direktori sementara ke tempat permanen 
move_uploaded_file($berkas,$direktori); 

//Menampilkan keterangan file 
echo "<strong>Direktori sementara :</strong> ".$berkas."<br/>"; 
echo "<strong>Folder :</strong> ".$direktori."<br/>"; 
echo "<strong>Filename :</strong>".$file_name."<br/>"; 
echo "<strong>Size : </strong>".$size." bytes <br/>"; 
echo "<strong>File type : </strong>".$file_type."<br/>"; 
echo "<strong>Filename :</strong>".$file_name."<br/>"; 
}

?> 
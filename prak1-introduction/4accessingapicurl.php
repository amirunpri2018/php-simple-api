<?php 
    // persiapkan curl
    $ch = curl_init(); 

    // set url 
    curl_setopt($ch, CURLOPT_URL, "https://yasirutomo.000webhostapp.com/3apigetdata.php");

    // return the transfer as a string 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

    // $output contains the output string 
    $output = curl_exec($ch); 

    // tutup curl 
    curl_close($ch);

    // menampilkan hasil curl
    // echo $output;

    $parse = json_decode($output);
    echo $parse[0]->nim;
?>
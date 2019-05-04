<?php 

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "key: 1cabae1f4a1242421786fb093cbeef23"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  $parse = json_decode($response, TRUE);
}


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Poltek</title>

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.2/js/bootstrap.js"></script>

  </head>

  <body>
      <div>

        <!-- BAGIAN KOTA ASAL -->
        <div>
          <h4>Kota Asal</h4>
        </div>

        <div>
          <label>Pilih Provinsi Asal</label><br>
          <select name="originprovince" id="originprovince" onchange="origin(this.value)">
            <?php 
              // var_dump($parse);
              foreach ($parse['rajaongkir']['results'] as $data) {
                echo '<option value='.$data['province_id'].'>'.$data['province'].'</option>';
              }
            ?>
          </select><br>

          <label>Pilih Kota Asal</label><br>
          <select name="origincity" id="origincity">
            <option>Pilih Provinsi</option>
            
          </select><br>
        </div>
      </div>
      <hr>

      <!-- BAGIAN KOTA TUJUAN -->
      <div>
        <div>
          <h4>Kota Tujuan</h4>
        </div>

        <div>
          <label>Pilih Provinsi tujuan</label><br>
          <select name="desprovince" id="desprovince" onchange="destination(this.value)">
            <?php 
              // var_dump($parse);
              foreach ($parse['rajaongkir']['results'] as $data) {
                echo '<option value='.$data['province_id'].'>'.$data['province'].'</option>';
              }
            ?>
          </select><br>

          <label>Pilih Kota tujuan</label><br>
          <select name="descity" id="descity">
            <option>Pilih Provinsi</option>
            
          </select><br>

          <!-- <div id="origincity"></div> -->
          
        </div>
      </div>

      <hr>
      <label>Pilih Jasa Pengirim</label><br>
      <select id="namajasa" name="namajasa">
        <option value="jne">JNE</option>
        <option value="tiki">TIKI</option>
        <option value="pos">Pos Indonesia</option>
      </select><br>

      <label>Berat Barang (gram)</label><br>
      <input type="text" name="beratbarang" id="beratbarang">
      <br><br>
      <button class="search-submit" type="button" name="cek" id="cek" onclick="cekongkir()">Cek Ongkir</button>

      <div id="hasil"></div>


      <script>
      // untuk mencari kota asal 
      function origin(str) {
        var xhttp;    
        
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("origincity").innerHTML = this.responseText;
          }
        };
        xhttp.open("GET", "9searchcity.php?id="+str, true);
        xhttp.send();
      }


      // untuk mencari kota tujuan 
      function destination(str) {
        var xhttp;    
        
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("descity").innerHTML = this.responseText;
          }
        };
        xhttp.open("GET", "9searchcity.php?id="+str, true);
        xhttp.send();
      }

      // untuk mencari ongkos kirim
      function cekongkir(){
        var kota_asal = document.getElementById("origincity").value;
        var kota_tujuan = document.getElementById("descity").value;
        var jasa = document.getElementById("namajasa").value;
        var berat = document.getElementById("beratbarang").value;

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("hasil").innerHTML = this.responseText;
          }
        };
        xhttp.open("POST", "9cekongkir.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("origin="+kota_asal+"&destination="+kota_tujuan+"&weight="+berat+"&courier="+jasa+"");
      }
    </script>

  </body>
</html>
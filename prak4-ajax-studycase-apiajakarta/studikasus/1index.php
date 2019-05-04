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
  </head>

  <body>
    <form name="cekongkir" id="cekongkir" method="POST" action="9cekongkir.php">
      
      <div>
        <div>
          <h4>provinsi Asal</h4>
        </div>
        <div>
          <label>Pilih Provinsi Asal</label><br>
          <select name="originprov" id="originprov" onchange="carikotaasal(this.value);">
            <?php
              foreach ($parse['rajaongkir']['results'] as $data) {
                echo '<option value="'.$data['province_id'].'">'.$data['province'].'</option>';
              }
            ?>
          </select>
          <br>
          <!-- <div id="origincity"></div> -->
        </div>
      </div>

      <div>
        <div>
          <h4>Kota Asal</h4>
        </div>
        <div>
          <label>Pilih Kota Asal</label><br>
          <select name="origincity" id="origincity">
            <option>Pilih Provinsi</option>
          </select>
          <br>
          <!-- <div id="origincity"></div> -->
        </div>
      </div>

      <hr>

      <div>
        <div>
          <h4>provinsi Tujuan</h4>
        </div>
        <div>
          <label>Pilih Provinsi Tujuan</label><br>
          <select name="desprov" id="desprov" onchange="carikotatujuan(this.value);">
            <?php
              foreach ($parse['rajaongkir']['results'] as $data) {
                echo '<option value="'.$data['province_id'].'">'.$data['province'].'</option>';
              }
            ?>
          </select>
          <br>
          <!-- <div id="origincity"></div> -->
        </div>
      </div>

      <div>
        <div>
          <h4>Kota Tujuan</h4>
        </div>

        <div>
          <label>Pilih Kota tujuan</label><br>
          <select name="descity" id="descity">
            <option>Pilih Provinsi</option>  
          </select>
          <br>

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
      <button class="search-submit" type="button" name="cek" id="cek" onclick="cariongkir();">Cek Ongkir</button>
    </form>

    <div id="hasil"></div>


    <script type="text/javascript">
      function carikotaasal(str) {

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("origincity").innerHTML =
          this.responseText;
        }
        };
        xhttp.open("GET", "9searchcity.php?id="+str, true);
        xhttp.send();

      }

      function carikotatujuan(str) {

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("descity").innerHTML =
          this.responseText;
        }
        };
        xhttp.open("GET", "9searchcity.php?id="+str, true);
        xhttp.send();

      }

      function cariongkir(){
        var origin = document.getElementById("origincity").value;
        var destination = document.getElementById("descity").value;
        var weight = document.getElementById("beratbarang").value;
        var courier = document.getElementById("namajasa").value;

        // request
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("hasil").innerHTML =
          this.responseText;
        }
        };
        xhttp.open("POST", "9cekongkir.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("origincity="+origin+"&descity="+destination+"&beratbarang="+weight+"&namajasa="+courier+"");

      }
    </script>

  </body>
</html>
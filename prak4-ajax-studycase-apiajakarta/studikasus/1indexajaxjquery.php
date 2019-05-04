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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  </head>

  <body>
    <form name="cekongkir" id="cekongkir">
      
      <div>
        <div>
          <h4>provinsi Asal</h4>
        </div>
        <div>
          <label>Pilih Provinsi Asal</label><br>
          <select name="originprov" id="originprov">
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
          <select name="desprov" id="desprov">
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
      <button class="search-submit" type="submit" name="cek" id="cek">Cek Ongkir</button>
    </form>

    <div id="hasil"></div>

    <script type="text/javascript">
        
      $(document).ready(function(){

        // untuk kota asal
        $("#originprov").change(function(){
          // request get
          var str = $("#originprov").val();
          $.get("9searchcity.php?id="+str, function(data, status){
            $("#origincity").html(data);
          });
        });

        // untuk kota tujuan
        $("#desprov").change(function(){
          // request get
          var str = $("#desprov").val();
          $.get("9searchcity.php?id="+str, function(data, status){
            $("#descity").html(data);
          });
        });

        // cek ongkir
        // $("#cekongkir").submit(function(e){
        //   e.preventDefault(); // mencegah pindah halaman

        //     $.post("9cekongkir.php",
        //     {
        //       origincity: $("#origincity").val(),
        //       descity: $("#descity").val(),
        //       beratbarang: $("#beratbarang").val(),
        //       namajasa: $("#namajasa").val()
        //     },
        //     function(data, status){
        //       $("#hasil").html(data);
        //     });
        // });

        // post dengan $.ajax
        $("#cekongkir").submit(function(e){
          e.preventDefault();

           $.ajax({
             type: "POST",
             url: "9cekongkir.php",
             data: $("#cekongkir").serialize(), // serializes the form's elements.
             success: function(data)
             {
                 $("#hasil").html(data);
                 // alert(data);
             }
           });

        });

      });

    </script>

  </body>
</html>
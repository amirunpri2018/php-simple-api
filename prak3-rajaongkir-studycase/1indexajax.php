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
    <form id="formorngkir" name="formorngkir" method="POST">
      <div>

        
          <!-- BAGIAN KOTA ASAL -->
        <div>
          <h4>Kota Asal</h4>
        </div>

        <div>
          <label>Pilih Provinsi Asal</label><br>
          <select name="originprovince" id="originprovince">
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

          <!-- <div id="origincity"></div> -->
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
          <select name="desprovince" id="desprovince">
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
      <button class="search-submit" type="submit" name="cek" id="cekongkir">Cek Ongkir</button>

    </form>
        

      <div id="hasil"></div>

      <script>
      $(document).ready(function(){

        $("#originprovince").change(function(){
          var id_prov = $('#originprovince').find(":selected").val();
          $.get("9searchcity.php?id="+id_prov, function(data){
            $('#origincity').html(data);
          });
        });

        $("#desprovince").change(function(){
          var id_prov = $('#desprovince').find(":selected").val();
          $.get("9searchcity.php?id="+id_prov, function(data){
            $('#descity').html(data);
          });
        });

        $("#formorngkir").submit(function(e){
          e.preventDefault();
          $.post("9cekongkirajax.php",
          {
            origincity: $('#origincity').find(":selected").val(),
            descity: $('#descity').find(":selected").val(),
            beratbarang: $('#beratbarang').val(),
            namajasa: $('#namajasa').find(":selected").val()
          },
          function(data,status){
            // alert(data);
            $('#hasil').html(data);
          });

        });

        // $("#formorngkir").submit(function(e) {
        //     e.preventDefault(); // avoid to execute the actual submit of the form.
        //     $.ajax({
        //            type: "POST",
        //            url: "9cekongkirajax.php",
        //            data: $(this).serialize(), // serializes the form's elements.
        //            success: function(data)
        //            {
        //                $('#hasil').html(data); // show response from the php script.
        //            }
        //          });
        // });

      });
      </script>

  </body>
</html>
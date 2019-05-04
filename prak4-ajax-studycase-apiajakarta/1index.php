<!DOCTYPE html>
<html>
<head>
	<title> Coba Ajax</title>
</head>
<body>
	<header>
		<a id="jakarta" onclick="loadhalaman('jakarta')">API Jakarta</a> | 
		<a id="rajaongkir" onclick="loadhalaman('ongkir')">Raja Ongkir</a>
	</header>
	<content id="konten">
		Halaman standar, silahkan pilih menu.
	</content>

	<script type="text/javascript">
		function loadhalaman(str) {

			if (str=='jakarta'){

				var xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
				  document.getElementById("konten").innerHTML =
				  this.responseText;
				}
				};
				xhttp.open("GET", "2apiajakarta.php", true);
	  			xhttp.send();

			}else{

				var xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
				  document.getElementById("konten").innerHTML =
				  this.responseText;
				}
				};
				xhttp.open("POST", "2ongkir.php", true);
	  			xhttp.send();
	  			
			}
			
  			console.log(str);
		}
	</script>

</body>
</html>
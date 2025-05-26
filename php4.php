<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content = "width=440, initial-scale=1.0"   >
<style>
body {background-color: red; font-size:28px}
body {
	padding: 0.1rem;
	}
input {font-size:28px;}
h1   {color: blue;}
p    {color: white;}

table {
	border-collapse: collapse;
	}
td, th {
	width: 2rem;
	height: 2rem;
	border: 1px solid #fff;
	text-align: center;
	}
th {
	background: lightblue;
	border-color: white;
	}
.td_blank {
	border:1px; 
	height:15px;
	}
.c_neg {
	background: "yellow";
	color: "rgb(255,0,0)";
	font_weight: bold;
	}
input[type=button], input[type=submit], input[type=reset] {
  background-color: #8CFF30;
  border: none;
  color: blue;
  border-radius: 8px;
  cursor: pointer;
}

.button {
  background-color: #4CAF50; /* Green */
  //border: none;
  color: white;
  //padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  margin: 4px 2px;
  cursor: pointer;
  font-size: 28px;
}

</style>
</head>

<body>

<?php
//entrada inicial para conteo total de lineas
$zlineas=0;
$fp = fopen("resul.txt", "r");

while(!feof($fp)){
	$linea = fgets($fp);
	++$zlineas;
	}

rewind($fp);
$nazar=fmod(rand(),$zlineas);
$pos=1;
while(!feof($fp)){
	$linea = fgets($fp);
	if ($pos == $nazar){
		echo($linea . "<br>");
		break;
		}
	++$pos;
	}

fclose($fp);
?>


<p id="tot_lin"; ></p>
<div id="total_lineas">
<?php
	echo htmlspecialchars($zlineas);
?>
</div>
<br>
<!<input type="button"; id="agrega"; size = "4"; value="Jugada"; onclick="agregar()";>
<button id="recargar" class="button">Jugada</button>

<div>
<h4><?php echo $linea ?></h4>
</div>

<script>
//function cargar data
document.getElementById("tot_lin").innerHTML="Numero total de lineas = " 
//+ document.getElementById("total_lineas").textContent;
document.getElementById("tot_lin").style.color = "black";
</script>

<script>
let refresh = document.getElementById('recargar');
refresh.addEventListener('click', _ => {
            location.reload();
})
</script>


<script>
function agregar(){
	var i,j,nj;
	j=document.getElementById("A1").value+ document.getElementById("F1").value
	var mat_valores = new Array(6);	//valores
	for (i=1; i<7; i++) {
		mat_valores[i]=(i+j)*319%7;
		nj = String.fromCharCode(64+i);  // Returns "A"
		nj = nj + 1;	//A1, A2, ...
		document.getElementById(nj).value = mat_valores[i];
		}
	}
</script>

</body>
</html>

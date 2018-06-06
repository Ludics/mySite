<?php 
function waterInflow($K, $H0, $hm, $l, $R, $r0){
	$denom = pi() * $K * (pow($H0, 2) - pow($hm, 2));
	$numer = log(1 + $R / $r0) + ($hm - $l) / $l * log(1 + 0.2 * $hm / $r0);
	$Q = $denom / $numer;
	return $Q;
}

$a = $_POST["a"];
$b = $_POST["b"];
$l = $_POST["l"];
$S = $_POST["S"];
$K = $_POST["K"];
$H0 = $_POST["H0"];
$h = $_POST["h"];

$hm = ($H0 + $h) / 2;
$R = 2 * $S * sqrt($K * $H0);
$r0 = 0.29 * ($a + $b);

$Q = number_format(waterInflow($K, $H0, $hm, $l, $R, $r0), 2);

echo '
 <!DOCTYPE html>
 <html>
   <head>
     <title> 基坑涌水量计算</title>
   </head>
   <body>';
echo "K = ".number_format($K,2)." m/d<br>";
echo "H0 = ".number_format($H0,2)." m<br>";
echo "hm = ".number_format($hm,2)." m<br>";
echo "l = ".number_format($l,2)." m<br>";
echo "R = ".number_format($R,2)." m<br>";
echo "r0 = ".number_format($r0,2)." m<br>";
echo '使用公式：<br>
   <img src="./CodeEqn.gif"/><br>
   进行计算，得到基坑涌水量为：<strong>
	 ';
echo $Q;
echo " </strong>m^3/d";
echo '</body>
</html>
';
?>

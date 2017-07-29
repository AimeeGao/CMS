<?php
$a = null;
$b = false;

echo $a==$b ? "相等" : "不相等"; // true

$c = "";

$d = 0;

echo $c==$d ? "相等" : "不相等"; // true

$e = 0;

$f = '0';

echo $e===$f? "相等" : "不相等";  // false
echo $e==$f ? "相等" : "不相等";  // true

$g=0;

$h=false;

echo $g==$h ? "相等" : "不相等";  // true

function eq($v1,$v2) {
	if($v1 == $v2&&gettype($v1) ==gettype($v2)) {
		return 1;
	} else {
		return 0;
	}
}
echo eq($a, $b);
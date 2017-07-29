<?php 
echo '<b>未定义$var</b>';
echo '<br/>';
if(isset($var)){
	echo '$var设置了'.'<br/>';
	
}
else
{
	echo '$var没设置'.'<br/>';  // false
	
}
echo '**********************';
echo '<br/>';
echo '<b>$var是空字符串：$var = \' \'</b>';
$var = '';
echo '<br/>';
if(isset($var)){
	echo '$var设置了';  // true
}
else
{
	echo '$var没设置';	
}
echo '<br/>';
echo '**********************';
echo '<br/>';
echo '<b>$var = 0</b>';
echo '<br/>';
$var = 0;
if(isset($var)){
	echo '$var设置了'; // true
}
else
{
	echo '$var没设置';
}
echo '<br/>';
echo '**********************';
echo '<br/>';
echo '<b>$var = NULL</b>';
echo '<br/>';
$var = null;
if(isset($var)){
	echo '$var设置了';
}
else
{
	echo '$var没设置';  // false
}

echo '<br/>';
echo '**********************';
echo '<br/>';
echo '<b>$var = false</b>';
echo '<br/>';
$var = false;
if(isset($var)){
	echo '$var设置了';  // true
}
else
{
	echo '$var没设置';  
}
?>
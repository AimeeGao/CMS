<?php
echo '<b>未定义$var</b>';
echo '<br/>';
if(empty($var)){
	echo '$var值为空'.'<br/>';  // true
	
}
else
{
	echo '$var不为空'.'<br/>'; 
	
}
echo '**********************';
echo '<br/>';
echo '<b>$var是空字符串：$var = \' \'</b>';
$var = '';
echo '<br/>';
if(empty($var)){
	echo '$var值为空';  // true
}
else
{
	echo '$var不为空';
}
echo '<br/>';
echo '**********************';
echo '<br/>';
echo '<b>$var = 0</b>';
echo '<br/>';
$var = 0;
if(empty($var)){
	echo '$var值为空'; // true
}
else
{
	echo '$var不为空';
}
echo '<br/>';
echo '**********************';
echo '<br/>';
echo '<b>$var = NULL</b>';
echo '<br/>';
$var = null;
if(empty($var)){
	echo '$var值为空';  // true
}
else
{
	echo '$var不为空';  
}

echo '<br/>';
echo '**********************';
echo '<br/>';
echo '<b>$var = false</b>';
echo '<br/>';
$var = false;
if(empty($var)){
	echo '$var值为空';  // true
}
else
{
	echo '$var不为空';
}
echo '<br/>';
echo '**********************';
echo '<br/>';
echo '<b>$var = array()</b>';
echo '<br/>';
$var = array();
if(empty($var)){
	echo '$var值为空';  // true
}
else
{
	echo '$var不为空';
}
echo '<br/>';
$id=0;
empty($id)?print "It's empty .":print "It's $id .";
//结果：It's empty .
print "<br>";
isset($id)?print "It's $id .":print "It's empty ."; 
//结果：It's id .

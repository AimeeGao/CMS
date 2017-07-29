<?php

error_reporting(E_ALL);
echo '<b>未定义$var</b><Br>';
echo "isset测试:<Br>";
if ( isset ( $var ))
{
	echo '变量$var存在!<Br>' ;
}else{
	echo 'isset变量$var不存在！'.'<br/>';
}
echo "empty测试:<Br>";
if ( empty ( $var )){
	echo 'empty变量$var的值存在且为为空<Br>';
}
else
{
	echo '变量$var的值不为空<Br>';
}
echo "变量直接测试:<Br>";
if ($var){
	echo '变量$var存在!<Br>';
}
else {
	echo '变量$var不存在!<Br>';
}
echo '----------------------------------<br>';
echo '<b>$var = \'\'</b><Br>';  // 空字符串
echo "isset测试:<Br>";
$var = ''; // 空字符串
if ( isset ( $var )) // $var 存在且其值为空不为NULL
{
	echo '变量$var存在!<Br>' ;
}
echo "empty测试:<Br>";
if ( empty ( $var )){
	echo '变量$var的值为空<Br>';
}
else
{
	echo '变量$var的值不为空<Br>';
}
echo "变量直接测试:<Br>";
if ( $var ){
	echo '变量$var存在!<Br>';
}
else {
	echo '变量$var不存在!<Br>';
}
echo '----------------------------------<br>';
echo '<b>$var = 0</b><Br>';
echo 'isset测试:<Br>';
$var = 0 ;
if ( isset ( $var ))
{
	echo '变量$var存在!<Br>' ;
}
echo "empty测试:<Br>";
if ( empty ( $var )){
	echo '变量$var的值为空<Br>';
}
else
{
	echo '变量$var的值不为空<Br>';
}
echo "变量直接测试:<Br>";
if ( $var ){
	echo '变量$var存在!<Br>';
}
else {
	echo '变量$var不存在!<Br>';
}
echo '----------------------------------<br>';
echo '<B>$var = null</b><Br>';
echo 'isset测试:<Br>';
$var = null ;
if ( isset ( $var ))
{
	echo '变量$var存在!<Br>' ;
}
echo "empty测试:<Br>";
if ( empty ( $var )){
	echo '变量$var的值为空<Br>';
}
else
{
	echo '变量$var的值不为空<Br>';
}
echo "变量直接测试:<Br>";
if ( $var ){
	echo '变量$var存在!<Br>';
}
else {
	echo '变量$var不存在!<Br>';
}
echo '----------------------------------<br>';
echo '<B>$var ="php"</b><Br>';
echo 'isset测试:<Br>';
$var = "php";
if ( isset ( $var ))
{
	echo '变量$var存在!<Br>' ;
}
echo "empty测试:<Br>";
if ( empty ( $var )){
	echo '变量$var的值为空<Br>';
}
else
{
	echo '变量$var的值不为空<Br>';
}
echo "变量直接测试:<Br>";
if ( $var ){
	echo '变量$var存在!<Br>';
}
else {
	echo '变量$var不存在!<Br>';
}
?>

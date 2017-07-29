<?php 
/* 将字符串的最后两项转换成数组
 * 运用str_split(string $str [, int $split_length])
 * */
$week1 = "Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday";
$str = array_splice(explode(",", $week1), -2);
echo '<pre>';
print_r($str);
echo '</pre>'; // 有问题！报一个strict standards错误
echo '<br/>';
?>

<?php 
$week2 ="Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday";
$str = explode(",", $week2);
echo "<br/>";
echo '<pre>';
print_r($str);
echo '</pre>';
echo '<br/>';
$array = array_splice($str,-2);
echo '<pre>';
print_r($array);
echo '</pre>';
?>
<?php 
echo "输出变更前的字符串长度，一次删除两侧的空格后再输出字符串的长度";
echo "<br/>";
$str = '   This is a wonderful day    ';
$str_len = strlen($str);
echo '未删除两侧空格的字符串长度：';
var_dump($str_len);
echo '<br/>';
echo "删除两侧空格的字符串长度：";
$str_len_tri = trim($str);
$str_len_af = strlen($str_len_tri);
var_dump($str_len_af);
echo '<br/>';
?>
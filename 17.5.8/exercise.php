<?php
echo '习题1：<br/>';
$week = array(
		'Monday',
		'Tuesday',
		'Wednesday',
		'Thursday',
		'Friday',
		'Saturday',
		'Sunday'
);
foreach ($week as $key => $value){
	echo '第['.$key.']个元素对应的值是：'.$value;
	echo '<br/>';
}
krsort($week);
echo '<pre>';
print_r($week);
echo '</pre>';

echo '习题2：<br/>';
$week = array(
		'Monday',
		'Tuesday',
		'Wednesday',
		'Thursday',
		'Friday',
		'Saturday',
		'Sunday'
);
$weekend = array(
		'Saturday',
		'Sunday'
);
echo '$week数组的元素：<br/>';
echo '<pre>';
print_r($week);
echo '</pre>';
echo '$weekend数组的元素：<br/>';
echo '<pre>';
print_r($weekend);
echo '</pre>';
$result = array_intersect($week, $weekend);
echo '$week数组与$weekend数组元素的交集：<br/>';
echo '<pre>';
print_r($result);
echo '<pre>';
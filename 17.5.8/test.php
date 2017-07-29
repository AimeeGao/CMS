<?php
// php对数组的处理
// 1.建立数组的方法
/* （1）.array()语言结构创建数组
 * $ms_office = array("word","excel","outlook","access");
 * 该数组包含四个单元，每个单元存储1个值，这些值也称为数组元素。array()不是函数，是php的一个语言结构
 * 可通过数组索引来访问数组元素，数组元素的索引值默认从0开始。$ms_office[0]代表数组中的第一个元素
 * 数组的索引又叫“键值”或“下标”。 =>运算符为数组指定索引和值的关系。其语法格式为“索引=>值”，每对“索引=>值”之间用逗号隔开。
 * */
echo "php对数组的处理";
$ms_office = array(
		0=>'word',
		1=>'excel',
		2=>'outlook',
		3=>'access'
);
// 该行代码指定数组的索引为整数。数组的索引还可以为字符串，用字符串做索引的数组为“关联数组”。
$ms_office = array(
		'wd'=>'word',
		'ec'=>'excel',
		'ol'=>'outlook',
		'ac'=>'access'
);
// 访问关联数组，通过$ms_office['ac']访问到'access'.
// 若省略指定索引，php会为数组产生从0开始的整数索引。若索引是整数，则下一个产生的索引是当前最大整数索引值加1.
$ms_office = array(
		0=>'word',
		3=>'excel',
		'outlook',
		'access'
);
echo "<br/>";
// 最大索引为3，故outlook的索引值为最大索引值加1，为4,access为5
// 使用赋值运算符“=”，可将一个数组复制到另一个数组，此时两个数组具有相同的索引及对应的数值
$ms_office = array(0=>'word',1=>'excel',2=>'outlook',3=>'access');
$arr_tmp = $ms_office;
echo $arr_tmp[1];
// 此时数组$arr_tmp具有了和$ms_office完全相同的索引和数组元素。

/* （2）. 使用变量建立数组
 * 使用compact()函数，可以把单个变量或多个变量，甚至数组添加为数组的成员。这些数组成员的键名是变量的变量名，值是这些变量的值。
 * compact()函数的参数是要添加入数组的变量的变量名。
*/
// 创建变量
$number = 18;
$string = "字符串";
$array = array("boy","girl");
echo "<br/>";
// 使用compact()函数创建新数组
$newArray = compact("number","string","array");
// 显示新数组
print_r($newArray);
echo "<br/>";

//print_r可以输出stirng、int、float、array、object等，输出array时会用结构表示，print_r输出成功时返回true；
// compact()函数的参数是变量的变量名，即$符号后面的部分。若compact()的参数中出现了非变量名的字符串，这个参数是无效的。
// 当一个文档中出现了大量的变阿菱，并要对这些变量进行排序操作时，可使用compact()函数，将这些变量统一管理；操作完成后，可使用extract()函数还原compact()函数的操作
/* （3）. 使用两个数组创建一个数组
 *  使用array_combine()函数，可以把两个数组合并为一个数组，但不是把两个数组的成员相加，而是使用第一个数组作为新数组的索引，另一个数组作为新数组的值
*/

// 定义两个数组
$keys = array(1,2,3,4);
$values = array("red","green","blue","yellow");
// 使用array_combine()创建新数组
$newArray = array_combine($keys, $values);
// 显示新数组
print_r($newArray);
echo "<br/>";
// 作为array_combine()函数的两个数组，要有相同的数组成员，否则会导致程序错误

// 2.输出数组元素的方法
/* （1）. 使用for循环语句输出数组元素
 * 对于一个按整数顺序索引的数组，可以通过for循环语句来一次访问数组元素
*/
// 定义数组$ms_office1
$ms_office1 = array(
		'word',
		'excel',
		'outlook',
		'access'
);
// 从0-3的循环
for($i=0;$i<4;$i++)
{
	echo "数组第".($i+1)."个元素是："; // 元素总比索引值多1
	echo $ms_office1[$i]; // 输出索引为i的数组值
	echo "<br/>";
}
// 代码77-82行定义了一个数组，但没指定他的索引，故使用默认的整数形式。

/* （2）. 使用foreach循环语句输出数组元素
 * 语法结构： foreach ($array as $some_var)
  {	 
    statement
  }
*/
// 其中，foreach、as都是php关键字。该语法结构含义是：按顺序，每次将数组$array中的一个元素存入变量$some_var后执行statement语句
// 然后取下一个元素执行statement语句，一次下去，直到所有元素都取到。
// 定义数组ms_office2
$ms_office2 = array(
		'word',
		'excel',
		'outlook',
		'access'
);
// 使用foreach遍历数组$ms_office2的值
foreach ($ms_office2 as $value){
	echo $value; // 输出$ms_office2中的值
	echo "<br/>";
}
// foreach不仅可以获取数组元素，还可以获取数组索引

// 定义数组$ms_office3
$ms_office3 = array(
		'wd'=>'word',
		'ec'=>'excel',
		'ol'=>'outlook',
		'ac'=>'access'
);
// 遍历数组$ms_office3
foreach ($ms_office3 as $key=>$value){
	echo $key.":".$value; // 输出数组中$ms_office3的索引和元素
	echo "<br/>";
}
// 这段代码中，每次foreach循环都会将数组的一个索引赋给变量$key,将其对应的值赋给变量$value

/* （3）. 使用函数print_r()显示数组元素
 * 为了在程序中查看一个数组的结构(索引和值的对应关系),需要将数组结构显示到页面上。 
*/

$ms_office4 = array(
		'word',
		'excel',
		'outlook',
		'access'
);
echo "<pre>";
print_r($ms_office4);
"</pre>";
// print_r输出数组索引和值的对应结构
// HTML标签<pre>可定义欲格式化的文本
/* <pre></pre>标签可以把他们之间文本中的空格、回车、换行、Tab键表现出来。按照文本原先的布局显示。
*/

// 3.计算数组元素个数
/*
 * 使用count()计算数组元素的个数，该函数返回值为一个整数，即数组元素的个数。
 * int count(mixed $var);
 * mixed表示参数var可以是多种不同的数据类型，该函数不仅仅可以用来计算数组元素个数。
*/
$ms_office5 = array(
		'word',
		'excel',
		'outlook',
		'access'
);
$item_num = count($ms_office5);
echo '数组$ms_office5的元素个数为：'.$item_num;
// 注意在使用count()函数时，需要一个变量$item_num来保存函数的返回值。

// 4. 对数组进行分割、合并
/*
 * 数组的分割是指将一个数组拆分成一个或多个数组。数组的合并是指将多个数组组合成一个新的数组。
 * */
/*
 * （1）. 数组分割
 *  使用array——chunk()可对一个数组进行分割
 *  array array_chunk(array $input_array, int $size, bool $preserve_key);
 *  该函数接受3个参数，$input_array是将要分割的数组（原数组）；$size表示原数组被分隔后，每个数组中元素的个数；
 *  $preserve_key为可选参数，为true时分割后的每个数组的索引使用原数组的索引名；
 *  为false时分割后的每个数组的索引从0开始，该数组的每个元素仍然是一个数组，即每个结果数组使用从零开始的新数组索引。
 * */
// 定义数组$ms_office6
$ms_office6 = array(
		'wd'=>'word',
		'ec'=>'excel',
		'ol'=>'outlook',
		'ac'=>'access',
		'vs'=>'visio'
);
echo "<pre>";
print_r(array_chunk($ms_office6, 2));
print_r(array_chunk($ms_office6, 2,true));
print_r(array_chunk($ms_office6, 3, false));

/*
 * （2）. 数组合并
 * 使用函数array_merge()可合并一个或多个数组
 * array array_merge($array...);
 * 该函数接受一个或多个数组作为参数，php5中，它只接受array类型的参数。该函数返回一个合并后的数组。
 * */

$arr1 = array('Earth','Venus'); // 定义数组$arr1
$arr2 = array(4=>'Mars',5=>'Jupiter',6=>'Saturn');  // 定义数组$arr2
$planet = array_merge($arr1,$arr2); // 合并数组$arr1和$arr2
echo "<pre>";
print_r($planet);
// 如果要合并的数组中只有一个数组的索引是数字，合并后的数组的索引会从0开始，重新索引
// 如果要合并的数组中有相同的字符串索引，后面的索引值会覆盖前一个索引值。

$arr3 = array(1=>'Earth',2=>'Venus');
$arr4 = array(1=>'Mars',2=>'Jupiter',3=>'Saturn');
$planet1 = array_merge($arr3,$arr4);
echo "<pre>";
print_r($planet1);
// 打印结果都是从0开始需验证

// 5. 处理数组元素和键值位置
/*
 * php的每个数组内部都会有一个指针指向当前元素。指针即程序即将要处理的元素所在的位置。处理数组元素和键值（索引）的位置，
 * 就是获取数组某个位置上的元素，或获取该元素后，将该指针移动到的其他位置。php中，处理数组元素和键值位置的函数有以下几个：
 * */
/*
 * current(): 返回数组的当前元素，不移动当前指针位置。
 * next():返回当前元素的下一个元素的值，并将指针向后移动一位，下一个元素不存在时，返回false
 * prev():返回当前元素的上一个元素的值，并将指针向前移动一位，上一个元素不存在时，返回false
 * end():返回数组的最后一个元素的值。
 * 注意：数组中只有一个指向当前元素（current）的指针
 * */
$planet2 = array(
		'Earth',
		'Venus',
		'Mars',
		'Jupiter',
		'Saturn'
);  // 定义数组$planet
$pos = current($planet2); // 此时$pos = Earth
echo 'pos1='.$pos;
echo "<br/>";

$pos = next($planet2);  // 此时$pos = Venus
echo 'pos2='.$pos;
echo "<br/>";

$pos = current($planet2); // 此时$pos = Venus
echo 'pos3='.$pos;
echo "<br/>";

$pos = prev($planet2);  // 此时$pos = Earth
echo 'pos4='.$pos;
echo "<br/>";

$pos = end($planet2); // 此时$pos = Saturn
echo 'pos5='.$pos;
echo "<br/>";

$pos = current($planet2); //此时$pos = Saturn
echo 'pos6='.$pos;
echo '<br/>';

// current()获取当前元素，刚创建好的数组当前元素是第一个元素。

// 6.数组排序
/*
 * 对数组排序实际指的是对数组元素排序。使用php内置函数，课实现多种方式的数据排序。
 * */
// 排序时删除原数组的索引
/* （1）.sort()
 *  sort()对数组元素按顺向排序，即按字母由前向后，或按数字由小到大的顺序排序。
 *  bool sort(array &$arr [,int $sort_flag]); 第二个参数可选
 *  该函数接受一个数组作为输入参数，若处理成功，返回true，否则返回false。
 *  该函数会删除所要排序的数组原有的索引值，并为该数组使用新的索引值。(默认数字索引)
 * */
$planet3 = array(
		'a'=>'Earth',
		'b'=> 'Venus',
		'c'=> 'Mars',
		'd'=> 'Jupiter',
		'e'=> 'Saturn'
);
// 定义数组$planet3
sort($planet3); // 对数组$planet3排序
foreach ($planet3 as $key => $value){
	echo 'planet3['.$key.']='.$value;
	echo '<br/>';
}

/* （2）. rsort()
 *  rsort()对数组元素做逆向排序，按字母从后到前，或按数字由大到小的顺序排序。
 *  bool rsort(array &$arr [,int $sort_flag]);
 *  该函数接受一个数组作为输入参数，若处理成功，返回true，否则返回false。该函数将删除所要排序的数组原有的索引值，为该数组使用新的索引值。
 * */
// 定义数组$planet4
$planet4 = array(
		'Earth',
		'Venus',
		'Mars',
		'Jupiter',
		'Saturn'
);
// 对数组planet4排序
rsort($planet4);
foreach ($planet4 as $kay => $value){
	echo 'planet4['.$kay.']='.$value;
	echo '<br/>';
}
/* （3）. 排序时保持原数组的索引
 *  sort()和rsort()都会为要排序的数组重新建立索引
 *  asort()：该函数对数组元素进行排序，并保持数组的原索引关系不变。该函数对数组元素按顺向排序。处理成功返回true，反之返回false
 *  ksort():该函数对数组元素按索引名顺序排序，并保持数组的原索引关系不变。处理成功返回true，反之返回false。该函数主要用于关联数组
 * */
// 数组元素字母从小到大排序
	$planet5 = array(
			'X'=>'Earth',
			'Y'=>'Venus',
			'Z'=>'Mars',
			'A'=>'Jupiter',
			'B'=>'Saturn'
	);
	// 定义数组$planet5
	asort($planet2);
	ksort($planet5);
	echo '使用函数asort对数组元素排序：';
	echo '<br/>';
	foreach ($planet2 as $kay => $value){
		echo '$planet2['.$kay.']='.$value;
		echo '<br/>';
	}
	echo '<br/>';
	echo '使用函数ksort对数组元素排序：';
	echo '<br/>';
	foreach ($planet5 as $kay=>$value){
		echo '$planet5['.$kay.']='.$value;
		echo '<br/>';
	}
/* （4）. 数组随机排序
 * shuffle();
 * bool shuffle (array $array)
 * 该函数为参数数组$array中的元素赋予新的键名，这将删除原有的键名，并不仅仅是重新排序。执行成功返回true。
 * */
   $cellphone_brand = array(
   		'nokia',
   		'moto',
   		'lenovo',
   		'tcl'
   );
   // 定义数组$cellphone_brand
   echo '原数组：';
   echo '<br/>';
   echo '<pre>';
   print_r($cellphone_brand);  // 输出数组$cellphone_brand的结构
   echo '<br/>';
   shuffle($cellphone_brand); // 进行随机排序,每次刷新结果都不同
   echo '<br/>';
   echo '元素被重新排序后：';
   echo '<br/>';
   foreach ($cellphone_brand as $cpb)
   echo $cpb.' ';
   echo '<br/>';
/* （5）. 数组的反向排序
 * 将数组元素按原顺序反向排序的函数 array_reverse()
 * array array_reverse (array $array [, bool $preserve_keys])
 * 该函数返回一个与原数组单元顺序相反的数组，原数组以参数$array传入该函数，第二个参数可选。若第二个参数$preserve_keys设置为true，则原数组的键名将会被保留
 * */ 
   $cellphone_brand1 = array(
   		'nokia',
   		'moto',
   		'lenovo',
   		'tcl'
   );
   echo '原数组：';
   echo '<br/>';
   
   echo '<pre>';
   print_r($cellphone_brand1);
   echo '</pre>';
   $cpb1 = array_reverse($cellphone_brand1);
   echo '<br/>';
   echo '按原顺序反向：';
   echo '<pre>';
   print_r($cpb1);
   echo '</pre>';
// 函数array_reverse()会将原数组元素顺序颠倒后，返回到一个新数组当中，原数组并未改变。

// 7. 重置数组
/*
 * php中重置一个数组，即将数组中的内部指针移动到该数组的第一个元素坐在的单元。reset()实现重置
 * mixed reset(array &$arr);
 * */
// 该函数接受一个数组类型的变量，将函数内部指针指向数组第一个单元，并将第一个单元的元素返回。若数组为空，返回false

  $planet6 = array(
  		'Earth',
  		'Venus',
  		'Mars',
  		'Jupiter',
  		'Saturn'
  );
  echo '当前元素是：'.current($planet6);
  echo '<br/>';
  next($planet6);
  next($planet6);
  echo '<br/>';
  echo '调用两次next函数后，当前元素是：'.current($planet6);
  echo '<br/>';
  reset($planet6);
  echo 'reset数组$planet6后，当前原始是：'.current($planet6);
  echo '<br/>';
  // next()函数对数组的指针进行移动。实际应用中：某个数组经过某种处理后，它的当前元素已不是第一个元素，而此后程序又要对数组的每一个元素处理。遇到这种情况，
  // 应先调用reset()函数，对数组重置后，在处理数组中的每个元素。该函数常和curent()、prev()、next()一起使用
  
  // 8. 用数组对变量赋值
  /*
   * php中可使用语言结构list()实现将数组的元素作为值赋给变量
   * */
  $planet7 = array(
  		'Earth',
  		'Venus',
  		'Mars',
  		'Jupiter',
  		'Saturn'
  );
  list($no1,$no2,$no3) = $planet7;
  // 将数组中前三个元素分别赋给list结构中对应的3个变量
  echo 'no1='.$no1;
  echo '<br/>';
  echo 'no2='.$no2;
  echo '<br/>';
  echo 'no3='.$no3;
  echo '<br/>';
  // list()仅用于数字索引的数组，并假定其索引从0开始
  
  // 9. 快速创建数组
  /*
   * 函数range()可快速创建指定元素范围的数组
   * array range(mixed $low, mixed $high [, number $step])
   * range()函数返回一个数组，其中元素为参数从$low到$high的序列，包括他们本身。
   * 如range(1,5) 即 array(1,2,3,4,5),如果$low>$high，则序列将从$high 到 $low
   * $step可选，若给出step值，其将作为元素之间的跨度值，step应为正值，若未指定，step默认为1
   * */
  
  echo '<pre>';
  $arr1 = range(5,10);
  print_r($arr1);
  
  $arr2 = range("a","f");
  print_r($arr2);
  
  $arr3 = range(2,10,2);
  print_r($arr3);
  // 第三个参数代表元素之间的步长值。
  
  // 10. 压入和弹出数组元素
  /* 压入：向数组的末尾增加一个元素。弹出：将数组中的最后一个元素取出  array_push() array_pop()
   * （1）. 压入数组元素
   *  array_push()将一个或多个元素压入数组的末尾
   *  int array_push(array $array, mixed $var)
   *  该函数将参数$array当成一个数据栈，将传入的参数$var压入$array的末尾。array的长度将根据入栈变量的数目增加，
   *  正常执行时，该函数返回数组$array新的单元总数
   * */
  
  $arr = array(
  		'Beijing',
  		'Lodon',
  		'Rome'
  );
  echo '原数组：';
  echo '<pre>';
  print_r($arr);
  array_push($arr,'Oslo','Seoul');  // 向数组压入两个元素
  echo '<br/>';
  echo '调用函数array_push之后：';
  echo '<br/>';
  print_r($arr);
  
  /* （2）. 弹出数组元素
   * array_pop()将数组最后一个元素弹出
   * mixed array_pop(array $array)
   * 该函数弹出并返回参数$array数组的最后一个单元，并将数组$array的长度减一。若参数$array为空（或不是数组）,函数返回null
   * 使用本函数后会重置数组指针，相当于使用了函数reset()
   * */
  $arr =array(
  		'Beijing',
  		'London',
  		'Rome',
  		'Moscow',
  		'Singapore'
  );
  echo '原数组:';
  echo '<pre>';
  print_r($arr);
  echo '</pre>';
  
  $arr_tmp = array_pop($arr);  // 弹出数组最后一个元素
  echo '<br/>';
  

  echo 'pop出数组的元素是：<b>'.$arr_tmp.'</b><br/>';
  echo '调用函数array_pop()之后：<br/>';
  echo '<pre>';
  print_r($arr);
  
  // 11. 改变数组字符索引名的大小写
  /*
   * php中，array_change_key_case(),可将以字符串作为索引（键名）的大小写全部更换
   * array array_change_key_case(array $input [, int $case])
   * 函数array_change_key_case()将参数$input数组中的所有索引改为全小写或全大写。
   * 可选参数$case用来指定大小写转换方式，其为两个常量CASE_UPPER 和 CASE_LOWER 未指定时，使用默认值CASE_LOWER
   * */
  $olympic = array(
  		'Barcelona' => 1992,
  		'AtLanTa'=> 1996,
  		'sydney'=> 2000,
  		'AthEns'=>2004,
  		'Beijing'=>2008
  );
  echo '原数组：';
  echo '<pre>';
  print_r($olympic);
  echo '</pre>';
  $nol = array_change_key_case($olympic, CASE_UPPER);
  echo '<br/>';
  echo '调用array_change_key_case()之后：';
  echo '<pre>';
  print_r($nol);
  // array_change_key_case()函数对数字索引的数组无效
  
  // 12. 对数组的集合处理
  /* （1）. 计算交集
   *  array_intersect()函数用来计算数组的交集
   *  array array_intersect(array $arr1, array $arr2 [, $arr ...])
   *  array_intersect()返回一个数组，该数组包含了在参数数组$arr1中出现，同时也出现在所有其他参数数组中的值，键名保留不变
   *  键名以第一组的键名为准
   * */
  
  $array1 = array(
  		'a'=>'green',
  		'red',
  		'blue'
  );
  $array2 = array(
  		'b'=>'green',
  		'yellow',
  		'red'
  );
  $result = array_intersect($array1, $array2);
  echo '<pre>';
  print_r($result);
  
  /* （2）.带索引计算交集
   *  array_intersect_assoc()
   *  该函数要求数组之间不仅元素要一样且索引也要一样，才能满足交集条件。
   *  array array_intersect_assoc(array $arr1, array $arr2 [,$arr ...])
   *  array_intersect_assoc()函数返回一个数组，该数组中包含了参数数组$arr1、$arr2...中元素相同且索引值也相同的所有元素
   * */
  
  $arr1 = array(
  		'a'=>'green',
  		'b'=>'brown',
  		'c'=>'blue',
  		'red',
  		'p'=>'pink'
  );
  $arr2 = array(
  		'a'=>'green',
  		'yellow',
  		'red',
  		'p'=>'pink'
  );
  $result_array = array_intersect_assoc($arr1, $arr2);
  // 带索引计算俩数组的交集
  echo '<pre>';
  print_r($result_array);
  echo '<br/>';
  // 本例中'red'的索引值两组并不同，故没有出现在交集中
  
  /*
   * （3）. 计算差集
   * array_diff()计算数组之间的差集
   * array array_diff(array $arr1, array $arr2 [, $arr...])
   * array_diff()函数返回一个数组，该函数包括了所有在参数数组$arr1中出现，但是不在任何其他参数数组中出现的值。
   * 索引值保留不变。
   * array_diff_assoc()与array_intersect_assoc()类似，带索引计算数组差集
   * */
  
  $arrm = array(
  		'a'=> 'apple',
  		'b'=> 'banana'
  );
  $arrn = array(
  		'c'=>'banana',
  		'd'=>'water'
  );
  $result_mn = array_diff($arrm, $arrn);
  echo '调用array_diff()函数后：';
  echo '<pre>';
  print_r($result_mn);
  echo '<br/>';
  
  // 13. 交换数组索引和元素
  /* php中，使用array_flip实现索引和元素的交换
   * array array_flip(array $arr)
   * 参数$arr是一个要做索引和元素对换的数组，函数会将数组$arr的索引和元素对换后返回。
   * 需要注意的是，$arr中的元素必须是能做数组索引的类型，如string类型或integer类型。 若值的类型不对，php会发出警告且有问题的键/值对将不会对换
   * 若同一个元素出现了多次，则最后一个索引名将作为他的元素，所有其他的将被丢失。 array_flip()执行失败，将返回false
   * */
   $olympic1 = array(
   		'Barcelona'=>1992,
   		'AtLanta'=>1996,
   		'Sydney'=>2000,
   		'Athens'=>2004,
   		'Beijing'=>2008
   );
   echo '原数组：';
   echo '<pre>';
   print_r($olympic1);
   echo '</pre>';
   $nol1 = array_flip($olympic1);
   echo '<br/>';
   echo '数组元素和索引对调之后：';
   echo '<pre>';
   print_r($nol1);
   echo '<br/>';
   
   // 14. 快速填充数组元素
   /*
    * php中array_fill()可以将数组中的某些或所有元素都设置成同一个值
    * array array_fill(int $start, int $num, mixed $value)
    * array_fill()函数有三个参数，$start指定要填充元素的开始索引，$num表示将$num个数组元素以参数$value(内容)填充
    * */
   $arrs = array_fill(2, 4, 'orange');
   echo '<pre>';
   print_r($arrs);
   echo '<br/>';
   
   // 15. 统计数组元素出现次数
   /* count()计算整个数组元素的个数，array_count_values()统计数组中个元素出现的次数
    * array array_count_values(array $arr)
    * 该函数返回一个数组，这个数组把参数数组$arr中的元素作为索引，元素出现的次数作为对应索引的值
    * */
   $say =array(
   		'Say',
   		'you',
   		'say',
   		'me',
   		'Say',
   		'it',
   		'together'
   );
  echo '原数组：';
  echo '<pre>';
  print_r($say);
  echo '</pre>';
  
  $say_tmp = array_count_values($say);
  echo '<br/>';
  echo '统计结果如下:';
  echo '<pre>';
  print_r($say_tmp);
  //array_count_values()统计元素时区分元素大小写
  
  // 16. 检查数组索引是否存在
  /*
   * array_key_exists()检查给定的索引是否存在于数组中
   * bool array_key_exists(mixed $key, array $search)
   * 该函数查找 由参数$key指定的索引是否存在于由参数$search指定的数组中，若存在返回true,否则返回false
   * $key可以是任何能作为数组索引的值
   * */
  $olympic2 =array(
  		'Barcelona'=>1992,
  		'AtLanta'=>1996,
  		'Sydney'=>2000,
  		'Athens'=>2004,
  		'Beijing'=>2008
  );
  $city = array(
  		'Rome',
  		'Athens',
  		'Shanghai'
  );
  foreach ($city as $value){ // 遍历数组
  	if(array_key_exists($value, $olympic2)){
  		echo $value.'是数组olympic2的索引';
  		echo '<br/>';
  	}else{
  		echo $value.'不是olympic2的索引';
  		echo '<br/>';
  	}
  }
  // 17. 取得数组中的所有索引
  /* php提供了array_keys()函数，来获取数组中的所有的索引名
  * array array_keys(array $arr [, mixed $search_value [, bool $strict]])
  * 该函数将参数数组$arr中所有的索引名返回到一个数组中。参数$search_value可选，若指定该参数，则函数array_keys()只返回该元素值对应的索引名
  * 可选参数$strict用来进行全等比较
  */
  $arr5 = array(
  		0=>100,
  		'gold'=>'money',
  );
  $arr6 = array(
  		'Sunday',
  		'Saturday',
  		'Monday',
  		'Sunday',
  		'Sunday'
  );
  echo '<pre>';
  echo '数组arr5的全部索引是:';
  print_r($arr5);
  echo '数组$arr6中元素"Sunday"的全部索引是：';
  echo '<br/>';
  print_r(array_keys($arr6,'Sunday'));
  // array_keys()指定了两个参数，即在哪个数组中寻找元素值只是'Sunday'的索引 输出的内容是对应元素的索引值
  
  // 18. 用回调函数处理数组
  /*
   * 函数array_map()可以支持回调函数操作给定数组的元素
   * array array_map(callback_func, array $arr1 [, array...])
   * 函数array_map()返回一个数组，该数组包含了参数$arr1中的所有元素经过函数callback_func()处理之后的元素
   * callback接受参数的数目应该和传递给array_map()函数的数组数目一致
   * */
  function cube($n){
  	$cb = $n*$n*$n;
  	return $cb;
  }
  $a = array(1,2,3,4,5);
  $b = array_map("cube", $a);
  echo '计算原数组各元素的立方，结果如下:';
  echo '<br/>';
  echo '<pre>';
  print_r($b);
  // 首先定义一个函数cube()，功能是计算某个数字的立方值。然后调用array_map(),将函数cube()作用于数组$a的每一个元素，就是为每个元素做立方值的计算
  // 最后将函数array_map()的返回值数组输出到页面
  
  // 19. 其他数组处理函数
  // in_array() key()
  // （1）. 判断某个值是否存在于数组
  // in_array()函数判断某个值是否存在于数组中。若在数组中找到该值，返回true，否则返回false
  // in_array()函数接受两个值 第一个参数为要找的值 第二个参数是要在其中找值的数组 且该函数区分大小写
  // key()函数可获取数组中当前单元(元素)的索引值
  
  $planet8 = array(
  		'Earth',
  		'Venus',
  		'Mars',
  		'Jupiter',
  		'Saturn'
  );
  $temp = 'mars';
  if(in_array('Mars', $planet8)){ // 判断Mars是否是数组的元素
  	echo 'Mars 存在于数组$planet中';
  	echo '<br/>';
  }
  if(in_array($temp, $planet8)){
  	echo $temp.'存在于数组$planet中';
  	echo '<br/>';
  }
  else{
  	echo $temp.'不存在于数组$planet中';
  	echo '<br/>';
  }
  
  // （2）.获取数组中当前单元的索引值
  $planet9 = array(
  		'Eth'=>'Earth',
  		'Vns'=>'Venus',
  		'Mrs'=>'Mars',
  		'Jpt'=>'Jupiter',
  		'Stn'=>'Saturn'
  );
  end($planet9);
  echo '当前元素的索引为：'.key($planet9);
  echo  '<br/>';
  echo '当前元素的值是：'.end($planet9);
  
  
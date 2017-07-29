<?php
// php 程序中的注释
echo "test string1";
echo "<br/>";
echo "<br/>";
// echo "<br/>";
// echo "<br/>";
// echo "test string2";
// echo "test string3";
echo "test string4";
echo "<br/>";

// php中的字符串和字符转义
$s = "new string";

// 双引号字符串中的符号$未作转义，$s将显示其变量的值
$str_1 = "双引号指定的字符串不转义显示变量，$s";
// 双引号字符串中的符号$转义，$s不会显示其变量的值,直接显示$s
$str_2 = "双引号指定的字符串转义原样输出,\$s";
// 单引号状态下定义的字符串，无论转义与否，都原样输出
// 单引号字符串中的$s不用转义即可原样输出
$str_3 = '单引号指定的字符串不转义原样输出,$s';
// 单引号字符串中的$s转义,结果为\$s
$str_4 = '单引号指定的字符串转义，带符号原样输出,\$s';
// 在双引号字符串中，输出特殊字符如： $ " \ 需要转义 '(单引号)不必转义
$str_5 = "在双引号字符串中， 输出特殊字符：\$ \" \\ '";
// 在单引号字符串中，输出' (单引号)需要转义
$str_6 = '在单引号字符串中，输出特殊字符：$ " \ \'';

echo "$str_1";
echo "<br/>";
echo "<br/>";

echo "$str_2";
echo "<br/>";
echo "<br/>";

echo "$str_3";
echo "<br/>";
echo "<br/>";

echo "$str_4";
echo "<br/>";
echo "<br/>";

echo "$str_5";
echo "<br/>";
echo "<br/>";

echo "$str_6";
echo "<br/>";
echo "<br/>";
?>

<?php 
// php字符串的连接 php中常使用英文句点 . 连接两个字符串
$s1 = "php in ";
$s2 = "windows";
$s = $s1.$s2;
echo '$s1='.$s1;
echo "<br/>";

echo '$s2='.$s2;
echo "<br/>";

echo '$s='.$s;
echo "<br/>";

// 布尔类型 boolean
// 布尔类型取值只有两个，true（任意数/1）/false（0） 且不区分大小写
$flag = true;
$run = false;
echo "$flag"; // 1
echo "$run"; // php中false无输出值
echo "<br/>";

// 数组类型 array
// 标量变量指：一个被命名的存储一个数值的空间
// 数组指：一个被命名的存放一组数值的空间
// 数组中的值被称为元素，每个元素和一个索引（键、下标）相关联。通过索引可访问数组元素。
// 注意，无法直接输出整个数组 索引比元素少1
$arr = array('spring','summer','fall','winter');
echo "$arr[1]"; 
echo "$arr[2]";
echo "<br/>";

// php除了支持数字索引外，还支持字符串索引，又名关联数组。即通过字符串索引和元素关联。
// => 一般用于数组键名与元素的连接符 $key => $value
$sys = array(
"server" => "Apache",
"os" => "Windows",
"db" => "MySQL",
);

echo $sys["server"];
echo "<br/>";

// 变量类型的转换
// php在定义变量时不需要明确指定变量的类型，赋给变量什么类型的值，变量即为什么类型
// 变量强制转换
$foo = 10;
echo "转换前：\$foo=".$foo;
echo "<br/>";
$foo = (boolean) $foo;
echo "转换后：\$foo=".$foo;
echo "<br/>";
// 非零值转换为布尔型结果都为真（1）

// 可变变量 指：将某个变量的值作为自己的变量名
$i = "abc";
$$i = "xyz"; // 等价于$abc= "xyz"; $$i为可变变量, $$i = $abc
echo "\$i=".$i;
echo "<br/>";
echo "$\$i=".$abc;
echo "<br/>";

// php预定义变量
// $GLOBALS 指全局范围内的有效变量，是一个数组，该数组的索引（键名）就是全局变量的名称
$a = "test string";
echo "通过\$GLOBALS来取变量值：".$GLOBALS["a"];
echo "<br/>";
// $_SERVER 指包含头信息、路径和脚本位置的数组， $_SERVER元素下包含许多变量： 
// PHP_SELF（当前执行脚本的文件名） SERVER_ADDR（当前执行脚本所在服务器的IP地址）SERVER_NAME（当前执行脚本所在服务器主机名称）
// DOCUMENT_ROOT（当前脚本所在文档的根目录） SCRIPT_FILENAME（当前执行脚本的绝对路径）SCRIPT_NAME（当前脚本的路径）
// 获取一下信息，需要先通过$_GLOBALS获取变量
echo "当前执行脚本的文件名：".$_SERVER["PHP_SELF"];
echo "<br/>";
echo "当前执行脚本所在服务器的IP地址:".$_SERVER["SERVER_ADDR"];
echo "<br/>";
echo "当前执行脚本所在服务器主机名称：".$_SERVER["SERVER_NAME"];
echo "<br/>";
echo "当前脚本所在文档的根目录：".$_SERVER["DOCUMENT_ROOT"];
echo "<br/>";
echo "当前执行脚本的绝对路径：".$_SERVER["SCRIPT_FILENAME"];
echo "<br/>";
echo "当前脚本的路径:".$_SERVER["SCRIPT_NAME"];
echo "<br/>";
echo "<br/>";

// $_GET 指通过HTTP的GET方法提交至脚本的表单变量
// $_POST 指通过HTTP的POST方法提交至脚本的表单变量
// $_FILE 指通过HTTP的FILE文件上传提交至脚本的变量
// $_COOKIE 指通过HTTP的Cookies方法提交至脚本的变量

// 判断变量的类型
// 函数：完成某种特定功能的代码块，可向函数内传参，函数对参数处理后，将结果返回给用户
// php中可通过一下函数对变量类型进行判断：
// 函数is_integer(): 判断变量是否为整数
// 函数is_string(): 判断变量是否为字符串
// 函数is_double(): 判断变量是否为浮点数
// 函数is_array(): 判断一个变量是否为数组
$m = "this is a string";
$n = 9;
$arr = array(2,4,6);
$m1 = is_string($m);
$m2 = is_string($n);
$m3 = is_array($arr);
is_array($m); // 注意不能直接 echo "is_array($m)"输出
echo "$m2"; // 结果为假无返回值
echo "$m3"; // 结果为真返回1
echo "<br/>";
echo "<br/>";

// 获取变量的类型
// php中使用预定义函数 gettype()取得一个变量的类型，它接受一个变量作为参数，返回该变量的类型

$str = "this is a string";
$int = 0.21;
$bool = false;
echo "\$str的类型是：".gettype($str);
echo "<br/>";
echo "\$int的类型是：".gettype($int);
echo "<br/>";
echo "\$bool的类型是：".gettype($bool);
echo "<br/>";

// 设置变量的类型
// php中使用预定义函数settype()可设置一个变量的类型。 该函数有两个参数：（变量名，要设置的变量数据类型）
$a = 100;
echo "设置前,变量\$a的类型是：".gettype($a);
echo "<br/>";
settype($a, "string");
echo "设置后，变量\$a的类型是：".gettype($a);
echo "<br/>";
echo "<br/>";

// 判断一个变量是否已经定义
// php中使用预定义函数isset()课判断一个变量是否已定义，其接受一个变量作为参数，返回值为 true,则定义过，否则未定义。
$var = "test string";
echo isset($var); // 定义过返回1
echo isset($as);  // 未定义过无返回值
echo "<br/>";
echo "<br/>";

// 删除一个变量
// php中使用unset语言结构可一次删除多个php变量。
$var = "this is a string";
$arr1 = array('spring','summer','fall','winter');
unset($var);
echo "$var";
unset($arr1[1]);
echo "$arr1[0]";


?>

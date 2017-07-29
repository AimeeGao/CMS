<?php
// 常量
// 常量：在程序执行过程中不能改变的量，常量不可再被定义成其他的值
// 定义常量： php中可通过define()函数定义一个常量 包含两个参数（常量名称，常量值）
// 常量名：只能以字母和下划线开始
// 关闭错误报告
// error_reporting(0);
define(TESTSTRING,"learning PHP");
define(SIZE,100);
echo "常量TESTSTRING的值为：".TESTSTRING;
echo "<br/>";
echo "常量SIZE的值为：".SIZE;

// 使用php预定义常量
// __FILE__ 正在执行的php程序的文件名 （前后各有两个下划线）
// __LINE__ 正在执行的php代码所在行数 （前后各有两个下划线）
// PHP_OS php所运行的操作系统
// PHP_VERSION 当前php的版本
// TRUE　表示真值（1或非0）的常量
// FALSE 表示伪值（0）的常量
echo "===PHP常见的预定义常量===";
echo "<br/>";
echo "<br/>";
echo "文件名：".__FILE__;
echo "<br/>";
echo "当前代码行数：".__LINE__;
echo "<br/>";
echo "PHP的版本：".PHP_VERSION;
echo "<br/>";
echo "PHP所运行的操作系统：".PHP_OS;
echo "<br/>";

// 表达式
// 表达式指程序中有值的部分 如$a=9 $a=5（表达式） 与 $a=5（语句）;是不同的，php中的每条语句都要以;结尾
$a = 3;
$b = 5;
$c = 5;
$a>$b;
$a<=$b;
$result1 = $b==$c;
echo "$result1";
$result2 = $a<=$b;
echo "<br/>";
echo "$result2"; // 3<=5 成立 返回1
echo "<br/>";

// 运算符
// 运算符：通过一个或多个表达式来产生另外一个值的某些符号
// 具有一个操作数的运算符叫单目运算符 具有两个操作数的运算符叫双目运算符
// 运算符有优先级

// php中，“=” 表示赋值。 他将“=”右边的表达式的值赋给左边的变量
$a = 12;
$a += 5; // $a = $a+5;
echo "\$a=".$a;
echo "<br/>";
// 算术运算符
// php中的算术运算符有： 加（+）减（-）乘（*）除（ /） 取模（%）取反（-）
$a = 12;
$b = 5;
$add = $a + $b;
$sub = $a - $b;
$mult = $a * $b;
$div = $a / $b;
$mod = $a % $b;
$neg = - $a;
echo "\$a + \$b=".$add;
echo "<br/>";
echo "\$a - \$b=".$sub;
echo "<br/>";
echo "\$a * \$b=".$mult;
echo "<br/>";
echo "\$a / \$b=".$div;
echo "<br/>";
echo "\$a % \$b=".$mod;
echo "<br/>";
echo "-\$a=".$neg;
echo "<br/>";

// 递增递减运算符
// $a++: 先返回$a的值，然后将$a的值加1
// ++$a: 先将$a的值加1，然后将$a返回
// $a--: 先返回$a的值，然后将$a的值减1
// --$a: 先将$a的值减1，然后返回$a的值

echo '<h3>后加递增 $a++</h3>';
$a = 5;
echo '$a='.$a++.'<br/>';  // $a++先返回$a的值5，再将$a自加1赋给$a
echo '$a='.$a.'<br/>';
echo '<h3>前加递增 ++$b</h3>';
$b =5;
echo '$b='.++$b.'<br/>';
echo '$b='.$b.'<br/>';
echo '<h3>后减递减 $c--</h3>';
$c =5;
echo '$c='.$c--.'<br/>';
echo '$c='.$c.'<br/>';
echo '<h3>前减递减 --$d</h3>';
$d =5;
echo '$d='.--$d.'<br/>';
echo '$d='.$d.'<br/>';

// 字符串运算符
// php中字符串运算符只有一个，即字符串的连接运算符 ‘.’

$s1 = "hello";
$s2 = "everyone";
echo "$s1"."$s2";
echo "<br/>";
$s1 .="friend";
echo "$s1";
echo "<br/>";

// 逻辑运算符
// !   逻辑非        !$a      若 $a 为false,则 !$a 为true
// &&  逻辑与    $a && $b  若$a和$b都为true,则$a && $b为true,   若$a或 $b任意一个为false，则$a && $b为false
// ||  逻辑或    $a || $b  若$a或$b任意一个为true,则$a||$b为true, 若$a和$b都为false,则$a||$b为false
// xor 逻辑异或 $a xor $b 如果$a或$b任意一个为true,但不同时为true,则 $a xor $b为true
$b = false;
echo !$b;
echo "<br/>";
$test1 = (14>=5)||('A'>'B'); // 若有一真则为真
$test2 = ('B'>'A')&&(8<7); // 若有一假则为假
echo "$test1"."<br/>";
echo "$test2"."<br/>";


// 比较运算符 用来对两个值进行比较
// ==（等于）            $a == $b
// !=（不等于）        $a!=$b
// === （全等于）  $a === $b
// > （大于）            $a>$b
// >= （大于等于） $a>=$b
// < （小于）            $a<$b
// <=（小于等于）    $a<=$b 若 $a 小于或等于 $b,则$a<=$b的值为true || (一真则真)

// 运算符的优先级
// new (new运算符)
// ++ -- (递增递减运算符)
// * / %
// + -
// &&
// ||
// ?: (条件运算符)
// = (赋值运算符，包含+= *= .=)
// and
// xor
// or

// php程序的流程控制 
// 程序即一系列语句的序列 一般情况，程序是按顺序执行到最后一条语句，但有时也需改变程序的执行顺序（程序流程控制）
// 计算机程序的执行结构有3种：顺序执行结构、选择执行结构、循环执行结构

// 条件控制语句 if if...else(else if)

// if语句的结构如下：如果表达式（expr）值为真，才会执行statement,若（expr）不成立，statement会被忽略，不被执行
// if(expr)
//    statement

$a =2;
$b =3;
echo '$a='.$a;
echo "<br/>";
echo '$b='.$b;
echo "<br/>";
echo "<br/>";
if($a<$b)
{
	echo "$a 小于 $b";
}
echo "<br/>";
// 当if后面跟了一个空语句时，即只加了;表示当条件为真时，程序什么都不做

// if...else语句
// if...else语句的结构如下，如果表达式(expr)值为真，程序执行语句statement1,否则程序执行statement2。
// 两个语句只能有一个被执行，另外一个会被忽略。
// if(expr)
// {
//	statement1
// }
//else
// {
//  statement2
// }
$a = 2;
$b = 3;
if($a>$b)
{
	echo "$a 大于 $b";
}
else
{
	echo "$a 小于或等于 $b";	
}

echo "<br/>";

$a =3;
$b =2;
if($a<$b)
{
	echo '$a='.$a;
	echo "<br/>";
	echo '$b='.$b;
	echo "<br/>";
	echo '$a 小于 $b';
}
else{
	echo "$a 和 $b 比较";
	echo "<br/>";
	echo '$a 大于等于 $b';
}
echo "<br/>";

// if...elseif语句
// if...elseif语句的结构如下，如果表达式expr1的值为1，程序执行语句statement1;否则判断表达式expr2,如果expr2的值为1，程序执行语句statement2
// 否则，如果有其他表达式需要判断，则一次判断下去，如果所有表达式的值都不为1，则执行else后的statement语句
// 注意，若有一个表达式的值为1，那么他的语句将被执行，剩下的其他表达式将不会做判断，程序直接从控制语句中跳出

// if(expr1)
//{
//  statement1
//}
// elseif(expr2)
//{
//  statement2
//}
//   ...
// else
//{
// statement
// }

$a =2;
$b =2;
echo '$a='.$a;
echo "<br/>";
echo '$b='.$b;
echo "<br/>";
if($a<$b)
{
	echo '$a小于$b';
}
elseif ($a>$b)
{
	echo '$a大于$b';
}
elseif ($a==$b)
{
	echo '$a等于$b';
}
else{
	echo "error!";
}
echo "<br/>";

// switch结构
// switch结构，另一种选择控制结构，其不像if语句通常需要计算逻辑表达式的值
// switch语法结构如下：
// switch(expr)
//{
//  case value1:
//		statement1
//		break;
//	case value2:
//		statement2
//		break;
//...
//	case valuen:
// 		statementn
// 		break;
// default:
// statement
//}
// switch结构首先计算表达式expr的值，若expr的值与某个case的值匹配，则从case后面的语句开始执行，直到遇到break语句
// 若expr的值不与任何case值匹配，则执行default后面的语句。若没有default语句，且表达式expr的值不与任何case值匹配
// 程序将从switch结构中跳出

$a =5;
switch ($a)
{
	case 1:
		echo "it's Januaray";
		break;
	case 2:
		echo "it's February";
		break;
	case 3:
		echo "it's March";
		break;
	case 4:
		echo "it's April";
		break;
	default:
		echo "other months";
}
echo "<br/>";
// 循环控制语句 循环控制流程可控制程序，在满足某些条件的时候，某些语句被循环执行多次
// php的循环控制只要有 for语句、while语句和do...while语句
// for循环语句
// for循环语句的控制结构如下：
// for(初始化语句;循环条件表达式;更新语句)
// statement
// for语句的执行过程如下：
// 1.执行初始化语句 2.判断循环条件表达式，若为true,则执行for语句的循环体statement语句，然后执行更新语句
// 3.再次执行第二步，知道循环条件表达式的值为false为止。

// 例子：A/B=C....D  B不等于0  比如12除以4=3,我们就可以说12被4整除,4整除12
// 被整除：就是说A被B整除，C为整数，D为0 
// 整除：就是B整除A，C为整数，D为0 
// 凡是整除和被整除得出的商一定是整数，都没有余数（D=0）
// A mod B 如果A小于或等于B，其结果是A
echo "输出10以内的偶数：";
echo "<br/>";
for($i=0;$i<=10;$i++)
{
	if($i%2==0)
	{
		echo  "$i";
		echo "<br/>";
	}
}
echo "<br/>";

// while循环语句
// while循环语句的结构如下：
// while(expr)
//   statement
// 该结构的执行流程是：当表达式expr的值为真时，就执行循环体(statement)，并再次计算表达式expr的值，直到expr的值为假时
// 程序中断循环，跳出while循环结构
$a = 0;
while($a<=20)
{
	echo "$a";
	echo "<br/>";
	$a +=5;
}

// do...while循环语句
// do...while循环语句的结构如下： 此处的statement可以是单条语句也可以是语句组
// do
//   statement
// while(expr);
// 该语句的执行流程是：程序首先执行语句statement，然后计算表达式expr的值，若表达式为真，就再次执行语句statement
// do...while 与 while不同的是，do...while的循环体至少会执行一次，因为其实先执行循环体再做条件判断

echo "循环计算1-50之间的整数的和:";
echo "<br/>";
$i = 1;
$s = 0;
do
{
	$s = $s + $i;
	$i++;
//	echo "$i";  2
}
while($i<=50);
echo "1+2+3+...+49+50=".$s;
echo "<br/>";

$i=2;
switch($i++){
	
	case 2:
		echo '输出2<br/>';
		echo $i;
		break;
		
	case 3:
		echo '输出3<br/>'.$i;
		break;
		
	case 1:
		echo "输出1<br/>";
		break;
		
	default:
		break;
}
// $i++和++$i在发生赋值时是有区别的，但是无论哪种形式都不影响自身值得自增。
// 例子中执行$i++后$i的值已经变化为3了。
// 举个例子：
// $i=1;
// $y=$i++;    //这里的运算顺序是$y=$i;$i=$i+1
// 注意，此时$y的值是1，但是$i的值是自增1次后是2了。
// 同样：
// $i=1;
// $y=++$i;    //这里的运算顺序是 $i=$i+1;$y=$i;
// 结果$y=2,$i=2
// 这两个例子反映了他们赋值的顺序，也说明无论使用哪种形式，都不影响变量$i自增。
echo "<br/>";

// break 和 continue语句
// break语句可以使程序流程跳出循环结构，可以在switch、for、while、do...while语句中使用
define(PI, 3.14);
for($r=1;$r<=10;$r++)
{
	$area = PI * $r * $r;
	if($area>100)
	
		break;
		echo "r= $r, area= $area";
		echo "<br/>";
	
}

// continue语句
// continue语句的作用是结束当前的循环，即跳过该循环体中剩余的语句，转而执行下次循环，前提是循环条件满足
// continue语句和break语句的区别： continue只结束本次循环，而break语句终止整个循环的执行，不再做条件的判断

for($a=100;$a<=200;$a++)
{
	if($a%3 == 0) // 打印不是3的倍数在100-200内的值
	{
		continue;
	}
	echo $a;
	echo "<br/>";
}

// 条件运算符 (? :)
// 条件运算符的用法如下： (有几个操作数即为几目运算符)
// expr1 ? expr2 : expr3 (三个操作数 => 三目运算符)
// 计算规则：若表达式expr1值为true,则整个表达式的值就取expr2的值，否则取expr3的值。
$max = ($a>=$b)? $a : $b;
// 条件运算符也可用 if...else语句实现，但条件运算符使程序更精炼，执行也更迅速 

// 函数
// php中的函数可分为 预定义函数 和自定义函数
// 定义函数
// php使用如下语法定义一个函数：
// function func_name(param_list)
//	{statement}
// function是php的保留关键字，表示定义一个函数。 func_name是函数名，自定义。（函数名以字母或下划线开头）
// 函数名后的括号用来存放函数的参数（param_list）,若不需要参数，则为空。
function say_hello1(){
	$name = "jack";
	echo "Hello,".$name;
}
	say_hello1();
	echo "<br/>";
//函数需要被调用，才能执行

// 函数的参数和函数的返回值
// 函数体内的变量及形参都是抽象的，唯有在函数调用时对实参具体化
function say_hello2($some_name){
	echo "Hello,".$some_name;
	echo "<br/>";
}
say_hello2("Jack");
say_hello2("Harry");
say_hello2("Ema");
echo "<br/>";

// 函数的默认参数
function say_hello3($some_name = "Jack"){ // 为函数赋了默认值 "Jack",当程序中调用函数但又没传参时，就会使用默认值
	echo "hello,".$some_name;
	echo "<br/>";
}
say_hello3(); // 不使用任何参数调用函数时，函数将使用函数定义的默认参数"Jack"
say_hello3("Jenny");
say_hello3("Harry");
say_hello3("Ema");

// 函数的返回值
// 在调用一个函数之后，有时希望能得到一个确定的值，这就是函数的返回值
// php函数中使用return语句取得函数的返回值， return语句会将函数中一个确定的值带回到调用函数的地方。
define(PI,3.14);
for($r=3;$r<=8;$r++)
{
	$s = get_circle_area($r);
	echo "r=$r, area = $s";
	echo "<br/>";
	echo "<br/>";
}
// 定义函数get_circle_area() 参数是圆的半径
function get_circle_area($radius)
{
	$area = PI * $radius * $radius;
	return $area; 	// 返回圆的面积，并保存在return里面，待其他地方调用该函数时，将这个值返回
}
echo "<br/>";

// php函数的传值与传址
// 传值的含义指：在函数体内生成一个传入值的负值，当在函数内部对参数进行修改时，不会影响到原先传入的值。
// 传址的含义指：在函数体内真实引用传入的值，这意味着在函数体内使用的函数参数和传入的值是同一个，此时若在函数内部修改参数的值，也会影响到原先定义的值。
// php中若想使用函数传址，需要在定义函数时，在参数前加上&
$i = 100;
function func1(&$n)
{
	$n = $n +100;
}
echo "调用函数func1前:\$i =$i";
echo "<br/>";
func1($i);
echo "调用函数func1后:\$i = $i";
echo "<br/>";
// 对比函数传值
$i =100;
function func2($n)
{
	$n = $n + 100;
}
echo "调用函数func2前:\$i = $i";
echo "<br/>";
func2($i);
echo "调用函数func2后:\$i = $i";
echo "<br/>";
// 函数传值的方式不影响原先传入值的大小 函数传址的方式将影响原先传入值的大小

// 变量作用域
// 变量作用域即变量的有效范围，常规来说对于php变量，作用于只有一个。但在自定义函数中，存在一个单独的局部函数范围。
// 在一个函数内部定义的变量是局部变量，其只在本函数内有效，其作用域就是当前函数之内。 
// 在php中一个在函数外部定义的变量不会在函数内部起作用，在函数内部定义的变量不会在函数外部起作用。（不同于javascript）
// 变量作用域演示程序
$var = "some text";
function test1(){
	echo $var;
}
test1();
echo "<br/>"; // 因为函数作用域的原因，浏览器会报错，$var变量未定义
// 打印不出结果的原因是： 两个$var变量的作用域不同，第一个$var是一个全局变量，他的作用域（有效范围）并不在函数test();内
// 在js中，全局变量在函数中自动生效，除非被局部变量覆盖
// 第二个$var是局部变量，其作用域是局部的，他未被定义（未被赋值），故无打印结果

$var = "some text";
function test2()
{
	$var = "some text in function";
	echo '这是局部变量$var:'.$var;
}
	echo '这是全局变量$var:'.$var;
	echo "<br/>";
	echo "<br/>";
	test2();
	echo "<br/>";
// 在函数test2()外部定义的变量$var不会在函数内部生效。在函数test2()中输出的变量$var是在其内部定义的，而在函数test2()外部定义的全局变量$var并不会在函数内部生效。
// 若想在函数内部引用全局变量，需要在函数内部使用global关键字。 php中global关键字的作用是在函数内部声明某个变量为全局变量，从而在函数内部使用该变量。
$a = 1997;
$b = 1998;
function sum(){
	global  $a,$b;
	$b = $a + $b;
}
echo '$a='.$a;
echo '<br/>';
echo '$b='.$b;
echo '<br/>';
sum();
echo '$a+$b='.$b; // $a,$b即为全局变量，可在函数外部执行输出
echo "<br/>";

function sum1(){
	$var1 = "some text in function";
}
sum1();
// echo "$var1"; // $var1未定义 在函数内部定义的函数，在函数外部无法执行输出
echo "<br/>";

$m1 = "this is a string";
$m2 = 9;
$arr = array(1,3,5);
echo '$m1是否是字符串？'.is_string($m1); // true返回1
echo "<br/>";
echo '$m2是否是字符串？'.is_string($m2); // false无返回值
echo "<br/>";
echo '$arr是否是数组？'.is_array($arr);
echo "<br/>";
$arr1 = array("spring","summer","fall","winter");
echo $arr1[2];
echo "<br/>";
// unset($arr1[2]);
echo "<br/>";
// echo $arr1[2]; // 找不到该结果
$arr2 = array("spring","summer","fall","winter");
foreach($arr2 as $value){ 
	echo "$value";     
	echo "<br/>";
}
echo "<br/>";

/* foreach 循环只适用于数组，并用于遍历数组中的每个键/值对。
 语法结构
 foreach ($array as $value) {
 statement
 }
 每进行一次循环迭代，当前数组元素的值就会被赋值给 $value 变量，并且数组指针会逐一地移动，直到到达最后一个数组元素 
 */

/*
$arr3 = array('spring','summer','fall','winter');
for($i =0; $i<4; $i++){ // i是循环输出的元素
	echo $arr3[i];      // i所从属的组织
	echo "<br/>";
}
 该种方式无法打印出循环结果 原因是找不到变量i 
 */
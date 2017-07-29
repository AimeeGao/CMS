<?php
// php中的数学运算
/* （1）. php中的数学运算常作用于整形和浮点形 常见的数据运算函数(算术、幂指对函数、进位制函数、三角函数、反三角函数)
 * a. 绝对值函数： mixed abs(mixed num)
 * mixed abs(mixed num);
 * b. 三个取整函数：
 * int floor(floar num); 向下取整
 * int round(floar num); 四舍五入取整
 * int ceil(floar num); 向上取整
 * c.指数幂的运算函数：
 * exp()函数用于计算以e为底数，以expe为指数的幂运算 pow()函数用于计算以base为底数，以expe为指数的幂
 * float exp(float expe);
 * float pow(float base,float expe);
 * d. 计算平方根：
 * float sqrt(float num);
 * e. 计算对数 log()计算以e为底的对数，log10()计算以10为底的对数
 * float log(float num);
 * float log10(float num);
 * f. php提供了两个用于取得参数中的最大值和最小值的函数 函数所接受的参数应该有两个或多个
 * 且参数应当是数值或字符串，函数返回值的类型与最大元素或最小元素的类型一致
 * 函数进行比较时，若参数全是字符串，按ASCII码值进行比较;若参数全是数值型，按数值大小进行比较
 * mixed max(mixed arg1,mixed arg2,...,mixed argm);
 * mixed min(mixed arg1,mixed arg2,...,mixed argn);
 * php提供的进位制转换函数是base_convert(string number, int frombase, int tobase);
 * 其中，参数number是由字符串组成的数字，参数frombase是原进位制，参数tobase是要转换成的进位制  结果若有错，返回0
 * g.三角形的计算函数：
 * 正弦：float sin(floart arg);
 * 余弦：float cos(floart arg);
 * 正切：float tan(floart arg);
 * */
$num1 = -12;
$num2 = 147.258;
$num3 = 11.8059;
echo $num1."的绝对值是：".abs($num1);
echo '<hr>';
echo "ceil($num2)=".ceil($num2); // 不小于$num2的整数
echo "<br/>";
echo "<br/>";
echo "floor($num2)=".floor($num2); // 不大于$num2的整数
echo "<br/>";
echo "<br/>";
echo "round($num2)=".round($num2); // 四舍五入不保留小数
echo "<br/>";
echo "<br/>";
echo "ceil($num3)=".ceil($num3); // 不小于$num3的整数
echo "<br/>";
echo "<br/>";
echo "round($num3,2)=".round($num3,2); // 保留两位小数
echo "<br/>";
echo "<br/>";
echo "round($num3,1)=".round($num3,1); // 保留一位小数
echo "<br/>";
echo "<br/>";
// round()函数的第二个参数代表保留两位小数四舍五入

/* （2）.不同进制之间的数字转换
 * 1. decbin($num):将十进制参数$num转换成二进制数  该函数所能转换的最大十进制数是4294967295
 * 2. dechex($num):将十进制参数$num转换成十六进制数
 * 3. decoct($num):将十进制参数$num转换成八进制数
 * 4. bindec($num):将二进制参数$num转换成十进制数
 * 5. hexdec($num):将十六进制参数$num转换成十进制数
 * 6. octdec($num):将八进制参数$num转换成十进制数
 * 7. base_convert($num,$from,$to):将以$from所表示进制的数$num，转换成以$to所表示的进制的数后，返回转换后进制的数字字符串
 **/
$i = 22;
$bi = 1011001;
$oi = 721;
$hi = "A2";
echo "$i 的二进制数是：".decbin($i); // 将$i转换成二进制输出
echo "<br/>";
echo "$i 的八进制数是：".decoct($i); // 将$i转换成8进制输出
echo "<br/>";
echo "$i 的十六进制数是".dechex($i); // 将$i转换为十六进制输出
echo "<hr>";
echo "二进制数$bi 的十进制数是".bindec($bi);
echo "<br/>";
echo "八进制数$oi 的十进制数是".octdec($oi);
echo "<br/>";
echo "十六进制数 $hi 的十进制数是".hexdec($hi);
echo "<hr>";
$hex_num = "A515";
echo "使用函数base_convert(),转换十六进制数A515到二进制数：<br/>";
echo base_convert($hex_num, 16, 2);

/*（3）.随机数
 * 1. 生成随机数的函数
 * mt_rand();生成随机数
 * int mt_rand(int $min, int $max);
 * 该函数可以返回$min到$max之间的随机数 参数$min和$max是可选的，若没有指定这两个参数，mt_rand()返回0到RAND_MAX之间的伪随机数
 * */
echo mt_rand(); // 返回0-RAND_MAX之间的伪随机数
echo "<br/>";
echo mt_rand(100,999); // 生成100-999之间的随机数
echo "<hr>";
echo "<br/>";
echo "以下通过循环生成1-100之间的多个随机数<br/>";
for($i=0; $i<10; ++$i){
	$number = (mt_rand()%100)+1; // 生成1-100之间的随机数
	echo "$number<br/>";
}
echo "<hr>";
echo "<br/>";
echo "以下通过循环生成1-100之间的多个随机数<br/>";
for($i=0; $i<10; $i++){
	$number = (mt_rand()%100)+1; // 生成1-100之间的随机数
	echo "$number<br/>";
}
echo "<hr>";
// 函数rand()也可以用来生成随机数，其用法和mt_rand()类似


<?php
// 1. 对字符串做分割和合并
/* （1）. 字符串的分割操作符
 *  函数explode()用一个字符串分割另一个字符串
 *  array_explode(string $separator, string $str [,int $limit])
 *  函数explode()使用字符串$separator(该函数的第一个参数)作为分界点，来分割字符串$str(该函数的第二个参数)。
 *  注意第一、二个参数都只能是字符串类型。 ',' '.' '|'
 *  该函数返回一个数组，字符串被分割后，分割的部分会存入该数组。
 *  参数$limit是可选参数，若设置该值，则返回的数组中最多有limit个元素，最后一个元素包含字符串$str的所有剩余部分
 *  即若设置了$limit的值，则数组会被对应分成limit个部分，第一个部分永远只有一个值，若limit为2，则剩下的值都在第二个部分中。
 *  同理，limit为3，第一个部分有一个值，第二个部分有一个值，剩下的值都在第三个部分
 * */
$str = 'tea, milk, coffee, juice';
$arr = explode(',', $str);
echo '显示分割后的数组：</br>';
echo '<pre>';
print_r($arr);
echo '</pre>';
$arr = explode(',', $str,3);
echo '显示分割后，且limit为3的数组：</br>';
echo '<pre>';
print_r($arr);
echo '</pre>';
// 分割后的字符串里的内容，成为数组$arr的4个元素。
// 字符串合并操作，常见的是'.' 该运算符可将多个字符串合并成一个字符串

/* （2）. 字符串的合并操作符
 * 函数implode()将数组中的元素组成一个字符串
 * array implode(string $bds, array $arr)
 * 函数implode()将数组$arr的元素组成一个字符，每个元素之间使用string类型的参数  $bds的值作为连接符。
 * 函数返回合并后的字符串。
 */
$drink_arr = array(
		'tea',
		'milk',
		'coffee',
		'juice'
);
echo '使用implode()函数合并后的数组返回的字符串值：<br/>';
$drink_str = implode('|',$drink_arr);
echo 'drink_str=' .$drink_str;
echo '<br/>';
echo '<br/>';

// 2. 对字符串作比较和替换
// 字符串比较指通过字符的ascii码来决定字符的大小 字母表中，越靠后的字母的ascii码越大，所有小写字母比大写字母的asci码大
/* （1）. 比较两个字符串大小
 *  strcmp()函数对两个字符串比较大小
 *  int strcmp(string $str1, string $str2)
 *  函数 strcmp()接受两个参数，他们是待比较的字符串。
 *  该函数返回值是整数，若字符串$str1和字符串$str2相等，则函数返回0； 若字符串$str1小于字符串$str2，则函数返回-1；
 *  若字符串$str1大于字符串$str2,则函数返回值大于0
 * */

$str1 = 'PHP string';
$str2 = 'PHP String';
if(strcmp($str1,$str2)==0){
	echo '$str1和$str2相等';
	echo '<br/>';
}
else{
	echo '$str1和$str2不相等';
	echo '<br/>';
	echo '函数strcmp的比较结果为：'.strcmp($str1, $str2);
}
// 函数strcmp()比较字符串中的每个字符，直到遇到第一个不同的字符为止，根据这两个字符的大小关系，决定字符串的大小。
// 若比较到最后，没有遇到不同的字符，函数返回0

/* （2）. 字符串的替换
 * 函数str_replace()完成将字符串中的某些字符串替换成其他字符串
 * string str_replace(string $search, string $replace, string $str)
 * 该函数将字符串$str中的$search部分全部替换成字符串$replace,并返回替换后的字符串
 * $search 查找字符串中的某个内容 $replace 要替换的值 $str 在哪个字符串中
 * */
echo '<br/>';
echo '<br/>';
$str1 = "I'm learning programming with Perl";
$str2 = 'PHP';
echo '替换前：'.$str1;
$str = str_replace('Perl', $str2, $str1);
echo '<br/>';
echo '替换后：'.$str;
echo '<br/>';
echo '<br/>';
// str_replace()该函数也可接受数组参数
$str = 'I prefer to use JSP,PHP,ASP!';
$page_lan = array(
		'JSP',
		'PHP',
		'ASP'
);
$base_lan = array(
		'C',
		"C++",
		"Java",
		'Web'
		
);
$new_str = str_replace($page_lan, $base_lan, $str);
echo '替换前：'.$str;
echo '<br/>';
echo '替换后：'.$new_str;
// 该程序先将$str中要替换的部分写成数组的形势，然后将替换的内容也存放在数组中
// str_replace()会按两个数组元素的对应顺序依次在字符串中进行替换
// 当$search数组中的元素大于等于 $replace数组中的元素时，结果会正常打印。
// 当$replace数组中的元素多于 $search数组中的元素，多于的元素将不能被打印

// 3. 输出打印字符串
// php中的字符串输出方式有print 和 echo两种
// int print(string $str)
// print 将字符串$str输出，并总是返回1. print不是函数，其和echo一样，是php的语言结构
/*
 * echo与print,print_r的比较：
 * 1. echo可以输出多个字符串，无返回值  echo 'a','b','c';
 * 2. print只能输出一个字符串 ，并总是返回1 print 'Hello World'
 * 3. print_r 则是打印复合类型并显示关于一个变量易于理解的信息  如数组 对象等  string、int、float返回值本身
 * array，按照一定格式结构显示键和元素的关系 object类似
 * 4. 在PHP中的执行速率从快到慢为：echo(),   print(),   print_r()
 * */
echo '<br/>';
echo '<br/>';
$str = '字符串输出：print和echo';
echo '==='.$str.'===';
echo '<br/>';
echo '这是使用echo输出的字符串。';
echo '<br/>';
print '这是使用print输出的字符串';
echo '<br/>';
echo '<br/>';
// 4. 格式化字符串
// 将字符串转换成某种特定的格式叫做字符串的格式化。
// 函数sprintf()将字符串格式化
// string sprintf(string $format, mixed $args);
// 参数$format是要转换的格式，常以百分号（%）开始，到转换字符为止。
// 例：%1.2f 即为一个转换格式,f是转换字符，表示将字符格式化成浮点数
// 该函数含义：第一个参数即为在哪个对象里进行转换，若无则直接显示为打印的输出语句，第二个语句为要转换的对象
$str = '我有%d本%s方面的编辑书籍。'; // 定义字符串变量$str
$str1 = sprintf($str,1,'PHP');
echo $str1;
echo '<br/>';
echo '<br/>';
$num =4;
$lang = "C++";
$str2 = sprintf($str,$num,$lang);
echo $str2;
echo '<br/>';
echo '<br/>';
$num =123;
$long = 753167852;
$float = 0.45;
$str = 'banana';
printf('%%d = %d<br/>',$num); // 输出整数
printf("%%b = %b<br/>",$num); // 输出二级制
printf("%%e = %e<br/>",$num); // 输出科学记数法数字
printf('%%f = %f<br/>',$num); // 输出浮点数
printf('%%f = %01.2f<br/>',$num); // 输出两位小数的浮点数
printf('%%f = %03.5f<br/>',$float); // 输出5位小数的浮点数
printf('%%f = %08.4f<br/>',$float); // 输出4位小数的浮点数
echo '<br/>';
printf('[%s]<br/>',$str); // 输出字符串
printf('[%8s]<br/>',$str); // 输出8位宽度的字符串 默认值右对齐，使用符号即向左对齐
printf('[%-8s]<br/>',$str); // 输出8位宽度的字符串，左对齐
printf('[%08s]<br/>',$str); // 输出8位宽度的字符串，宽度不够时用0补齐
printf("[%'$8s]<br/>",$str); // 输出8位宽度的字符串，宽度不够时用$补齐

/*
 * 格式化的主要类型
 * 转换类型                 含义
 *  b      转换成二进制整数
 *  d      转换成十进制整数 
 *  f      转换成浮点数
 *  s      转换成字符串
 *  c      转换成整数对应的ASCII码
 *  %      输出%符号，不转换
*/

// 5. 获取字符串中的一个子串
/* 获取字符串中的一个子串指获取这个字符串的某一部分。 php中，使用substr()函数
 * string substr(string $str, int $start, int $length);
 * 函数substr()将在字符串$str中从位置$start(索引+1)的字符开始截取长度为$length的字符串，然后返回该字符串
 * 字符串第一个字符的位置为0，第二个字符的位置是1
 * */
// 字符串中的标点、空格也算一个字符
echo '<br/>';
$str = "This is a PHP string";
$str0 = substr($str, 0, 4); // 从字符串$str的第1个字符开始截取(包含该字符)，截取4个字符
$str1 = substr($str, 10,10); //从字符串$str的第11个字符开始截取，截取10个字符
echo $str0;
echo '<br/>';
echo $str1;
echo '<br/>';

// 6. 删除字符串两侧的空白
/* （1）. 删除字符串末尾部分空白字符
 *  rtrim()删除字符串末尾部分的空白字符
 *  string rtrim(string $str);
 *  该函数会将字符串$str末尾部分的空白字符删除掉，返回末尾没有空白的字符串
 * */
$str = "这个字符串后面带有空白字符    ";
$clear = rtrim($str);
var_dump($str);
echo '<br/>';
echo '<br/>';
var_dump($clear);
echo '<br/>';
echo '<br/>';
// 函数var_dump()可以将一个或多个变量的形态和值输出
/* （2）. 删除字符串开始部分的空白字符
 * ltrim()将字符串开始部分的空白字符删除掉。
 * ltrim(),l代表left,一个字符串的left即为其开始部分。 rtrim(),r代表right,结束部分。
 * 该函数将字符串$str开始部分的空白字符删除，返回开始部分没有空白的字符串。
 **/
$str = "   这个字符串的最前面有空白字符";
$clear = ltrim($str);
var_dump($str);
echo '<br/>';
echo '<br/>';
var_dump($clear);
echo '<br/>';
/* （3）. 删除字符串两头的空白字符
 * trim()函数可删除字符串两头的空白字符
 * string trim(string $str) 
 **/
$str = "   使用函数trim去掉字符串两端空白字符    ";
$str1 = trim($str);
var_dump($str);
echo '<br/>';
echo '<br/>';
var_dump($str1);
// 函数trim()只能去掉字符串两头的空白字符，不能去掉中间的空白字符
// 函数rtrim()、ltrim()、和trim()不仅可以用来删除字符串前后位置的空白字符，通过给其指定第二个参数，还可删除一些特定的字符。

echo '<br/>';
$str = "##使用函数trim去掉字符串两端特定字符####";
$str1 = trim($str,"#"); // 为函数trim()传入第二个参数，trim()将删除字符串$str两端的#字符
var_dump($str);
echo '<br/>';
echo '<br/>';
var_dump($str1);
// 第一个参数是要删除内容的字符串，第二个参数是指定字符串中要删除什么，默认删除空格，若指定要删除的字符，即删除指定内容
// rtrim()与ltrim()有类似的用法

// 7. 获取字符串的长度
/* 字符串的长度一般指组成字符串的字符数量
 * php中，strlen()来获取一个字符串的长度
 * int strlen(string $str);
 * 该函数返回字符串$str的长度
 * */
echo '<br/>';
$str = 'I love PHP!';
$str_len = strlen($str);
echo "字符串 '$str' 的长度为：".$str_len;
echo '<br/>';
// 8. 其他常见的字符串操作
/* （1）. 对字符串做大小写转换
 *  strtoupper($str),将字符串$str中的字母全部转换为大写字母
 *  strtolower($str),将字符串$str中的字母全部转换为小写字母
 * */
$str = "I love PHP!";
$str_to_lower = strtolower($str);
$str_to_upper = strtoupper($str);
echo "原始字符串：".$str;
echo '<br/>';
echo "全部转换成小写：".$str_to_lower;
echo '<br/>';
echo "全部转换成大写：".$str_to_upper;
echo '<br/>';

/* （2）. 处理含有HTML标记的字符串
 * htmlentities()可以完成对字符串中HTML标记的处理，该函数可将字符串中有关字符转换成HTML实体，即HTML字符编码。
 * string htmlentities(string $str)
 * 函数htmlentities将字符串$str中的HTMl标记（如<、>）转换成相关编码的形式
 * */
$str = "<b> i love PHP!</b>";
$str_entity = htmlentities($str);
echo "转换前：".$str;
echo '<br/>';
echo "转换后：".$str_entity;
//转换前，浏览器将字符串“<b>i love php！”做解析，然后将其以粗体文字的形式显示到浏览器上。
// 转换后， HTML标记被原模原样的显示到浏览器上。 转换后的字符串变成了 “&lt;b&gt;I love php!$lt;/b$gt;”
// 并输出到浏览器端。 实际上将字符<，转换成字符实体&lt; >转换成&gt;

// 还有一个和htmlentities()功能类似的函数，即htmlspecialchars()，该函数将特殊符号转换成HTML实体
/* &：转换成&;
 * "(双引号)：转换成";
 * '(单引号)：转换成'
 * <(小于号)：转换成<;
 * >(大于号)：转换成>;
 * */
echo '<br/>';
$str = "i love PHP! ";
$str_special = htmlspecialchars($str);
echo "转换前：".$str;
echo "<br/>";
echo "转换后：".$str_special;
echo "<br/>";
echo "<br/>";

/* 将HTML实体转换成相关字符的函数 html_entity_decode()
 * string html_entity_decode(string $str)
 * 该函数将字符串$str中的HTML实体转换成相关的字符，可以看作是函数htmlentities()的逆运算
 * */
$str = "<a href = 'http://www.php.net'>PHP language website </a>";
$str_entity = htmlspecialchars($str); // 将字符(元素)转换成HTML实体(实实在在的标签形式但无功能)
$str_html = html_entity_decode($str_entity); // 将HTML实体转换成字符(元素)
echo "调用函数htmlspecialchars后：";
echo '<br/>';
echo $str_entity;
echo '<br/>';
echo "调用函数html_entity_decode后：";
echo '<br/>';
echo $str_html;
echo "<br/>";
echo "<br/>";
/*（3）. 多次生成一个字符串
 * 函数str_repeat()可用来重复生成一个字符串
 * string str_repeat(string $input, int $num)
 * 函数str_repeat()有两个参数，第一个参数$input是要重复生成的字符串；第二个参数$num是要重复的次数
 * 参数$num的取值必须大于等于0，如果$num设置为0，该函数会返回一个空字符串
 * */

$str = 'jingle bells~';
echo '重复输出两次：';
echo '<br/>';
echo str_repeat($str,2);
echo '<br/>';
echo '当函数str_repeat()第二个参数为0时：';
echo "<br/>";
echo 's='.str_repeat($str, 0); // 返回一个空字符串
echo "<br/>";
echo "<br/>";

// 还有一个函数str_pad()和str_repeat()类似，该函数用一个字符串补全另一个字符串的一定长度，也相当于一个字符串可能会多次生成
// string str_pad(string $input, int $pad_length [,string $pad_string [, int $pad_type]])
/* 该函数将参数字符串$input补全到长度为$pad_length时返回，可以在字符串$input的左边、右边或者左右两边进行补全。
 * 可选参数$pad_string用来补全字符串，若没有指定该参数，默认使用空格进行补全。
 * 可选参数$pad_type用来指定补全方式，该函数的取值为STR_PAD_RIGHT(在右边进行补全)、STR_PAD_LEFT(在左边进行补全)
 * STR_PAD_BOTH(同时在两边进行补全)，若没有指定该参数，将在原字符串的右边补全
 * */
$input = 'Story';
echo '/'.str_pad($input, 10).'/'; // 输出字符串
echo "<br/>";
echo "<br/>";
echo str_pad($input,10,"-*",STR_PAD_LEFT); // 用-*左端补齐字符串
echo "<br/>";
echo "<br/>";
echo str_pad($input, 10, "*",STR_PAD_BOTH); // 用*两端补齐字符串
echo "<br/>";
echo "<br/>";
echo str_pad($input, 6, "***"); // 在右边补齐***
echo "<br/>";
echo "<br/>";

/* （4）. 将字符串分析到变量
 * 本小节所说的分析字符串指分析URL中的查询字符串。 
 * 如URL是http://www.somesite.com/index.php?i=000&key=1a2b3c&cnt=10,
 * 那么该URL的查询字符串就是i=000&key=1a2b3c&cnt=10
 * php,使用函数parse_str()分析类似的字符，并将结果赋值给变量
 * void parse_str(string $str [, array $arr])
 * 本函数可将URL的查询字符串参数$str解析，返回的变量名及值与查询字符串中的名称及值相对应
 * 函数的第二个参数是一个指定的数组，参数可选，若指定该数组参数，函数parse_str()将分析字符串得到变量作为数组索引、值作为数组元素存入该数组 
 * */
$str = "first=php&second[]=string+functions&second[]=useing";
echo '原字符串';
echo "<br/>";
parse_str($str); // 分析字符串
echo "<br/>";
echo '分析结果：';
echo "<br/>";
echo 'first='.$first;
echo "<br/>";
echo 'second[0]='.$second[0];
echo "<br/>";
echo 'second[1]='.$second[1];
parse_str($str,$input); // 将分析结果保存到数组
echo "<br/>";
echo "<br/>";
echo '指定输出数组参数的结果';
echo "<br/>";
echo "input['first']=".$input['first'];
echo "<br/>";
echo "input['second'][0]=".$input['second'][0];
echo "<br/>";
echo "input['second'][1]=".$input['second'][1];
echo "<br/>";

/* （5）. 转换字符串到数组
 *  php提供函数str_split()可将字符串转换成一个数组，即将数组分割成几个部分，每个部分的值作为数组的元素
 *  array str_split(string $str [, int $split_length])
 *  该函数将字符串$str做分割，将分割后的字符串各部分存入数组，并将数组返回。
 *  可选参数$split_length用来指定分割字符串长度,即每n个为一组。若没有指定该参数，函数将把字符串$str按一个字符的长度分割 
 * */
$str = 'How are you';
echo '原字符串：';
echo "<br/>";
echo $str;
echo "<br/>";
$arr1 = str_split($str);   // 将转换结果保存到数组
$arr2 = str_split($str,3); // 指定数组的3个元素
echo '<pre>';
print_r($arr1);
print_r($arr2);
echo '</pre>';
// 字符串中的空白字符也会被存入数组，当函数str_split()指定第二个参数时，字符串将按第二个参数所指定的长度的字符串来截取原字符串

/* （6）. 计算字符串的散列
 *  散列主要用于安全领域的加密算法，它把任意长度的输入（又加欲映射）转化成杂乱的128位的编码，这个编码叫散列值。
 *  散列就是找到一种数据内容和数据存放地址之间的映射关系。常见的散列算法有MD5、SHA1
 *  php中提供了对应的函数用于完成对字符串做MD5散列计算，也提供了函数完成SHA1散列计算，即md5()sha1()
 *  string md5(string $str)
 *  该函数用来计算参数字符串$str的MD5散列
 *  string sha1(string $str)
 *  该函数用来计算参数字符串$str的SHA1散列
 */

$str1 = 'This is a secret';
$str2 = 'root';
echo '原字符串：';
echo "<br/>";
echo 'str1='.$str1;
echo "<br/>";
echo 'str2='.$str2;
echo "<br/>";
echo '使用md5加密：';
echo "<br/>";
echo "md5($str1)=".md5($str1); // 输出md5值
echo "<br/>";
echo "md5($str2)=".md5($str2); // 输出md5值
echo "<br/>";
echo '使用sha1加密：';
echo "<br/>";
echo "sha1($str1)=".sha1($str1); // 输出SHA1值
echo "<br/>";
echo "sha1($str2)=".sha1($str2); // 输出SHA1值
// 无论原字符串的长度是多少，经过函数md5(),sha1()的计算，最后会得到长度一样的散列值
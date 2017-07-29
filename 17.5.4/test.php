<?php
// php中的函数
// 函数在面向过程编程时代是一个重要概念，通过把复杂、重复的代码转化成函数，使面向过程编程变得简单、明了。
/*
 * 函数是一个有效的php代码集合，通过函数内部的代码，可构建一个能表达或处理数据的语句体。通过调用这个语句体，可简单、快速的处理
 * 相同的食物或数据
 * */

// 1.用户自定义函数
/*
 * 用户可使用 function关键字来定义一个函数，函数内部的代码可包括变量、表达式、程序流程控制语句，甚至其他函数或类定义。
 * */

// 定义一个典型的带有参数的函数
function doSomeThing($time){
	// 在函数内部定义一个变量
	$string = "离登陆月球还有";
	// 显示由参数和函数定义的变量组成的字符
	echo $string.$time."分钟<br/>";
	// 使用return退出函数
	return;
}
	// 调用定义好的函数
	doSomeThing(18);
	
// 定义函数要注意以下几个方面：
/*
 * 1. 自定义函数使用关键字"function"来定义,该关键字对大小写不敏感
 * 2. 关键字后面跟函数名，函数名要符合php标签规则
 * 3. 函数名后的括号内可以为空，也可以设置默认的参数，但只能以变量的形式存在
 * 4. 只有出现在函数的花括号内的语句，才能在函数运行时起到作用
 * */

// 2.函数的其他定义方式
// 函数不仅可以在脚本中定义，也可以在流程控制语句甚至函数里定义

// 定义一个没有参数的函数
function onvar(){
	echo "无参函数<br/>";
	return;
}
// 调用定义好的函数
onvar();

// 返回值的函数
function returnValue(){
	return true;
}
// 在程序流程控制语句中直接使用带返回值的函数
if(returnValue())
{
  // 定义在程序流程控制语句内的函数
  function inFunction(){
  	echo "根据条件定义的函数<br/>";
  }
}

// 当returnValue()函数返回true时，才可以调用inFunction()函数
inFunction();
// 定义一个函数
function base(){
	// 在函数中定义一个函数
	function offset(){
		echo "在函数内部定义的函数<br/>";
	}
	// 在函数中定义一个类
	class subClass{
		// 在类里定义一个函数
		function subShow(){
			echo "在函数内部定义的类里的函数";
		}
	}
}
// 先调用外部函数
base();
// 再调用内部函数
offset();
// 函数运行后，初始化subClass
$newClass = new subClass();
$newClass->subShow();
echo "<br/>";
// 不管是在流程控制语句中定义的函数，或是在函数中定义的函数，使用时应注意调用的先后顺序。

// 3. 递归函数
/* 递归函数：
 * 函数在定义完成后，会保存在文件中等待调用。一般来讲，只有在其他脚本里才能调用定义后的函数，但有些情况下，函数可自己调用自己参与运算。
 * */

// function draw($total,$line=1,$row=1,$result="<table border=2><tr>"){
// 	if($line > $total){
// 		return ;
// 	}else{
// 		$result .= "<td>$line</td>";
// 		$line++;
// 		$row++;
// 		// 调用函数本身，实现递归
// 		draw($total,$line,$row,$result); // 此行使用了引用符号
// 	}
// 	echo $result .= "</tr></table>";
// }
// draw(10);
//有问题 多一个括号，不能使用引用符号 

 
// 4. 函数的参数
/*
 * 函数按参数区分，可分为无参函数和有参函数。无参函数可直接调用。
 * 调用有参函数时，必须提供一个有效的参数值，若调用有参函数时，没有提供有效的参数值，会报错。
 * 在函数定义时，有参函数已设置了默认值，也可直接调用。
 * 有参函数定义时，其参数跟在函数名后的括号内，多个参数使用逗号分隔。
 * */
$line = array(1,2,3,4,5,6,7,8,9);
// （1）.定义一个无参函数
function noVar(){
	// 在函数里使用全局化变量$line
	global $line;
	// 遍历全局变量数组
	echo "无参函数遍历外部数组：<br/>";
	foreach ($line as $value){
		echo "$value-";
	}
	echo "<br/>";
}
noVar();
// （2）.定义一个有参函数
function userVar($var){
	// 遍历参数
	echo "有参函数遍历函数参数:";
	foreach ($var as $value){
		echo "$value-";
	}
	echo "<br/>";
}
 // 使用有参函数处理数组
 userVar($line);
 echo "**************<br/>";
 // （3）.定义一个有默认参数的有参函数
 function haveVar($var1=10,$var2=array("a","b","c","d")){
 	// 在函数内显示参数1
 	echo "$var1<br>";
 	// 在函数内遍历参数2
 	foreach ($var2 as $value){
 		echo "$value-";
 	}
 	echo "<br/>";
 }
 echo "直接调用有默认值的有参函数：<br>";
 haveVar();
 echo "为有默认值的有参函数添加新参数<br>";
 $v = "我是字符串";
 haveVar($v,$line);
 // 有参函数的灵活度大于无参函数
 
 // 5.函数的返回值
 /*
  * 自定义函数使用return()函数来返回值。renturn()函数通常在自定义函数代码的最后一段，用于返回函数语句计算过的值，并结束函数的运行
  * return函数可以返回任何类型的值，包括对象。
  * */
 // 定义一个遍历数组的函数
 function listArray($array){
 	foreach ($array as $value){
 		echo $value;
 	}
 }
 // 定义一个带有返回值的函数
 function returnString(){
 	// 返回字符串
 	return "字符串<br/>";
 }
 // 调用函数
 echo returnString();
 // 定义一个带有返回值的函数
 function returnInt($int){
 	// 返回数字
 	return $int+2;
 }
 // 调用函数
 echo returnInt(18)."<br/>";
 // 定义一个带有返回值的函数
 function returnFloat($float){
 	// 根据条件返回值
 	if($float>10){
 	  return 9.9;
 	}
 	else{
 	  return 1.1;
 		}
 }
 // 调用函数
  echo returnFloat(1.8);
  echo "<br/>";
 // 直接调用函数而不打印结果，函数保存在return中的值无法输出
 // 故在调用函数语句前加上echo输出语句
 
  // 定义一个带有返回值的函数
  function returnArray(){
  	// 返回数组
  	$line = array(1,2,3,4,5,6,7,8,9);
  	return $line;
  }
  listArray(returnArray());
  echo "<br/>";
  // 该调用语句一次性调用了两个函数
  // 首先调用listArray()函数执行遍历数组的命令，其次调用 returnArray()函数，将$line该数组中的值保存在return中，整个函数执行结果就是$line (=array(1,2,3,4,5,6,7,8,9);) 
  // 即listArray(returnArray()); == listArray($line);
  // ******************调用顺序存在问题******************
  // 返回一个对象
  function returnObject(){
  	$object = (object)"对象";
  	return $object;
  }
  $object = returnObject();
  echo $object->scalar;
  echo "<br/>";
  // 返回结果：对象
  // **********对象结果返回流程并不理解***********
  
  // 6.变量函数
  /*
   * 在变量后加上括号就形成了变量函数。php中，若变量后跟随括号，在脚本运行时，php解析器会寻找与变量同名的函数，并尝试运行。
   * */
  // 定义一个名为showstr的函数
  function showstr(){
  	echo "显示字符串";
  }
  // 定义一个名为showint的函数
  function showint(){
  	echo 20;
  }
  // 正常的调用方法
  showstr();
  showint();
  echo "<br/>";
  // 使用变量函数
  $action = "showstr";
  // 形成变量函数
  $action(); // 实际上调用了showstr()函数
  $action = 'showint';
  // 形成变量函数
  $action(); // 实际上调用了showint()函数
  // 注意：在使用变量函数时，要确认形成的变量函数是否存在，若不存在，则报错
  echo "<br/>";
  
  // 7.系统函数
  /*
   * 用户自定义函数主要用来进行逻辑运算，而系统底层的工作，还需系统自带的函数完成。 这些系统函数不是都能使用，有些系统函数需要和支持的插件搭配使用。
   * 使用系统函数前应先确保调用的函数是否被系统函数所支持。先测试函数是否存在，再进行下一步的操作。
   * */
  
  if(function_exists("fopen")) // function_name
  {
  	echo "可以使用 fopen()函数<br/>";
  }else{
  	echo "fopen函数支持没有开启";
  }
  // function_exists()函数也可用于用户自定义函数
  
  // 8. 带有默认参数函数的使用方法
  /*
   * 函数可以使用带有默认值的参数，在普通参数与带有默认值参数同时存在的情况下，要先定义普通参数，将带有默认值的参数放在后面
   * */
  // 定义一个带有普通参数与带有默认值参数的函数
  function getInfo($name,$age=18){ // 形参(普通参数) 与赋有默认值的(默认值参数)
  	echo $name.$age;
  }
  getInfo("max");
  getInfo("max",19);
  
  
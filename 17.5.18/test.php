<?php
// 用PHP获取系统信息
/* 获取php的系统信息可用于调试php程序，也可向用户告知当前的配置情况，当用户想了解系统环境变量时，可通过php提供的一些函数来获取和PHP有关的系统信息、环境变量、php配置信息
 */
/* （1）. 获取和添加php环境变量
 * 环境变量：程序或系统运行需要的一些配置参数或一些具体的变量，环境变量可用于系统维护当前运行环境，或空值程序的行为，或影响程序的执行及执行结果
 * getenv() 获取一个php环境变量的值
 * string getenv(string $var);
 * 该函数返回环境变量$var的值，若错误，返回false
 * */
 $root = getenv('DOCUMENT_ROOT'); // 环境变量
 $port = getenv('SERVER_PORT'); // 服务器端口
 $file = getenv('SCRIPT_NAME'); // 当前文件
 $ua = getenv('HTTP_USER_AGENT'); // 当前用户
 $method = getenv('REQUEST_METHOD'); // 请求方法
 $protocol = getenv('SERVER_PROTOCOL'); // 传输协议
 
 echo "<b>通过函数getenv()获取环境变量</b><hr>";
 echo "<b>服务器文档根目录</b>".$root;
 echo "<br/>";
 echo "<br/>";
 echo "<b>服务器端口：</b>".$port;
 echo "<br/>";
 echo "<br/>";
 echo "<b>当前执行文件：</b>".$file;
 echo "<br/>";
 echo "<br/>";
 echo "<b>用户UA：</b>".$ua;
 echo "<br/>";
 echo "<br/>";
 echo "<b>请求方法：</b>".$method;
 echo "<br/>";
 echo "<br/>";
 echo "<b>传输协议：</b>".$protocol;
 // 环境变量也可以通过全局预定义变量$_SERVER获取，预定义变量$_SERVER['DOCUMENT_ROOT']可获取服务器的文档根目录
 /* 在使用函数getenv()获取环境变量时，传给函数getenv()的参数字符串的两头不能存在空格，否则将得不到预期的结果
  * */
 
 /* putenv()可添加一个环境变量并为其赋值
  * bool putenv(string $env_setting);
  * 参数$env_setting是要添加的环境变量是由环境变量的名称和值组成的字符串，若设置成功，返回true，否则false
  * $env_var = newenv;
  * putenv("MY_ENV = $env_var");
  * 该代码实现了向系统添加一个环境变量MY_ENV,并将其值设定为newenv
  * */
 
 /* （2）. 查看被载入的PhP扩展模块
  * get_loaded_extensions(); 返回一个数组，其中包含所有被编译和装载的模块的名称。 该函数没有参数
  * get_extension_funcs($module); 返回一个数组，包含了由参数$module指定的模块的所有函数名称
  * */
//  echo "<br/>";
//  echo "<br/>";
//   echo "<b>当前所有被载入的模块机器函数</b>";
//   echo "<hr>";
//   $exten_list = get_loaded_extensions(); // 获取载入的扩展模块
//   foreach ($exten_list as $extension){
//   	echo "$extension <br/>";
//   	echo "<ul>";
//   	$ext_func = get_extension_funcs($extension); // 获取每一个扩展模块的函数
//   	foreach ($ext_func as $func){
//   		echo "<li>$func</li>";
//   	}
//   	echo "<ul>";
//   }
  // 首先以get_loaded_extensions()获取载入的扩展模块，然后在循环中通过get_extension_funcs()查找每一个扩展模块的函数
  
  /* （3）. 获取Php的当前给类信息
   * phpinfo();可获取php的当前状态，包括php版本号、路径名、操作系统版本信息、php配置选项及php环境变量
   * */
  /* （4）. 获取当前php进程的进程号和程序所有者
   * getmypid(); 返回当前Php进程的进程id,不需要输入参数
   * get_current_user(); 返回当前程序的所有者名称，不需要输入参数
   * */
   $file = getenv('SCRIPT_FILENAME');
   echo '<b>当前运行的程序</b>';
   echo $file;
   echo "<hr>";
   echo "<br/>";
   echo "该进程的所有者：".get_current_user(); // 获取程序所有者
   echo "<br/>";
   echo "该进程的ID号：".getmypid(); // 获取进程号
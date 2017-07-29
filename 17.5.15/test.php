<?php
// 用php操作目录和文件
// 常见的目录操作
/* （1）. 打开和关闭目录
 * 想对目录进行操作要先获取操作的目录句柄，即打开一个目录。
 * opendir()完成打开目录的操作
 * $dh = opendir(string $path);
 * 参数$path是要打开的目录。若处理成功，返回目录的句柄，否则返回false
 * 若$path不是一个合法的目录或因权限，文件系统等错误而无法打开目录，函数也会返回false
 * 注意，对一个目录的操作结束后，需要关闭已打开的目录，释放操作目录时所占用的资源
 * closedir()完成关闭目录的操作
 * void closedir($dh);
 * 没有返回值
 * */
/* （2）. 获取目录中下一个文件的文件名
 *  readdir()可获取目录中下一个文件的文件名
 *  string readdir($dh);
 *  参数$dh由函数opendir()打开的目录句柄，该函数返回这个句柄所指目录中的文件名。
 *  若失败，返回false
 * */
 
$dir = "D:\server";
$dh = opendir($dir);
echo $dh;
echo "<br/>";

 if($dh = opendir($dir)){  // 打开目录$dir,并将目录句柄赋给变量$dh
  	while($file_name = readdir($dh)!== FALSE){ // 通过while循环，使用函数readdir()获取文件名
		echo "file name:".$file_name;
		echo "<br/>";
		echo "<br/>";
 	}
 	closedir($dh); // 处理完成后，关闭目录句柄$dh
 }
 
 /* （3）. 列出某一目录下的所有文件
  * 除了使用readdir()可获得目录下的文件名外，scandir()也可列出指定目录中的文件和目录
  * array scandir(string $directory);
  * 参数$directory是指定的目录，函数返回值是一个含有文件名的数组，若失败，返回false
  * 若参数$directory不是一个目录，函数也返回false
  * 该函数还有一个常用的可选参数作为第二个参数，用来为文件名做排序
  * */
 echo "<br/>";
 echo "<br/>";
 $dir = 'D:\server'; // 指定路径
 $file_list1 = scandir($dir);
 // 向函数scandir传入第二个参数，如果第二个参数为1，表示按字母降序排列文件名
 $file_list2 = scandir($dir,1);
 echo "<pre>"; // 格式化输出
 print_r($file_list1);
 print_r($file_list2);
 echo '</pre>';
 
 /* （4）. 获取和改变php的当前工作目录
  * getcwd():返回当前工作目录，若失败返回false 该函数不需要传入参数
  * chdir()：改变php的当前工作目录，处理成功函数返回true，否则返回false
  * */
 echo 'php当前的工作目录：';
 echo '<br/>';
 echo getcwd();  // 返回当前目录
 echo "<br/>";
 echo "<br/>";
 chdir("D:\server");
 echo "<br/>";
 echo "<br/>";
 echo "改变工作目录后，工作目录变为：";
 echo "<br/>";
 echo "<br/>";
 echo getcwd(); // 返回当前目录
 
 /* （5）. 从目录句柄中读取条目
  *  使用readdir()函数从目录句柄中读取下一个文件的文件名，配合while循环可实现对目录的遍历
  * */
 echo "<br/>";
 echo "<br/>";
 $dir = "D:\server";
 $handle = opendir($dir);
 if($handle != false){
 	echo '本目录包含：<br/>';
 	// 正确的遍历目录方法
 	while(false !== ($file = readdir($handle))){
 		echo $file.'<br/>';
 	}
 	closedir($handle);
 }else{
 	echo "打开目录错误！";
 }
 echo "<br/>";
 echo "<br/>";
 /* 上述例子展示的是一个正确的遍历目录的方式，包括句柄的获取，读取目录和文件的错误控制（体现在while后面的括号内）及关闭句柄
  * 正确遍历目录的方式，三个条件缺一不可
  * */
 
 /* （6）.关闭目录句柄
  * 在使用完opendir()打开句柄后，应使用closedir()关闭句柄，以节省服务器资源
  * */
  
 $dir = "D:\server";
 // 检查$dir是否是目录
 if(is_dir($dir)){
 	if($dir_handle = opendir($dir)){
 		$directory = readdir($dir_handle);
 		closedir($dir_handle);
 	}
 }
 // is_dir 是用来检查传入的路径是否是目录，若是目录则返回true 当传入的参数是文件或不存在时都是false
 
 // 2.常见的文件操作
 /* 实际操作中需要从文件取数据，或向文件写入数据，如分析日志数据和记录日志等。
  * */
 /* （1）.打开和关闭文件
  *  处理文件的一般流程是： 打开文件->从文件读取书据或向文件写入数据->关闭文件
  *  函数fopen()用来打开一个文件
  *  $fp = fopen(string $filename, string $mode);
  *  该函数可打开本地或远程文件，参数$filename是指要打开的文件的文件名，返回值是文件处理句柄$fp，程序通过$fp操作文件
  *  若打开失败，返回false 函数的第二个参数$mode是字符串类型，指打开文件的模式。
  *  打开文件时，之所以要指定模式，是为了告诉操作系统如何处理即将打开的文件
  *  如：需要向某文件写入一些数据，可向该函数的第二个参数传参数w 表示以写入方式打开文件
  * */
 echo "************************";
 echo $_SERVER['DOCUMENT_ROOT'];
  $fp = fopen($_SERVER['DOCUMENT_ROOT']."/../upload", 'w');
  echo "<br/>";
  echo "<br/>";
  // 上述代码通过fopen()打开workspace目录下的upload文件 ..表示服务器文档根目录的上级目录
  // 在linux/UNIX系统中指定文件路径时，使用斜杠（/） 若在windows环境下，指定目录，可用斜杠（/）或反斜杠（\）
  // 若为反斜杠（\），在使用fopen()函数时，需对\转义， 即使用\\
  // 当完成数据的写入或读取后，文件操作的最后一步需要关闭文件，php使用fclose()关闭一个已打开的文件
  // fclose($fp); $fp就是已打开的文件的处理句柄
  
  /* （2）. 读出文件的内容
   * 文件打开后，可从其中读出内容，以供程序使用。
   * 1. 建立一个文本文件，供程序打开和读其内之用
   * 除了使用函数fgets()读出文件的一行内容外，还可以使用 函数readfile()、 file()、 get_file_contents()
   * a. 函数readfile()读入文件的整个内容： 
   * int readfile(string $filename);
   * 函数的参数 $filename是要打开的文件名称，若打开成功，返回值是从文件读入的字节数，否则返回false
   * b. 函数file()可将整个文件读入一个数组
   * array file (string $filename, [int use_include_path]);
   * 函数file()的参数$filename是要打开的文件，第二个参数可选，若其值为1，表示php将在include_path中查找该文件
   * include_path是php.ini文件中的一个配置项，该函数读入整个文件的内容，将其存入数组后返回该数组。
   * 数组中的每个单元对应文件中的每一行，包括换行符在内
   * 若file()处理失败，返回false
   * c. 函数 get_file_contents()与file()类似，他将整个文件内容读入一个字符串
   * string get_file_contents(string $filename);
   * 该函数返回文件$filename的所有内容，若失败，返回false
   * */
  /* （3）. 向文件写入内容
   *  通过3个函数，可完成对文件的写入操作
   *  函数fwrite()、函数fputs()、函数file_put_contents()
   *  fwrite()
   *  int fwrite($fp, string $content [, int $length]);
   *  参数$fp是已打开的文件的句柄，$content是要向文件写入的内容 $length可选，表示写入数据的最大字节数，
   *  即当向文件写入length字节后，写入会停止 若$content的长度小于$length，函数写完$content后就已停止写入
   *  若写入成功，函数返回写入的字符数，否则返回false
   * */
   
  $file = "data.txt";
  $content = "内容标题\r\n内容第一行\r\n内容第二行"; // 要写入文件的内容
  // 打开文件$file时，使用追加模式，此时文件指针会在文件开始处 
  if(!$fp = fopen($file,"a")){
  	echo "打开文件file失败！";
  	exit;
  }
  
  if(fwrite($fp, $content) === FALSE){  // 将内容$content写入文件  写到apache的文档根目录下（即$fp打开的文档）
  	echo "写入文件失败";
  	exit;
  }
  echo "写入文件成功！";
  fclose($fp); // 关闭文件
  echo "<br/>";
  // 在windows平台下向文件写入内容，结束符号（换行）使用\r\n UNIX中，使用\n作为行结束字符
  // 函数fputs()是函数fwrite()的别名，用法和fwrite()一样
  // file_put_contents int file_put_contents(string $filename, string $data);
  // 该函数有两个参数，参数$filename是要写入数据的文件名，$data是要写入的数据
  // 使用file_put_contents() 相当于一次调用了fopen()、fwrite()、fclose()，故程序中不必再使用这3个函数
  // 若执行成功，该函数返回写入文件的字节数，否则，返回false
  
  /* （4）. 获取文件的相关信息
   *  相关信息：文件所有者、文件的大小、文件类型
   *  函数fileowner() 取得文件的所有者，返回文件所有者的拥护Id,失败返回false
   *  函数filesize() 取得文件的大小，返回值是文件大小的字节数，失败返回false
   *  函数filetype() 返回文件类型，可能值有file(文件)、dir(目录)、link(符号链接)、block(块)、unknown(未知)，失败同上
   * */
  
  echo "文件的所有者（用户id）:";
  echo fileowner("data.txt"); // 取得文件的所有者
  echo "<br/>";
  echo "<br/>";
  echo "文件的大小:";
  echo filesize("data.txt"); // 取得文件的大小
  echo "<br/>";
  echo "<br/>";
  echo "文件的类型";
  echo filetype("data.txt"); // 取得文件的类型
  echo "<br/>";
  echo "<br/>";
 
  /* （5）. 一些判断文件性质的函数
   * ·函数is_dir($filename),判断由参数$filename指定的文件是否是目录 若文件名存在且是目录，返回true
   * ·函数is_file($filename)，判断由参数$filename指定的文件是否是普通文件 同上
   * ·函数is_readable($filename),判断由参数$filename指定的文件是否可读 同上
   * ·函数is_writeable($filename),判断由参数$filename指定的文件是否可写同上
   * 函数is_writeable()经常在向一个文件写入内容之前调用，若文件可写，才向文件写入数据
   * */
  $file = 'data.txt'; // 文件名称
  if(is_dir($file)){
  	echo "文件$file 是个目录";
  	echo "<br/>";
  }else{
  	echo "文件 $file 不是目录";
  	echo "<br/>";
  }
  if(is_file($file)){
  	echo "文件$file 是一个普通文件";
  	echo "<br/>";
  }else{
  	echo "文件$file 不是一个普通文件";
  }
  if(is_readable($file)){
  	echo "文件$file 是可读的";
  	echo "<br/>";
  }else{
  	echo "文件$file 是不可读的";
  	echo "<br/>";
  }
  
  if(is_writeable($file)){
  	echo "文件$file 是可写的";
  	echo "<br/>";
  }else{
  	echo "文件$file 是不可写的";
  	echo "<br/>";
  }
  // 这段代码中输出使用了双引号字符串，其中变量$file后紧跟中文字符，这时需在$file后加空格，程序才能正确输出
  // 否则php会认为$file后的中文字符页是变量名的一部分，导致输出有问题
  
  // 3. 文件和目录的通用操作
  /* （1）. 获取路径中的文件名和目录名
   * basename()取得一个路径中的文件名部分
   * string basename(string $path);
   * $path 是完整的路径名，该函数返回指定路径$path中的文件名部分
   * windows系统中，使用/或\做目录分隔符，UNIX中，使用/做目录分隔符
   * （2）. dirname()取得一个路径中的目录名部分
   * string dirname(string $path);
   * $path 是完整的路径名，返回指定路径$path中的目录名
   * */
  echo "<br/>";
  $path = "/home/prog/php/sayHello.php"; // 完整的包含路径名的文件
  $file_name = basename($path); // 取得完整路径中的文件名
  $dir_name = dirname($path); // 取得完整路径中的目录名
  echo "完整路径：".$path;
  echo "<hr/>";
  echo "<br/>";
  
  echo "其中目录名为：".$dir_name; // 输出目录名
  echo "<br/>";
  echo "其中文件名为：".$file_name; // 输出文件名
  echo "<br/>";
  echo "<br/>";
  // 网络上传文件时经常需要判断文件的路径和名称
  
  /* （2）. 判断文件或目录是否存在
   *  file_exists(string $filename); 检查指定的文件或目录是否存在
   *  bool file_exists(string $filename);
   *  该函数判断由参数$filename指定的文件或目录是否存在，存在返回true，否则返回false
   * */
  $file = "data.txt"; // 文件名
  $dir = "info/newdata"; // 目录名
  if(file_exists($file)){ // 判断文件是否存在
  	echo "当前目录中，文件".$file."存在";
  	echo "<br/>";
  }
  else{
  	echo "当前目录中，文件".$file."不存在";
  	echo "<br/>";
  }
  echo "<br/>";
  if(file_exists($dir)){
  	echo "当前目录中，文件".$dir."存在";
  	echo "<br/>";
  }
  else{
  	echo "当前目录下，目录".$dir."不存在";
  	echo "<br/>";
  }
  
  /* （3）.建立目录和删除目录
   * mkdir($pathname,$mode); 用来创建一个目录。 参数$pathname：要创建的目录的路径或名称  
   * 参数$mode:所建目录的访问权限(通常指UNIX系统下的访问权限) 成功返回true,反之false
   * rmdir($pathname); 用来删除一个奴鲁。参数$pathname：要删除的目录，该目录必须是空目录，并且在UNIX下，该目录要有相应的删除权限
   * 若删除成功，返回true，反之，返回false
   * */
  /*
   $dir_name = "tmp_data"; // 一个目录名
   if(mkdir($dir_name)){
   	echo "目录".$dir_name."创建成功！";
   	echo "<br/>";
   	// 在目录tmp_data中创建一个文件tmp.txt,并在其中写入一些内容
   	if($fp = fopen($dir_name."/tmp.txt", "a")){
  		if(fwrite($fp,"put some content into File.")){
   			echo "<hr>";
   			echo "在目录".$dir_name."下创建文件tmp.txt";
   		}
   	}
   }else{
   	echo "目录".$dir_name."创建失败！";
   	exit;
   }
   echo '<hr>';
   if(rmdir($dir_name)){  // 尝试删除目录tmp_data
   	echo "删除目录成功";	
   }else{
   	echo "删除目录失败";
   	exit;
   }
   */
  
  // 若前面的文件创建成功，说明目录tmp_data不为空，则删除目录会失败 若已成功创建，第二次创建时也会失败
  
  /* （4）. 复制、删除、移动文件
   *  copy($source,$desc); 用来把文件从参数$source指定的位置，复制到由参数$desc指定的位置
   *  unlink($file); 用来删除由参数$file指定的文件。
   *  rename($oldname, $newname) 把参数$oldname指定的文件重命名为由参数$newname指定的名字
   *  这两个参数都可以是一个带文件名的完整路径，从而完成文件从一个目录到另一个目录的移动
   * */
  $dir_name = "tmp_data"; // 目录名
  $new_file = "tmp_new_txt"; // 文件名
  if(!copy($dir_name."/tmp.txt", $new_file)){ // 该句表示打开指定目录下的文件tmp.txt
  	echo "copy文件tmp.txt失败";
  	exit;
  }else{
  	echo "文件tmp.txt复制成功";
  	echo "<br/>";
  	echo "<br/>";
  	if(unlink($new_file)){ // 删除指定的文件
  		echo "文件".$new_file."删除成功！";
  	}else{
  		echo "删除失败";
  	}
  }
  
  // 4. 文件的高级操作
  /* 包括修改文件的属性，锁定文件，包含文件
   * */
  /* （1）. 处理文件的锁定
   * 为了解决当两个用户同时打开一个文件，且其中一个用户对文件做了修改后，保证文件中数据的完整有效
   * 用函数 flock完成对文件的锁定操作
   * bool flock($fp, int $operation [, int &wouldblock]);
   * 函数的第一个参数是文件的句柄；第二个参数表示锁定种类，他是一个常量；第三个参数可选，若锁定会阻塞（需要等待），该参数设置为true
   * 若成功锁定了文件，函数返回true，否则返回false
   * */
   /* 函数flock()锁定种类参数$operaion的取值
    * LOCK_SH: 读锁定，又共享锁定，针对读取的程序。文件可被其他读取者共享
    * LOCK_EX: 写锁定，又独享锁定，针对写入的程序。文件不能被共享
    * LOCK_UN: 释放锁定，无论共享与独占
    * LOCK_NB：防止锁定时阻塞
    * */
   $fp = fopen($_SERVER["DOCUMENT_ROOT"]."/file.txt" , "w");
   flock($fp,LOCK_EX); // 写锁定，独享锁定文件file.txt
   fwrite($fp, "write some words..."); 
   flock($fp, LOCK_UN); // 释放对文件file.txt的锁定
   fclose($fp);
   // 使用锁定后，flock() 不要忘记再用参数LOCK_UN释放锁定
   // 若在程序中，对某文件使用了flock()进行锁定，那么要对程序中所有对这个文件有操作的地方使用函数flock()进行锁定，否则锁定无效
   
   /* （2）. 更改文件的属性
    * 更改文件的属性主要包括：更改文件的模式、所有者、更改文件的组
    * */
   /* （3）. 获取文件时间属性
    * 1.filetime(),返回文件上次被访问的事件，若出错，false,时间以UNIX时间戳的方式返回
    * 2.filemtime(),返回文件上次被修改的时间，出错，返回false,时间以UNIX时间戳的方式返回
    * 3.filectime(),返回文件上次inode被修改的时间，若出错返回false,时间以UNIX时间戳的方式返回
    * inode是UNIX系统中的一个概念，中文含义为索引节点，用来存放档案及目录的基本信息，包括事件、档案名、使用者及群组
    * */
   echo "<br/>";
   echo "<br/>";
   $last_access = fileatime('data.txt'); // 获取文件的上次访问时间
   echo "文件最后的访问时间是：";
   echo date("l F d, Y",$last_access);
   echo "<br/>";
   echo "<br/>";
   $last_modify = filemtime("data.txt"); // 获取文件的上次修改时间
   echo "文件最后的修改时间：";
   echo date("l F d,Y",$last_modify);
   echo "<br/>";
   echo "<br/>";
   $last_modify_inode = filectime("data.txt"); // 获取文件上次inode被修改的时间
   echo "文件最后的改变时间：";
   echo date("l F d,Y",$last_modify_inode);
   echo "<br/>";
   echo "<br/>";
   // 因为fileatime()、filemtime()、filectime()返回的时间值都是UNIX时间戳，所以应先将时间戳格式化后再输出
   
   /* （4）. 通过HTTP协议打开文件
    *  通过HTTP协议打开文件，即使用函数fopen()打开一个远程文件，和使用函数fopen()打开一个本地文件几乎没有区别
    * */
   echo "<H3>通过http协议打开文件</H3>";
   echo "<br/>";
   if(!($file = fopen("http://localhost/data.txt", "r"))){ // 通过HTTP协议打开文件
   	echo "文件不能打开";
   	exit;
   }
   while (!feof($file)){ // 直到文件的末尾，循环打印每一行的内容
   	$line = fgetss($file,255); // 按行读取文件中的内容
   	echo "$line";
   	echo "<br/>";
   }
   fclose($file); // 关闭文件的句柄
   
   // 函数fgetss()读取文件内容 string fgetss(resource $handle)
   /* 函数fgetss()从参数$handle所指文件中读取一行内容，并将其中的HTML标记过滤掉　这是其与fgets()函数唯一不同的地方
    * fgetss()获取文件内容后，将原文件中的HTML标记都删除，而fgets()函数不会
    * */
   
   // 5.包含指定的文件到当前文件
   /* （1）. include()语句用来在当前文件中包含并运行指定文件 当一个文件被包含时，被包含文件中可用的任何变量、函数在被调用的文件中也可用
    * 所有在包含文件中定义的变量、函数或类都具有全局作用域
    * */
   define(PI, 3.14); // 定义常量
   $rad = 100;
   $str = "include的用法";
   function cal_area($radius){ // 定义计算面积的函数
   	$area = PI*$radius*$radius;
   	return $area;
   } 
   /* （2）. 除了include()包含指定的文件之外，还可以使用语句require()包含指定的文件到当前文件中
    * 他与include()的不同之处在于对错误的处理，若想在遇到丢失文件时停止处理页面，选择require()，include()会继续执行
    * */
   
   
   
   
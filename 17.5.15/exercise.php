<?php
// 1.在当前目录下创建一个目录tmp,在其中新建一个one.txt
$dir_name = 'tmp';
if(mkdir($dir_name)){
	echo "目录".$dir_name."创建成功！";
	if($fp=fopen($dir_name."/one.txt", "a")){
		if(fwrite($fp, "i love php.")){
			echo '<hr>';
			echo '在目录'.$dir_name."下创建文件one.txt";
		}
	}
}else{
	echo '创建目录失败！';
	exit;
}
echo '<hr>';
// 2.输出上题创建的one.txt文件的信息
echo fileowner("$dir_name/one.txt");
echo '<br/>';
echo filesize("$dir_name/one.txt");
echo '<br/>';
echo filetype("$dir_name/one.txt");
echo '<br/>';
fclose($fp);
//Warning: fileowner() expects parameter 1 to be a valid path, resource given in D:\Workspace\PHP\17.5.15\exercise.php on line 19




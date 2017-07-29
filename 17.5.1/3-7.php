<?php
// 将文件移至服务器的根目录的upload目录下，upload目录要事先建立好
$upload_path = $_SERVER['DOCUMENT_ROOT']."/upload/";
$dest_file = $upload_path.basename($_FILES['myfile']['name']); 
// $dest_file是移动后的目标文件
echo $_SERVER['DOCUMENT_ROOT']; // 可通过该语句找到文件所在的根目录地址
// 将临时文件移至目标文件夹
if(move_uploaded_file($_FILES['myfile']['tmp_name'], $dest_file))
{
	echo "文件已上传至服务器根目录的upload目录下"."<br/>";	
}
else{
	echo "文件上传时发生了一个错误".$_FILES['myfile']['error']."<br/>";
}
echo "客户端文件的原始名称即要上传的文件的文件名：".$_FILES['myfile']['name']."<br/>";
echo "上传文件的类型：".$_FILES['myfile']['type']."<br/>";
echo "上传文件的大小：".$_FILES['myfile']['size']."<br/>";
echo "文件上传后，在服务器端存储的临时文件名：".$_FILES['myfile']['tmp_name']."<br/>";
echo "和文件上传的相关错误信息：".$_FILES['myfile']['error']."<br/>";
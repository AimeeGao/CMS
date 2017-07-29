<?php 
// 用php进行web编程
// HTTP协议原理
// 1.创建HTML表单
/*
 *  HTMl中使用<form></form>创建表单 其主要属性是  action和method
 *  action属性： 指定表单书据被提交后，处理这些数据的程序的地址 action ="test.php"
 *  method属性： 指定用何种HTTP方式传递数据
 *  传递数据的方式有两种： POST和GET。 POST将表单数据放在HTTP数据的正文部分传递。 GET将表单数据加到action所指的地址之后传递
 *  表单被提交时，表单元素value属性对应的值将会被传送。 
 *  文本框的value属性，其值就是用户输入的数据
 * */
// 2.访问和获取HTML表单数据
/*
 * PHP中通过两个预定义变量来获取HTML表单数据。 $_GET和$_POST
 * $_GET指：表单数据组成的数组。 由HTTP的GET方法传递的表单数组组成。表单元素的名称是数组的“索引”.
 * 通过表单元素的名称（name属性的值），可获得该表单元素的值   如：name = "user_name" $_GET['user_name']获取本本框中用户输入的值
 * $_POST与$_GET类似   通过HTTP的POST方法获取的表单数据，将放在该变量中，该变量是个数组。
 * */
$user_name = $_POST['user_name'];
$gender = $_POST["gender"];
$hobby = $_POST['hobby'][0]."、".$_POST['hobby'][1]."、".$_POST['hobby'][2]."、".$_POST['hobby'][3];
echo "用户名：".$user_name."<br/>"; 
echo "性别：".$gender."<br/>";
echo "爱好:".$hobby."<br/>";
$prof = $_POST['occup']."<br/>";
echo "职业:".$prof."<br/>";
// 对于获取不到的元素会显示notice提醒 undefined offset 2/3

// PHP输出的值就是HTML表单元素的value属性所赋的值，这些值是当表单提交时传给全局变量$_POST的
// 表单中每个元素的值都将以元素的name属性的值作为索引存入数组变量$_POST中。 在PHP程序中，通过访问$_POST数组来获取HTML表单元素的值

// 3.用php处理表单数据
/*
 * 3-1.html中，php在处理多选框项时并没有显示所有的结果,只显示了多选项中最后一个选中的结果。
 * 出现这种情况的原因是，多选按钮元素checkbox的名称都为"hobby"，而php要求，如果表单元素同名，必须以数组方式命名checkbox元素
 * 即在原来的名称"hobby"后加上[]
 * $_POST为一个数组变量，除了使用以上方法，还可以使用另外一种专门用于操作数组的方法
 * */
// 4.用php验证表单数据有效性
// 见3-3.php

// 5.php中的session
/*
 * session 是指用户进入网站到浏览器关闭的这段时间（过程）
 * HTTP是面向无连接（无状态）的协议。 即一个完整的请求/响应过程结束之后，客户端（浏览器）和服务器的连接已终端。 服务器不知道请求是哪个用户发起的。
 * 通过session记录用户有关信息，以供用户以此身份向服务器端发起请求时，服务器能够根据session做出正确判断，区分不同用户的请求。
 * php中使用session即通过注册一些session全局变量，在不同页面的程序中使用这些变量。 以这样的方式，即可通过session完成用户身份验证、程序状态和页面之间的数据传递功能。
 * 一般使用$_SESSION['session_name']=session_value的代码注册一个session变量，用法和$_POST、 $_GET类似
 * 在使用session的页面中需要使用session_start函数，表示开始或返回一个已经存在的session。 该函数要在浏览器有任何输出之前调用，即是使用session程序的第一行代码。
 * 
 */

// 6.php中的文件上传处理
/* HTML部分处理：
 * 在web开发中常遇到从客户端上传文件到服务器端的问题，通常文件上传使用的是HTTP的POST方式，将文件传递到服务器端。
 * 注意：要完成文件上传处理，首先要定义HTML表单的enctype属性为"multipart/form-data"
 * 即<form enctype = "multipart/form-data" action = "somefile" method = "POST">
 * 只有满足上述条件的表单才能确保文件可以提交并上传
 * 
 * PHP部分处理：
 * 在php程序中使用全局变量$_FILES处理文件上传，$_FILES是一个数组，包含要上传的文件的信息。
 * 
 * $_FILES['myfile']['name']表示客户端文件的原始名称，即要上传的文件的文件名。 即在HTML中name属性所赋予的值
 * $_FILES['myfile']['type']表示上传文件的类型 例如：image/gif
 * $_FILES['myfile']['size']表示已上传文件的大小，单位为字节
 * $_FILES['myfile']['tmp_name']表示文件上传后，在服务器端存储的临时文件名
 * $_FILES['myfile']['error']表示和文件上传的相关错误信息
 * 
 * 注意：文件提交后，一般会被存储到服务器的默认临时目录中，可通过修改php.ini中的upload_tmp_dir，修改路径。
 * 使用move_uploaded_file()将上传的文件移到指定的目录下。
 * 函数原型： move_uploaded_file(filename,destination) 上传的文件，移动后的目标文件。若无法移动文件或文件不合法，则返回false
 * 
 * */
?>

<?php
// 1.获取服务器的根目录，端口号、文件名
$root = getenv('DOCUMENT_ROOT');
$port = getenv('SERVER_PORT');
$FILENAME = getenv('SCRIPT_NAME');
echo $root;
echo "<br/>";
echo $port;
echo "<br/>";
echo $FILENAME;
// 2. 查看机器上的Php版本号和配置文件的路径信息
 echo phpinfo();
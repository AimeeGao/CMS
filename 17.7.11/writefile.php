<?php
$file = "D:/Workspace/PHP/17.7.11/example.txt";
if($handle = fopen($file,'w')){
	fwrite($handle,'I love PHP');
	 
	
	fclose($handle);
}
else{
	echo "The application was not able to write on the file";
}
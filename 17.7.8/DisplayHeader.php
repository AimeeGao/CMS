<?php
class Page{
	public $title ="音乐唱片大全";  // 页面标题
	public $content;  // 页面内容
	public $keywords = "Mp3,音乐，唱片，music"; // 页面关键字
	
	public $buttons = array(  // 页面导航数组
			'主页'=>'#',
			'产品'=>'#',
			'服务'=>'#',
			'联系我们'=>'#',
			'网站地图'=>'#'
	);  
	
	public function DisplayTitle(){ // 显示页面标题的方法
		echo "<title>";
		echo $this->title;
		echo "</title>\r\n";
	}
	
	public function DisplayContent(){ // 显示页面内容的方法
		echo $this->content;
	}

	public function DisplayKeywords(){ // 显示页面关键字的方法
		echo "<meta name=\"keywords \" content= \"";
		echo $this->keywords;
		echo " \" />\r\n ";	
	}
	
	public function DisplayPage(){ // 输出整个页面
		echo "<html>\r\n<header>";
		$this->DisplayTitle();
		$this->DisplayStyles();
		$this->DisplayKeywords();
		echo "</header>\r\n<body>";
		
		$this->DisplayHeader();
		$this->DisplayMenus($this->buttons);
		$this->DisplayContent();
		
		$this->DisplayFooter();
		echo "</body>\r\n</html>";
	}
	
	public function DisplayStyles(){ // 显示CSS部分
		echo "<style>";
		echo "h1{color:#000; font-size:24pt; text-align:center;font-family:arial,sans-serif}";
		echo ".menu{color:#256114; font-size:12pt; text-align:center; font-family:arial,sans-serif}";
		echo "td{background:#EFEFEF}";
		echo "p{color:black; font-size:12pt; text-align:justify; font-family:arial,sans-serif}";
		echo "p.foot{color:#256114; font-size:9pt; text-align:center; font-family:arial,sans-serif; font-weight:bold}";
		echo "a:link,a:visited,a:active{color:#256114}";
		echo "</style>";
	}

	public function DisplayHeader(){ // 输出页头部分
		echo "<table width= \"100%\" cellpadding=\"12\" cellspacing=\"0\" border=\"0\">";
		echo "<tr>";
		echo "<td align=\"left\"><img src=\"apache.gif\" /></td>";
		echo "<td bgcolor=\"#FFF\">";
		echo "<h1>音乐唱片大全</h1>";
		echo "</td>";
		echo "<td align=\"right\"></td>";
		echo "</tr>";
		echo "</table>";
	}
	
	public function DisplayMenus($buttons){ // 输出页面导航部分
		if(is_array($buttons) && count($buttons) == 0)
			return;
		echo "<table width=\"100%\" bgcolor=\"#FFF\" cellpadding=\"4\" cellspacing=\"4\"\n>";
		echo "<tr>\n";
	}
	
	
}
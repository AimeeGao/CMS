<?php
// 基于文本的简易blog系统
/* （1）. 系统功能设计
 * 一个blog系统最基本的功能有日志浏览、日志发布和日志管理。 其中，日志管理又包括修改已发布的日志、删除日志等
 * 若是多用户的blog，还应实现用户管理功能。
 * */
/* （2）. 数据的存储及系统架构
 * blog系统实现的关键问题在于如何完成数据的存储和提取，可以考虑将数据存储到数据库中，或将数据存储在普通文本文件中
 * 本例采用将数据存储在普通文本文件中 文本存储 blog数据要考虑 a.将什么样的数据存入文件 b.文件保存在什么位置
 * 将什么数据存入文件，本质是如何组织数据 一个日志最基本的组成应包括日志文章标题、发布该日志文章的日期时间、日志文章的实际内容
 * 这3项数据存入文件时，要能区分这3项数据各表示什么含义 
 * 在文件中，按“日志标题|日志日期时间|日志实际内容”这样的格式来存储数据，当程序从文件读取数据后，可根据竖线“|”区分各项数据的意义，方便提取和在页面显示这些数据
 * 当用户提交一个日志后，程序会把用户提交的内容组织成“日志标题|日志日期时间|日志实际内容”的格式保存到文件中
 * 并且程序会根据系统当前日期和时间设定文件的名称 
 * 如在某月5号 12：47：07创建的日志，将会保存到文件05-124707.txt中
 * 存储数据的文件创建好后，要将其存放在一定的位置供程序读取 
 * 这里为所有日志内容建立一个contents的目录，在contents目录下再按年月建立目录，用来存放不同年份和月份的日志
 * */
 /* （3）. 系统功能实现
  * 系统前端页面使用HTML语言构建，blog实际内容由内嵌入HTML的PHP代码完成
  * */
 /* （3）1. 实现blog文章的显示
  * 实现从文件中读取日志内容，并将其显示在页面上
  * 这段内容的各项以“|”分割，从左向右依次表示日志的标题、发布该日志的日期时间（UNIX时间戳表示法）、日志的实际内容
  * 目前还没有实现添加日志文章的功能，所以先手工建立一个目录及日志内容文件，以便显示日志内容的程序可读取该文件
  * */
  /*blog.php页代码思路解析
   * 1.首先指定文件所在目录
   * 2.判断指定文件的目录是否存在
   * 3.若存在则$fp=fopen($file_name); 即打开文件
   * 4.判断打开的文件是否存在
   * 5.若存在，则对文件加锁 LOCK_SH 并读取加锁后的文件里的内容 $result=fread($fp,1024);
   * 6.文件读取完毕后， 对文件解锁
   * 7.fclose($fp); 关闭打开的文件，释放内存空间
   * 8.将获取到的文件内容以一定形式分割并赋值给数组
   * 9.依次输出数组中的对应内容(以对应索引值的方式)
   */
// 以上代码仅能读取2011年12月2日某时刻的日志文件 若想能够访问每一天的日志文件，应通过URL向程序传入参数实现，不同的参数值代表不同的日期时间，
// 程序根据这个参数值的不同，完成访问不同目录下的日志文件，并获取该文件中的数据
// 如传入参数entry=201112-02-215307，表示访问目录201112下的02-215307.txt文件

/* （3） 2. 通过URL实现传入字符串参数
 * */

 /*（3） 3. 添加日志文章的实现
 * */

/* （3） 4. 登陆功能的实现
 * 1.载入配置文件 auth.php (将其存放于一个config目录下)
 * 2.启动session_start()
 * 3.判断用户是否输入了用户名和密码 并将其赋值给$user $passwd
 * 4.在判断输入为真的前提下，将输入的用户名和密码与配置文件中$AUTH[]数组的存储值进行比对
 * 5.此时，严格理解if()else{}语句，有无else的区别
 * 6.利用if()else{}语句，实现若比对结果有错，提示用户名或密码错误，若比对结果无措，将用户输入的用户名存入$_SESSION中，并header重定向跳转页面
 * */

/* （4）首页功能的实现
 * 1.首页原理是根据用户登陆与否（session记录）来显示不同的页面，并实现文章日志展示、日志编辑、删除、日志归档三大功能
 * 2.session值判断用户登录后，应获取日志所在目录，并打开目录句柄
 * 3.判断打开目录与否，并循环读取打开目录中的内容 （注意文档的$filename !='.' && $filename!= '..'）年月文档
 * 4.因年月文档不只一个，故应将循环的目录文件和文件本身存储到一个空的数组中 array_push
 * 5.得到文档地址$folder后，应打开文档循环模式下的各个文件，并判断打开文档后的文件是否是文件 if(is_file)
 * 6.判断是文件后，紧接着判断文件是否存在 按照一般形式读取文件 加锁、解锁、释放内存
 * 7.创建一个存储日志目录、时间、内容的空数组
 * 8.获取文件的各个部分 subject、title、date、content、filename
 * 9.将获取的内容存储到新数组中
 * */
 
 /* （5） 编辑功能的实现
  * 1.编辑功能出bug 极有可能是因为文件路径的原因 文件路径出错 报出 error offset错误
  * 2.先做两个判断，第一是否设置了$_GET['entry']的值  第二$_SESSION['user']的值是否为空或$_SESSION['user']== 'aim'
  * 3.获取日志目录路径和文件名路径substr(($_POST['entry']));
  * 4.读取原始日志中的内容，为下面的编辑替代功能做铺垫
  * 5.判断用户是否编辑了内容，即输入新的标题和内容，获取该内容
  * 6.判断$file_name是否存在，并将替换功能$str_replace在此位置中实现，递进方式实现目录、时间和内容的紧密连接
  * 7.将替换的内容写入$file_name文件中
  * 8.判断$strlen();长度是否大于0
  * 编辑操作的实质是更改文件的内容。 
  * 首先，要从所要编辑的日志文章的文件中将文件内容全部取出，并存入数组中 $content_array 这个数组将在显示日志文章原有内容时使用（html表单代码那块中）
  * 根据用户传入的内容使用字符串替换函数$str_replace()将原有内容替换为新的内容，从而完成对日志文章的修改
  * */
 
 /*
  * （6）删除功能的实现
  * 删除一篇日志文章的基本操作是，找到日志文章所在路径和文件，然后执行删除操作，对于不存在的日志执行删除操作，应给出“所要删除文章不存在”的提示信息
  * 当用户单击“删除”链接后，应给用户一个提示界面，确认是否用户真的想删除该日志文章，以免用户误操作。 此外，与编辑日志同理，只能在用户登录之后执行删除操作
  * 因为删除确认界面和执行删除操作的功能由同一个程序实习，故这里通过向程序传入两个不同的URL参数，以便程序可以判断是显示删除确认界面还是执行删除操作，
  * 这两个参数是entry和id，其中id将作为表单隐藏域数据传给删除程序 若程序获得id参数，则表示要执行删除操作
  * 参数id的值和参数entry的值一样，他们只用来区分不同的操作
  * 1.判断用户登录与否 $_SESSION['user']
  * 2.判断是否设置了$_GET['entry'],且在该条件下是否设置了$_POST['id'] entry用来做删除提示，id用来做删除文件
  * 3.若设置了id,则执行删除操作  获取文件的目录路径与文件路径，并拼接出完整的文件路径格式 .txt
  * 4.unlink();删除函数操作 若删除成功，则显示删除成功的提示，否则，显示不成功并返回首页
  * 5.若设置了entry，则首先创建一个 $form_data = '';
  * 6.获取文档的路径和文件的路径，并拼接出完整的文件路径格式
  * 7.判断文件存在与否，若存在则为其设置一个type为hidden的文本框，设定name="id"与value="'.$_GET['entry'].'",否则$ok=true,且显示文件不存在
  * */
 /*
  * （7）实现BLOG归档显示的功能
  * blog系统会提供按年月归档显示日志的功能 该功能会将某年某月下的所有日志文章列出，方便拥护按时间查看每天的日志文章
  * 浏览归档显示的日志文章，不需要用户登录。 向浏览归档日志文章程序传入的参数是一个年月值字符串，程序根据该值找到日志所在目录，从而获取日志文章的文件内容，
  * 然后将内容显示到Web界面上
  * 程序首先判断是否传入参数ym，该参数的值类似于201112，表示日志的归档年月，若没有传入该参数，则提示错误消息，若传入的参数值没有其对应的目录，也会提示错误信息
  * 然后，程序会在对应年月的目录下找出日志文章所在文件，这是一个循环查找的过程，然后判断文件是目录还是普通文件。若是普通文件，程序将打开文件并读取文件内容，存入数组当中
  * 若不是普通文件，则继续循环查找当前目录下的文件，直到找出所有普通文件为止
  * 1.判断是否传入参数ym
  * 2.获取日志的目录和文件夹
  * 3.判断该目录下的文件夹是否是对应的地址
  * 4.打开该目录并读取目录下的文件夹
  * 5.对文件夹名进行判断，并将符合条件的文件夹推入新的数组
  * 6.对由所有文件夹组成的新数组进行排序
  * 7.打开新数组下的文件夹
  * 8.读取该目录下的文件（循环获取）
  * 9.判断获取的内容是否是文件，若是则读取该目录下所有文件
  * 10.判断文件是否存在，若存在则以只读方式打开该文件
  * 11.对文件进行加锁，获取文件内容，文件解锁
  * 12.对$result数组进行分割，将分割内容存入到一个新数组中
  * */
  /* （8） 实现BLOG的退出功能
   * 退出功能的实质:在程序中将用户登陆时注册的session清空删除即可
   * */
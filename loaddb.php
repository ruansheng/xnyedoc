<?php
$contents=file_get_contents('./db/db.sql');

$conn=mysql_connect('127.0.0.1','root','19900918');
mysql_query("SET NAMES UTF8");

$sqls=explode(';',$contents);
foreach($sqls as $v){
	if(trim($v)!=''){
		$flag=mysql_query($v);
		if($flag){
			echo 'success'.PHP_EOL;
		}else{
			echo 'fail'.PHP_EOL;
			echo $v;
		}
	}
}

$password=sha1('19900918xnyedoc');
$time=time();
$insrtUser="insert into doc_user(user_name,password,create_time,update_time) values('ruansheng','{$password}',{$time},{$time})";
mysql_query($insrtUser);

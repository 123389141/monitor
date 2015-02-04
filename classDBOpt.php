<?php
require_once "classDBConn.php";
require_once "config.php";
class classDBOpt extends DBConn{
	/**
	 * 查询上周新增和未关闭BUG
	 * LW lastweek
	 */
	public function execSql($ip,$port,$user,$pass,$sql){
		$dsnStr="mysql:host=".$ip.":".$port.";dbname=mysql";
		$conn=parent::getConn($dsnStr,$user,$pass);
		try{
			$st=@$conn->prepare($sql);
			$st->execute();
			$row=$st->fetchALL();
			$conn=Null;
		}catch(PDOException $e){
			echo "failure:".$e->getMessage();
			return false;
		}
		return $row;
	}
}

// 	$db = new classDBOpt();
// 	$vars = $db->execSql('192.168.67.16','6026',' SLAVE start;');
// 	echo "<pre>";
// 	print_r($vars);
?>
<?php
require_once "class.SSH2Conn.php";
class SSH2Opt extends SSH2Conn{
	/**
	 * ssh2执行命令
	 */
	public function ssh2Exec($host,$user,$pass,$command){
 		$conn=parent::getConn($host,'22',$user,$pass);
 		$result = array();
 		set_time_limit(1800);
 		try{
			$stream = ssh2_exec($conn, $command);
	 		stream_set_blocking($stream, true);
			while($line = fgets($stream)) {
				flush();
				array_push($result, $line);
			}
 			return $result;
 		}catch(PDOException $e){
 			echo "ssh2Exec() failed:".$e->getMessage();
 			return false;
 		}	
	}
	/**
	 * 更新一个渠道
	 */
	public function ssh2Shell($host,$user,$pass,$cmds){  //主机名称   和  命令数组
		$conn=parent::getConn($host,'22',$user,$pass);
		try{
			$out = '';
			$shell = ssh2_shell($conn);
			usleep(500000); // sleep 0.5 seconds
			for ($i = 0; $i < count($cmds); $i ++) {
				fwrite($shell, $cmds[$i] . PHP_EOL);
				usleep(200000); // sleep 0.2 seconds
				while ($buffer = fgets($shell)) {
					flush();
					$out .= $buffer;
				}
			}
			return $out;
		}catch(PDOException $e){
			echo "ssh2Exec() failed:".$e->getMessage();
			return false;
		}

	}
}
// 	$opt = new SSH2Opt();
// 	$common = 'find / -name "*log*" -size +1G -type f -exec ls -lh {} \;|awk \'{ print $9 ":" $5 }\'';
// 	$val = $opt->ssh2Exec('192.168.14.99','root','Nopass@test',$common);
// 	echo "<pre>";
// 	print_r($val);

?>

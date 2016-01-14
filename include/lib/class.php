<?
class System_Connect_Mysql{
	var $Mysql_Host;
	var $Mysql_User;
	var $Mysql_Pass;
	var $Mysql_Table;
	var $Adapter;
	var $Result;
	var $num_rows;
	function System_Connect_Mysql(){
		global $DB_HOST;
		global $DB_USER;
		global $DB_PASS;
		global $DB_NAME;
		$this->Mysql_Host = $DB_HOST;
		$this->Mysql_User = $DB_USER;
		$this->Mysql_Pass = $DB_PASS;
		$this->Mysql_Table= $DB_NAME;
	}
	function set($HOST,$USER,$PASS,$TABLE){
		$this->Mysql_Host = $HOST;
		$this->Mysql_User = $USER;
		$this->Mysql_Pass = $PASS;
		$this->Mysql_Table= $TABLE;
	}
	function connect(){
		if(!$this->Adapter=mysql_connect($this->Mysql_Host,$this->Mysql_User,$this->Mysql_Pass))return "ไม่สามารถสามาติดต่อฐานข้อมูลได้";			
		if(!mysql_select_db($this->Mysql_Table,$this->Adapter))return "ไม่สามารถเลือกฐานข้อมูลได้";	
		mysql_query("SET CHARACTER SET utf8");
	}
	function query($Sql){
		if($Sql!="" && $this->Result = mysql_query($Sql))
			return $this->Result;
		else
			return false;
	}
	function fetch(){
		if($this->Result != null)
			if($temp=mysql_fetch_array($this->Result))
				return $temp;
			else
				return false;
		else
			return false;
	}
	function num_rows(){
		if($this->Result != null)
			if($temp=mysql_num_rows($this->Result))
				return $temp;
			else
				return false;
		else
			return false;
	}
	function disconnect(){
		if(mysql_close($this->Adapter))
				return true;
			else
				return false;
	}
}
class System_Account{
	var $Endcoding = "MD5";
	function status(){
		if($_SESSION["Module_Account_ID"]=="")
			return false;
		else
			return true;
	}
	function singin($Username,$Password){
		if($Username=="")return "กรุณากรอกชื่อผู้ใช้";
		if(strlen($Username)<6)return "ชื่อผู้ใช้ต้องมีอย่างน้อย 6 ตัวอักษร";
		if($Password=="")return "กรุณากรอกรหัสผ่าน";
		if(strlen($Password)<6)return "รหัสผ่านใช้ต้องมีอย่างน้อย 6 ตัวอักษร";
		$DB = new System_Connect_Mysql;
		$DB->connect();
		$DB->query("select * from user where user_username='$Username' and user_password='$Password'");
		if($Temp = $DB->fetch()){
			$_SESSION["Module_Account_ID"]=$Temp["user_username"];
			return true;
		}else{
			return "ชื่อผู้ใช้หรือรหัสผ่านผิด";
		}
	}
	function singup(){
		return true;
	}
	function edit(){
		return true;
	}
	function activate(){
		return true;
	}
	function sendactivate(){
		return true;
	}
	function singout(){
		if(session_destroy())
		return true;
		else
		return false;
	}
}
class Module_News{
	var $height;
	var $width;
	function Module_News(){
		$DB = new System_Connect_Mysql;
		$DB->connect();
		$DB->query("select * from module_news ORDER BY  id DESC LIMIT 9");
		?>
        <style type="text/css">
			.Module_News{ 
				height:235px; 
				width:675px;
			}
			.Module_News_Box{ 
				height:70px; 
				width:219px; 
				float:left; 
				margin:3px; 
			}
			.Module_News_Box_Pictuer{ 
				height:70px; 
				width:70px; 
				float:left; 
			}
			.Module_News_Box_Detail { 
				height:70px; 
				width:149px; 
				float:right; 
				word-wrap:break-word; 
				overflow:hidden;
				background-color:#9FC;
			}
		</style>
		<div class="Module_News">
			<? while ($TEMP = $DB->fetch()){ ?>
			<div class="Module_News_Box">
				<div class="Module_News_Box_Pictuer"><img src="images/IMG_8448.jpg" width="70" height="70" /></div>
				<div class="Module_News_Box_Detail"><? echo $TEMP["header"]; ?></div>
            </div>
			<? 	} ?>
		</div>
		<?
		$DB->disconnect();
	}
}
?>
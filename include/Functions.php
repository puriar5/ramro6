<?php
	$key = md5('uxbridge');
	$salt = md5('uxbridge');
	//Encrypt
	function encrypt($string,$key){
		$string = rtrim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256,$key,$string, MCRYPT_MODE_ECB)));
		return $string;
	}
	//Decrypt
	function decrypt($string,$key){
		$string = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256,$key, base64_decode($string), MCRYPT_MODE_ECB));
		return $string;
	}
	//Hash Encrypt
	function hashword($string,$salt){
		$string = crypt($string,'$1$'.$salt.'$');
		return $string;
	}
?>
<?php require_once("Include/DB.php"); ?>
<?php require_once("Include/Sessions.php"); ?>
<?php
	function Redirect_to($New_Location){
	header("Location:".$New_Location);
	exit;
}

function Login_Attempt($Username,$Password){
	$key = md5('uxbridge');
	$salt = md5('uxbridge');
	$ConnectingDB;
	$Query = "SELECT * FROM registration";
	//$Query = "SELECT * FROM registration WHERE username='$Username' AND password='$Password'";
	//password_verify()
	$Execute = mysql_query($Query);
	while($Rows=mysql_fetch_array($Execute)){
		$Id=$Rows['id'];
		$DBUsername=$Rows['username'];
		$DBPassword=$Rows['password'];
		$DBUsername = decrypt($DBUsername,$key);
		if($Username==$DBUsername && password_verify($Password,$DBPassword)){
			return $Id;
		}
		
	}
	
}
function Login(){
	if(isset($_SESSION["Username"])){
		return true;
	}
}
function Confirm_Login(){
	if(!Login()){
		$_SESSION["ErrorMessage"]="Login Required";
		Redirect_to("Login.php");
	}
}

?>
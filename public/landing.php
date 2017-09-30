<?php
session_start();
if(isset($_SESSION['administrador'])){

include_once "headerLogin.php";
@$msg = $_REQUEST['msg'];
if($msg == ""){

}else{
	echo "<script type='text/javascript'>alert('". $msg."');</script>";
}

?>

<?php include_once "footer.php";
}else{
	header("Location: index.php");
}
?>
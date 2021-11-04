<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>

<form method="POST">
	<table align="left" width="70%">
    <tr align="left">
      <td colspan="4"><h2>Login.</h2>
        <br />
        <span> Don't have account? <a href="register.php">Register Here</a><br />
          <br />
        </span></td>
      </tr>
      <tr>
        <td><b>UserName:</b></td>
        <td colspan="3"><input type="text" name="username"/></td>
      </tr>
      <tr>
        <td width="15%"><b>Password:</b></td>
        <td colspan="3"><input type="password" name="password" /></td>
      </tr>
      <tr align="left">
        <td></td>
        <td colspan="4"><input type="submit" name="login" value="login" /></td>
      </tr>
    </table>
</form>

<?php
	$connect = mysqli_connect('localhost','root','','rt5website');
	if(!$connect){
		echo("Kết nối thất bại");
	}
	if(isset($_POST['login']))
	{
		$username =$_POST['username'];
		$password = $_POST['password'];
		// Lựa từ bảng User cột username = username nhập từ form và password = password nhập từ form
		$sql = "SELECT * FROM user WHERE username = '$username' AND password ='$password'";
		// Thực thi truy vấn từ database
		$result = mysqli_query($connect, $sql);

		$check_login = mysqli_num_rows($result);

		if ($check_login==0) {
			echo"Password or username is incorrect";
			exit();
		}
		else{
			echo"Login successfully!";
		}


	}
?>
</body>
</html>
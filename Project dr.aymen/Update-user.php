<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="style.css">

	<title>Register Form </title>
</head>
<body>
	<div class="container">
		<form action="" method="POST" class="login-email">
            <div class="input-group">
				<input type="username" placeholder="Username" name="username" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" required>
			</div>
			<select name="Type" class="input-group" style="opacity: 0.5; border-radius: 25px;">
			<option value="1">leader</option>
    		<option value="2">Death cases officer</option>
    		<option value="3">Compensation cases officer</option>
			<option value="4">signature health officer</option>
			<option value="5">Officer family court</option>
			<option value="6">Officer's of economic courts experts</option>
			<option value="7">Security officer</option>
  			</select>
            <div class="input-group">
			<div class="input-group">
				<button name="submit" class="btn">Update</button>
				</div>
				<a style="text-decoration:none" name="sub" href="index.php" class="btn"> Return to Login </a>
			</div>
		</form>
		<br>
		<br>
		<br>
<?php
include"user_login_list.php";
$pn=$list->head;
extract($_POST);
$k=1;
if(isset($_POST['submit']))
{
	$file=fopen("login_information.txt","a");
    fwrite($file, $username ."\n");
	fwrite($file, $password ."\n");
    fclose($file);
    $fil=fopen("login_information.txt","r");
	$l1=fgets($fil);
	$l2=fgets($fil);
    fclose($fil);
	$h=0;
    while($pn!=NULL)
	{
		if($l1==$pn->name)
		{
			$pn->password=$l2;
			$h=1;
            break;
		}
		$pn=$pn->next;
	}
    $filename='login_information.txt';
	unlink($filename);
	if($h==1)
	{
		$filenam='form-save.txt';
		unlink($filenam);
		$pn=$list->head;
		$file=fopen("form-save.txt","a");
		while($pn!=NULL)
		{
        	fwrite($file, $pn->name);
        	fwrite($file, $pn->password);
			$pn=$pn->next;
		}
		fclose($file);
		header("location: index.php");
	}
	else{
	echo "Username Not Fount !";
	}
}
?>
	</div>
</body>
</html>
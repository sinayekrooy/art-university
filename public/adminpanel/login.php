<?php
	require_once("../../includes/initialize.php");
?>

<?php
if($session->is_logged_in())
{
  redirect_to("index.php");
}

login($submit_name="submit", $mode="college");

?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>ورود</title>
    <link href="style/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <div class="login_wrapper">
        <h1>ورود به پنل مدیریت</h1>
        <?php echo output_message($message); ?>
        <form action="login.php" method="post">
        <input type="text" name="username" value="<?php echo htmlentities($username); ?>" placeholder="نام کاربری" />
        <input type="password" name="password" value="<?php echo htmlentities($password); ?>" placeholder="رمز عبور" />
        <input type="submit" name="submit" value="ورود" />
        </form>
    </div>
</body>
</html>

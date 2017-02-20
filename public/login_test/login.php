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

<h2>Staff Login</h2>
<?php echo output_message($message); ?>
<form action="login.php" method="post">
  <table>
    <tr>
      <td>Username:</td>
      <td><input type="text" name="username" maxlength="30" value="<?php echo htmlentities($username); ?>" /></td>
    </tr>
    <tr>
      <td>Password:</td>
      <td><input type="password" name="password" maxlength="30" value="<?php echo htmlentities($password); ?>" /></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="submit" value="Login" /></td>
    </tr>
  </table>
</form>
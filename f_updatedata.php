<?php
session_start();
$submit = $_POST['updateform'];
$u_email = strip_tags($_POST['fu_email']);
$u_nick = strip_tags($_POST['fu_nick']);
$u_password = strip_tags($_POST['fu_password']);
$u_name = strip_tags($_POST['fu_name']);
$u_forename = strip_tags($_POST['fu_forename']);
$u_phone = strip_tags($_POST['fu_phone']);
$u_birth = strip_tags($_POST['fu_birth']);
$u_id = $_SESSION['u_id'];
if($submit){
include 'config/serverconfig.php';
$updatedata_query = mysqli_query($con, "UPDATE T_USERS SET u_email='$u_email', u_nick='$u_nick', u_password='$u_password', u_name='$u_name', u_forename='$u_forename', u_phone='$u_phone', u_birth='$u_birth' WHERE u_id='$u_id'") or die ('nie lol');
include 'f_sessionuserdataupdate.php';
header('location: page_myaccount.php');

}
?>


//ten form gdzieś w page_myaccount.php
<div>
<table class="table table-default">
<form action="f_updatedata.php" method="POST">
<tr><td><input type="text" id="fu_email" name="fu_email" value="<?php echo($_SESSION['u_email']);?>" required><td><span class="komentarz"></span></td>
<td><input type="text" id="fu_nick" name="fu_nick" value="<?php echo($_SESSION['u_nick']);?>" required><td><span class="komentarz"></span></td></tr>
<tr><td><input type="text" name="fu_password" value="<?php echo($_SESSION['u_password']);?>" required><td><span class="komentarz"></span></td>
<td><input type="text" id="fu_name" name="fu_name" value="<?php echo($_SESSION['u_name']);?>" required><td><span class="komentarz"></span></td></tr>
<tr><td><input type="text" id="fu_forename" name="fu_forename" value="<?php echo($_SESSION['u_forename']);?>" required><td><span class="komentarz"></span></td>
<td><input type="text" id="fu_phone" name="fu_phone" value="<?php echo($_SESSION['u_phone']);?>" required><td><span class="komentarz"></span></td></tr>
<tr><td><input type="text" id="fu_birth" name="fu_birth" value="<?php echo($_SESSION['u_birth']);?>" required><td><span class="komentarz"></span></td>
<td><input type="submit" name="updateform" class="btn btn-default" value="Zapisz zmiany"></td></tr>
</table>
</div>

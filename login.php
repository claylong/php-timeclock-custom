<?php
session_start();

include 'config.inc.php';
include 'header.php';
include 'topmain.php';
echo "<title>$title - Admin Login</title>\n";

$self = $_SERVER['PHP_SELF'];

if (isset($_POST['login_userid']) && (isset($_POST['login_password']))) {
    $login_userid = $_POST['login_userid'];
    $login_password = crypt($_POST['login_password'], 'xy');

    $query = "select empfullname, employee_passwd, admin, time_admin from ".$db_prefix."employees
              where empfullname = '".$login_userid."'";
    $result = mysql_query($query);

    while ($row=mysql_fetch_array($result)) {

        $username = "".$row['empfullname']."";
        $password = "".$row['employee_passwd']."";
        $admin_auth = "".$row['admin']."";
		$report_auth = "".$row['report']."";
        $time_admin_auth = "".$row['time_admin']."";
    }  

	if (($login_userid == @$username) && ($login_password == @$password))
        $_SESSION['valid_user'] = $login_userid;
	
    if (($login_userid == @$username) && ($login_password == @$password) && ($admin_auth == "1"))
        $_SESSION['valid_admin'] = $login_userid;
	
	if ($report_auth == "1")
		$_SESSION['valid_reports_user'] = stripslashes($tmp_username);

    if (($login_userid == @$username) && ($login_password == @$password) && ($time_admin_auth == "1"))
        $_SESSION['time_admin_valid_user'] = $login_userid;
	
}

if (isset($_SESSION['valid_admin'])) {
    echo "<script type='text/javascript' language='javascript'> window.location.href = 'admin/index.php';</script>";
    exit;
}

elseif (isset($_SESSION['time_admin_valid_user'])) {
    echo "<script type='text/javascript' language='javascript'> window.location.href = 'admin/timeadmin.php';</script>";
    exit;

} else {

    // build form

    echo "<form name='auth' method='post' action='$self'>\n";
    echo "<table align=center width=210 border=0 cellpadding=7 cellspacing=1>\n";
    echo "  <tr class=right_main_text><td colspan=2 height=35 align=center valign=top class=title_underline>PHP Timeclock Admin Login</td></tr>\n";
    echo "  <tr class=right_main_text><td align=left>Username:</td><td align=right><input type='text' name='login_userid'></td></tr>\n";
    echo "  <tr class=right_main_text><td align=left>Password:</td><td align=right><input type='password' name='login_password'></td></tr>\n";
    echo "  <tr class=right_main_text><td align=center colspan=2><input type='submit' onClick='admin.php' value='Log In'></td></tr>\n";

    if (isset($login_userid)) {
        echo "  <tr class=right_main_text><td align=center colspan=2>Could not log you in. Either your username or password is incorrect.</td></tr>\n";
    }

    echo "</table>\n";
    echo "</form>\n";
    echo "<script language=\"javascript\">document.forms['auth'].login_userid.focus();</script>\n";
}

echo "</body>\n";
echo "</html>\n";
?>

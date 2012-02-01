<?php

session_start();

$self = $_SERVER['PHP_SELF'];
$request = $_SERVER['REQUEST_METHOD'];

include '../config.inc.php';

echo "<title>$title - Reports</title>\n";

include '../admin/header.php';
include 'topmain.php';

if ($use_reports_password == "yes") {

	if (!isset($_SESSION['valid_reports_user'])) {
		echo "<table width=100% border=0 cellpadding=7 cellspacing=1>\n";
		echo "  <tr class=right_main_text><td height=10 align=center valign=top scope=row class=title_underline>PHP Timeclock Reports</td></tr>\n";
		echo "  <tr class=right_main_text>\n";
		echo "    <td align=center valign=top scope=row>\n";
		echo "      <table width=200 border=0 cellpadding=5 cellspacing=0>\n";
		echo "        <tr class=right_main_text><td align=center>You are not presently logged in, or do not have permission to view this page.</td></tr>\n";
		echo "        <tr class=right_main_text><td align=center>Click <a class=admin_headings href='../login_reports.php'><u>here</u></a> to login.</td></tr>\n";
		echo "      </table><br /></td></tr></table>\n"; exit;
	}
}

include 'leftmain.php';

echo "    <td align=left class=right_main scope=col>\n";
echo "      <table width=100% height=100% border=0 cellpadding=5 cellspacing=1>\n";
echo "        <tr class=right_main_text>\n";
echo "          <td valign=top>\n";

echo "<h1>Run Reports</h1>";
	
include '../footer.php';
?>


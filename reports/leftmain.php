<?php

include '../config.inc.php';

$self = $_SERVER['PHP_SELF'];
$request = $_SERVER['REQUEST_METHOD'];

// set cookie if 'Remember Me?' checkbox is checked, or reset cookie if 'Reset Cookie?' is checked //


echo "<table width=100% height=89% border=0 cellpadding=0 cellspacing=1>\n";
echo "  <tr valign=top>\n";
echo "    <td class=left_main width=170 align=left scope=col>\n";
echo "      <table class=hide width=100% border=0 cellpadding=1 cellspacing=0>\n";

// display links in top left of each page //

$reportLinks = array( array("Daily Time Report", "timerpt.php"),
					  array("Hours Worked Report", "total_hours.php"),
					  array("Audit Log", "audit.php") );

echo "        <tr><td class=left_rows height=7 align=left valign=middle></td></tr>\n";

for ($x=0; $x<count($reportLinks); $x++) {
	echo "        <tr><td class=left_rows height=18 align=left valign=middle><a class=admin_headings href='".$reportLinks[$x][1]."'>".$reportLinks[$x][0]."</a></td>
				  </tr>\n";
}

echo "        <tr><td height=90%></td></tr>\n";
echo "      </table></td>\n";

?>

<?php
//����� �߰�
include "connect_today.php";

if ($_GET['content']) add_anni($_GET['value'], $_GET['content']);
else {
	@mysql_close();
	echo "<script> alert('������� �Է����ּ���.'); window.location.replace('Calendar.php?value=".$_GET['value']."');</script>";
}

function add_anni($date_now, $content) {
	$query = "insert into anniversary (anni_year, anni_mon, anni_day, content) values (".$_GET['year'].", ".$_GET['mon'].", ".$_GET['day'].", '$content')";
	mysql_query($query);

	@mysql_close();

	echo "<script> alert('������� �߰��Ǿ����ϴ�.'); window.location.replace('Calendar.php?value=".$_GET['value']."');</script>";
}
?>

<?php
//connect_today.php �ε�
include "connect_today.php";

//������ �������� ������ �������� �ʰ� �����ϸ� ����
if (is_int(key($_GET))) del_sch();
else {
	@mysql_close();
	echo "<script> alert('������ �������ּ���.'); window.location.replace('Calendar.php?value=".$_GET['value']."&Y=".$_GET['Y']."&M=".$_GET['M']."');</script>";
}

function del_sch() {
//�޾ƿ� ���� �迭�� �� �պ��� ����
	reset($_GET);
//�޾ƿ� ���� �����̸� ���� ����
	while (is_int(key($_GET))) {
		$query = "delete from schedule where sch_date = '".$_GET['value']."' and sch_index = '".$_GET[key($_GET)]."';";	//id �߰��Ұ�
		mysql_query($query);
		next($_GET);
	}

	@mysql_close();

	echo "<script> alert('������ �����Ǿ����ϴ�.'); window.location.replace('Calendar.php?value=".$_GET['value']."&Y=".$_GET['Y']."&M=".$_GET['M']."');</script>";
}

?>
<?php require("connect_today.php"); ?>

<!DOCTYPE>
<html>
<head> <title> ���� ���� ������ </title> </head>
<body>

<script type = "text/javascript" src = "Calendar.js"> </script>
<?php

$string = '<script type = "text/javascript">';
$string .= 'window.onload = function() {';

$date_now = explode("-", $_GET['value']);
if ($date_now[1] < 10) $date_now[1] = "0".$date_now[1];
if ($date_now[2] < 10) $date_now[2] = "0".$date_now[2];
$date_now = "$date_now[0], $date_now[1]-1";

$string .= "d = new Date($date_now);";
$string .= 'Calendar("Cal");';
$string .= '}';
$string .= '</script>';

echo $string;
?>

<h1> ���� ���� ������ </h1>

<table> <tr> <td valign = "top">
<div id = "Cal" align = "left" style = "position : relative; width : 750px;"> </div> </td>

<td valign = "top"> <table> <tr> <td colspan = "2">
<div id = "View" align = "left" style = "position : relative; width : 300px; border : thin solid black; padding-left : 20px; padding-right : 20px; word-wrap:break-word;">

<h3 style = "text-align : center"> ���� ��� </h3>

<?php

if ($_GET['value']) display_list($_GET['value']);

function display_list($date_now) {
	$query = "select content from schedule where sch_date = '$date_now'";	//���̵� �߰��Ǹ� where �ڿ� �߰��� ��
	$result = mysql_query($query);
	$i = 0;

	$div_string = "<h3 style = 'text-align : center'> <b>- ".$_GET['value']." -</b> </h3>";

	while ($arr_list = mysql_fetch_assoc($result)) {
		if (!$i) $div_string .= "<form method = 'GET' action = 'del_sch.php'>";
		$div_string .= $arr_list['content']."<input type = 'checkbox' name = '$i' value = '".$arr_list['content']."' style = 'float : right;'> <br>";
		$i++;
	}

	$div_string .= "<br> </td> </tr> <tr> <td>";
	$div_string .= "<div onclick = 'add_sch();' style = \"background-image : url('test.png'); width : 100px; height : 50px; margin : 0 auto;\"> </div> </td>";	//���� �������� �Ѿ�� ��ư

	$div_string .= "<input type = 'hidden' name = 'value' value = '$date_now'>";
	if ($i) $div_string .= "<td> <input type = 'submit' value = '���� ����'> </form> </td> </tr> </table>";
	else $div_string .= "<td> </td> </tr> </table>";

	echo $div_string;
	print_r($arr_list);
}

?>

</div> </td> </tr> </table>

<div id = "Add" style = "background-color : #ffffff; position : absolute; left : 400px; top : 200px; width : 400px; padding : 10px; border : thin solid black; word-wrap:break-word; visibility : hidden">

<form method = "get" action = "add_sch.php">

<input type = "hidden" name = "value" value = "<?php echo $_GET['value']; ?>">
<b> ���� ���� <b> </p>
<textarea name = "content" rows = "8" cols = "47" style = "background-color : transparent; font-size : 15px; font-weight : bold; border : none;"></textarea> <br> <br>

<table style = "margin : 0 auto;"> <tr> <td>
<input type = "button" value = "���" onclick = "document.getElementById('Add').style.visibility = 'hidden';" style = "font-size : 15px; font-weight : bold; float : right; width : 60px; height : 40px"> </td>
<td> </td> <td>
<input type = "submit" value = "���" style = "font-size : 15px; font-weight : bold; float : right; width : 60px; height : 40px"> </td> </table>
</form> </div>

<?php @mysql_close(); ?>
</body>
</html>
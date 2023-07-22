<?php
//echo "<pre>\n";
//var_dump($_POST);
//echo "</pre>\n<br>\n";
echo "m_code -> ".$_POST['m_code']."<br>\n";
echo "create_date -> ".$_POST['create_date']."<br>\n";
echo "<br><br>\n";
echo "<pre>\n";
var_dump($_POST['select_arr_s002']);
echo "</pre>\n<br>\n";
echo "";


$json = $_POST['details_arr'] ?: "";
$darr = json_decode($json,true);

echo "<pre>\n";
var_dump($darr);
echo "</pre>\n<br>\n";


?>

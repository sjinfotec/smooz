<?php

// 初期化
$action_msg = "";

//echo "<pre>\n";
//var_dump($_POST);
//echo "</pre>\n<br>\n";
echo "m_code -> ".$_POST['m_code']."<br>\n";
echo "create_date -> ".$_POST['create_date']."<br>\n";
echo "<br><br>\n";
//echo "<pre>\n";
//var_dump($_POST['parts_arr']);
//echo "</pre>\n<br>\n";
echo "";

// jsonデータを配列に
$darr = Array();
$json = $_POST['details_arr'] ?: "";
$darr = json_decode($json,true);
$parr = Array();
$pjson = $_POST['parts_arr'] ?: "";
$parr = json_decode($pjson,true);

$select_arr_s001 = $_POST['select_arr_s001'] ?: "";
$select_arr_s002 = $_POST['select_arr_s002'] ?: "";
$select_arr_s003 = $_POST['select_arr_s003'] ?: "";
$select_arr_s004 = $_POST['select_arr_s004'] ?: "";
$select_arr_s005 = $_POST['select_arr_s005'] ?: "";










echo "<pre>\n";
var_dump($parr);
echo "</pre>\n<br>\n";

foreach($darr AS $key => $val) {
    $action_msg .= $key."->".$val."<br>\n";
    $$key = $val;
}
echo "foreach まえ...<br>\n";

foreach($parr AS $key => $val) {
    //$action_msg .= $key."->".$val."<br>\n";
    echo "key...".$key."<br>\n";
    //$p_.$$key = $val;
}


$id = $id ?:"値なし";

echo "id->".$id."<br>\n";
echo "create_date->".$create_date."<br>\n";

if(!empty($create_date)) {
    $cdate = date_create($create_date);
    $c_create_date = date_format($cdate, 'Y-m-d H:i:s');

    $dti_cdate = new DateTimeImmutable($create_date);
    $dti_create_date = $dti_cdate->format('Y年m月d月');
}
else {
    $c_create_date = "作成日未登録";
    $dti_create_date = "作成日未登録";
}

$m_code_html = "<div>【見積番号】".$darr['m_code']."</div>";
//$f_create_date_html = "<div>【作成日】".$dti_create_date."".$f_create_date."".$c_create_date."</div>";
$f_create_date_html = "<div>【作成日】".$dti_create_date."</div>";
$manager_html = $manager ? "<div>【担当者】".$manager_code." ".$manager."</div>": "";
$user_code_html = $user_code ? "<div>【OPRT】".$user_code."</div>": ""; 
$reference_num_html = $reference_num ? "<div>【素見積】".$reference_num."</div>": "";

$customer_html = $customer ? "<div>【得意先】".$customer_code." ".$customer."</div>": "";
$enduser_html = $enduser ? "<div>【エンドユーザー】".$enduser."</div>": "";
$product_html = $product ? "<div>【製品名】".$product."</div>": "";

// number_format($production_setnum) 制作組数（束ね内数） $select_arr_s001 組/帯の配列 [$production_setnum_unit  組/帯の区分int]
// number_format($production_volnum) 制作冊数 $select_arr_s002 S/冊/束/箱/枚/部/個の配列 [$production_volnum_unit 制作形態int]
// ※配列のkeyの値は 1 から振ってある（振り場所:QuotationSearch.vue内 ContentsClick() → forEach → append ）
$production_setnum_item = $production_setnum ? number_format($production_setnum)." ".$select_arr_s001[$production_setnum_unit]." × " : "";
$production_volnum_item = $production_volnum ? number_format($production_volnum)." ".$select_arr_s002[$production_volnum_unit] : "";
$ppp_html = "<div>【数量】".$parts_num." P &emsp;".$production_setnum_item.$production_volnum_item;
$production_all_html = $production_all ? "<div>【総数量】".number_format($production_all)."</div>": "";
$all_through_html = $all_through ? "<div>【総通し数】".number_format($all_through)."</div>": "";


//【規格】ミリ 【シリンダー】10.5インチ 3本 10.5インチ折
$unit_html = $unit ? "<div>【規格】".$select_arr_s003[$unit]."</div>" : "";
$cylinder = trim($cylinder);
$inch_fold = trim($inch_fold);
$cylinder_item = $cylinder ? $select_arr_s004[$cylinder]." インチ &emsp;" : "";
$cylinder_num_item = $cylinder_num ? $cylinder_num." 本 &emsp;" : "";
$inch_fold_item = $inch_fold ? $select_arr_s005[$inch_fold]." インチ折" : "";
if(!empty($cylinder_item.$cylinder_num_item.$inch_fold_item)) {
    $cylinder_html = "<div>【シリンダー】".$cylinder_item.$cylinder_num_item.$inch_fold_item."</div>";
}
else {
    $cylinder_html = "";
}


$_html = "<div>".$unit."</div>";

$html_main = <<<EOF
<div id="cnt2">
<h3>見積内容 ― 製品名 ―</h3>

    <div id="">
        $m_code_html
        $f_create_date_html
        $manager_html
        $user_code_html
        $reference_num_html
    </div>

    $customer_html
    $enduser_html
    $product_html

    <div id="">
        $ppp_html
        $production_all_html
        $all_through_html
    </div>

    <div id="">
        $unit_html
        $cylinder_html
    </div>

    <hr>

</div><!--end cnt2-->

【シリンダー】3 X 5000 = 15,000
【フォーム部】
【フォーム部合計】11,500
【版下設定】範疇：新版, 種別：フォーム, 難度：Ａ, 面積:72インチ平方, 料金:3000
ＣＴＰ 3版
【組版・製版合計】12,000
【製　本】
[断裁・イン] [バースター]
[バラ]
【梱包等】 [Ａ式] 2,500入り 40箱 X @250 = 10,000,
【製本合計】66,000
【発　送】市内 40個 X 150 = 6,000, 【送料合計】 6,000
【用紙代総額】146,926【工賃～送料総額】170,500【実質原価総額】317,426 単価 3.17-
【提示額】245,000 単価 2.45-


EOF;

echo $html_main;
echo "<br>動作メモ : <br>\n".$action_msg."<br>\n";









?>

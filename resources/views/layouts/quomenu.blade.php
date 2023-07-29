<?php
$requesturi = $_SERVER['REQUEST_URI'];

//$req_arr = Array();
//$req_arr[0] = !empty($_GET['s_m_code']) ? "s_m_code=".$_GET['s_m_code']: "";
//$req_str = is_array($req_arr) ? implode('&',$req_arr) : "";

//$query_str = parse_url($requesturi)['query'];
$query_str = $_SERVER['QUERY_STRING'] ?: "";
//parse_str($query_str, $queries);        // 配列にする場合

if($query_str) {
        $request_parameter = "?".$query_str;
}
else {
        $request_parameter = "";
}


// URL : 本来は REQUEST_URI などから取得
//$url = "/index.html?hoge=123&fuga=456#hash";
/*
$pattern = "/[\?&]([^&]+)=([^&#]+)/";
preg_match_all($pattern, $requesturi, $matches);
 
$queries = [];
$size = count($matches[0]);
for($i = 0; $i < $size; $i++){
  $key = $matches[1][$i];
  $value = $matches[2][$i];
  $queries[$key] = $value;
}
var_export($queries);
*/

$ruqurl = mb_substr( $requesturi , 0 , mb_strpos($requesturi, "?") );      //      文字列「?」以降を削除
if(empty($ruqurl)) $ruqurl = $requesturi;
$active_css = array();
$active_css[1] = "";
$active_css[2] = "";
$active_css[3] = "";
$active_css[4] = "";

switch ($ruqurl) {
	case '/quotations/department':
		        $active_css[2] = "active";
		break;
	case '/quotations/binding':
		        $active_css[3] = "active";
		break;
	case '/quotations/cost':
		        $active_css[4] = "active";
	        break;
	default:
                        $active_css[1] = "active";
                break;
}

?>
                <!-- offcanvas-left -->
                <div id="cnt_menu">
                   <div class="offcanvas-collapse-from-left side-base print-none"><!--query_str = {!! $query_str !!}-->
                        <nav class="">
                        <div id="menu_li">
                            <!--<h3 class="side-head p-3 font-size-rg">見積システム</h3>  offcanvas_left-->
                                <ul>
                                        <li class="gc2 {{ $active_css[1] }}"><a class="" href="{!! url('/quotations'.$request_parameter) !!}">基本項目</a></li>
                                        <li class="gc2 {{ $active_css[2] }}"><a class="" href="{!! url('/quotations/department'.$request_parameter) !!}">フォーム・オフセット・組版・コレーター・ネームライナー</a></li>
                                        <li class="gc2 {{ $active_css[3] }}"><a class="" href="{!! url('/quotations/binding'.$request_parameter) !!}">製本</a></li>
                                        <li class="gc2 {{ $active_css[4] }}"><a class="" href="{!! url('/quotations/cost'.$request_parameter) !!}">発送・費用・外注</a></li>
                                </ul>
                        </div>
                        </nav>
                    </div><!--ruqurl = {!! $ruqurl !!}-->
                </div>
                <!-- /offcanvas-left -->

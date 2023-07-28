<?php

$mc = !empty($_GET['s_m_code']) ? $_GET['s_m_code']: "";
$q_mc = "?s_m_code=".$mc;

$requesturi = $_SERVER['REQUEST_URI'];
$active_css = array();
$active_css[1] = "";
$active_css[2] = "";
$active_css[3] = "";
$active_css[4] = "";

switch ($requesturi) {
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
                   <div class="offcanvas-collapse-from-left side-base print-none">
                        <nav class="">
                        <div id="menu_li">
                            <!--<h3 class="side-head p-3 font-size-rg">見積システム</h3>  offcanvas_left-->
                                <ul>
                                        <li class="gc2 {{ $active_css[1] }}"><a class="" href="{!! url('/quotations'.$q_mc) !!}">基本項目</a></li>
                                        <li class="gc2 {{ $active_css[2] }}"><a class="" href="{!! url('/quotations/department'.$q_mc) !!}">フォーム・オフセット・組版・コレーター・ネームライナー</a></li>
                                        <li class="gc2 {{ $active_css[3] }}"><a class="" href="{!! url('/quotations/binding'.$q_mc) !!}">製本</a></li>
                                        <li class="gc2 {{ $active_css[4] }}"><a class="" href="{!! url('/quotations/cost'.$q_mc) !!}">発送・費用・外注</a></li>
                                </ul>
                        </div>
                        </nav>
                    </div>
                </div>
                <!-- /offcanvas-left -->

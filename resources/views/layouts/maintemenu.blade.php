<?php
$server_sn = $_SERVER['SCRIPT_NAME'];
$server_ru = $_SERVER['REQUEST_URI'];
$css_mainte1 = "";
$css_mainte2 = "";
if($server_ru == "/maintenance/backup") {
	$css_mainte1 = "mainte_active";
}
elseif($server_ru == "/maintenance") {
	$css_mainte2 = "mainte_active";
}

?>
<div id="cnt_menu">
	<div class="offcanvas-collapse-from-left side-base print-none">
		<nav class="">
			<div id="menu_li">
				<ul>
					<!--<li class="gc4b <?php echo $css_mainte1; ?>"><a class="" href="{{ url('/maintenance') }}">メンテナンスTOP</a></li>-->
					<li class="gc4b <?php echo $css_mainte2; ?>"><a class="" href="{{ url('/maintenance/backup') }}">インポート / エクスポート / バックアップ</a></li>
					<!--<li class="gc4b"><a class="" href="{{ url('/mainte') }}"><img class="iconsize_sm" src="{{ asset('images/round-add-circle-w.svg') }}" alt="">mainte</a></li>-->
				</ul>
			</div>
		</nav>
	</div>
</div>

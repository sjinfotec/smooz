<?php
$vbind_authusers = !empty($_GET["authusers"]) ? "v-bind:authusers=\"".$_GET["authusers"]."\"" : "";
// vue側で静的な場合はv-bind: は不要
$vbind_s_m_code = !empty($_GET["s_m_code"]) ? "s_m_code=\"".$_GET["s_m_code"]."\"" : "";

$html_view = <<<EOF
<quotations-binding
	{$vbind_authusers}
	{$vbind_s_m_code}
>
</qquotations-binding>

EOF;

//echo $html_view;
//echo $vbind_s_m_code;
?>
@extends('layouts.main')
@section('content')
<div id="home_cnt">
					<div id="app">
					@php
						echo $html_view;
					@endphp
					</div>
@endsection


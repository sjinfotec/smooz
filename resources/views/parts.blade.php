<?php
const BAR_TITLE = 'パーツ';
?>
@extends('layouts.subcontents')

@section('content')
<div id="home_cnt">
					<div id="app">
							<parts
								v-bind:pageNum="{{ $pagenum }}",
								v-bind:pageName="{{ $pagename }}"
							>
							</parts>
					</div>
@endsection

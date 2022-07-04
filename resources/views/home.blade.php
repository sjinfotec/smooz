@extends('layouts.main')

@section('content')
<div id="home_cnt">
					<!--
					<div class="">
						<h1>ホーム</h1>
					</div>
					-->
					<div>この部分は home.blade  ログインOKのときに表示されます</div>
					<!-- main contentns row -->
					<div id="app">
							<home-component
							>
							</home-component>
					</div>
					<!-- /main contentns row -->
@endsection

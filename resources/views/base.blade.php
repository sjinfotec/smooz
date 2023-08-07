@extends('layouts.main')

@section('content')
<div id="home_cnt">
					<!--
					<div class="">
						<h1>ホーム</h1>
					</div>
					-->
					<div>この部分は base.blade  ログインOKのときに表示されます</div>
					<!-- main contentns row -->
					<span>base!</span>
					<div id="app">
							<p>messege</p>
							<base-cnt
							>
							</base-cnt>
					</div>
					<span>base end</span>
					<!-- /main contentns row -->
@endsection

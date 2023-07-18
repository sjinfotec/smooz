@extends('layouts.maintenance')

@section('content')
<div id="home_cnt">
					<div id="app">
							<backup-logs
								v-bind:authusers="{{ $authusers }}"
							>
							</backup-logs>
					</div>
@endsection

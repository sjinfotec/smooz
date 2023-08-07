@extends('layouts.main')

@section('content')
<div id="home_cnt">
					<div id="app">
							<quotations-top
								v-bind:authusers="{{ $authusers }}"
							>
							</quotations-top>
					</div>
@endsection

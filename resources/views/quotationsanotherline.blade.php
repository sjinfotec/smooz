@extends('layouts.main')

@section('content')
<div id="home_cnt">
					<div id="app">
							<quotations-anotherline
								v-bind:authusers="{{ $authusers }}"
							>
							</quotations-anotherline>
					</div>
@endsection

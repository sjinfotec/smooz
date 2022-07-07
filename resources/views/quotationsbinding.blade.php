@extends('layouts.main')

@section('content')
<div id="home_cnt">
					<div id="app">
							<quotations-binding
								v-bind:authusers="{{ $authusers }}"
							>
							</quotations-binding>
					</div>
@endsection

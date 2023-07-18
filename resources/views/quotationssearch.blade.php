@extends('layouts.main')

@section('content')
<div id="home_cnt">
					<div id="app">
							<quotations-search
								v-bind:authusers="{{ $authusers }}"
							>
							</quotations-search>
					</div>
@endsection

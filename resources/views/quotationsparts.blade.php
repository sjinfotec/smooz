@extends('layouts.main')

@section('content')
<div id="home_cnt">
					<div id="app">
							<quotations-parts
								v-bind:authusers="{{ $authusers }}"
							>
							</quotations-parts>
					</div>
@endsection

@extends('layouts.main')

@section('content')
<div id="home_cnt">
					<div id="app">
							<quotations-cost
								v-bind:authusers="{{ $authusers }}"
							>
							</quotations-cost>
					</div>
@endsection

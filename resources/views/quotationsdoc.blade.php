@extends('layouts.main')

@section('content')
<div id="home_cnt">
					<div id="app">
							<quotations-doc
								v-bind:authusers="{{ $authusers }}"
							>
							</quotations-doc>
					</div>
@endsection

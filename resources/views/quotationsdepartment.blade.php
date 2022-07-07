@extends('layouts.main')

@section('content')
<div id="home_cnt">
					<div id="app">
							<quotations-department
								v-bind:authusers="{{ $authusers }}"
							>
							</quotations-department>
					</div>
@endsection

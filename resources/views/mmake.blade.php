@extends('layouts.main')

@section('content')
<div id="home_cnt">
					<div id="app">
							<m-make
								v-bind:authusers="{{ $authusers }}"
							>
							</m-make>
					</div>
@endsection

@extends('layouts.main')

@section('title')
	Students Handbook
@endsection

@section('content')
	<div class="global-header" style="background-image: url('{{ asset('img/intro-banner/1.jpg') }}');">
		<div class="global-header__block">
			<div class="va-block">
				<div class="va-middle text-center">
					<h1>Students Handbook</h1>
				</div>
			</div>
		</div>
	</div>
    <main id="main">
		<div class="container">
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora consequatur non atque, dolorem iste numquam assumenda inventore vitae quod. Nisi porro praesentium consequuntur ad provident minus, accusamus odit aspernatur error.</p>
		</div>
    </main>
@endsection
@extends('layouts.main')

@section('title')
	Vision Mission Values
@endsection

@section('content')
	<div class="global-header" style="background-image: url('{{ asset('img/intro-banner/1.jpg') }}');">
		<div class="global-header__block">
			<div class="va-block">
				<div class="va-middle text-center">
					<h1>Vision - Mission - Values</h1>
				</div>
			</div>
		</div>
	</div>
    <main id="main">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<h2>Vision</h2>
					<p>Top Performing College in Arts, Science, and technology with God-fearing human resource responsive to the needs of the community.</p>

					<h2>Mission</h2>
					<p>TPC is committed to deliver quality higher education in arts, science, and technology; undertake research and extension services for sustainable community development.</p>

					<h2>Values</h2>		
					<p> Committed, Honest, United, Responsive, Competent, Humane </p>	
					<br>
					<br>
				</div>
				<div class="col-md-4">
                    @include('pages.about.partials.sidebar')
				</div>
			</div>
		</div>
    </main>
@endsection
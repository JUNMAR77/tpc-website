@extends('layouts.main')

@section('title')
	Hymn
@endsection

@section('content')
	<div class="global-header" style="background-image: url('{{ asset('img/intro-banner/1.jpg') }}');">
		<div class="global-header__block">
			<div class="va-block">
				<div class="va-middle text-center">
					<h1>Hymn</h1>
				</div>
			</div>
		</div>
	</div>
    <main id="main">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<div class="text-center">
						<div>TPC HYMN </div>
						<div>Lyrics & tune by: Mr. Jermando Lilimar D. Rodriguez</div>
					</div>
					<div class="text-left">
						<div> <!-- this is grid div, so no other classes here -->
							<div>I.</div>
					    	<div>Our dream has now come true</div>
							<div>A school for us and our successors</div>
							<div>We will earn our ambitions</div>
							<div>For God’s Glory in Talibon</div>
						</div>
					</div>
					<div class="text-left">
						<div class="col-md-8"> <!-- this is grid div, so no other classes here -->
					    	<div>Chorus:</div>
							<div>Forward Talibon Polytechnic College</div>
							<div>March on Talibon Polytechnic College</div>
							<div>T’wards development for our nation</div>
						</div>
						<div>
							<div>II.</div>
							<div>Our dear Alma Mater</div>
							<div>An academy for me and you</div>
							<div>Instrument for unity</div>
							<div>Building faith in the Almighty</div>
						</div>
						<div class="col-md-8"> <!-- this is grid div, so no other classes here -->
					    	<div>Chorus:</div>
							<div>Forward Talibon Polytechnic College</div>
							<div>March on Talibon Polytechnic College</div>
							<div>T’wards development for our nation</div>
						</div>
					<div class="text-left">
						<div>Bridge:</div>
						<div>Let’s continue our journey</div>
						<div>Driven by our visions</div>
						<div>Climb every mountain</div>
						<div>Swim every sea</div>
					</div>
						<div class="col-md-8"> <!-- this is grid div, so no other classes here -->
					    	<div>Chorus:</div>
							<div>Forward Talibon Polytechnic College</div>
							<div>March on Talibon Polytechnic College</div>
							<div>T’wards development for our nation</div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
                    @include('pages.about.partials.sidebar')
				</div>
			</div>
		</div>
    </main>
@endsection
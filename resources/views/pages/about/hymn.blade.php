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
						<p>
							audem latine persequeris id sed, 
							ex fabulas delectus quo. 
							No vel partiendo abhorreant vituperatoribus, 
							ad pro quaestio laboramus. 
							Ei ubique vivendum pro. 
							At ius nisl accusam lorenta zanos 
							paradigno tridexa panatarel
						</p>
					</div>
				</div>
				<div class="col-md-4">
                    @include('pages.about.partials.sidebar')
				</div>
			</div>
		</div>
    </main>
@endsection
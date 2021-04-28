@extends('layouts.main')

@section('title')
	History
@endsection

@section('content')
	<div class="global-header" style="background-image: url('{{ asset('img/intro-banner/1.jpg') }}');">
		<div class="global-header__block">
			<div class="va-block">
				<div class="va-middle text-center">
					<h1>History</h1>
				</div>
			</div>
		</div>
	</div>
    <main id="main">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<p>TALIBON POLYTECHNIC COLLEGE (TPC) was created through the efforts and support of many people, who saw the need of a local college for deserving youth of Talibon. But it all started with a trinity. A convergence of three entities. Municipal Mayor Restituto Auxtero and Hon Councilor Janette Garcia, dubbed "The Man and Woman of Vision", together with "The Couple with a Mission", Dr. Lolita D. Rodriguez and her husband, Dr. Mario E. Rodriguez, and the "Men with Action", Engr. Lorenzo FLores, the Municipal Engineer, and Mr. Angelito Oroyan.</p>
					<p>They moved heaven and earth to make Talibon Polytechnic College a reality. TPC was established by Municipal Ordinance No. 2017-17. This was signed by Hon. Mayor Restituto B. Auxtero on July 17, 2017. This was sponsored by Hon. Councilor Janette A. Garcia and signed by Hon. Vice Mayor Cleto R. Garcia, SB CHairman.</p>
					<p>On July 21, 2017, Mayor Auxtero, Councilor Janette A. Garcia with Treaurer Rosalina G. Felisilda and consultants Dr. Mario E. Rodriguez and Dr. Lolita D. Rodriguez went to CHED Region VII, Cebu, to give the Letter of Intent to Dr. Freddie T. Bernal. Councilor Janette Garcia, Dr. Mario Rodriguez and Dr. Lolita Rodriguez conducted a survey at different Senior High Schools in Talibon. <p>On September 20, 2017, all TPC documents were submitted to CHED Region VII, Cebu, by Dr. Mario Rodriguez and Dr. Lolita Rodriguez.</p>
					<p>On October 10, 2017, Dr. Freddie T. Bernal, Dr. Peth Fudolig and Dr. Carlyn dela Pena visited TPC for ocular inspection. Director Bernal gave the signal to continue complying the requirements of CHED. </p><p>On January 9, 2018, TPC received a communication not to include BS Agricultural Education since there is no guidelines from CHED on this program and advised to open on AY 2018-2019. A letter of Reconsideration was forwarded to CHED to consider the opening of TPC on June 4, 2018 since everything is ready to offer courses on BA Political Science (instead of BSA Educ), BA English Language, BS Accounting Information SYstem, BS INformation SYstems and BS Agriculture and resubmitted all documents on February 26, 2018. </p>
					<p> CHED came on April 26, 2018 to speak on the establishment of Higher Education Institutions during the three-day Strategic Planning on APril 25-27. There were foru (4) of them who were all CHED SUpervisor SPecialist: Dr. Peth Fudolig, Dr. Carlyn dela Pena, Dr. Sotera Cagang, and Dr. Michael B. Mallari.</p>
					<p> On May 10-11, 2018, Dr. Virginia dela Pena, with five (5) other Regional Quality Assurance Team (RQAT) members inspected TPC's Programs. All with positive and inspiring comments. On May 24-25, 2018 another four(4) RQAT members came and inspected the BA Political Science and BA English Language with very inspiring verbal comments.</p>
					<p> Finally, TPC started its classes on June 4, 2018.</p>
				</div>
				<div class="col-md-4">
                    @include('pages.about.partials.sidebar')
				</div>
			</div>
		</div>
    </main>
@endsection
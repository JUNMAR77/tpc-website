<div class="list-group list-group-sidebar">
	<a class="list-group-item text-muted {{ Request::is('school-profile') ? 'selected' : '' }}" href="{{ route('school_profile') }}">School Profile</a>
	<a class="list-group-item text-muted {{ Request::is('vision-mission') ? 'selected' : '' }}" href="{{ route('vision_mission') }}">Vision  Mission Values</a>
	<a class="list-group-item text-muted {{ Request::is('history') ? 'selected' : '' }}" href="{{ route('history') }}">History</a>
	<a class="list-group-item text-muted {{ Request::is('hymn') ? 'selected' : '' }}" href="{{ route('hymn') }}">Hymn</a>
	<a class="list-group-item text-muted {{ Request::is('award-and-recognition') ? 'selected' : '' }}" href="{{ route('award_recognition') }}">Awards & Recognition</a>
	<a class="list-group-item text-muted {{ Request::is('administration-and-offices') ? 'selected' : '' }}" href="{{ route('administration_offices') }}">Administration & Offices</a>
</div>
@extends('layout.master')

@section('body')

  <main class="container-fluid">
    <h1>Persiapan Ujian</h1>
    <hr>

    <h2>Teknis Soal</h2>
    <ul>
      <li>Ada 10000 soal</li>
      <li>Durasi 5 menit</li>
    </ul>

    <h2>Tata tertib</h2>
    <ul>
      <li>Blabalbla</li>
      <li>Segala peraturan mengenai persiapan ujian</li>
    </ul>

    @if ( App::environment() == 'local' )
      {{ link_to_route('participant.dashboard', 'DEVELOP : back to dashboard', null, ['class' => 'btn btn-dasar']) }}
    @endif
	<br/>
    <a href="{{ route('participant.exam.start') }}" class="btn btn-dasar btn-important btn-lg"><strong>MULAI UJIAN</strong></a>

	<hr/>
    <div class="paper-footer col-sm-12">
      <small>(c) Technocorner</small>
    </div>
  </main>

@stop

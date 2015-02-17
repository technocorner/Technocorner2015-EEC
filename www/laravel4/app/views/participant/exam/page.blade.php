@extends('layout.master')

@section('body')

  <main class="container-fluid">
    <h1>BABAK PENYISIHAN EEC 2015</h1>

    @if (App::environment() == 'local')
      <h3>DEVELOP MODE ONLY</h3>
      <h3>Todo:</h3>
      <ul>
        <li>Nomor soal masih pake inline style agar rata kanan</li>
        <li>Perbaiki radio button, sekarang kalau tulisannya panjaang nanti jadi gak rata sama radionya</li>
      </ul>
      <hr>
    @endif

    {{ Form::open() }}

      <?php $no = 1 ?>
      {{-- Get all the question and chunk it in group of 5 #explaining what code already does, what a bad comment --}}
      {{-- So we can make <hr> separator every 5 question --}}
      @foreach (array_chunk($questions->all(), 5) as $question_group)
        @foreach ($question_group as $q)
          <div class="row">
            <div class="col-sm-1" style="text-align:right"> {{-- BEWARE: inline styles --}}
              <label>{{ $no++ }}.</label>
            </div>

            <div class="col-sm-11">
              <p>
                {{ $q->question }}
              </p>

              <div class="question-image">
                <img src="{{ $q->image }}" alt="Pertanyaan untuk soal {{ $q->id }}">
              </div>

              <div class="radio">
                <label>
                  {{ Form::radio( $q->id . '-ch', 'A', Input::old( $q->id . '-ch') ) }}
                  <strong>A.</strong> {{ $q->chA }}
                </label>
              </div>

              <div class="radio">
                <label>
                  {{ Form::radio( $q->id . '-ch', 'B', Input::old( $q->id . '-ch') ) }}
                  <strong>B.</strong> {{ $q->chB }}
                </label>
              </div>

              <div class="radio">
                <label>
                  {{ Form::radio( $q->id . '-ch', 'C', Input::old( $q->id . '-ch') ) }}
                  <strong>C.</strong> {{ $q->chC }}
                </label>
              </div>

              <div class="radio">
                <label>
                  {{ Form::radio( $q->id . '-ch', 'D', Input::old( $q->id . '-ch') ) }}
                  <strong>D.</strong> {{ $q->chD }}
                </label>
              </div>

              <div class="radio">
                <label>
                  {{ Form::radio( $q->id . '-ch', 'E', Input::old( $q->id . '-ch') ) }}
                  <strong>E.</strong> {{ $q->chE }}
                </label>
              </div>
            </div>
          </div>

        @endforeach
        <hr>
      @endforeach

      {{ Form::submit('Selesai', ['class' => 'col-sm-offset-1 btn btn-success'])}}

    {{ Form::close() }}

  </main>

@stop
@extends('layout.master')

@section('head')
  <script>
  // Create answer selector
  </script>
@stop

@section('body')
  <main class="container-fluid">
    <h1>Buat Soal Baru</h1>
    {{ Form::open(['route' => 'admin.question.store', 'class' => 'form-horizontal', 'files' => true]) }}
    <fieldset>
      <div class="form-group">
        {{ Form::label('question', 'Pertanyaan', ['class' => 'control-label col-sm-2']) }}
        <div class="col-sm-10">
          @yield('field_question', Form::textarea('question', Input::old('question'), ['class' => 'form-control', 'rows' => 5, 'required' => true]))
        </div>
      </div>

      <div class="form-group">
        {{ Form::label('image', 'Gambar', ['class' => 'control-label col-sm-2']) }}
        <div class="col-sm-10">
          @yield('field_img', Form::file('image', Input::old('image'), ['class' => 'form-control', 'required' => true]))
        </div>
      </div>

      <div class="form-group">
        {{ Form::label('chA', 'Pilihan A', ['class' => 'control-label col-sm-2']) }}
        <div class="col-sm-10">
          @yield('field_chA', Form::textarea('chA', Input::old('chA'), ['class' => 'form-control', 'rows' => 1, 'required' => true]))
        </div>
      </div>

      <div class="form-group">
        {{ Form::label('chB', 'Pilihan B', ['class' => 'control-label col-sm-2']) }}
        <div class="col-sm-10">
          @yield('field_chB', Form::textarea('chB', Input::old('chB'), ['class' => 'form-control', 'rows' => 1, 'required' => true]))
        </div>
      </div>

      <div class="form-group">
        {{ Form::label('chC', 'Pilihan C', ['class' => 'control-label col-sm-2']) }}
        <div class="col-sm-10">
          @yield('field_chC', Form::textarea('chC', Input::old('chC'), ['class' => 'form-control', 'rows' => 1, 'required' => true]))
        </div>
      </div>

      <div class="form-group">
        {{ Form::label('chD', 'Pilihan D', ['class' => 'control-label col-sm-2']) }}
        <div class="col-sm-10">
          @yield('field_chD', Form::textarea('chD', Input::old('chD'), ['class' => 'form-control', 'rows' => 1, 'required' => true]))
        </div>
      </div>

      <div class="form-group">
        {{ Form::label('chE', 'Pilihan E', ['class' => 'control-label col-sm-2']) }}
        <div class="col-sm-10">
          @yield('field_chE', Form::textarea('chE', Input::old('chE'), ['class' => 'form-control', 'rows' => 1, 'required' => true]))
        </div>
      </div>

      <div class="form-group">
        {{ Form::label('answer', 'Kunci Jawaban', ['class' => 'control-label col-sm-2'])}}
        <div class="col-sm-10">
          <div class="radio">
            <label>
              @yield('field_answerA', Form::radio('answer', 'A'))
              A
            </label>
          </div>
          <div class="radio">
            <label>
              @yield('field_answerB', Form::radio('answer', 'B'))
              B
            </label>
          </div>
          <div class="radio">
            <label>
              @yield('field_answerC', Form::radio('answer', 'C'))
              C
            </label>
          </div>
          <div class="radio">
            <label>
              @yield('field_answerD', Form::radio('answer', 'D'))
              D
            </label>
          </div>
          <div class="radio">
            <label>
              @yield('field_answerE', Form::radio('answer', 'E'))
              E
            </label>
          </div>
        </div>
      </div>

      {{ link_to_route('admin.dashboard', 'Kembali', null, ['class' => 'btn-dasar col-sm-offset-2']) }}
      {{ Form::submit('Simpan', ['class' => 'btn-dasar btn-primary']) }}

    </fieldset>
    {{ Form::close() }}
  </main>
@stop

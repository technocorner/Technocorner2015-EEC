<?php

class ExamController extends BaseController {

  public function showPreparation() {

    $p = Auth::user()->userable;

    if (!isset($p->exam)) {
      $e = new Exam;
      $e->session = 0;
      Auth::user()->userable->exam()->save($e);
    }
    else {
      $e = $p->exam;
    }

    return View::make('participant.exam.preparation')
      ->withExam($e);
  }

  public function startExam()
  {
    $e = Auth::user()->userable->exam;

    $e->session = 1;

    // Carbon DateTime extension
    // github.com/briannesbitt/Carbon
    $e->start_time = Carbon::now();
    $e->end_time = (Carbon::now()->addSeconds(7200));
    $e->save();

    return Redirect::route('participant.exam.page');
  }

  // DEVELOPER MODE : destroy user related Exam instance
  //
  public function destroy()
  {
    if (count(Auth::user()->userable->exam)) {
      Auth::user()->userable->exam->delete();
    }

    return Redirect::route('participant.dashboard');
  }

  public function exam()
  {
    // Get the current exam type subject from url (GET input)
    // If not present, default to the first subject in Qtype
    // In case of this EEC exam, the order is: Matematika, Fisika, Computer.

    // For better optimization, just hardcode the Matematika
    $questionSubject = Input::get('mapel', 'matematika');
    $subjectId = QType::where('name', '=', $questionSubject)->first()->id;

    // Get ALL the question in requested subject
    $q = Question::where('qtype_id', '=', $subjectId)->get();

    // Get all the QType for pagination
    $subjectList = QType::all()->lists('name');

    return View::make('participant.exam.page')
      ->withQuestions($q)
      ->withSubjectList($subjectList);
  }

  public function confirmFinish()
  {

  }

  public function submit ()
  {
    return Response::json([
      'status' => 'success'
    ]);
  }

}
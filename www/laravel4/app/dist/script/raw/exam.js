$(document).ready(function() {
    function submitAnswer() {
        // JSON syntax
        // "answer":[
        //     {"id":"1", "answer":"A"},
        //     {"id":"2", "answer":"C"},
        //     {"id":"42",`"answer":"B"}
        // ]

        var $answer = [];
        var $exam_id = $('#exam_id').val();

        $('.question').each(function() {
            var question_answer = {};
            var id = this.id;
            question_answer['id'] = id;
            question_answer['answer'] = $(this).find('[name='+id+'-ch]:checked').val();

            // Just insert the data of question that have answer
            // to lighten the load of server>
            if(question_answer['answer']) {
                $answer.push(question_answer);
            }
        });


        $.ajax({
            type: 'POST',
            url : '/user/exam/submit',
            data: {
                answers: $answer,
                exam_id: $exam_id,
            },
            success: function() {
                alert('sukses');
            },
            error: function() {
                alert('Gagal menyimpan jawaban, harap ulangi klik tombol. Jika hal ini terus terjadi segera hubungi Admin.');
            }
        });
    }

    $('#submit-answer').on('click', function(e) {
        e.preventDefault();
        submitAnswer();
    });
})
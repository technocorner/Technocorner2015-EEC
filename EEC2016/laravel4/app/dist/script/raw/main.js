$(document).ready(function(){
    $('.need-confirmation').on('click', function () {
        return confirm('Apakah kamu yakin?');
    });
})
$(function () {
    $(".radio").click(function () {
        $("#submit").prop("disabled",false);
    });
    $("#reset").click(function () {
        $("#submit").prop("disabled",true);
    })
})
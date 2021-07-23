function openAnswerModal (questionID, questionTextHtmlId) {
    $("#newAnswerModal #question").text($('#' + questionTextHtmlId).text())
    $("#newAnswerModal #questionId").val(questionID)
    new bootstrap.Modal(document.getElementById('newAnswerModal')).show();
}
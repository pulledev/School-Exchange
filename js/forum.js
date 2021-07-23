function openAnswerModal (questionID, questionText) {
    $("#newAnswerModal #question").text(questionText)
    $("#newAnswerModal #questionId").val(questionID)
    new bootstrap.Modal(document.getElementById('newAnswerModal')).show();
}
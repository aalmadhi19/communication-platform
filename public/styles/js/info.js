$(document).ready(function () {
    $("#infoModal").on("show.bs.modal", function (e) {
        var email = $(e.relatedTarget).data('target-email');
        var id = $(e.relatedTarget).data('target-conversation_id');
        $.get("/facultymember/studentInfo/" + email + "/" + id, function (data) {
            console.log(data);
            $("#name").html(data.student.name);
            $("#muID").html(data.student.student_id);
            $("#course").html(data.course.name);
            $("#section").html(data.section.code);
        });

    });
});
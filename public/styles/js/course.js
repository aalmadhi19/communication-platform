
var token = document.head.querySelector('meta[name="csrf-token"]');
window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;


$('#course').on('change', function () {

    selectedID = $(this).find(":selected").val();
    $('#section').empty();
    $('#section').append($('<option>', {
        value: '',
        text: 'يرجى الاختيار'
    }));
    axios.get('course/sections/' + selectedID)
        .then(function (response) {
            Object.keys(response.data).forEach(function (key) {
                $('#section').append($('<option>', {
                    value: response.data[key].id,
                    text: response.data[key].code
                }));
            });
        });
});

$('#section').on('change', function () {

    selectedID = $(this).find(":selected").val();
    $('#student').empty();
    $('#student').append($('<option>', {
        value: '',
        text: 'يرجى الاختيار'
    }));
    axios.get('section/students/' + selectedID)
        .then(function (response) {
            // console.log(response.data.students);
            Object.keys(response.data).forEach(function (key) {
                $('#student').append($('<option>', {
                    value: response.data[key].student.email,
                    text: response.data[key].student.name
                }));
            });
        });
});


function loadMore(page) {
    $.ajax({
        url: '?page=' + page,
        type: 'get',
        beforeSend: function () {
            $(".ajax-load").show();
        }
    })
        .done(function (data) {
            if (data.html == "") {
                $('.ajax-load').hide();
                return;
            }
            $('#post-data').append(data.html);
        })
        .fail(function (jqXHR, ajaxOptions, thrownError) {
            alert('حدث خطاء');
        })
}
var page = 1;
$("#loadMore").click(function () {
    $('html, body').animate({
        scrollTop: $('.ajax-load').offset().top
    }, 'slow');
    page++
    loadMore(page)
});
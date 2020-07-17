jQuery(document).ready(function($) {
    $(".accordion-item__line").click(function () {
        var container = $(this).parents(".accordion-list__item");
        var answer = container.find(".accordion-item");
        answer.toggleClass("accordion-item--opened");
    });


    $('#send').on('click', function (e) {
        e.preventDefault();
        var email = $('#egiftEmails').val(),
            url = $('#egiftEmails').data('url'),
            orderId = $('#orderId').val();
        $.ajax({
            url:url,
            data:{email: email, orderId: orderId, action: 'emailAjaxRequest'}, // form data
            type:'POST', // POST
            beforeSend:function(xhr){
                $('#loader').html('Sending...');
            },
            error:function (e) {
                $('#loader').html('sent');
            },
            success:function(data){
                console.log(data);
                $('#loader').html('something went wrong!');
            }
        });
    })
})

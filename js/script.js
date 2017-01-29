jQuery(document).ready(function($) {

     $('.datepicker').datepicker({
         dateFormat: 'yy-mm-dd'
     });

    $('.timepicker').timepicker({
        timeFormat: 'h:mm p',
        interval: 60,
        minTime: '10',
        maxTime: '6:00pm',
        defaultTime: '11',
        startTime: '10:00',
        dynamic: false,
        dropdown: true,
        scrollbar: true
    });

    $(".fancybox").fancybox({
        'width':700,
        'height':300,
        'autoSize' : false
    });

    $(".various").fancybox({
        maxWidth	: 800,
        maxHeight	: 600,
        fitToView	: false,
        width		: '70%',
        height		: '70%',
        autoSize	: false,
        closeClick	: false,
        openEffect	: 'none',
        closeEffect	: 'none'
    });
});

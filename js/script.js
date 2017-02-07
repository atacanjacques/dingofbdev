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

    $(".fancybox")
        .attr('rel', 'gallery')
        .fancybox({
            beforeLoad: function () {
                if (this.title) {
                    console.log('Prout');
                    var caption = this.element.attr('data-caption');
                    this.tpl.wrap = '<div class="fancybox-wrap" tabIndex="-1"><div class="fancybox-skin"><div class="fancybox-outer"><div class="fancybox-inner"></div><p>'+caption+'</p></div></div></div>'
                    // New line
                    this.title += '<br />';

                    this.title += '<a href="">Signaler Photo</a>'

                    // Add FaceBook like button
                    this.title += '<iframe src="//www.facebook.com/plugins/like.php?href=' + this.href + '&amp;layout=button_count&amp;show_faces=true&amp;width=500&amp;action=like&amp;font&amp;colorscheme=light&amp;height=23" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:110px; height:23px;" allowTransparency="true"></iframe>';


                }
            },
            helpers: {
                title: {
                    type: 'inside',
                    position: 'bottom'
                }, //<-- add a comma to separate the following option
                buttons: {} //<-- add this for buttons
            },
            closeBtn: false, // you will use the buttons now
            arrows: false
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

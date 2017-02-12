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
                    $(".fancybox-image").css({
                        "width": 800,
                        "height": 600
                    });
                    var caption = this.element.attr('data-caption');
                    this.tpl.wrap = '<div class="fancybox-wrap" tabIndex="-1"><div class="fancybox-skin"><div class="fancybox-outer"><p class="caption">'+caption+'</p><div class="fancybox-inner"></div></div></div></div>'
                    // New line
                  //  this.title += '<br />';

                    // Add FaceBook like button
                    this.title += '<button type="button" class="btn btn-success btn-sm voter" ><span class="glyphicon glyphicon-star voter" aria-hidden="true"></span> Voter</button><p class="text_Voter">: 100</p>';

                    this.title += '<button type="button" class="btn btn-primary btn-sm partager"><span class="glyphicon glyphicon glyphicon-share-alt partager" aria-hidden="true"></span> Partager</button>'

                    this.title += '<button type="button" class="btn btn-danger btn-sm signaler" onclick=""><span class="glyphicon glyphicon-alert" aria-hidden="true"></span>Signaler</button>'

                    this.width = 800;
                    this.height = 600;

                }
            },

            fitToView: false,
            beforeShow: function () {
                // apply new size to img
                $(".fancybox-image").css({
                    "width": 800,
                    "height": 600
                });
                // set new values for parent container
                this.width = 800;
                this.height = 600;
            },

            helpers: {
                title: {
                    type: 'inside',
                    position: 'bottom'
                },

                caption: {
                    type:'inside',
                    position: 'top'
                },//<-- add a comma to separate the following option
                buttons: {} //<-- add this for buttons
            },
            autoSize : false,
            closeBtn: true, // you will use the buttons now
            arrows: false,

        });

        $(".various").fancybox({
            maxWidth    : 800,
            maxHeight   : 600,
            fitToView   : false,
            width       : '70%',
            height      : '70%',
            autoSize    : false,
            closeClick  : false,
            openEffect  : 'none',
            closeEffect : 'none'
        });
    });





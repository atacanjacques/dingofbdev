jQuery(document).ready(function($) {

     $('.datepicker').datepicker({
         dateFormat: 'yy-mm-dd'
     });

    $('.timepicker').timepicker({
        timeFormat: 'HH:mm',
        interval: 30,
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
                    var nbvote = this.element.attr('data-nbvote');
                    var vote_url = this.element.attr('data-vote');
                    var vote_action = this.element.attr('data-action') == 'add_vote' ? 'success' : 'warning';
                    var vote_action_name = this.element.attr('data-action') == 'add_vote' ? 'Voter' : 'Enlever';
                    var share_url = this.element.attr('data-share');
                    var signalement_url = this.element.attr('data-signalement');
                    var id_participant = this.element.attr('data-id');
                    this.tpl.wrap = '<div class="fancybox-wrap" tabIndex="-1"><div class="fancybox-skin"><div class="fancybox-outer"><p class="caption">'+caption+'</p><div class="fancybox-inner"></div></div></div></div>'

                    // Add FaceBook like button
                    this.title += '<button type="button" class="btn btn-' + vote_action + ' btn-sm voter" onclick="location.href=\'' + vote_url + '\'"><span class="glyphicon glyphicon-star voter" aria-hidden="true"></span>' + vote_action_name + '</button><p class="text_Voter"> : ' + nbvote + '</p>';

                    this.title += '<button type="button" class="btn btn-primary btn-sm partager share-' + id_participant + '"><span class="glyphicon glyphicon glyphicon-share-alt partager" aria-hidden="true"></span> Partager</button>'

                    this.title += '<button type="button" class="btn btn-danger btn-sm signaler" onclick="location.href=\'' + signalement_url + '\'"><span class="glyphicon glyphicon-alert" aria-hidden="true"></span>Signaler</button>'

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



    function alertConfirm()
    {
        resultat=window.confirm('Êtes vous sur de vouloir effectuer cette action ?');
        if (resultat==1)
        {
        }
        else
        {
            return false;
        }
    } 



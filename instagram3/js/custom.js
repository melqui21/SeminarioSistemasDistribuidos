$(document).ready(function() {


    var userFeed = new Instafeed({
        get: 'user',
        userId: '7047181611',
        limit: 12,
        resolution: 'standard_resolution',
        accessToken: '7047181611.3d8dcf3.aa6b4765402b40228f42d56f3b21ef67',
        sortBy: 'most-recent',
        template: '<div class="col-lg-3 instaimg"><a href="{{image}}" title="{{caption}}" target="_blank"><img src="{{image}}" alt="{{caption}}" class="img-fluid"/></a></div>',
    });


    userFeed.run();

    
    // This will create a single gallery from all elements that have class "gallery-item"
    $('.gallery').magnificPopup({
        type: 'image',
        delegate: 'a',
        gallery: {
            enabled: true
        }
    });


});
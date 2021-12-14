
    (function(){
    $('.form-disabled-button').on('submit', function() {
            $('.enabled-btn').hide();
            $('.disabled-btn').show();
            setTimeout(function() {
                $('.enabled-btn').show();
                $('.disabled-btn').hide();
        }, 5000);
        })
    })();

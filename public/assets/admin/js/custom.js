$(document).ready(function() {
    $('a.exp').on('click', function(e) {
        e.preventDefault();
        let parent = $(this).parent('.categories_li');

        if (parent.hasClass('active')) {
            parent.removeClass('active')
            parent.child('ul.sub').slideDown( "slow" )
        } else {
            parent.addClass('active')
        }
    })
})

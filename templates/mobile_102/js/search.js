var height= $(window).height();
$('#search').click(function(){
    $('#dialog').removeClass('hidden');
    $('#dialog').height(height);
    });
$('#close').click(function(){
    $('#dialog').addClass('hidden');
    });

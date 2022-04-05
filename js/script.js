
// event pada saat link di klik
$('.page-scroll').on('click', function(e){

    // ambil isi href
    var tujuan = $(this).attr('href');

    // tangkap element
    var elementTujuan = $(tujuan);
    
    $('html, body').animate({
        scrollTop: elementTujuan.offset().top -45
    }, 1000, 'easeInOutExpo');

    e.preventDefault();

});


<script>
    $('#lang p#ru').on('click', function() {
        $(this).removeClass('bg-primary text-white').addClass('bg-light text-black')
		  $('#lang p#kk').removeClass('bg-light text-black').addClass('bg-primary text-white');
		  $('#lang p#en').removeClass('bg-light text-black').addClass('bg-primary text-white');
        $('#lang-blocks #kk-block').fadeOut(100);
        $('#lang-blocks #en-block').fadeOut(100);
        $('#lang-blocks #ru-block').fadeIn(100);
    });
    $('#lang p#kk').on('click', function() {
        $(this).removeClass('bg-primary text-white').addClass('bg-light text-black')
		  $('#lang p#ru').removeClass('bg-light text-black').addClass('bg-primary text-white');
		  $('#lang p#en').removeClass('bg-light text-black').addClass('bg-primary text-white');
        $('#lang-blocks #ru-block').fadeOut(100);
        $('#lang-blocks #en-block').fadeOut(100);
        $('#lang-blocks #kk-block').fadeIn(100);
    });
    $('#lang p#en').on('click', function() {
        $(this).removeClass('bg-primary text-white').addClass('bg-light text-black')
		  $('#lang p#kk').removeClass('bg-light text-black').addClass('bg-primary text-white');
		  $('#lang p#ru').removeClass('bg-light text-black').addClass('bg-primary text-white');
        $('#lang-blocks #ru-block').fadeOut(100);
        $('#lang-blocks #kk-block').fadeOut(100);
        $('#lang-blocks #en-block').fadeIn(100);
    });
</script>

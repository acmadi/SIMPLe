jQuery(function () {
    $('.chart').visualize({
        type:'bar'
    });

    $('.close').live('click', function () {
        $(this).parent().fadeOut('fast');
    })

    $(".chzn-select").chosen({
        no_results_text: 'Data tidak ditemukan'
    });

})
function cancel(popup) {
    popup.cancel();
}

function notify(title, message) {
    var popup;
    if (window.webkitNotifications.checkPermission() > 0) {
        window.webkitNotifications.requestPermission(function () {
            popup = window.webkitNotifications.createNotification('', title, message);
        });
    } else {
        popup = window.webkitNotifications.createNotification('', title, message);
    }
    popup.show();
    setTimeout(function () {
        popup.cancel();
    }, 10000)
}


jQuery(function () {
    $('.chart').visualize({
        type:'bar'
    });

    $('.close').live('click', function () {
        $(this).parent().fadeOut('fast');
    })

    $(".chzn-select").chosen({
        no_results_text:'Data tidak ditemukan'
    });

    $('.table').dataTable({
        sPaginationType:'full_numbers',
        iDisplayLength: 25,
        "oLanguage":{
            sSearch: 'Pencarian',
            sLengthMenu:'Memperlihatkan _MENU_ data per halaman',
            sZeroRecords:'Data tidak ditemukan',
            sInfo:'Memperlihatkan _START_ hingga _END_ dari _TOTAL_ data',
            sInfoEmpty:'Memperlihatkan 0 hingga 0 dari 0 data',
            sInfoFiltered:'(Menyaring dari _MAX_ jumlah data)',
            oPaginate:{
                sFirst:'Awal',
                sLast:'Akhir',
                sNext:'Berikutnya',
                sPrevious:'Akhir'
            },
        }
    });
})

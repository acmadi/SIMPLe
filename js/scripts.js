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
})

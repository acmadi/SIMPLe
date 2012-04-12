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
    
    // Digunakan untuk hide select option form_revisi_anggaran
    // http://stackoverflow.com/questions/2031740/hide-select-option-in-ie-using-jquery
    $.fn.hideOption = function() {
        this.each(function() {
            $(this).wrap('<span>').hide()
        });

    }
    $.fn.showOption = function() {
        this.each(function() {
            var opt = $(this).find('option').show();
            $(this).replaceWith(opt)
        });
    }
    $('#filter_btn').on('click', function(){
    
        $('#kode_satker select > span').showOption();
        
        $('#kode_satker select > option').each(function(index){
            
            var option = $(this);
            var textlist = $(this).text();
            var filtering_text = $('#filtering_text').val();

            var string = filtering_text.split(' ');
            var newstring = '';

            for (i = 0; i < string.length; i++) {
                newstring += string[i];
                if (i != string.length - 1)
                    newstring += '|';
            }

            filtering_text = newstring;
                
            regex = new RegExp(filtering_text, 'gi');
            
            var is_match = textlist.match(regex);
            
            console.log(regex);
            
            if (is_match == null || is_match == undefined) {
                option.hideOption();
            }
            
        });
        
        $('#filtering > option').tsort() // jquery.tinysort.min.js

    })
})

// data table js start

// data table js end
$(document).ready(function() {
    $(".menu-button").click(function() {
        $(this).toggleClass("open");
        $("body").toggleClass("open");
        jQuery('.sub-menus').slideUp();
    });
    $(" .mob-open").click(function() {
        $("body").addClass("open");
    });
    jQuery(".overlay-close").click(function() {
        jQuery(".menu-button, body").removeClass("open");
        jQuery('.sub-menus').slideUp();
    });

    // 
    var nav = $('.side-menu > li, .cus-menu > li, .user-drop-sec li');
    nav.find('ul').hide();
    nav.click(function() {
        nav.not(this).find('ul').hide();
        $(this).find('ul').slideToggle();
        $('.side-menu > li, .cus-menu > li, .user-drop-sec li').removeClass('active');
        $(this).addClass('active');
        var a = new Date().getFullYear();
        var b = a - 1;
        var c = b + "-" + a;
        console.log(c);
    });
});

$(document).ready(function() {
    var table = $('.producttable').DataTable({
        //disable sorting on last column
        //   "scrollY": 500,
        "scrollX": true,
        "columnDefs": [
            { width: 0, "targets": 0 }
        ],
        "lengthMenu": [
            [10, 50, 100, -1],
            [10, 50, 100, "All"]
        ],
        dom: 'lBfrtip',
       
        buttons: [
            'csv'
        ],
        "bInfo": false,
        "scrollX": true,
      
        "oLanguage": {
            "sEmptyTable": "No data available in table",
            "sSearch": "",
            "sPlaceholder": "Search Here",
            "sZeroRecords": "No matching records found",
        }, 
        "info": true,   
    });
   
});


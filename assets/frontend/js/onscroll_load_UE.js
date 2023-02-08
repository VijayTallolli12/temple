$(document).ready(function() {

    var limit = 6;
    var start = 0;
    var action = 'inactive';

    function load_country_data(limit, start) {
        $.ajax({
            url: base_url + "events/event_onscroll_load_UE",
            method: "POST",
            data: { limit: limit, start: start },
            cache: false,
            success: function(res) {
                res = $.parseJSON(res);
                $('#load_data').append(res.data);
                if (res.message == 'empty') {
                    $('#load_data_message').html("<button type='button' id='no_data_found' class='btn btn-info'>No Data Found</button>");
                    action = 'active';
                    setTimeout(function() {
                        document.getElementById('no_data_found').style.display = "none";
                    }, 2500);
                } else {
                    $('#load_data_message').html("<button type='button' class='btn btn-warning'>Please Wait....</button>");
                    action = "inactive";
                }
            }
        });
    }

    function no_data() {

    }
    if (action == 'inactive') {
        action = 'active';
        load_country_data(limit, start);
    }

    $(window).scroll(function() {
        if ($(window).scrollTop() + $(window).height() > $("#load_data").height() && action == 'inactive') {
            action = 'active';
            start = start + limit;
            setTimeout(function() {
                load_country_data(limit, start);
                no_data();
            }, 1000);
        }
    });
});
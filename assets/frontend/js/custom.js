$(document).ready(function() {

    // sticky Headers
    window.onscroll = function() {
        myFunction()
    };

    var header = document.getElementById("myHeader");
    var sticky = header.offsetTop;

    function myFunction() {
        if (window.pageYOffset > sticky) {
            header.classList.add("sticky");
        } else {
            header.classList.remove("sticky");
        }
    }
    // end of sticky header

    //chnging layout while selecting room
    $("#subject_select").on("change", function(event) {
        var data = $(this).val();
        if (data == "room") {
            $.ajax({
                url: base_url + "Contactus/get_room_details",
                type: 'GET',
                dataType: 'json', // added data type
                success: function(res) {
                    var room_data = res;
                    $details = '<div class="row" id="child_room_details">' +
                        '<div class="col-lg-4">' +
                        '<div class="form-group">' +
                        '<select name="room_details" class="form-control dark" required>' +
                        '<option value="">Please Select A Room Type</option>';
                    $.each(room_data, function(i, value) {
                        $details += '<option value="' + value.type_of_room + '">' + value.type_of_room + '(' + value.room_name + ')</option>';
                    })
                    $details += '</select></div></div>' +
                        '<div class="col-lg-4">' +
                        '<div class="form-group">' +
                        '<input type="date" placeholder="Select Date" class="form-control dark" name="date" required>' +
                        '</div></div>' +
                        '<div class="col-lg-4">' +
                        '<div class="form-group">' +
                        '<input type="text" placeholder="Memebers" class="form-control dark" name="members" required>' +
                        '</div></div></div>';
                    // $detail += $details;
                    document.getElementById("room_details_main").style.display = "block";
                    var div = document.getElementById('room_details_main');
                    div.innerHTML += $details;

                }
            });
        } else {
            document.getElementById("room_details_main").style.display = "none";
            if (data != "room") {
                if (document.getElementById('child_room_details') != null) {
                    var div1 = document.getElementById('child_room_details');
                    div1.parentNode.removeChild(div1);
                }
            }
        }
    });

    $("#contact_us").on("submit", function(event) {

        $.ajax({
            type: 'POST',
            url: base_url + "Contactus/contact_us_insert",
            data: $('#contact_us').serialize(),
            success: function(res) {
                if (res == '1') {
                    document.getElementById("form_container").style.display = "none";
                    document.getElementById("show_success").style.display = "block";
                    $('#contact_us').trigger("reset");
                } else {

                }
            }
        });
    });

    $(".add_seva_cart").on("click", function(event) {
        var name = $(this).data('name');
        var price = $(this).data('price');
        var id = $(this).data('id');

        $.ajax({
            type: 'POST',
            url: base_url + "payment/insert_into_cart",
            data: { 'id': id, 'name': name, 'price': price },
            success: function(res) {
                res = $.parseJSON(res);
                if (res.status) {
                    $("#seva_cart").html(res.data);
                    $("#total_cart-number").html(res.total);
                    $("#total-amount").html(res.amount);

                    document.getElementById(id).style.display = "none";
                    let a = "a_";
                    let id2 = id;
                    let id3 = a.concat(id2);
                    document.getElementById(id3).style.display = "block";

                    $details = ' <a href="' + base_url + 'payment/remove_cart_seva/' + res.rowid + '" class="sigma_btn-added">Remove Seva</a>';
                    var div = document.getElementById(id3);
                    div.innerHTML += $details;

                } else {
                    alert(result.message);
                }
            }
        });

    });
    $(".add_amount_kanike").on("click", function(event) {
        let amount = $(this).data('amount');
        let input_amount = document.getElementById("input_amount").value;
        if (input_amount == "") {
            input_amount = 0;
        }
        let final_amount = +amount + +input_amount;
        document.getElementById("input_amount").value = final_amount;
    });

    $("#forgot_pass").on("click", function(event) {
        document.getElementById("login_form").style.display = "none";
        document.getElementById("forgot_form").style.display = "block";
    });

    $("#remeber_pass").on("click", function(event) {
        document.getElementById("login_form").style.display = "block";
        document.getElementById("forgot_form").style.display = "none";
    });

    $("#reset_password").on("submit", function(event) {
        event.preventDefault();
        var re_new_password = document.getElementById("re_new_password").value;
        var new_password = document.getElementById("new_password").value;

        if (re_new_password == new_password) {
            document.getElementById("reset_password").submit();
        } else {
            // document.getElementById("change_password_alert").click();
            alert("Your Password Doesnt Match Please Check Your Password");
        }
    });

    $("#name_change").on("change", function(event) {
        var data = $(this).val();
        var user = "family";
        if (data == "self") {
            data = document.getElementById('id').value;
            var user = "self";
        }
        $.ajax({
            type: 'POST',
            url: base_url + "home/fetch_user_data",
            data: { 'id': data, 'user': user },
            success: function(res) {
                res = $.parseJSON(res);
                var first_name = res.first_name;
                var last_name = res.last_name;
                var name = first_name.concat(" ", last_name);
                document.getElementById('change_name').value = name;
                document.getElementById('change_phone_no').value = res.phone_no;
                document.getElementById('change_rashi').value = res.rashi;
                document.getElementById('change_nakashatra').value = res.nakshtra;
                document.getElementById('change_gothra').value = res.gothra;
            }
        });
    });

    $("#name_change_kanike").on("change", function(event) {
        var data = $(this).val();
        var user = "family";
        if (data == "self") {
            data = document.getElementById('id').value;
            var user = "self";
        }
        $.ajax({
            type: 'POST',
            url: base_url + "home/fetch_user_data",
            data: { 'id': data, 'user': user },
            success: function(res) {
                res = $.parseJSON(res);
                var first_name = res.first_name;
                var last_name = res.last_name;
                var name = first_name.concat(" ", last_name);
                document.getElementById('change_name').value = name;
                document.getElementById('change_phone_no').value = res.phone_no;
            }
        });
    });

    $(".open_kanike_details").on("click", function(event) {
        document.getElementById('kanike_title').innerHTML = $(this).data('name');
        document.getElementById('kanike_image').src = base_url + $(this).data('image');
        document.getElementById('kanike_desc').innerHTML = $(this).data('desc');
        $('#Kanike_details').modal('show');
    });

    $("#signup_form").on("submit", function(event) {
        event.preventDefault();
        var re_password = document.getElementById("re_password").value;
        var password = document.getElementById("password").value;

        if (re_password == password) {
            document.getElementById("signup_form").submit();
        } else {
            // document.getElementById("change_password_alert").click();
            alert("Your Password Doesnt Match Please Check Your Password");
        }
    });
});
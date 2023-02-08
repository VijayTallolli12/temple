$(document).ready(function() {
    // E-seva status change Realted Script
    $(document).on('click', '.status', function() {
        var id = $(this).data('id');
        var status = $(this).data('status');
        var status_change = $(this).data('status_change');
        document.getElementById("id").value = id;
        document.getElementById("status").value = status;
        document.getElementById("status_change").value = status_change;
    });
    // E-seva Delete Related Script
    $(document).on('click', '.delete', function() {
        var id = $(this).data('id');
        document.getElementById("d_id").value = id;
    });
    //  file select function
    $('#default').change(function() {
        alert("image");
    });

    $(".imagesspl").click(function() {
        var id = $(this).data('id');
        var status = $(this).data('status');
        document.getElementById("id").value = id;
        document.getElementById("status").value = status;
    });
    $(".delete_img").click(function() {
        var id = $(this).data('id');
        alert(id);
        // document.getElementById("d_id").value = id;
    });



    // view Gallery Images
    $(".view_gallery_img").click(function() {
        var title = $(this).data('title');
        var img_link = $(this).data('img_link');
        // dtocument.getElementById("id").value = id;
        document.getElementById("gallery_image").src = img_link;
    });

    //change Password
    $("#reset_password").on("submit", function(event) {

        event.preventDefault();
        var re_new_password = document.getElementById("re_new_password").value;
        var new_password = document.getElementById("new_password").value;

        if (re_new_password == new_password) {
            if ($("#reset_password").valid()) {
                document.getElementById("reset_password").submit();
            }
        } else {
            document.getElementById("change_password_alert").click();
        }
    });


    //Blog Title
    $("#blogs_title").on("submit", function(event) {

        event.preventDefault();
        var title = document.getElementById("blog_title").value;

        if ($("#blogs_title").valid()) {
            $.ajax({
                type: "POST",
                url: base_url + "check_title/blog_title",
                data: { "title": title },
                error: function() {
                    console.log("failed");
                },
                success: function(data) {
                    if (data == '1') {
                        document.getElementById("error_title").click();
                    } else {
                        document.getElementById("blogs_title").submit();
                    }
                }
            });
        } else {
            document.getElementById("check_validate_blogs").click();
        }
    });

    //Blog Title update
    $("#blogs_u_title").on("submit", function(event) {

        event.preventDefault();
        var title = document.getElementById("blog_title").value;
        var id = document.getElementById("id").value;
        $.ajax({
            type: "POST",
            url: base_url + "check_title/blog_u_title",
            data: { "title": title, "id": id },
            error: function() {
                console.log("failed");
            },
            success: function(data) {
                if (data == '1') {
                    document.getElementById("error_title").click();
                } else {
                    document.getElementById("blogs_u_title").submit();
                }
            }
        });
    });


    //category title
    $("#categorys_title").on("submit", function(event) {

        event.preventDefault();
        var title = document.getElementById("category_title").value;
        if ($("#categorys_title").valid()) {
            $.ajax({
                type: "POST",
                url: base_url + "check_title/category_title",
                data: { "title": title },
                error: function() {
                    console.log("failed");
                },
                success: function(data) {
                    if (data == '1') {
                        document.getElementById("error_title").click();
                    } else {
                        document.getElementById("categorys_title").submit();
                    }
                }
            });
        }
    });

    //category title update
    $("#categorys_u_title").on("submit", function(event) {

        event.preventDefault();
        var title = document.getElementById("category_title").value;
        var id = document.getElementById("id").value;

        if ($("#categorys_u_title").valid()) {
            $.ajax({
                type: "POST",
                url: base_url + "check_title/category_u_title",
                data: { "title": title, "id": id },
                error: function() {
                    console.log("failed");
                },
                success: function(data) {
                    if (data == '1') {
                        document.getElementById("error_title").click();
                    } else {
                        document.getElementById("categorys_u_title").submit();
                    }
                }
            });
        }
    });

    //E-seva title
    $("#e_sevas_title").on("submit", function(event) {
        event.preventDefault();
        var title = document.getElementById("e_seva_title").value;

        if ($("#e_sevas_title").valid()) {
            $.ajax({
                type: "POST",
                url: base_url + "check_title/e_seva_title",
                data: { "title": title },
                error: function() {
                    console.log("failed");
                },
                success: function(data) {
                    if (data == '1') {
                        document.getElementById("error_title").click();
                    } else {
                        document.getElementById("e_sevas_title").submit();
                    }
                }
            });
        }
    });

    //e-seva title update
    $("#e_sevas_u_title").on("submit", function(event) {

        event.preventDefault();
        var title = document.getElementById("e_seva_title").value;
        var id = document.getElementById("id").value;
        if ($("#e_sevas_u_title").valid()) {
            $.ajax({
                type: "POST",
                url: base_url + "check_title/e_seva_u_title",
                data: { "title": title, "id": id },
                error: function() {
                    console.log("failed");
                },
                success: function(data) {
                    if (data == '1') {
                        document.getElementById("error_title").click();
                    } else {
                        document.getElementById("e_sevas_u_title").submit();
                    }
                }
            });
        }
    });

    //kanike title
    $("#kanikes_title").on("submit", function(event) {

        event.preventDefault();
        var title = document.getElementById("kanike_title").value;

        var desc = document.getElementById("default").value;

        if (desc != "") {
            if ($("#kanikes_title").valid()) {
                $.ajax({
                    type: "POST",
                    url: base_url + "check_title/kanike_title",
                    data: { "title": title },
                    error: function() {
                        console.log("failed");
                    },
                    success: function(data) {
                        if (data == '1') {
                            document.getElementById("error_title").click();
                        } else {
                            document.getElementById("kanikes_title").submit();
                        }
                    }
                });
            }
        } else {
            document.getElementById("desc_validation").click();
        }
    });

    //kanike title update
    $("#kanikes_u_title").on("submit", function(event) {

        event.preventDefault();
        var title = document.getElementById("kanike_title").value;
        var id = document.getElementById("id").value;

        var desc = document.getElementById("default").value;
        if (desc != "") {
            if ($("#kanikes_u_title").valid()) {
                $.ajax({
                    type: "POST",
                    url: base_url + "check_title/kanike_u_title",
                    data: { "title": title, "id": id },
                    error: function() {
                        console.log("failed");
                    },
                    success: function(data) {
                        if (data == '1') {
                            document.getElementById("error_title").click();
                        } else {
                            document.getElementById("kanikes_u_title").submit();
                        }
                    }
                });
            }
        } else {
            document.getElementById("desc_validation").click();
        }
    });

    //Daily seva title
    $("#daily_sevas_title").on("submit", function(event) {

        event.preventDefault();
        var title = document.getElementById("daily_seva_title").value;

        var desc = document.getElementById("default").value;
        if (desc != "") {
            if ($("#daily_sevas_title").valid()) {
                $.ajax({
                    type: "POST",
                    url: base_url + "check_title/daily_seva_title",
                    data: { "title": title },
                    error: function() {
                        console.log("failed");
                    },
                    success: function(data) {
                        if (data == '1') {
                            document.getElementById("error_title").click();
                        } else {
                            document.getElementById("daily_sevas_title").submit();
                        }
                    }
                });
            }
        } else {
            document.getElementById("desc_validation").click();
        }
    });

    //Daily seva title update
    $("#daily_sevas_u_title").on("submit", function(event) {

        event.preventDefault();
        var title = document.getElementById("daily_seva_title").value;
        var id = document.getElementById("id").value;

        var desc = document.getElementById("default").value;
        if (desc != "") {
            if ($("#daily_sevas_u_title").valid()) {
                $.ajax({
                    type: "POST",
                    url: base_url + "check_title/daily_seva_u_title",
                    data: { "title": title, "id": id },
                    error: function() {
                        console.log("failed");
                    },
                    success: function(data) {
                        if (data == '1') {
                            document.getElementById("error_title").click();
                        } else {
                            document.getElementById("daily_sevas_u_title").submit();
                        }
                    }
                });
            }
        } else {
            document.getElementById("desc_validation").click();
        }
    });

    //Parampara title
    $("#paramparas_title").on("submit", function(event) {

        event.preventDefault();
        var title = document.getElementById("parampara_title").value;

        var desc = document.getElementById("default").value;
        if (desc != "") {
            if ($("#paramparas_title").valid()) {
                $.ajax({
                    type: "POST",
                    url: base_url + "check_title/parampara_title",
                    data: { "title": title },
                    error: function() {
                        console.log("failed");
                    },
                    success: function(data) {
                        if (data == '1') {
                            document.getElementById("error_title").click();
                        } else {
                            document.getElementById("paramparas_title").submit();
                        }
                    }
                });
            }
        } else {
            document.getElementById("desc_validation").click();
        }
    });

    //Parampara title update
    $("#paramparas_u_title").on("submit", function(event) {

        event.preventDefault();
        var title = document.getElementById("parampara_title").value;
        var id = document.getElementById("id").value;

        var desc = document.getElementById("default").value;
        if (desc != "") {
            if ($("#paramparas_u_title").valid()) {
                $.ajax({
                    type: "POST",
                    url: base_url + "check_title/parampara_u_title",
                    data: { "title": title, "id": id },
                    error: function() {
                        console.log("failed");
                    },
                    success: function(data) {
                        if (data == '1') {
                            document.getElementById("error_title").click();
                        } else {
                            document.getElementById("paramparas_u_title").submit();
                        }
                    }
                });
            }
        } else {
            document.getElementById("desc_validation").click();
        }
    });

    //dw_deities title
    $("#dw_deities_title").on("submit", function(event) {

        event.preventDefault();
        var title = document.getElementById("dw_deitie_title").value;
        var desc = document.getElementById("default").value;

        if (desc != "") {
            if ($("#dw_deities_title").valid()) {
                $.ajax({
                    type: "POST",
                    url: base_url + "check_title/dw_deitie_title",
                    data: { "title": title },
                    error: function() {
                        console.log("failed");
                    },
                    success: function(data) {
                        if (data == '1') {
                            document.getElementById("error_title").click();
                        } else {
                            document.getElementById("dw_deities_title").submit();
                        }
                    }
                });
            }
        } else {
            document.getElementById("desc_validation").click();
        }
    });

    //dw_deities title update
    $("#dw_deities_u_title").on("submit", function(event) {

        event.preventDefault();
        var title = document.getElementById("dw_deitie_title").value;
        var id = document.getElementById("id").value;

        var desc = document.getElementById("default").value;

        if (desc != "") {
            if ($("#dw_deities_u_title").valid()) {
                $.ajax({
                    type: "POST",
                    url: base_url + "check_title/dw_deitie_u_title",
                    data: { "title": title, "id": id },
                    error: function() {
                        console.log("failed");
                    },
                    success: function(data) {
                        if (data == '1') {
                            document.getElementById("error_title").click();
                        } else {
                            document.getElementById("dw_deities_u_title").submit();
                        }
                    }
                });
            }
        } else {
            document.getElementById("desc_validation").click();
        }
    });

    //Branches title
    $("#branches_title").on("submit", function(event) {

        event.preventDefault();
        var title = document.getElementById("branche_title").value;

        var desc = document.getElementById("default").value;
        if (desc != "") {
            if ($("#branches_title").valid()) {
                $.ajax({
                    type: "POST",
                    url: base_url + "check_title/branche_title",
                    data: { "title": title },
                    error: function() {
                        console.log("failed");
                    },
                    success: function(data) {
                        if (data == '1') {
                            document.getElementById("error_title").click();
                        } else {
                            document.getElementById("branches_title").submit();
                        }
                    }
                });
            }
        } else {
            document.getElementById("desc_validation").click();
        }
    });

    //Branches title update
    $("#branches_u_title").on("submit", function(event) {

        event.preventDefault();
        var title = document.getElementById("branche_title").value;
        var id = document.getElementById("id").value;

        var desc = document.getElementById("default").value;
        if (desc != "") {
            if ($("#branches_u_title").valid()) {
                $.ajax({
                    type: "POST",
                    url: base_url + "check_title/branche_u_title",
                    data: { "title": title, "id": id },
                    error: function() {
                        console.log("failed");
                    },
                    success: function(data) {
                        if (data == '1') {
                            document.getElementById("error_title").click();
                        } else {
                            document.getElementById("branches_u_title").submit();
                        }
                    }
                });
            }
        } else {
            document.getElementById("desc_validation").click();
        }
    });

    //Educational institution title
    $("#eduin_title").on("submit", function(event) {

        event.preventDefault();
        var title = document.getElementById("ei_title").value;

        var desc = document.getElementById("default").value;
        if (desc != "") {
            if ($("#eduin_title").valid()) {
                $.ajax({
                    type: "POST",
                    url: base_url + "check_title/ei_title",
                    data: { "title": title },
                    error: function() {
                        console.log("failed");
                    },
                    success: function(data) {
                        if (data == '1') {
                            document.getElementById("error_title").click();
                        } else {
                            document.getElementById("eduin_title").submit();
                        }
                    }
                });
            }
        } else {
            document.getElementById("desc_validation").click();
        }
    });

    //Educational institution title update
    $("#eduin_u_title").on("submit", function(event) {

        event.preventDefault();
        var title = document.getElementById("ei_title").value;
        var id = document.getElementById("id").value;

        var desc = document.getElementById("default").value;
        if (desc != "") {
            if ($("#eduin_u_title").valid()) {
                $.ajax({
                    type: "POST",
                    url: base_url + "check_title/ei_u_title",
                    data: { "title": title, "id": id },
                    error: function() {
                        console.log("failed");
                    },
                    success: function(data) {
                        if (data == '1') {
                            document.getElementById("error_title").click();
                        } else {
                            document.getElementById("eduin_u_title").submit();
                        }
                    }
                });
            }
        } else {
            document.getElementById("desc_validation").click();
        }
    });

    //Activities title
    $("#activities_title").on("submit", function(event) {

        event.preventDefault();
        var title = document.getElementById("activity_title").value;
        var desc = document.getElementById("default").value;

        if (desc != "") {
            if ($("#activities_title").valid()) {
                $.ajax({
                    type: "POST",
                    url: base_url + "check_title/activity_title",
                    data: { "title": title },
                    error: function() {
                        console.log("failed");
                    },
                    success: function(data) {
                        if (data == '1') {
                            document.getElementById("error_title").click();
                        } else {
                            document.getElementById("activities_title").submit();
                        }
                    }
                });
            }
        } else {
            document.getElementById("desc_validation").click();
        }
    });

    //Activities title update
    $("#activities_u_title").on("submit", function(event) {

        event.preventDefault();
        var title = document.getElementById("activity_title").value;
        var id = document.getElementById("id").value;
        var desc = document.getElementById("default").value;
        if (desc != "") {
            if ($("#activities_u_title").valid()) {
                $.ajax({
                    type: "POST",
                    url: base_url + "check_title/activity_u_title",
                    data: { "title": title, "id": id },
                    error: function() {
                        console.log("failed");
                    },
                    success: function(data) {
                        if (data == '1') {
                            document.getElementById("error_title").click();
                        } else {
                            document.getElementById("activities_u_title").submit();
                        }
                    }
                });
            }
        } else {
            document.getElementById("desc_validation").click();
        }
    });

    //History title
    $("#historys_title").on("submit", function(event) {

        event.preventDefault();
        var title = document.getElementById("history_title").value;

        var desc = document.getElementById("default").value;
        if (desc != "") {
            if ($("#historys_title").valid()) {
                $.ajax({
                    type: "POST",
                    url: base_url + "check_title/history_title",
                    data: { "title": title },
                    error: function() {
                        console.log("failed");
                    },
                    success: function(data) {
                        if (data == '1') {
                            document.getElementById("error_title").click();
                        } else {
                            document.getElementById("historys_title").submit();
                        }
                    }
                });
            }
        } else {
            document.getElementById("desc_validation").click();
        }
    });

    //History title update
    $("#historys_u_title").on("submit", function(event) {

        event.preventDefault();
        var title = document.getElementById("history_title").value;
        var id = document.getElementById("id").value;

        var desc = document.getElementById("default").value;
        if (desc != "") {
            if ($("#historys_u_title").valid()) {
                $.ajax({
                    type: "POST",
                    url: base_url + "check_title/history_u_title",
                    data: { "title": title, "id": id },
                    error: function() {
                        console.log("failed");
                    },
                    success: function(data) {
                        if (data == '1') {
                            document.getElementById("error_title").click();
                        } else {
                            document.getElementById("historys_u_title").submit();
                        }
                    }
                });
            }
        } else {
            document.getElementById("desc_validation").click();
        }
    });

    //Banner title
    $("#banners_title").on("submit", function(event) {

        event.preventDefault();
        var title = document.getElementById("banner_title").value;
        if ($("#banners_title").valid()) {
            $.ajax({
                type: "POST",
                url: base_url + "check_title/banner_title",
                data: { "title": title },
                error: function() {
                    console.log("failed");
                },
                success: function(data) {
                    if (data == '1') {
                        document.getElementById("error_title").click();
                    } else {
                        document.getElementById("banners_title").submit();
                    }
                }
            });
        }
    });

    //Banner title update
    $("#banners_u_title").on("submit", function(event) {

        event.preventDefault();
        var title = document.getElementById("banner_title").value;
        var id = document.getElementById("id").value;

        if ($("#banners_u_title").valid()) {
            $.ajax({
                type: "POST",
                url: base_url + "check_title/banner_u_title",
                data: { "title": title, "id": id },
                error: function() {
                    console.log("failed");
                },
                success: function(data) {
                    if (data == '1') {
                        document.getElementById("error_title").click();
                    } else {
                        document.getElementById("banners_u_title").submit();
                    }
                }
            });
        }
    });

    //Popup title
    $("#popups_title").on("submit", function(event) {

        event.preventDefault();
        var title = document.getElementById("popup_title").value;

        if ($("#popups_title").valid()) {
            $.ajax({
                type: "POST",
                url: base_url + "check_title/popup_title",
                data: { "title": title },
                error: function() {
                    console.log("failed");
                },
                success: function(data) {
                    if (data == '1') {
                        document.getElementById("error_title").click();
                    } else {
                        document.getElementById("popups_title").submit();
                    }
                }
            });
        }
    });

    //Popup title update
    $("#popups_u_title").on("submit", function(event) {

        event.preventDefault();
        var title = document.getElementById("popup_title").value;
        var id = document.getElementById("id").value;

        if ($("#popups_u_title").valid()) {
            $.ajax({
                type: "POST",
                url: base_url + "check_title/popup_u_title",
                data: { "title": title, "id": id },
                error: function() {
                    console.log("failed");
                },
                success: function(data) {
                    if (data == '1') {
                        document.getElementById("error_title").click();
                    } else {
                        document.getElementById("popups_u_title").submit();
                    }
                }
            });
        }
    });

    //Upcoming Events title
    $("#upcoming_events_title").on("submit", function(event) {

        event.preventDefault();
        var title = document.getElementById("title").value;

        var desc = document.getElementById("default").value;
        if (desc != "") {
            if ($("#upcoming_events_title").valid()) {
                $.ajax({
                    type: "POST",
                    url: base_url + "check_title/upcoming_event_title",
                    data: { "title": title },
                    error: function() {
                        console.log("failed");
                    },
                    success: function(data) {
                        if (data == '1') {
                            document.getElementById("error_title").click();
                        } else {
                            document.getElementById("upcoming_events_title").submit();
                        }
                    }
                });
            }
        } else {
            document.getElementById("desc_validation").click();
        }
    });

    //Upcoming Events title update
    $("#upcoming_events_u_title").on("submit", function(event) {

        event.preventDefault();
        var title = document.getElementById("title").value;
        var id = document.getElementById("id").value;

        var desc = document.getElementById("default").value;
        if (desc != "") {
            if ($("#upcoming_events_u_title").valid()) {
                $.ajax({
                    type: "POST",
                    url: base_url + "check_title/upcoming_event_u_title",
                    data: { "title": title, "id": id },
                    error: function() {
                        console.log("failed");
                    },
                    success: function(data) {
                        if (data == '1') {
                            document.getElementById("error_title").click();
                        } else {
                            document.getElementById("upcoming_events_u_title").submit();
                        }
                    }
                });
            }
        } else {
            document.getElementById("desc_validation").click();
        }
    });

    //testimonial title
    $("#testimonial_title").on("submit", function(event) {

        event.preventDefault();
        var title = document.getElementById("name").value;

        var desc = document.getElementById("default").value;
        if (desc != "") {
            if ($("#testimonial_title").valid()) {
                $.ajax({
                    type: "POST",
                    url: base_url + "check_title/testimonial_title",
                    data: { "title": title },
                    error: function() {
                        console.log("failed");
                    },
                    success: function(data) {
                        if (data == '1') {
                            document.getElementById("error_title").click();
                        } else {
                            document.getElementById("testimonial_title").submit();
                        }
                    }
                });
            }
        } else {
            document.getElementById("desc_validation").click();
        }
    });

    //testimonial title update
    $("#testimonial_u_title").on("submit", function(event) {

        event.preventDefault();
        var title = document.getElementById("name").value;
        var id = document.getElementById("id").value;

        var desc = document.getElementById("default").value;
        if (desc != "") {
            if ($("#testimonial_u_title").valid()) {
                $.ajax({
                    type: "POST",
                    url: base_url + "check_title/testimonial_u_title",
                    data: { "title": title, "id": id },
                    error: function() {
                        console.log("failed");
                    },
                    success: function(data) {
                        if (data == '1') {
                            document.getElementById("error_title").click();
                        } else {
                            document.getElementById("testimonial_u_title").submit();
                        }
                    }
                });
            }
        } else {
            document.getElementById("desc_validation").click();
        }
    });

    $("#reset_pass_email").on("submit", function(event) {
        event.preventDefault();

        var password = document.getElementById("password").value;
        var re_password = document.getElementById("re_password").value;
        if (password == re_password) {
            if ($("#reset_pass_email").valid()) {
                document.getElementById("reset_pass_email").submit();
            }
        } else {
            document.getElementById("change_password_alert").click();
        }
    });
});
// Simple Datatable
if (document.querySelector('#table1')) {
    let table1 = document.querySelector('#table1');
    let dataTable = new simpleDatatables.DataTable(table1);
}
//  custom scripts
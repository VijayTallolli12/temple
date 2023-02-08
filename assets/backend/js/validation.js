$(document).ready(function() {
    //E-Seva Start
    $("#e_sevas_title").validate({
        rules: {
            e_seva_title: "required",
            price: {
                required: true,
                digits: true
            },
        },
        messages: {
            e_seva_title: "Please enter E-Seva Title",
            price: {
                required: "Please enter a Price Of E-Seva",
                digits: "Price must consist of Only Numbers"
            },
        }
    });

    $("#e_sevas_u_title").validate({
        rules: {
            e_seva_title: "required",
            price: {
                required: true,
                digits: true
            },
        },
        messages: {
            e_seva_title: "Please enter E-Seva Title",
            price: {
                required: "Please enter a Price Of E-Seva",
                digits: "Price must consist of Only Numbers"
            },
        }
    });
    //E-Seva End

    //Blogs Start
    $("#blogs_title").validate({
        rules: {
            blog_title: "required",
            featured_image: "required",
            blog_date: "required",
            blog_place: "required",
            default: "required",
            blogs_images: "required",
            blogs_category: "required",
        },
        messages: {
            blog_title: "Please enter Blog Title",
            featured_image: "Please Upload Blog Feature Image",
            blog_date: "Please Enter Date",
            blog_place: "please Enter Place Where Event Happend",
            default: "Please Enter Details Of Events",
            blogs_images: "Please Upload Event Images",
            blogs_category: "Please Select Category",
        }
    });
    //Blogs End


    // Activities Start
    $("#activities_title").validate({
        rules: {
            activities_name: "required",

        },
        messages: {
            activities_name: "Please enter Activity Name"
        }
    });
    $("#activities_u_title").validate({
        rules: {
            activities_name: "required",

        },
        messages: {
            activities_name: "Please enter Activity Name"
        }
    });
    // Activities 

    //daily worshiped deities start
    $("#dw_deities_title").validate({
        rules: {
            deitie_name: "required",
            deitie_image: "required",

        },
        messages: {
            deitie_name: "Please enter Deitie Name",
            deitie_image: "Please Upload Deitie Image"
        }
    });

    $("#dw_deities_u_title").validate({
        rules: {
            dw_deitie_name: "required",
            // dw_deitie_image: "required",

        },
        messages: {
            dw_deitie_name: "Please enter Deitie Name",
            // dw_deitie_image: "Please Upload Deitie Image"
        }
    });
    //daily worshiped deities end

    //Branches start
    $("#branches_title").validate({
        rules: {
            branch_name: "required",
        },
        messages: {
            branch_name: "Please enter Branch Name",
        }
    });

    $("#branches_u_title").validate({
        rules: {
            branch_name: "required",
        },
        messages: {
            branch_name: "Please enter Branch Name",
        }
    });
    //Branches end

    //Educational Institutes start
    $("#eduin_title").validate({
        rules: {
            institutes_name: "required",
        },
        messages: {
            institutes_name: "Please enter Institute Name",
        }
    });

    $("#eduin_u_title").validate({
        rules: {
            institutes_name: "required",
        },
        messages: {
            institutes_name: "Please enter Institute Name",
        }
    });
    //Educational Institutes end

    //Educational Institutes start
    $("#historys_title").validate({
        rules: {
            history_name: "required",
        },
        messages: {
            history_name: "Please enter Title",
        }
    });

    $("#historys_u_title").validate({
        rules: {
            history_name: "required",
        },
        messages: {
            history_name: "Please enter Title",
        }
    });
    //Educational Institutes end

    //Category start
    $("#categorys_title").validate({
        rules: {
            category: "required",
        },
        messages: {
            category: "Please enter Category Name",
        }
    });

    $("#categorys_u_title").validate({
        rules: {
            category: "required",
        },
        messages: {
            category: "Please enter Category Name",
        }
    });
    //Category end

    //kanike start
    $("#kanikes_title").validate({
        rules: {
            kanike: "required",
            kanike_image: "required"
        },
        messages: {
            kanike: "Please enter Category Name",
            kanike_image: "Please Upload Image",
        }
    });

    $("#kanikes_u_title").validate({
        rules: {
            kanike: "required",
        },
        messages: {
            kanike: "Please enter Category Name",
        }
    });
    //kanike end

    //Daily Seva start
    $("#daily_sevas_title").validate({
        rules: {
            temple_name: "required",
            temple_image: "required"
        },
        messages: {
            temple_name: "Please enter Temple Name",
            temple_image: "Please Upload Image of Temple",
        }
    });

    $("#daily_sevas_u_title").validate({
        rules: {
            temple_name: "required",
        },
        messages: {
            temple_name: "Please enter Temple Name",
        }
    });
    //Daily Seva end

    //Parampara start
    $("#paramparas_title").validate({
        rules: {
            parampara_name: "required",
        },
        messages: {
            parampara_name: "Please enter Temple Name",
        }
    });

    $("#paramparas_u_title").validate({
        rules: {
            name: "required",
        },
        messages: {
            name: "Please enter Temple Name",
        }
    });
    //Parampara end

    //gallery start
    $("#insert_images").validate({
        rules: {
            gallery_title: "required",
            gallery_images: "required"
        },
        messages: {
            gallery_title: "Please enter Folder/Image Name",
            gallery_images: "Please Upload Images"
        }
    });
    //gallery end

    //Banner Mangment start
    $("#banners_title").validate({
        rules: {
            title: "required",
            banner_image: "required"
        },
        messages: {
            title: "Please enter Title",
            banner_image: "Please Upload Image",
        }
    });

    $("#banners_u_title").validate({
        rules: {
            title: "required",
        },
        messages: {
            title: "Please enter Title",
        }
    });
    //Banner Mangment end

    //popup Mangment start
    $("#popups_title").validate({
        rules: {
            title: "required",
            popup_image: "required"
        },
        messages: {
            title: "Please enter Title",
            popup_image: "Please Upload Image",
        }
    });

    $("#popups_u_title").validate({
        rules: {
            title: "required",
        },
        messages: {
            title: "Please enter Title",
        }
    });
    //popup Mangment end

    //Upcoming Events start
    $("#upcoming_events_title").validate({
        rules: {
            title: "required",
            date: "required",
            place: "required",
            upcoming_events_image: "required",
        },
        messages: {
            title: "Please enter Title",
            date: "Please Enter Event Date",
            place: "Please Enter Event Occuring Place",
            upcoming_events_image: "Please Upload Image",
        }
    });

    $("#upcoming_events_u_title").validate({
        rules: {
            title: "required",
            date: "required",
            place: "required",
        },
        messages: {
            title: "Please enter Title",
            date: "Please Enter Event Date",
            place: "Please Enete Event Occuring Place",
        }
    });
    //Upcoming Events End

    //Upcoming Events start
    $("#testimonial_title").validate({
        rules: {
            name: "required",
            occupation: "required",
            testimonials_image: "required",
        },
        messages: {
            name: "Please enter Title",
            occupation: "Please Enter Event Date",
            testimonials_image: "Please Upload Image",
        }
    });

    $("#testimonial_u_title").validate({
        rules: {
            name: "required",
            occupation: "required",

        },
        messages: {
            name: "Please enter Title",
            occupation: "Please Enter Event Date",

        }
    });
    $("#reset_password").validate({
        rules: {
            old_password: "required",
            new_password: "required",
            re_new_password: "required",
        },
        messages: {
            old_password: "Please enter Old Password",
            new_password: "Please Enter New Password",
            re_new_password: "Please ReEnter New Password",

        }
    });

    $("#reset_pass_email").validate({
        rules: {
            password: "required",
            re_password: "required",
        },
        messages: {
            password: "Please Enter New Password",
            re_password: "Please ReEnter New Password",

        }
    });

});
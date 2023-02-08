$(document).ready(function() {

    $(".view_images").on("click", function(event) {
        var title = $(this).data('title');
        // if (document.getElementById('img_title_id') != null) {
        //     var div1 = document.getElementById('img_title_id');
        //     div1.parentNode.removeChild(div1);
        // }
        // $('#myModal').find(".modal_title").html(title);
        $.ajax({
            type: 'POST',
            url: base_url + "Gallery/fetch_images",
            data: { 'title': title },
            success: function(res) {
                res = $.parseJSON(res);
                if (res.status) {
                    $("#lightgallery").html(res.data);
                    // $('#myModal').modal('show');
                    /*$('#lightgallery').lightGallery({
                        fullScreen: true
                    });*/
                    lightGallery(document.getElementById('lightgallery'));
                    $('#image0').click();
                } else {
                    alert(result.message);
                }
            }
        });
    });
});
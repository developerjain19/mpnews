//load more posts
function loadMorePosts() {
    $(".btn-load-more").prop("disabled", true);
    $("#load_posts_spinner").show();
    var data = {
        'limit': parseInt($("#limit_load_more_posts").text()),
        'view': '_post_item_horizontal'
    }; 
    $.ajax({
        type: 'POST',
        url: VrConfig.baseURL + '/AjaxController/loadMorePosts',
        data: data,
        success: function (response) {
            var obj = JSON.parse(response);
            if (obj.result == 1) {
                setTimeout(function () {
                    $("#last_posts_content").append(obj.htmlContent);
                    $("#limit_load_more_posts").text(obj.newLimit);
                    $("#load_posts_spinner").hide();
                    $(".btn-load-more").prop("disabled", false);
                    if (obj.hideButton) {
                        $(".btn-load-more").hide();
                    }
                }, 300);
            } else {
                setTimeout(function () {
                    $("#load_posts_spinner").hide();
                    $(".btn-load-more").hide();
                }, 300);
            }
        }
    });
}

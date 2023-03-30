var base_url = "http://localhost/mpnews/";

function addReaction(postId, reaction) {
	var data = {
		post_id: postId,
		reaction: reaction,
	};

	$.ajax({
		type: "POST",
		url: base_url + "/Home/addReaction",
		data: data,
		success: function (response) {
			console.log(response);
			$("." + reaction + postId).text(response);
		},
	});
}

$("#add_comment_registered").submit(function (event) {
    event.preventDefault();
    var formValues = $(this).serializeArray();
    var data = {
        'limit': $('#post_comment_limit').val()
    };
    var submit = true;
    $(formValues).each(function (i, field) {
        if ($.trim(field.value).length < 1) {
            $("#add_comment_registered [name='" + field.name + "']").addClass("is-invalid");
            submit = false;
        } else {
            $("#add_comment_registered [name='" + field.name + "']").removeClass("is-invalid");
            data[field.name] = field.value;
        }
    });
    data['limit'] = $('#post_comment_limit').val();
    addCsrf(data);
    if (submit == true) {
        $.ajax({
            type: 'POST',
            url: VrConfig.baseURL + '/AjaxController/addCommentPost',
            data: data,
            success: function (response) {
                var obj = JSON.parse(response);
                if (obj.type == 'message') {
                    document.getElementById("message-comment-result").innerHTML = obj.htmlContent;
                } else {
                    document.getElementById("comment-result").innerHTML = obj.htmlContent;
                }
                $("#add_comment_registered")[0].reset();
            }
        });
    }
});
});
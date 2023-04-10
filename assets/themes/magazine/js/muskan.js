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

$("#push-comment").submit(function (e) {
	e.preventDefault();
	var form = $("#push-comment").serialize();

	$.ajax({
		type: "POST",
		url: base_url + "Home/push_comment",
		data: form,
		beforeSend: function () {
			// $("#show_acadmices").html();
		},
		success: function (response) {
			$(".comments").html(response);

			$("#push-comment").trigger("reset");
		},
	});
});

function pushlogin() {
	var form = $("#push-login").serialize();

	$.ajax({
		type: "POST",
		url: base_url + "Home/login",
		data: form,
		beforeSend: function () {
			// $("#show_acadmices").html();
		},
		success: function (response) {
			var obj = jQuery.parseJSON(response);
			if (obj.result == 0) {
				document.getElementById("result-login").innerHTML = obj.error_message;
			} else if (obj.result == 1) {
				window.location.reload(true);
			} else {
				window.location.reload(true);
			}

			$("#push-login").trigger("reset");
		},
	});
}

// function pushfollower() {
// 	var form = $("#push-follower").serialize();

// 	$.ajax({
// 		type: "POST",
// 		url: base_url + "Home/add_follower",
// 		data: form,
// 		beforeSend: function () {},
// 		success: function (response) {
// 			if (response == 1) {
// 				document.getElementById("result-show").innerHTML = "Unfollow";
// 			} else {
// 			}

// 			$("#push-follower").trigger("reset");
// 		},
// 	});
// }

window.setTimeout(function () {
	$(".alert")
		.fadeTo(200, 0)
		.slideUp(200, function () {
			$(this).remove();
		});
}, 4000);

$(document).on("click", ".mobile-menu-button", function () {
	if ($("#navMobile").hasClass("nav-mobile-open")) {
		$("#navMobile").removeClass("nav-mobile-open");
		$("#overlay_bg").hide();
	} else {
		$("#navMobile").addClass("nav-mobile-open");
		$("#overlay_bg").show();
	}
});
$(document).on("click", "#overlay_bg", function () {
	$("#navMobile").removeClass("nav-mobile-open");
	$("#overlay_bg").hide();
});
//close menu
$(".close-menu-click").click(function () {
	$("#navMobile").removeClass("nav-mobile-open");
	$("#overlay_bg").hide();
});

//show image preview
function showImagePreview(input, showAsBackground) {
	var divId = $(input).attr("data-img-id");
	if (input.files && input.files[0]) {
		var reader = new FileReader();
		reader.onload = function (e) {
			if (showAsBackground) {
				$("#" + divId).css("background-image", "url(" + e.target.result + ")");
			} else {
				$("#" + divId).attr("src", e.target.result);
			}
		};
		reader.readAsDataURL(input.files[0]);
	}
}

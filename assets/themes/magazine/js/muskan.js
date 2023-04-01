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

$(function() {
  $('#myForm').ajaxForm(function() {
      alert("Thank you for your comment!");
  });
});

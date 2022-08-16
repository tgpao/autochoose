$("#brand").on("change", function(){
	$.ajax({
		url: "ajax.php",
		method: "post",
		data: {brand: $(this).val()},
		success: function (data) {
			$("#model").html(data)
		}
	})
})
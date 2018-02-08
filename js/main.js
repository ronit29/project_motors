jQuery(document).ready(function() {
	console.log('testing');
	jQuery("#bookingForm").submit(function(e) {
		console.log('test');
	    e.preventDefault();
	    var frm = jQuery("#bookingForm");
	    var data = {};
	    jQuery.each(this, function(i, v){
	        var input = $(v);
	        data[input.attr("name")] = input.val();
	        delete data["undefined"];
	    });
	    jQuery.ajax({
	        contentType:"application/json; charset=utf-8",
	        type:"POST",
	        url:"bookrequest.php",
	        dataType:'json',
	        data:JSON.stringify(data),
	        success:function(data) {
	            // alert(data.message);
	        }
	    });
	});
});	
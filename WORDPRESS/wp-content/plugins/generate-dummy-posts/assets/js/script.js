jQuery(document).ready(function($){

  // AJAX url
  var ajax_url = ajax_object.ajax_url;

  // count posts to generate gdp_count
  $('#generate_posts').click(function(){
    var inputVal = $('#gdp_count').val();
    
    // Fetch filtered records (AJAX with parameter)
    var data = {
      'action': 'gdpostsAjaxReqiest',
      'inputVal': inputVal
    };
	$('#generating_message').empty();
	$('#generating_message').append('Generating<div id="gdp_loader"></div>');
    $.ajax({
      url: ajax_url,
      type: 'post',
      data: data,
      dataType: 'json',
      success: function(response){
		  console.log(response);
		$('#gdp_count').val('');
        $('#generating_message').empty();
		var messageIs = '<h3>'+inputVal+' posts created successfully</h3>';
		
		var i;
		for (i = 0; i < response.length; ++i) {
			messageIs += '<p class="post">'+response[i]+'</p>';
		}
		$('#generating_message').append(messageIs);
      }
    });
  });

});
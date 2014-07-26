$(document).ready( function() {

$('#confirmation_dialog_link').hide();


$("SELECT")
.selectBox()
.change( function() {
var selectAttribName=$(this).attr('name');
var selectAttribValue=$(this).val();
$("#console")[0].scrollTop = $("#console")[0].scrollHeight;
});

/* From Ajax Submit */
 $('#submit').click(function() {

        $('#waiting').show(500);
        $('#message').hide(0);
        $('#console').hide(0);
        $('#confirmation_dialog').dialog("close");

        $.ajax({
                type : 'POST',
                url : 'post.php',
                dataType : 'json',
                data: {
                Customer : $('#Customer').val(),
                Site : $('#Site').val()
                },
                success : function(data){
                                        $('#waiting').hide(500);
                                        $('#console').show(0);
                                        if (data.error === true)
                                        $('#CustomerStatisticsSearchForm').show(500);
                                        $("#console").append( data.msg);
                                },
                error : function(XMLHttpRequest, textStatus, errorThrown) {
                                        $('#waiting').hide(500);
                                        $('#console').show(0);
                                        $('#message').removeClass().addClass('error').text('There was an error.').show(500);
                                        $("#console").append('There was an error.');
                                        $("#console").append('data.msg');
                                        $('#CustomerStatisticsSearchForm').show(500);
                                }
                });

        return false;
});

$("#Customer")
.click( function() {
        $("#Site").selectBox('disable');
})
.change( function() {
                $("#console").empty();
                var CustomerValue=$(this).val();

                if (CustomerValue != ".")
                  {
                          $("#Site").selectBox('enable');
                          $("#console").append("You have selected " + CustomerValue );	
							 
						$.ajax({
									type : 'POST',
									url : 'post-validation.php',
									dataType : 'json',
									data: {
									Customer : $('#Customer').val()
									},
									success : function(data){
															$('#waiting').hide(500);
															$('#console').show(0);
															if (data.error === true)
															$('#CustomerStatisticsSearchForm').show(500);
															$("#console").append(data.msg);
													},
									error : function(XMLHttpRequest, textStatus, errorThrown) {
															$('#waiting').hide(500);
															$('#console').show(0);
															$('#message').removeClass().addClass('error').text('There was an error.').show(500);
															$("#console").append('There was an error.');
															
															$('#CustomerStatisticsSearchForm').show(500);
													}
									});
					
							return false; 
												
							
							
							
                   }
                else
                  {
                          $("#Site").selectBox('disable');
                }

});

$("#Site")
.click( function() {
})
.change( function() {
                var SiteValue=$(this).val();

                if (SiteValue != ".")
                  {
                $("#submit").selectBox('enable');
                $("#submit").show(0);
                 $("#confirmation_dialog_link").show(0);
                   }
                else
                  {
                $("#submit").selectBox('disable');
                 $("#submit").hide(0);
                  $("#confirmation_dialog_link").hide(0);
                 }
});


$('#confirmation_dialog').dialog({
                        autoOpen: false,
                        modal: true,
                        width: 600,
                        buttons: {
                                "Cancel": function() {
                                        $(this).dialog("close");
                                }
                        }
});

// Dialog Link
$('#confirmation_dialog_link').click(function(){
                        $('#confirmation_dialog').dialog('open');
                        return false;
});



/*$("#submit").click( function() {
                                $("#console").empty();
                                 });
*/

$("#ClearConsole").click( function() {
                                $("#console").empty();
                                 });

});

$(function(){
	var baseURL  = window.Laravel.baseURL;
    $("#form_change_password").submit(function(e){
        e.preventDefault();

        var url = baseURL + "/auth/profile/changepass";
        var formdata =  $.fn.serializeObject("form_change_password");
        $(this).prop("disabled",true)

        $.ajax({ 
              
              url  :   url, 
              type :   'POST',
              data :   formdata,
             
              beforeSend : function()
              {
               $("#alertChangePassword").css("display","none")
              },
              success: function(response)
              { 
              	var status = response.status;
              	var errors = response.error;
              	
              	if(status == 400){
              		var ErrMessage = "";
        					for (var prop in errors) {
        				        if(!errors.hasOwnProperty(prop)) continue;
        				        	ErrMessage = errors[prop];
        				        break;
        				    }

        				    $("#alertChangePassword").css("display","block")
                    $("#alertChangePassword").html("Error! " + ErrMessage)

              	}else{
              		$("#alertChangePassword").removeClass("alert-danger");
              		$("#alertChangePassword").addClass("alert-success");
              		$("#alertChangePassword").css("display","block");
              		$("#alertChangePassword").html("Your Password Successfully changed.")

              		setTimeout(function(){ location.reload(); }, 1000);

              	}
              }
        });

    })

        $(".profilepic").hover(function(){
            $("#labelUpdateprofile").css("display","block");
        })
        
         $("#labelUpdateprofile").hover(function(){
            $("#labelUpdateprofile").css("display","block");
        })
        
         $("#labelUpdateprofile").mouseout(function(){
            $("#labelUpdateprofile").css("display","none");
        })
        
         $(".profilepic").mouseout(function(){
            $("#labelUpdateprofile").css("display","none");
        })
        

  	$.fn.serializeObject = function(form)
      {
          var o = {};
          var a = $("#"+form).serializeArray();
          $.each(a, function() {
              if (o[this.name] !== undefined) {
                  if (!o[this.name].push) {
                      o[this.name] = [o[this.name]];
                  }
                  o[this.name].push(this.value || '');
              } else {
                  o[this.name] = this.value || '';
              }
          });
          return o;
      };
})

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('.profilepic')
                .attr('src', e.target.result)
                .height(110)
                .width(110)

            $("#divbuttonprofile").css("display","block");
        };

        reader.readAsDataURL(input.files[0]);
    }
  }
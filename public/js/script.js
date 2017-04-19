$(function(){
	baseURL = window.baseurl.URL;

	 

	 $("#getMyAnimals").click(function(){
	 		$.ajax({ 
		        url  :   baseURL + "/animals", 
		        type :   'GET',
		        data :   {
		                     
		                 },
			              beforeSend : function()
			              {
			                
			              },
			              success: function(response)
			              {   
			                  $("#myanimals").html(response)
			                 /* var li = "";
			                  response.forEach(function(animal){
			                  	console.log(animal)
			                  	li += "<li>"+ animal + "</li>";
			                  })
			                  $("#myanimals").html("<ul>" + li + "</ul>")*/
			              }     
		      });
	 })
})
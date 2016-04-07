                function init(){
			
			window.plugins.pushNotification.register(
			successHandler,
			errorHandler,
			{"senderID":"300115801710",
			 "ecb":"onNotificationGCM"
			});	
		}
		function successHandler(result){
		//alert("Result" + result);		
		}
		function errorHandler(error){
		//alert("error"+ result);
		}
		function onNotificationGCM(e){
		
		switch(e.event){
			case 'registered':
				sendRegRequest(e.regid);
                                
				break;
			case 'message':	
				alert("Message: "+ e.payload.message);
				var sound = new Media("assets/www/"+e.soundname);
				sound.play();	
				break;
			default:
				alert("unknown event");
		}   
		function sendRegRequest(regID){
		
		$.post(urlbase+"?request=register&regId="+regID)
			.done(function(data){
                            //alert("Successfully Registered Your Device For Notifications \n You Can Turn It Off Any Time");
			
			});
		}
                
		function sendUnRegRequest(regID){
		
		$.post(urlbase+"?request=unregister&regId="+regID)
			.done(function(data){
                            //alert("Successfully Unregistered Your Device For Notifications \n You Can Turn It Off Any Time");
			
			});
		}
		}
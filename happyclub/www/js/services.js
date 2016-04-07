angular.module('starter.services', [])

.factory('Chats', function($http,API_URL) {
  // Might use a resource here that returns a JSON array

  // Some fake testing data
urlbase = API_URL;
var getEvents = function(){

			return $http.get(urlbase+'?request=list&item=event').
            success(function(response, status, headers, config) {
            	chats = response;
                var getEvents = chats;
                
            	 console.log("Service Event List:" +JSON.stringify(response));

		}).
          error(function(data) {
              //$scope.error = true;
                    //alert("Error:"+data);
         });
      };
      var getEventDetails = function(StoryID){
            
			return $http.get(urlbase+'?request=detail&item=event&id='+StoryID).
            success(function(response, status, headers, config) {
            	chats = response.data;
                var getEventDetails = chats;
                
            	 console.log("Service Event DEtails:" +JSON.stringify(response));

		}).
          error(function(data) {
                    alert("Error:"+data);
         });
      };
  
  var getNews = function(){

			return $http.get(urlbase+'?request=list&item=news').
            success(function(response, status, headers, config) {
            	chats = response;
                var getNews = chats;
                
            	 console.log("Service NewsList:" +JSON.stringify(response));

		}).
          error(function(data) {
              //$scope.error = true;
                    //alert("Error:"+data);
         });
      };
    
  var getNewsDetails = function(StoryID){
            
			return $http.get(urlbase+'?request=detail&item=news&id='+StoryID).
            success(function(response, status, headers, config) {
            	chats = response.data;
                var getNewsDeails = chats;
                
            	 console.log("Service News DEtails:" +JSON.stringify(response));

		}).
          error(function(data) {
                    alert("Error:"+data);
         });
      };
    
      
    
    
    
    var chats = [] ;

  return {
      getNews: getNews,
      getNewsDetails: getNewsDetails,
      getEvents: getEvents,
      getEventDetails:getEventDetails,
      
    all: function() {
      return chats;
    },
    remove: function(chat) {
      chats.splice(chats.indexOf(chat), 1);
    },
    get: function(chatId) {
      for (var i = 0; i < chats.length; i++) {
        if (chats[i].NewsID === parseInt(chatId)) {
            console.log(chatID);
          return chats[i];
        }
      }
      return null;
    }
  };
});

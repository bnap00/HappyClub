angular.module('starter.controllers',[])

.controller('DashCtrl', function($scope,API_URL) {
    $scope.urlbase = API_URL;
    $scope.api_url = API_URL;
})

.controller('ChatsCtrl', function($scope, Chats,$q) {
    $scope.loaded=false;
  var getNews  = function(){
      $scope.error = true;
      $scope.newsList = [];
      Chats.getNews().then(function(response){
          $scope.error = false;
          $scope.newsList = response.data;
          $scope.loaded = true;
          $scope.newsLength = $scope.newsList.length;
          console.log(response);
      },function(err){
          $scope.error = true;
      });
  }
  var getEvents = function(){
      $scope.error = true;
      
      $scope.evets = [];
      Chats.getEvents().then(function(response){
          $scope.error = false;
          $scope.events = response.data;
          $scope.eventLength = $scope.events.length;
          $scope.loaded = true;
          //console.log(response);
      },function(err){
          $scope.error = true;
      });
  }
  //$scope.chats = Chats.getNews();
  getNews();
  getEvents();
  $scope.remove = function(chat) {
    Chats.remove(chat);
  }
})

.controller('ChatDetailCtrl', function($scope, $stateParams,API_URL, Chats) {
   
   var getNewsDetails  = function(){
      $scope.error = true;
      Chats.getNewsDetails($stateParams.chatId).then(function(response){
          $scope.error = false;
          $scope.api_url = API_URL;
          $scope.chat = response.data[0];
          //console.log("details incoming");
          //console.log(response.data[0]);
      },function(err){
          
      });
  }
  //$scope.chats = Chats.getNews();
            getNewsDetails();
   
   
  //$scope.chat = Chats.get($stateParams.chatId);
})
.controller('EventDetailCtrl', function($scope, $stateParams, Chats, API_URL) {
   
   var getEventDetails  = function(){
       $scope.api_url = API_URL;
      $scope.error = true;
      Chats.getEventDetails($stateParams.chatId).then(function(response){
          $scope.error = false;
          $scope.event = response.data[0];
          //console.log("details incoming");
          //console.log(response.data[0]);
      },function(err){
          
      });
  }
  //$scope.chats = Chats.getNews();
            getEventDetails();
   
   
  //$scope.chat = Chats.get($stateParams.chatId);
})
.controller('AccountCtrl', function($scope,API_URL) {
    urlbase=API_URL;
    $.getScript("js/push.js");
    
    
     $scope.pushNotificationChange = function() {
         alert(window.localStorage['notification']);
         window.localStorage['notification'] = $scope.pushNotification.checked;
         
    //console.log('Push Notification Change', $scope.pushNotification.checked);
  };
  
  $scope.pushNotification = window.localStorage['notification'];
    
  $scope.settings = {
    enableFriends: true
  };
});

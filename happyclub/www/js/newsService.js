(function(){
    var app = angular.module('starter.services', []);
    app.service('newsService',function($DATA_URL){
        var self = this;
        $urlbase = $DATA_URL;
        var allNews = [
                {
                    id: 0,
                    title: "asd",
                    body: "asdsadsadasdasdashbdkjsakdhb",
                    shortDesc: "asdasda"
                },
                {
                    id: 1,
                    title: "First News",
                    body: "asddalsiudlhaiuhsdoiuwq",
                    shortDesc: "qweqwe"
                }
                
            ];
        
    });
    return {
    all: function() {
      return allNews;
    }
}
})();
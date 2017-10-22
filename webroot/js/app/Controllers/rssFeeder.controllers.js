/**
 * Created by jose on 21/10/2017.
 */
import HomeController from './HomeController.js';
import ArticleController from './ArticleController.js';

var moduleName='rssFeeder.controllers';

angular.module(moduleName, [])
    .controller('rssFeeder.homeController',['$timeout','rssFeederSvc', '$location', function($timeout, rssFeederSvc, $location) {
        return new HomeController($timeout, rssFeederSvc, $location);
    }])
    .controller('rssFeeder.articleController',['$timeout','rssFeederSvc', '$routeParams', function($timeout, rssFeederSvc, $routeParams) {
        return new ArticleController($timeout, rssFeederSvc, $routeParams);
    }]);

export default moduleName;

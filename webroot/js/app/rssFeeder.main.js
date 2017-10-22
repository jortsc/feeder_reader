import { default as controllersModuleName } from './Controllers/rssFeeder.controllers.js';
import { default as servicesModuleName } from './rssFeeder.services.js';

var moduleName = 'rssFeeder';

function config($routeProvider){
  $routeProvider
    .when('/',{
        templateUrl : '/js/app/templates/list.html',
        controller  : 'rssFeeder.homeController',
        controllerAs: 'vm'
    })
    .when('/article/page/:articleId',{
        templateUrl : '/js/app/templates/article.html',
        controller  : 'rssFeeder.articleController',
        controllerAs:'vm'
    })
    .otherwise({redirectTo:'/'});
}

config.$inject = ['$routeProvider'];

var app = angular.module(moduleName,
    ['ngRoute','ngMessages', servicesModuleName, controllersModuleName])
  .config(config);

export default moduleName;

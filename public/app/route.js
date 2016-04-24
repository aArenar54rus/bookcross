/**
 * Created by Стаислав on 24.04.2016.
 */

var app =  angular.module('app',['ngRoute','angularUtils.directives.dirPagination']);

app.config(['$routeProvider',
    function($routeProvider) {
        $routeProvider.
            when('/adverts', {
                templateUrl: 'resources/views/templates/adverts.html',
                controller: 'advertsController'
            }).
            when('/posts', {
                templateUrl: 'templates/posts.html',
                controller: 'postsController'
            });
    }]);
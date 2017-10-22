var moduleName='rssFeeder.services';

const HTTP = new WeakMap();

class RssFeederService
{
  constructor($http)
  {
    HTTP.set(this, $http);
  }

  getArticles(){
    return HTTP.get(this).get('/articles/feed').then(result => result);
  }

  getArticle(articleId){
    return HTTP.get(this).get('/articles/article/' + articleId).then(result => result);
  }

  markFeedRead(articleId, isArticleRead){
    return HTTP.get(this).put('/articles/edit/', {id: articleId, read: isArticleRead});
  }

  saveForLater(articleId, isArticleForLater){
    return HTTP.get(this).put('/articles/edit/',{id: articleId, later: isArticleForLater});
  }

  static rssFeederFactory($http){
    return new RssFeederService($http);
  }
}

RssFeederService.rssFeederFactory.$inject = ['$http'];

angular.module(moduleName, [])
  .factory('rssFeederSvc', RssFeederService.rssFeederFactory);

export default moduleName;

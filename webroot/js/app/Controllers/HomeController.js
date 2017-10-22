const INIT     = new WeakMap();
const SERVICE  = new WeakMap();
const TIMEOUT  = new WeakMap();
const LOCATION = new WeakMap();

class HomeController{

    constructor($timeout, rssFeederSvc, $location){
        SERVICE.set(this, rssFeederSvc);
        TIMEOUT.set(this, $timeout);
        LOCATION.set(this, $location);

        INIT.set(this, () => {
          SERVICE.get(this).getArticles().then(articles => {
            this.articles = articles.data;
          });
        });
        INIT.get(this)();
    }

    markArticleAsRead(articleId, isArticleRead){
    return SERVICE.get(this).markFeedRead(articleId, isArticleRead)
      .then(() => {
        INIT.get(this)();
        this.readSuccess = true;
        this.readSuccessMessage = isArticleRead ? "Article marked as read." : "Article marked as unread.";
        TIMEOUT.get(this)(() => {
          this.readSuccess = false;
        }, 2500);
      });
    }

    saveForLater(articleId, isArticleForlater){
        return SERVICE.get(this).saveForLater(articleId, isArticleForlater)
                .then(() => {
                INIT.get(this)();
        this.saveForLaterSuccess = true;
        this.saveForLaterMessage = isArticleForlater ? "Article saved for later." : "Article was readed";
        TIMEOUT.get(this)(() => {
            this.saveForLaterSuccess = true;
        }, 2500);
        });
    }

    pageArticle(articleId) {
        LOCATION.get(this).path('/article/page/' + articleId);
    }

}

export default HomeController;

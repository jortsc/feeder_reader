const INIT        = new WeakMap();
const SERVICE     = new WeakMap();
const TIMEOUT     = new WeakMap();
const ROUTEPARAMS = new WeakMap();

class ArticleController{

    constructor($timeout, rssFeederSvc, $routeParams){
        SERVICE.set(this, rssFeederSvc);
        TIMEOUT.set(this, $timeout);

        ROUTEPARAMS.set(this, $routeParams);

        INIT.set(this, () => {
            SERVICE.get(this).getArticle(ROUTEPARAMS.get(this).articleId).then(article => {
            this.article = article.data;
            });
        });
        INIT.get(this)();

        SERVICE.get(this).markFeedRead(ROUTEPARAMS.get(this).articleId, true)
            .then(() => {
            INIT.get(this)();
            this.readSuccess = true;
            this.readSuccessMessage ="Article marked as read.";
            TIMEOUT.get(this)(() => {
                this.readSuccess = false;
            }, 2500);
        });
    }

}

export default ArticleController;

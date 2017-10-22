# CakePHP Application - basic RSS/Atom feed reader to Openhost

* CakePHP installed through Composer
* Create Read Update Delete methodology over article entity as an API Rest, working with JSON to feed a frontend and without rendering any template more than the home.
* At frontend I did it my best. I mean I don't knew ECMASCRITP 6, and from the scratch, given that I haven't all the time that I would like to dedicated it. In order to let it as I like.
* Can check implementation here: [http://151.80.147.203](http://151.80.147.203)

**This weekend has been complicated for me to get time to do it. I have the releasing of an application in which I am involved to 'live' environment, just this weekend... :)**  
**here we go! There somethings that I could refactor and close more properly than how they are now.**  
**I love refactoring!! But I have not more time, now have to work!!**   
**I'm sorry.**  


## Used Database - PostgreSQL working with JSON columns
````
// Install postgreSql
apt-get install postgresql postgresql-contrib

// Installation on a Debian distro the PHP PDO extension
sudo apt-get install php7.0-pgsql

// Add extension to php.ini
/etc/php5/fpm/php.ini extension=pgsql.so

// Login with admin user
sudo -i -u postgres

//create database
createdb rssfeeder

// Get in
psql -d rssfeeder

/* PostgreSQL commands */

//Creating and granting to postgres access to smart-sites database

CREATE USER app_user WITH PASSWORD 'gDQgnfZHYzuafOTRsjhCyRWAmFtQrTY6GMi0QqYVCjxprj1j';
GRANT ALL PRIVILEGES ON DATABASE "rssfeeder" to app_user
````

## Frontend Installation
Located at /webroot/js
````
npm install (to install node.js dependencies)
bower install (to install front-end packages)
````
## Available Request

### Get - Gets articles' feed
```
curl -v -H "Content-type: application/json" http://151.80.147.203/articles/feed | python -m json.tool
```

#### Response
```
Content-type: application/json
HTTP/1.1 200 OK
[
    {
        "creation_date": "2017-10-22T11:10:28+00:00",
        "data": {
            "author": "Mary Wollstonecraft",
            "date": "2017-10-12 12:42:35",
            "description": "et iusto sed quo iure voluptatem occaecati omnis eligendi aut ad voluptatem doloribus vel accusantium quis pariatur molestiae porro eius odio et labore et velit aut",
            "read": false,
            "short_description": "Ea molestias quasi exercitationem repellat qui ipsa sit aut...",
            "title": "Ea molestias quasi"
        },
        "id": 2
    },
    ............
```
### Get - Gets given article
```
curl -v -H "Content-type: application/json" http://151.80.147.203/articles/article/1 | python -m json.tool
```
#### Response
```
Content-type: application/json
HTTP/1.1 200 OK
{
    "creation_date": "2017-10-22T14:35:18+00:00",
    "data": {
        "author": "Sun Tzu",
        "date": "2017-10-11 09:24:05",
        "description": "est rerum tempore vitae sequi sint nihil reprehenderit dolor beatae ea dolores neque fugiat blanditiis voluptate porro vel nihil molestiae ut reiciendis qui aperiam non debitis possimus qui neque nisi nulla",
        "later": true,
        "read": true,
        "short_description": "Est rerum tempore vitae sequi sint nihil reprehenderit dolor beatae...",
        "title": "Qui est esse"
    },
    "id": 1
}
```

### POST - Creates a new article
```
curl -v -H "Content-type: application/json"  --data '{"title":"Qui est esse EDITED", "short_description": "EDITED Est rerum tempore vitae sequi sint nihil reprehenderit dolor beatae...", "description": "EDITED est rerum tempore vitae sequi sint nihil reprehenderit dolor beatae ea dolores neque fugiat blanditiis voluptate porro vel nihil molestiae ut reiciendis qui aperiam non debitis possimus qui neque nisi nulla", "author":"Sun Tzu", "read":false }' http://151.80.147.203/articles/add
```

####Success response
```
Content-type: application/json
HTTP/1.1 200 OK

{"success":"entity was created"}
```
####Error response
```
Content-type: application/json
HTTP/1.1 400 Bad Request

{"error":"Cannot create entity review payload.\n"}
```

### PUT - Updates given article content
```
curl -v -H "Content-type: application/json" -X PUT --data '{"id": 1, "read":true }' http://151.80.147.203/articles/edit

curl -v -H "Content-type: application/json" -X PUT --data '{"id": 1, "later":true }' http://151.80.147.203/articles/edit

curl -v -H "Content-type: application/json" -X PUT --data '{"id": 1, "title":"Qui est esse EDITED", "short_description": "EDITED Est rerum tempore vitae sequi sint nihil reprehenderit dolor beatae...", "description": "EDITED est rerum tempore vitae sequi sint nihil reprehenderit dolor beatae ea dolores neque fugiat blanditiis voluptate porro vel nihil molestiae ut reiciendis qui aperiam non debitis possimus qui neque nisi nulla", "author":"Sun Tzu", "read":false }' http://151.80.147.203/articles/edit
```

####Success response
```
Content-type: application/json
HTTP/1.1 200 OK

{"success":"entity wa edited"}
```

####Error response
```
Content-type: application/json
HTTP/1.1 400 Bad Request

{"error":"Cannot process this attribute autor.\n"}
```

### DELETE - Deletes given article
```
curl -H "Content-type: application/json" -X DELETE http://151.80.147.203/articles/delete/10
```

#### Success response
```
Content-type: application/json
HTTP/1.1 200 OK
{"success":"entity was deleted"}
```
####Error response
```
Content-type: application/json
HTTP/1.1 400 Bad Request
{"error":"Must provide article id existent in order to delete it."}
```



CREATE DATABASE rssfeeder;

DROP TABLE IF EXISTS articles;
CREATE TABLE articles (
  id SERIAL,
  data JSON NOT NULL,
  creation_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
);

INSERT INTO articles VALUES
  (1,'{"title":"Qui est esse", "short_description":"Est rerum tempore vitae sequi sint nihil reprehenderit dolor beatae...", "description":"est rerum tempore vitae sequi sint nihil reprehenderit dolor beatae ea dolores neque fugiat blanditiis voluptate porro vel nihil molestiae ut reiciendis qui aperiam non debitis possimus qui neque nisi nulla", "author":"Sun Tzu", "date":"2017-10-11 09:24:05", "read":false, "later":false}'),
  (2,'{"title":"Ea molestias quasi", "short_description":"Ea molestias quasi exercitationem repellat qui ipsa sit aut...", "description":"et iusto sed quo iure voluptatem occaecati omnis eligendi aut ad voluptatem doloribus vel accusantium quis pariatur molestiae porro eius odio et labore et velit aut", "author":"Mary Wollstonecraft", "date":"2017-10-12 12:42:35", "read":false}'),
  (3,'{"title":"Eum et est occaecati", "short_description":"Et iusto sed quo iure voluptatem occaecati omnis eligendi...", "description":"ullam et saepe reiciendis voluptatem adipisci sit amet autem assumenda provident rerum culpa quis hic commodi nesciunt rem tenetur doloremque ipsam iure quis sunt voluptatem rerum illo velit", "author":"Noam Chomsky", "date":"2017-10-21 09:24:05", "read":false, "later":false}'),
  (4,'{"title":"Nesciunt quas odio", "short_description":"Repudiandae veniam quaerat sunt sed alias aut fugiat sit...", "description":"repudiandae veniam quaerat sunt sed alias aut fugiat sit autem sed est voluptatem omnis possimus esse voluptatibus quis est aut tenetur dolor neque", "author":"Adrastus of Aphrodisias", "date":"2017-09-12 19:27:15", "read":false}'),
  (5,'{"title":"Dolorem eum magni", "short_description":"Suscipit nam nisi quo aperiam aut asperiores eos fugit maiores voluptatibus...", "description":"Suscipit nam nisi quo aperiam aut asperiores eos fugit maiores voluptatibus quia voluptatem quis ullam qui in alias quia est consequatur magni mollitia accusamus ea nisi voluptate dicta", "author":"Platon", "date":"2017-09-21 12:24:05", "read":false, "later":false}'),
  (7,'{"title":"Magnam facilis autem", "short_description":"Qui consequuntur ducimus possimus quisquam amet similique suscipit...", "description":"Animi esse sit aut sit nesciunt assumenda eum voluptas quia voluptatibus provident quia necessitatibus ea rerum repudiandae quia voluptatem delectus fugit aut id quia ratione optio eos iusto veniam iure", "author":"Alexander of Aphrodisias", "date":"2017-08-21 10:41:56", "read":false, "later":false}'),
  (6,'{"title":"Nesciunt iure omnis dolorem", "short_description":"Repellat aliquid praesentium dolorem quo sed totam minus non itaque ...", "description":"Similique fugit est illum et dolorum harum et voluptate eaque quidem exercitationem quos nam commodi possimus cum odio nihil nulla dolorum exercitationem magnam ex et a et distinctio debitis", "author":"Anaxagoras", "date":"2017-10-09 14:54:50", "read":false, "later":false}'),
  (8,'{"title":"Optio molestias id quia eum", "short_description":"Veritatis unde neque eligendi quae quod architecto quo neque vitae est illo sit...", "description":"Est molestiae facilis quis tempora numquam nihil qui voluptate sapiente consequatur est qui necessitatibus autem aut ipsa aperiam modi dolore numquam reprehenderit eius rem quibusdam", "author":"Anaximenes of Miletus", "date":"2017-10-08 12:34:12", "read":false, "later":false}'),
  (9,'{"title":"Et ea vero quia laudantium autem", "short_description":"Enim et ex nulla omnis voluptas quia qui voluptatem consequatur numquam aliquam sunt totam...", "description":"Eum non blanditiis soluta porro quibusdam voluptas vel voluptatem qui placeat dolores qui velit aut vel inventore aut cumque culpa explicabo aliquid at perspiciatis est et voluptatem dignissimos dolor itaque sit nam", "author":"Andronicus of Rhodes", "date":"2017-10-14 18:32:34", "read":false, "later":false}'),
  (10,'{"title":"Eveniet quod temporibus", "short_description":"ullam consequatur ut omnis quis sit vel consequuntur ipsa eligendi ipsum...", "description":"Earum voluptatem facere provident blanditiis velit laboriosam pariatur accusamus odio saepe cumque dolor qui a dicta ab doloribus consequatur omnis corporis cupiditate eaque assumenda ad nesciunt", "author":"Apollodorus of Athens", "date":"2017-10-15 18:21:54", "read":false, "later":false}')
;


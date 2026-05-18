 docker compose up --build -d


 docker compose exec php composer install


 docker compose exec php vendor/bin/phinx migrate


 docker compose exec php vendor/bin/phinx seed:run

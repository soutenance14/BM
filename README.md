# BM (BileMo API)
## Install Git
https://git-scm.com/downloads
## Create a project from the repository
https://github.com/soutenance14/BM.git
## Install Api Platform (Command)
Composer install
## Configure the .env file for the database
DATABASE_URL="mysql://db_user:db_pass:@host:port/db_name?serverVersion=server_version"
## Create the database (Command)
php bin/console doctrine:database:create
## Migrate the migrations (Command)
php bin/console doctrine:migrations:migrate
## Create the data fixtures (Command)
php bin/console doctrine:fixtures:load
## Documentation
Use the /api link for get the Doc

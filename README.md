# BM Project 7 OC Symfony.

[![Codacy Badge](https://api.codacy.com/project/badge/Grade/9d06f9b602434749a65b6293c55b925e)](https://app.codacy.com/gh/soutenance14/BM?utm_source=github.com&utm_medium=referral&utm_content=soutenance14/BM&utm_campaign=Badge_Grade_Settings)

API for manage phones for client with Symfony.
## Bundles
* Api platform
* Lexik JWT Token
## Prerequisites
* PHP7 or >
* Git
* Symfony
* Open SSL
## Clone the project from the repository
https://github.com/soutenance14/BM.git
## Install Bundle (Command)
`$ composer install`
## Generate the SSL Key
`$ php bin/console lexik:jwt:generate-keypair`
## Configure the SSL keys path and passphrase in your .env
`JWT_SECRET_KEY=%kernel.project_dir%/config/jwt/private.pem`

`JWT_PUBLIC_KEY=%kernel.project_dir%/config/jwt/public.pem`

`JWT_PASSPHRASE=your_pass_prhrase`

## More config Lexik JWT
If you are some problem with JWT, use the documentaion
https://github.com/lexik/LexikJWTAuthenticationBundle/blob/2.x/Resources/doc/index.md#installation
## Configure the .env file for the database
DATABASE_URL="mysql://db_user:db_pass:@host:port/db_name?serverVersion=server_version"
## Create the database (Command)
`$ php bin/console doctrine:database:create`
## Migrate the migrations (Command)
`$ php bin/console doctrine:migrations:migrate`
## Create the data fixtures (Command)
`$ php bin/console doctrine:fixtures:load`
## Launch the server
`symfony server:start -d`
## Documentation
Use the server:port/api link for get the Documentation, exemple:
http://127.0.0.1:80/api

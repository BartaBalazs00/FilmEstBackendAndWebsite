Laravel telepítési lépések 

Készítsünk egy másolatot az .env.example fájlról, .env néven! 

A fájlban írjuk át az adatbázis kapcsolat adatait a megfelelőre! 

A konzolban hajtsuk végre az alábbi utasításokat: 

composer install 

php artisan key:generate --ansi 

php artisan storage:link 

composer require intervention/image 

php artisan migrate 

php artisan db:seed 

composer require anhskohbo/no-captcha 

A .env fájl végére be kell írni a következő két sort 

NOCAPTCHA_SECRET=

NOCAPTCHA_SITEKEY=

A .env fájlnál mindent ami MAIL_-el kezdődik, ki kell cserélni erre: 

MAIL_MAILER=

MAIL_MAILER=

MAIL_HOST=

MAIL_PORT=

MAIL_USERNAME=

MAIL_PASSWORD=

MAIL_ENCRYPTION=

MAIL_FROM_ADDRESS=

MAIL_FROM_NAME=

A fejlesztői szervert az alábbi utasítással indíthatjuk el: 

php artisan serve 

Adatbázis leírása: 

adatbázis neve: film_est 

táblák nevei és azok mezői: 

Graphical user interface, table

Description automatically generated 


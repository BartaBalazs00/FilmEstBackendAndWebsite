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

NOCAPTCHA_SECRET=6LfPMJEeAAAAANx4NU6ROAcOY3NzHFlEH8aX30dc 

NOCAPTCHA_SITEKEY=6LfPMJEeAAAAAOoms23Hovgr_erRo3bxTwlgLUdl 

A .env fájlnál mindent ami MAIL_-el kezdődik, ki kell cserélni erre: 

MAIL_MAILER=smtp 

MAIL_MAILER=smtp 

MAIL_HOST=smtp.gmail.com 

MAIL_PORT=587 

MAIL_USERNAME=barta.balazs00@gmail.com 

MAIL_PASSWORD=wlfqjzchttkjhumo 

MAIL_ENCRYPTION=tls 

MAIL_FROM_ADDRESS=barta.balazs00@gmail.com 

MAIL_FROM_NAME="${APP_NAME}" 

A fejlesztői szervert az alábbi utasítással indíthatjuk el: 

php artisan serve 

Adatbázis leírása: 

adatbázis neve: film_est 

táblák nevei és azok mezői: 

Graphical user interface, table

Description automatically generated 


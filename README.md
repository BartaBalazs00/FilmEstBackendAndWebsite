Készítsünk egy másolatot a .env.example fájlról, .env néven!

A fájlban írjuk át az adatbázis kapcsolat adatait a megfelelőre!

A konzolban hajtsuk végre az alábbi utasításokat:

composer install

php artisan key:generate --ansi

php artisan storage:link

composer require intervention/image

php artisan migrate

php artisan db:seed

composer require anhskohbo/no-captcha

A .env fájl végére be kell írni a következő két sort és ki kell tölteni a google-nek az adataival amit létrehozunk.

https://github.com/anhskohbo/no-captcha

NOCAPTCHA_SECRET=secret-key

NOCAPTCHA_SITEKEY=site-key

A .env fájlnál mindent ami MAIL_-el kezdődik, ki kell cserélni erre:

https://medium.com/@agavitalis/how-to-send-an-email-in-laravel-using-gmail-smtp-server-53d962f01a0c

MAIL_MAILER=-

MAIL_HOST=-

MAIL_PORT=-

MAIL_USERNAME=-

MAIL_PASSWORD=-

MAIL_ENCRYPTION=-

MAIL_FROM_ADDRESS=-

MAIL_FROM_NAME=-

A fejlesztői szervert az alábbi utasítással indíthatjuk el:

php artisan serve

A fejlesztői szerver elindítása után regisztráljunk egy admin fiókot a weboldalon és az adatbázis kezelő alkalmazásban a fiók permission értékét manuálisan állítsuk 1-re, ez az asztali alkalmazás használatához szükséges. 

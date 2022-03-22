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

tábla: 

Users: 

`id` bigint(20) UNSIGNED NOT NULL, 

`name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL, 

`email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL, 

`email_verified_at` timestamp NULL DEFAULT NULL, 

`password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL, 

`remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL, 

`created_at` timestamp NULL DEFAULT NULL, 

`updated_at` timestamp NULL DEFAULT NULL 

Tábla 

Profiles 

  `id` bigint(20) UNSIGNED NOT NULL, 

 		 `user_id` bigint(20) UNSIGNED NOT NULL, 

  `cim` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL, 

 		 `leiras` text COLLATE utf8mb4_unicode_ci DEFAULT NULL, 

 		 `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL, 

 		 `created_at` timestamp NULL DEFAULT NULL, 

  		`updated_at` timestamp NULL DEFAULT NULL 

tábla 

filmek 

`id` int(11) NOT NULL, 

`Cim` varchar(255) COLLATE utf8mb4_hungarian_ci NOT NULL, 

`leiras` varchar(3000) COLLATE utf8mb4_hungarian_ci NOT NULL, 

`MegjelenesiEv` year(4) NOT NULL, 

`Ertekeles` double NOT NULL, 

`imageUrl` varchar(500) COLLATE utf8mb4_hungarian_ci NOT NULL 

tábla 

kategoriak 

`id` int(11) NOT NULL, 

`Kategoria` varchar(50) COLLATE utf8mb4_hungarian_ci NOT NULL 

tábla 

filmkategoriai 

`filmId` int(11) NOT NULL, 

`kategoriaId` int(11) NOT NULL 

tábla 

filmrendezoi 

`filmId` int(11) NOT NULL, 

`rendezoId` int(11) NOT NULL 

tábla 

filmszineszei 

`filmId` int(11) NOT NULL, 

`szineszId` int(11) NOT NULL 

tábla 

mentettfilmek 

`id` bigint(20) UNSIGNED NOT NULL, 

`user_id` bigint(20) UNSIGNED NOT NULL, 

`film_id` bigint(20) UNSIGNED NOT NULL, 

`created_at` timestamp NULL DEFAULT NULL, 

`updated_at` timestamp NULL DEFAULT NULL 

tábla 

password_resets 

`email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL, 

`token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL, 

`created_at` timestamp NULL DEFAULT NULL 

tábla 

rendezok 

`id` int(11) NOT NULL, 

`rendezoNev` varchar(100) COLLATE utf8mb4_hungarian_ci NOT NULL 

tábla 

szineszek 

`id` int(11) NOT NULL, 

`szineszNev` varchar(100) COLLATE utf8mb4_hungarian_ci NOT NULL 

tábla 

failed_jobs 

`id` bigint(20) UNSIGNED NOT NULL, 

`uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL, 

`connection` text COLLATE utf8mb4_unicode_ci NOT NULL, 

`queue` text COLLATE utf8mb4_unicode_ci NOT NULL, 

`payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL, 

`exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL, 

`failed_at` timestamp NOT NULL DEFAULT current_timestamp() 

tábla 

personal_access_tokens 

`id` bigint(20) UNSIGNED NOT NULL, 

`tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL, 

`tokenable_id` bigint(20) UNSIGNED NOT NULL, 

`name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL, 

`token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL, 

`abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL, 

`last_used_at` timestamp NULL DEFAULT NULL, 

`created_at` timestamp NULL DEFAULT NULL, 

`updated_at` timestamp NULL DEFAULT NULL 

tábla 

migrations 

`id` int(10) UNSIGNED NOT NULL, 

`migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL, 

`batch` int(11) NOT NULL 

Oldaltörés
 

Az alkalmazás végpontjai: 

GET /http://127.0.0.1:8000/filmek 

Végpont leírása: Az összes film adott adatait adja vissza JSON formátumban 

[ 

{ 

”id”:1416, 

”cim”: „The Shawshank Redemption” 

”leiras”:” The Shawshank Redemption has become a classic film - it's even IMDb's top-rated movie of all time - but did you know it almost had an entirely different cast behind those legendary bars?”, 

”mejelenesiEv”:1994, 

”ertekeles”:9.3, 

”imageUrl”:”https://m.media-amazon.com/images/M/MV5BMDFkYTc0MGEtZmNhMC00ZDIzLWFmNTEtODM1ZmRlYWMwMWFmXkEyXkFqcGdeQXVyMTMxODk2OTU@._V1_QL75_UX190_CR0,0,190,281_.jpg”, 

”kategoria”:[ 

”Drama” 

], 

”szineszek”:[ 

”Tim Robbins”, 

”Morgan Freeman”, 

”Bob Gunton” 

], 

”rendező”:” Frank Darabont” 

}, 

{ 

”id”:1417, 

”cim”: „The Godfather” 

”leiras”:”The Godfather &quot;Don&quot; Vito Corleone is the head of the Corleone mafia family in New York. He is at the event of his daughter's wedding. Michael, Vito's youngest son and a decorated WW II Marine is also present at the wedding. Michael seems to be uninterested in being a part of the family business. Vito is a powerful man, and is kind to all those who give him respect but is ruthless against those who do not. But when a powerful and treacherous rival wants to sell drugs and needs the Don's influence for the same, Vito refuses to do it. What follows is a clash between Vito's fading old values and the new ways which may cause Michael to do the thing he was most reluctant in doing and wage a mob war against all the other mafia families which could tear the Corleone family apart. —srijanarora-152-448595”, 

”mejelenesiEv”:1972, 

”ertekeles”:9.2, 

”imageUrl”:” https://m.media-amazon.com/images/M/MV5BM2MyNjYxNmUtYTAwNi00MTYxLWJmNWYtYzZlODY3ZTk3OTFlXkEyXkFqcGdeQXVyNzkwMjQ5NzM@._V1_QL75_UY281_CR4,0,190,281_.jpg”, 

”kategoria”:[ 

”Drama”, 

”Crime” 

], 

”szineszek”:[ 

”Marlon Brando”, 

”Al Pacino”, 

”James Caan” 

], 

”rendező”:” Francis Ford Coppola” 

},…… 

] 

GET /http://127.0.0.1:8000/filmek/1416 

Az 1416-os azonosítóval rendelkező film adott adatait adja vissza JSON formátumban 

[ 

{ 

”id”:1416, 

”cim”: „The Shawshank Redemption” 

”leiras”:” The Shawshank Redemption has become a classic film - it's even IMDb's top-rated movie of all time - but did you know it almost had an entirely different cast behind those legendary bars?”, 

”mejelenesiEv”:1994, 

”ertekeles”:9.3, 

”imageUrl”:”https://m.media-amazon.com/images/M/MV5BMDFkYTc0MGEtZmNhMC00ZDIzLWFmNTEtODM1ZmRlYWMwMWFmXkEyXkFqcGdeQXVyMTMxODk2OTU@._V1_QL75_UX190_CR0,0,190,281_.jpg”, 

}, 

”kategoria”:[ 

”Drama” 

], 

”szineszek”:[ 

”Tim Robbins”, 

”Morgan Freeman”, 

”Bob Gunton” 

], 

”rendező”:” Frank Darabont” 

} 

] 

Hibakezelés: Ha nem létezik a ‘filmek’ táblában adott id-val rendelkező elem, az alábbi válasz jön létre: 

Státuszkód: 404 Not Found 

Json-respone:  

{​ 

"message": "Nem létezik ilyen film..." 

} 

 

PATCH /http://127.0.0.1:8000/filmek/{id} 

Módosítja az id azonosítójú film adatait. Csak a módosítandó adatokat kell megadni, pl. ha csak az értékelést szeretnénk módosítani, akkor elég ennyit megadni: 

{ 

"ertekeles": 8, 

} 

Az ID nem módosítható. 

Visszaadja a módosított film adatait. 

 

PUT /http://127.0.0.1:8000/filmek/{id} 

Módosítja az id azonosítójú film adatait. Minden adatot meg kell adni. 

Az ID nem módosítható. 

Visszaadja a módosított film adatait. 

 

DELETE /http://127.0.0.1:8000/filmek/{id} 

Törli az adott azonosítójú filmet. 

Visszatérésnek nem ad vissza tartalmat. 

 

GET /http://127.0.0.1:8000/kategoriak 

Végpont leírása: Az összes kategoria adatait visszaadja JSON formátumban 

[ 

{ 

”id”:54, 

”kategoria”: „Drama” 

}, 

{ 

”id”:55, 

”kategoria”: „Crime” 

},…… 

] 

GET /http://127.0.0.1:8000/filmek/54 

Az 54-es azonosítóval rendelkező kategória adott adatait adja vissza JSON formátumban 

[ 

{ 

”id”:54, 

”kategoria”: „Drama” 

} 

] 

 

Hibakezelés: Ha nem létezik a ‘kategoriak táblában adott id-val rendelkező elem, az alábbi válasz jön létre: 

Státuszkód: 404 Not Found 

Json-respone:  

{​ 

"message": "Nem létezik ilyen kategoria..." 

} 

 

PATCH /http://127.0.0.1:8000/kategoriak/{id} 

Módosítja az id azonosítójú kategoria adatait. Csak a módosítandó adatokat kell megadni, pl. ha csak az értékelést szeretnénk módosítani, akkor elég ennyit megadni: 

{ 

"kategoria": ”Horror”, 

} 

Az ID nem módosítható. 

Visszaadja a módosított kategória adatait. 

 

PUT /http://127.0.0.1:8000/kategoriak/{id} 

Módosítja az id azonosítójú kategória adatait. Minden adatot meg kell adni. 

Az ID nem módosítható. 

Visszaadja a módosított kategória adatait. 

 

DELETE /http://127.0.0.1:8000/kategoriak/{id} 

Törli az adott azonosítójú kategóriát. 

Visszatérésnek nem ad vissza tartalmat. 

 

GET /http://127.0.0.1:8000/szineszek 

Végpont leírása: Az összes színész adatait visszaadja JSON formátumban 

[ 

{ 

”id”:1, 

”szineszNev”: „Tim Robbins” 

}, 

{ 

”id”:2, 

”szineszNev”: „Morgan Freeman” 

},…… 

] 

GET /http://127.0.0.1:8000/szineszek/1 

Az 1-es azonosítóval rendelkező színész adott adatait adja vissza JSON formátumban 

[ 

{ 

”id”:1, 

”szineszNev”: „Tim Robbins” 

} 

] 

 

Hibakezelés: Ha nem létezik a ‘szineszek’ táblában adott id-val rendelkező elem, az alábbi válasz jön létre: 

Státuszkód: 404 Not Found 

Json-respone:  

{​ 

"message": "Nem létezik ilyen színész..." 

} 

 

PATCH /http://127.0.0.1:8000/szineszek/{id} 

Módosítja az id azonosítójú színész adatait. Csak a módosítandó adatokat kell megadni, pl. ha csak az értékelést szeretnénk módosítani, akkor elég ennyit megadni: 

{ 

"szineszNev": ” Lee J. Cobb”, 

} 

Az ID nem módosítható. 

Visszaadja a módosított színész adatait. 

 

PUT /http://127.0.0.1:8000/szineszek/{id} 

Módosítja az id azonosítójú színész adatait. Minden adatot meg kell adni. 

Az ID nem módosítható. 

Visszaadja a módosított színész adatait. 

 

DELETE /http://127.0.0.1:8000/szineszek/{id} 

Törli az adott azonosítójú színészt. 

Visszatérésnek nem ad vissza tartalmat. 

 

 

GET /http://127.0.0.1:8000/rendezok 

Végpont leírása: Az összes rendező adatait visszaadja JSON formátumban 

[ 

{ 

”id”:730, 

”rendezoNev”: „Frank Darabont” 

}, 

{ 

”id”:731, 

” rendezoNev”: „Francis Ford Coppola” 

},…… 

] 

GET /http://127.0.0.1:8000/rendezok/730 

Az 730-as azonosítóval rendelkező rendező adott adatait adja vissza JSON formátumban 

[ 

{ 

” ”id”:730, 

”rendezoNev”: „Frank Darabont” 

} 

] 

 

Hibakezelés: Ha nem létezik a ‘rendezok’ táblában adott id-val rendelkező elem, az alábbi válasz jön létre: 

Státuszkód: 404 Not Found 

Json-respone:  

{​ 

"message": "Nem létezik ilyen rendező..." 

} 

 

PATCH /http://127.0.0.1:8000/rendezok/{id} 

Módosítja az id azonosítójú rendező adatait. Csak a módosítandó adatokat kell megadni, pl. ha csak az értékelést szeretnénk módosítani, akkor elég ennyit megadni: 

{ 

"rendezoNev": ” Quentin Tarantino”, 

} 

Az ID nem módosítható. 

Visszaadja a módosított színész adatait. 

 

PUT /http://127.0.0.1:8000/rendezok/{id} 

Módosítja az id azonosítójú rendező adatait. Minden adatot meg kell adni. 

Az ID nem módosítható. 

Visszaadja a módosított színész adatait. 

 

DELETE /http://127.0.0.1:8000/rendezok/{id} 

Törli az adott azonosítójú rendezőt. 

Visszatérésnek nem ad vissza tartalmat. 

 
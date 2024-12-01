# Orders-mail-sender
Отправитель информации о заказе на почту после обработки связанного JSON объекта 
# Инициализация
1) Скачиваем репозиторий (с помощью команды или архивом)
2) Устанавливаем/обновляем зависимости с помощью композера (composer install/composer update)
3) Смотрим какие требования не удовлетворены - исправляем (например, требуется новая версия PHP)
4) Также, скорее всего, придется обновить файл конфигурации php.ini (ниже представлена моя текущая конфигурация):

        ;extension=ldap
        extension=curl
        ;extension=ffi
        ;extension=ftp
        extension=fileinfo
        ;extension=gd
        ;extension=gettext
        ;extension=gmp
        extension=intl
        ;extension=imap
        extension=mbstring
        ;extension=exif      ; Must be after mbstring as it depends on it
        ;extension=mysqli
        ;extension=oci8_12c  ; Use with Oracle Database 12c Instant Client
        ;extension=oci8_19  ; Use with Oracle Database 19 Instant Client
        ;extension=odbc
        extension=openssl
        ;extension=pdo_firebird
        extension=pdo_mysql
        ;extension=pdo_oci
        ;extension=pdo_odbc
        ;extension=pdo_pgsql
        ;extension=pdo_sqlite
        extension=pgsql
        ;extension=shmop        
        ;extension=snmp        
        ;extension=soap
        ;extension=sockets
        extension=sodium
        ;extension=sqlite3
        ;extension=tidy
        ;extension=xsl
        ;extension=zip
   
5) Заменяем пример файла окружения на нормальную версию командой (или переименовываем вручную):
  
       mv .env.example .env

6) Обновляем данные, связанные с бд в файле окружения (.env) для корректной работы проекта Laravel, пример для mysql:

       DB_CONNECTION=mysql
       DB_HOST=127.0.0.1
       DB_PORT=3306
       DB_DATABASE=orders_db
       DB_USERNAME=root
       DB_PASSWORD=root

7) Не забываем про миграции:

       php artisan migrate

9) Устанавливаем ключ приложения:

       php artisan key:generate 

10) Запускаем приложение с помощью artisan:

        php artisan serve

# Пример использования
1) Конфигурируем настройки драйвера почты в файле окружения (.env), например для smtp:

       MAIL_MAILER=smtp
       MAIL_HOST=smtp.mail.ru
       MAIL_PORT=465 (587 если tsl)
       MAIL_USERNAME=your@domain.com
       MAIL_PASSWORD=yourpassword
       MAIL_ENCRYPTION=ssl (или tsl)
       MAIL_FROM_ADDRESS=your@domain.com
       MAIL_FROM_NAME="${APP_NAME}"
   
[ Или ничего не трогаем и смотрим отправленные сообщение в логах (storage/logs/laravel.log) ]

2) Пример JSON для отправки:

       {
           "client": {
               "name": "Имя",
               "lastName": "Фамилия",
               "phone": "+7 (960) 960 00-00",
               "email": "test@test.ru",
               "new": "Y"
           },
           "order": {
               "id": 228,
               "date": "2024-11-10 9:43",
               "status": "sent",
               "products": [
                   {
                       "title": "\u0425\u043b\u0435\u0431",
                       "price": 42,
                       "quantity": 1
                   },
                   {
                       "title": "Кола",
                       "price": 80,
                       "quantity": 1
                   },
                   {
                       "title": "\u041c\u043e\u043b\u043e\u043a\u043e",
                       "price": 71,
                       "quantity": 2
                   }
               ]
           }
       }

[ Поле "new" можно либо не указывать, либо ставить значения Y(Yes) и N(No) ]

[ Если используем реальный почтовый драйвер, то не забываем заменить поле "email" на существующую почту ]

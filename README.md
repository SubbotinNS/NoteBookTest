
В проекте реализована аутентификация при помощи Laravel Sanctum
Для получения токена необходимо произвести регистрацию либо авторизироваться в уже зарегестрированном аккаунте (методы POST)
Для корректного отображения ошибок авторизации необходимо в запросе отправлять заголовок с ключом "Accept" и значением application/json

Реализованы следующие структуры запросов к API 

1) GET /api/v1/notebook
2) POST /api/v1/notebook
3) GET /api/v1/notebook/{id}
4) POST /api/v1/notebook/{id}
5) DELETE /api/v1/notebook/{id}

Данные методы требуют наличия в запросе токена авторизованного пользователя, получаемые при помощи методов 
1) POST /api/auth/register
2) POST /api/auth/login

Название необходимой базы данных "laravel_notebooktest". Конфигурационный файл (.env) для запуска без контейризации - .envMain


Тестирование API производилось при помощи программы Postman


"Разворачивание" API в контейнерах Docker с помощью docker-composer (в каталоге проекта):
1) docker-compose build app
2) docker-compose up -d
3) docker-compose exec app composer install
4) Переименовать файл .envDocker в .env 
5) docker-compose exec app php artisan key:generate
6) docker-compose exec app php artisan migrate:fresh

после этого API доступно по http://localhost:8000/api/

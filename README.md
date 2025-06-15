Инструкция по запуску:

1. git clone https://github.com/rustamfront/questionnaire-app.git
2. cd questionnaire-app
3. переименовать .env.example => .env
3. composer install
4. ./vendor/bin/sail up -d
5. sail key:generate
6. sail artisan migrate
7. sail npm install
8. sail npm run build
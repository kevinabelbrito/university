## Project setup (Front-End)

```
cd front
```

```
npm install
```

### Compiles and hot-reloads for development
```
npm run serve
```

### Compiles and minifies for production
```
npm run build
```

### Lints and fixes files
```
npm run lint
```

### Customize configuration
See [Configuration Reference](https://cli.vuejs.org/config/).

## Project setup (Back-End)

```
cd back
```

```
composer install
```
### Configure the enviroment

```
copy the .env.example content in a new file named .env
```

### Generate key

```
php artisan key:generate
```

### Set database configuration, before, you must create a database in MySQL, PostgreSQL or another that you prefer

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=university
DB_USERNAME=root
DB_PASSWORD=yourpass
```

### Run database migrations and seeders

```
php artisan migrate:refresh --seed
```

### Run server

```
php artisan serve
```
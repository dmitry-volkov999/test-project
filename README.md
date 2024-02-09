# Test project

## How to use


- create docker network
```
docker network create network_default
```
- to run docker images execute command

```
docker-compose up -d
```

- to run docker images execute command

```
docker-compose up -d
```

### PHP CLI

Go inside the container you need

`docker exec -it test-project_php-fpm_1 bash`

Execute commands you need

__Composer__

`composer install`

__Database migrations__

`php bin/console d:m:m`

__Installing assets__

`php bin/console assets:install`

__Symfony__

`php bin/console cache:clear`

### Go to `http://localhost/api/docs`

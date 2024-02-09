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





# Some notes
I decided to deviate a little from the requirements and optimize them. I have ruled out the possibility of duplicate sha1 values. Since this is a hash, it means it acts as an identifier. The probability of the same value for different strings, although very small, does exist. Therefore, I catch exception and handling the exception at the time of recording. Thus, there is no need to add the “collisions” array - one value is always returned. On top of that, I used the api platform and received standardized responses when making requests to create/get a resource.


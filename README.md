# CHANEL_quyhbn

PMU phone project

## Getting Started

### Prerequisites

Please install 

- [Docker (recommend)](docker.com)
- [Xampp  (optional)](https://www.apachefriends.org/index.html)
- [Lamp   (optional)](https://www.digitalocean.com/community/tutorials/how-to-install-linux-apache-mysql-php-lamp-stack-on-ubuntu-16-04)

### Installing

This is steps to setup in docker

- Build docker image

```
cd {project_dir}
docker-composer up -d
```

- Install and setup project

```
docker-compose exec app bash
composer install
docker-compose exec -it <branch>
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan passport:install
```

## Deployment


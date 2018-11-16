FROM nanoninja/php-fpm:7.2
MAINTAINER Alex Moreno <alex.moreno.costa@gmail.com>
COPY . "/app"
WORKDIR "/app"
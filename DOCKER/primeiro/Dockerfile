# para criar o container será ultlilizado a imagem 'php:7.4-apacha'
FROM php:7.4-apache

# o comando 'docker-php-ext-install' instalará as extensões pdo e pdo_mysql
RUN docker-php-ext-install pdo pdo_mysql

# copiando o conteúdo de 'www' para dentro do container
COPY www/ /var/www/html
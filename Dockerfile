FROM php:8.2-apache

# Instala o Composer dentro do container
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Instala extensões de sistema necessárias
RUN apt-get update && apt-get install -y unzip zip git

# Copia os arquivos do projeto para o container
COPY . /var/www/html/

# Define a pasta de trabalho
WORKDIR /var/www/html/

# Executa a instalação dos pacotes do Composer
RUN composer install --no-dev --optimize-autoloader

EXPOSE 80
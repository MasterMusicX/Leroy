# Imagen base con PHP 8.2 y Apache
FROM php:8.2-apache

# Activar el módulo mod_rewrite (útil para URLs limpias)
RUN a2enmod rewrite

# Instalar extensiones necesarias para trabajar con bases de datos
RUN docker-php-ext-install pdo pdo_mysql

# Establecer el directorio de trabajo dentro del contenedor
WORKDIR /var/www/html

# Copiar los archivos del proyecto (opcional si ya usas un volumen en docker-compose)
COPY ./src /var/www/html

# Asignar permisos adecuados
RUN chown -R www-data:www-data /var/www/html

# Exponer el puerto 80 del contenedor
EXPOSE 80
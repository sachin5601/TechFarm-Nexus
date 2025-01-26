# Use an official PHP image with Apache
FROM php:8.2-apache

# Copy application files to the working directory
COPY . /var/www/html/

# Set permissions for the working directory
RUN chown -R www-data:www-data /var/www/html

# Install any necessary PHP extensions (optional)
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Expose port 80 for the Apache server
EXPOSE 80

# Start the Apache server
CMD ["apache2-foreground"]

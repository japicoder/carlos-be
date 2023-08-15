1. Instalar PHP y MySQL
   * ``sudo apt install -y \
      php \
      bzip2 \
      curl \
      mysql-client \
      php-cli \
      php-curl \
      php-gd \
      php-mbstring \
      php-mysql \
      php-xml \
      php-zip \
      php-intl``
    * ``sudo apt install mariadb-server``
    * más info sobre MaríaDB [aquí](https://www.digitalocean.com/community/tutorials/how-to-install-mariadb-on-ubuntu-20-04) 
2. Instalar Composer
   * ``curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin/ --filename=composer --version=2.5.8``
3. Instalar el [Symfony CLI](https://symfony.com/download)
4. Setup
   * ``cd carlos-be/``
   * Instalar dependencias ``composer install``
   * Crear la base de datos ``php bin/console doctrine:database:create``
   * Instalar migraciones ``php bin/console doctrine:migration:migrate``
5. Start Backend
   * ``symfony server:start``

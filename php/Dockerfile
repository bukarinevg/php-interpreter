FROM php:8.4-cli

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

WORKDIR /cli/app

COPY . . 

RUN echo "alias execute='php ./index.php'" >> ~/.bashrc

CMD ["php", "-S", "localhost:9000"]

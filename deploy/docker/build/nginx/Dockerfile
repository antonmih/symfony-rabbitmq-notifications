FROM nginx:1.16.0-alpine

COPY ./deploy/templates/default.conf /etc/nginx/conf.d/default.conf

WORKDIR /var/www/symfony
COPY . ./
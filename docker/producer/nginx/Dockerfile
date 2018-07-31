FROM nginx:latest

RUN apt-get update && apt-get install -y \
    htop \
    vim

COPY nginx.conf /etc/nginx/conf.d/default.conf

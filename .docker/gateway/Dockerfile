FROM alpine:3.7

RUN apk --no-cache add \
    curl \
    nginx \
    supervisor

RUN cp /etc/nginx/nginx.conf /etc/nginx/nginx.conf.bkp

COPY nginx/nginx.conf /etc/nginx/nginx.conf

COPY supervisor/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Setup document root
# RUN mkdir -p /var/www/html

# # Make sure files/folders needed by the processes are accessable when they run under the nobody user
# RUN chown -R nobody.nobody /var/www/html && \
#   chown -R nobody.nobody /run && \
#   chown -R nobody.nobody /var/lib/nginx && \
#   chown -R nobody.nobody /var/log/nginx

# # Switch to use a non-root user from here on
# USER nobody

# # Add application
# WORKDIR /var/www/html

EXPOSE 8080

CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]
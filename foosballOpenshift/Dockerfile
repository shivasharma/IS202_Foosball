FROM nginx:alpine

# Copy application files
COPY . /usr/share/nginx/html

# --- Fix permissions for OpenShift ---
# Modify nginx to listen on port 8080 (BEFORE switching to non-root user)
RUN sed -i 's/listen\s\+80;/listen 8080;/' /etc/nginx/conf.d/default.conf \
    # Also update the PID file location to a writable directory
    && sed -i 's|pid\s*/var/run/nginx.pid;|pid /tmp/nginx.pid;|' /etc/nginx/nginx.conf || true

# Create necessary writable directories and make them accessible
RUN mkdir -p /var/cache/nginx /var/run /var/log/nginx /etc/nginx/conf.d \
    && chmod -R g+rwX /var/cache/nginx /var/run /var/log/nginx /var/log /usr/share/nginx/html /etc/nginx/conf.d \
    && chown -R 1001:0 /var/cache/nginx /var/run /var/log/nginx /usr/share/nginx/html /etc/nginx/conf.d

# Switch to a non-root user that OpenShift accepts
USER 1001

# Expose port 8080 (OpenShift routes to non-privileged ports)
EXPOSE 8080

# Start Nginx
CMD ["nginx", "-g", "daemon off;"]
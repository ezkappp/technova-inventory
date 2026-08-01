#!/bin/sh
set -e

# Railway kasih variable $PORT secara dinamis (biasanya beda tiap deploy)
export PORT=${PORT:-8080}

# PENTING: batasi envsubst cuma ke $PORT saja.
# Kalau gak dibatasi, $uri / $document_root / $query_string di config nginx
# ikut ke-substitusi jadi string kosong dan bikin nginx error.
envsubst '${PORT}' < /etc/nginx/templates/default.conf.template > /etc/nginx/conf.d/default.conf

exec supervisord -c /etc/supervisor/conf.d/supervisord.conf

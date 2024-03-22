clear

echo "Iniciando contenedores"

cd ~/Documentos/docker-paranamedio/ && docker-compose up -d --force-recreate --remove-orphans

echo "Contenedores iniciados"

set -v

docker ps --format "table {{.Names}}\t{{.Ports}}\t{{.Status}}"





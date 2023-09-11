#!/usr/bin/env bash

set -e
export $(xargs < ./script.env)
export SCRIPT_CURRENT_DIR=$(pwd)
export SCRIPT_COMPOSE_FILE=${SCRIPT_CURRENT_DIR}/docker-compose.yml

case $1 in
  up)
    docker-compose -f ${SCRIPT_COMPOSE_FILE} -p ${NAME}:${TAG} up --build --force-recreate --remove-orphans --detach
  ;;
  rm)
    docker-compose -f ${SCRIPT_COMPOSE_FILE} -p ${NAME}:${TAG} rm -sfv
  ;;
  exec)
    docker-compose -f ${SCRIPT_COMPOSE_FILE} -p ${NAME}:${TAG} exec $2 ${@:3}
  ;;
  stop|start|restart)
    docker-compose -f ${SCRIPT_COMPOSE_FILE} -p ${NAME}:${TAG} $1
  ;;
  volume)
    docker volume $2 ${NAME}-php-sock
    docker volume $2 ${NAME}-postgres-sock
    docker volume $2 ${NAME}-postgres-data
  ;;
  network)
    docker network $2 ${NAME}
  ;;
  *)
    echo "${0} ${@:1} command not found."
    exit 1
  ;;
esac
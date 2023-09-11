#!/usr/bin/env bash

export NAME='authJwt'
export EMAIL='example@localhost'
export PUBLIC_KEY_PATH="./${NAME}Public.key"
export PRIVATE_KEY_PATH="./${NAME}Private.key"
export PRIVATE_KEY_PUB_PATH="./${PRIVATE_KEY_PATH}.pub"

ssh-keygen -t rsa -b 2048 -m PEM -f ${PRIVATE_KEY_PATH} -C ${EMAIL}
openssl rsa -in ${PRIVATE_KEY_PATH} -pubout -outform PEM -out ${PUBLIC_KEY_PATH}
chmod -R 777 ${PRIVATE_KEY_PATH}
chmod -R 777 ${PUBLIC_KEY_PATH}
rm ${PRIVATE_KEY_PUB_PATH}
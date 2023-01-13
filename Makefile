U_ID = $(shell id -u)
DOCKER_CONTAINER = tennis-challenge_php-fpm_8-1

docker-bash:
	U_ID=${U_ID} docker exec -it --user ${U_ID} ${DOCKER_CONTAINER} bash
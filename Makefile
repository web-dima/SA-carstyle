include docker/.env
export

docker-up:
	docker compose -f docker/docker-compose.yml up -d

docker-down:
	docker compose -f docker/docker-compose.yml down

boot:
	make docker-up
	docker exec -it docker-mysql-1 mysql -uroot -p${MYSQL_ROOT_PASSWORD} < /root/dump.sql

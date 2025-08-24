include docker/.env
export

docker-up:
	docker compose up -d

docker-down:
	docker compose down

boot:
	make docker-up
	docker exec -it docker-mysql-1 mysql -uroot -p${MYSQL_ROOT_PASSWORD} < ./dump.sql
docker-compose -f ./setup/docker-compose.yml up -d

docker cp ./setup/script/db.cql setup_cassandra-seed_1:/opt/cassandra
docker exec -it setup_cassandra-seed_1  opt/cassandra/bin/cqlsh -f /opt/cassandra/db.cql

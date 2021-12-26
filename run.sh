#!/bin/sh
cd docker/
# load .env variables
echo "\nLoad '.env'."
if [ -f .env ]
then
  export $(cat .env | xargs)
fi

echo "\nDocker Containers build start."
docker-compose build --no-cache \
&& docker-compose up -d \

echo "\n\033[43m\033[1;30mWaiting for mysql connection...\033[0m"
echo "Note: this operation is to make sure that mysql is ready to can run the database migrations."
while ! docker exec xproduct-database mysql --user=root --password=root -e "SELECT 1" >/dev/null 2>&1; do
    sleep 1
done
echo "\e[32mMySQL is ready.\033[0m"

echo "Docker Containers build completed.\n"

echo "\nComposer intstall start."
docker exec -it xproduct-app composer install
echo "Composer intstall completed.\n"

echo "\nMigration start."
docker exec -it xproduct-app php artisan migrate
echo "Migration completed.\n"

echo "\n\n"
echo "\t\t\t\033[43m\033[1;30mApp Domain: \033[0m \033[1;33m http://localhost:$WEB_SERVICE_PORT \033[0m"
echo "\t\t\t\033[43m\033[1;30mPHPMyAdmin: \033[0m \033[1;33m http://localhost:$PMA_SERVICE_PORT \033[0m"
echo "\n\n"



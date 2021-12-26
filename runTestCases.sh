#!/bin/sh
echo "\n\033[43m\033[1;30mRun XProduct Test cases\033[0m \n"
docker exec xproduct-app ./vendor/bin/phpunit
echo "\n\033[43m\033[1;30mTests done.\033[0m \n"

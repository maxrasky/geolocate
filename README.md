####Preparation:
In order to retrieve information from Google Maps API one should provide API_KEY.\
The API_KEY should be set in `.env` file like `KEY=Google_Maps_API_KEY`
(You will find the example in `.env.example` file). You don't have here the `.env` file, it should be created.

####General information:
This is a simple php application that receives options `-l` or `--location` for retrieving the address from Google Maps API.\
The output result will be the php array. \
All stuff is dockerized. So one has to do several steps in order to get working application.

- build docker container via command `docker build --force-rm -t php-cli .`\
one could set any other tag name for a new docker image (here `php-cli` name is provided as example);
- run application in docker container (in case if one created image with tag `php-cli`) with following command:\
`docker run --rm php-cli bin/geolocate -l 'amsterdam'` or \
`docker run --rm php-cli bin/geolocate --location='amsterdam'`

If anything goes wrong in running the command then try to run \
`docker run --rm php-cli php index.php -l 'amsterdam'`

In case of succeeded operation one would get such an answer:
```
Array
(
    [city] => Amsterdam
    [areaLevel2] => Government of Amsterdam
    [areaLevel1] => North Holland
    [country] => Netherlands
)
```

If you want to check different locations in one container created, 
you'll have to run `/bin/sh` command in interactive mode. 
As example `docker run --rm -it php-cli /bin/sh` 
and then inside of the container you could call `bin/geolocate -l 'Whatever value'` several times you want.

# php-interpreter

PHP Functional Interpreter

to run the interpreter, run the following command in the terminal:
```bash
git clone https://github.com/bukarinevg/php-interpreter.git
```

```bash
cd php-interpreter
```

```bash
cd php 
composer install
cd .. 
```

```bash
docker-compose up --build -d
```
```bash	
docker-compose exec -it php-cli  bash
```
```bash	
execute {arg1} {arg2} {arg3}  ...
```

Where {arg1} {arg2} {arg3} ... are the arguments to the command.

You can edit command in the file `./command`

To run test cases:
```bash
docker-compose exec -it php-cli  bash
```
```bash
 vendor/bin/phpunit
```


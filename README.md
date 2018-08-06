Test JWT con Bundle LexikJWTAuthenticationBundle
========================

Symfony 3.4 bundle LexikJWTAuthenticationBundle

#### Variabili d'ambiente
```
cp env.dist .env
```
#### Build e run dei containers
```
./dc up -d
```
Per ulteriori informazioni controllare il readme in `./docker/redme.md`
## Sviluppo

#### Entrare nel container PHP per lo sviluppo
```
./dc enter
composer install
```
#### Creare le chaivi per la generazione del token
```
$ mkdir -p app/config/jwt
$ openssl genrsa -out app/config/jwt/private.pem -aes256 4096
$ openssl rsa -pubout -in app/config/jwt/private.pem -out app/config/jwt/public.pem
```
Il container php è configurato per far comunicare Xdebug con PhpStorm

## Accessi

* `localhost:8080` risponde nginx
* `localhost:8081` phpmyadmin
* All'interno del container PHP, il database è raggiungibile con l'host `servicedb` alla porta `3306`
* All'esterno del container, il database è raggiungibile con l'host `127.0.0.1` alla porta `3307`

## Creare un utente nel db:
```
./sf jwtapp:user:create utente@dominio.it password
```

## Ottenere un token
```
POST http://localhost:8080/app_dev.php/api/login_check
```
Body della chiamata:
```json
{
	"username":"utente@dominio.it",
	"password":"password"
}
```
## Accedere
```
GET http://localhost:8080/app_dev.php/api/hello
```
Passare l'header 
```
Authorization: Bearer [token]
```

Oppure tramite query string:
```
GET http://localhost:8080/app_dev.php/api/hello?token=[token]
```

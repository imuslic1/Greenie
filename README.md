# Laravel Project Setup Guide

## Preduslovi

* PHP (8.4)
* Composer
* [MySQL baza podataka](https://www.apachefriends.org/download.html)
* [Node.js i npm](https://nodejs.org/en/download)
* [Laravel](https://laravel.com/docs/11.x/installation)

### Laravel i Composer install:

#### MacOS
```
/bin/bash -c "$(curl -fsSL https://php.new/install/mac/8.4)"
```
#### Windows
```
# Run as administrator...
Set-ExecutionPolicy Bypass -Scope Process -Force; [System.Net.ServicePointManager]::SecurityProtocol = [System.Net.ServicePointManager]::SecurityProtocol -bor 3072; iex ((New-Object System.Net.WebClient).DownloadString('https://php.new/install/windows/8.4'))
```
#### Linux
```
/bin/bash -c "$(curl -fsSL https://php.new/install/linux/8.4)"
```

## Koraci za pokretanje

### 1. Klonirati repozitorij
```
git clone https://github.com/MMahmutovicc/bestHackathon_garbageCollectori

cd <direktorij-projekta>
```

### 2. Instalirati zavisnosti
```
composer install
npm install
```

### 3. Environment config
```
cp .env.example .env
```

### 4. Migracija baze podataka
```
php artisan migrate --seed
```

Ukoliko ne postoji baza sa nazivom ```besthackathon_garbagecollectori``` na MySQL konekciji biti će ponuđeno pitanje
```Would you like to create it? (yes/no)```.
Upisati ```yes``` za kreiranje baze.

### 5. Dodavanje admin računa (Opcionalno)
Pokrenuti:
```
php artisan add:admin
```
i pratiti dalje korake u terminalu


### 6. Pokretanje aplikacije
```
php artisan serve
```

Aplikacija će biti dostupna na adresi: ```http://127.0.0.1:8000```.
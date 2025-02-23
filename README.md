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

### 3. Generisati app key
```
php artisan key:generate
```

### 4. Environment config
```
cp .env.example .env
```

### 5. Migracija baze podataka
```
php artisan migrate --seed
```

#### Očekivana konfiguracija baze je:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=besthackathon_garbagecollectori
DB_USERNAME=root
DB_PASSWORD=
```

Ukoliko ne postoji baza sa nazivom ```besthackathon_garbagecollectori``` na MySQL konekciji biti će ponuđeno pitanje
```Would you like to create it? (yes/no)```.
Upisati ```yes``` za kreiranje baze.

### 6. Dodavanje admin računa (Opcionalno)
Ukoliko želite kreirati admin račun, pokrenuti:
```
php artisan admin:add
```
i pratiti dalje korake u terminalu.


### 7. Pokretanje aplikacije
```
php artisan serve
```

Aplikacija će biti dostupna na adresi: ```http://127.0.0.1:8000```.


# O našoj aplikaciji

## Ciljevi

### Motivisanje promjene u ponašanju
* Manje CO₂ emisije kroz tokenizaciju ekološki odgovornog ponašanja
* Motivacija za odabir održivih alternativa za svakodnevne aktivnosti

### Skalabilnost i primjenjivost
* Rješenje primjenjivo u mnogim sektorima i oblastima
* Jednostavno i pravovremeno nagrađivanje odgovornog ponašanja

## Rješenje

### Nagrade za odgovornost
* Biranje ekološki osviještenih aktivnosti i alternativa se nagrađuje tokenima

### Kumulativni efekt
* Malim pojedinačnim doprinosima jedna zajednica pravi veliki kumulativni učinak u svojoj okolini

### Leaderboard
* Prijatelji i organizacije se mogu rangirati i takmičiti u svojim rezultatima

### Uvid u rezultate
* Pojedinci mogu da jasno vide pozitivan učinak koji imaju svojim aktivnostima i odlukama

## Naredni koraci

### Povratne informacije
Vaša mišljenja su ključna u daljem razvoju sistema i prilagođavanju potrebama tržišta!

### Dalji razvoj
Trenutni MVP je tek prvi korak u procesu razvoja stvarnog sistema. Da bi sistem opstao u dinamičnom tržištu, potrebno je raditi na njegovom razvoju!

### Finansiranje i podrška
Dalji razvoj nije moguć bez finansiranja i podrške od zainteresiranih strana te je ovo prvi i možda najbitniji korak

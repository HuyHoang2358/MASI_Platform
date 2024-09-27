# MASI WEBSITE

## 1.Installation
- Clone code
  ```commandline
    git clone https://github.com/HuyHoang2358/MASI_Platform.git
  ```
- Cd to website folder
    ```commandline
      cd website
    ```
- Install requirements php dependencies
    ```commandline
      composer install
      composer update
    ```
- Install node dependencies
    ```commandline
      npm install
      npm run build
    ```
- Create .env file
    ```commandline
      cp .env.example .env
    ```
- Generate key
    ```commandline
      php artisan key:generate
    ```
- Create database and config `.env` file
- Init SQL from file `masi_db.sql`
- Add domain `masiweb.th` trong openserver
- Clear cache
    ```commandline
      php artisan optimize
    ```
## 2. Documents:
- Admin theme: https://github.com/HuyHoang2358/Frontend_Templates/tree/main/Enigma%20v1.0.5
      

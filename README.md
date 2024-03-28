<p align="center">
    <img src="https://via.placeholder.com/400x150?text=Thiria+Logo" width="400" alt="Thiria Logo">
</p>

<p align="center">
    <a href="https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html">
        <img src="https://img.shields.io/badge/License-GPL_v2-blue.svg" alt="License">
    </a>
</p>


## About Thiria

Thiria is a web application designed for enthusiasts of fantasy worlds and creative expression, that allows for creating custom creatures.

## Run Locally

Clone the project

```bash
  git clone https://github.com/sikoramodra/Thiria
```

Go to the project directory

```bash
  cd Thiria
```

Create proper `.env` file

```bash
  cp .env.sample .env
```

Install dependencies

```bash
  composer i
  npm i
```

Generate keys

```bash
  php artisan key:generate
```

Migrate the database

```bash
  php artisan migrate:fresh --seed
```

Run the project

```bash
  npm run dev
  php artisan serve
```

And go to http://localhost:8000/


## License

The Thiria is open-source software licensed under the [GPL v2 license](https://opensource.org/license/gpl-2-0/).

Taller SCZ-login

Segundo Examen Parcial 

<img width="1929" height="1332" alt="imagen" src="https://github.com/user-attachments/assets/7f4b5ddf-29c4-426b-a9ea-30c74e3cf5a9" />

## Stack

- Laravel 13 / PHP 8.3
- MySQL
- Bootstrap 5 (CDN)

## Instalación

composer install
cp .env.example .env
php artisan key:generate


Configurar en `.env` la conexión a MySQL:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=taller_examen
DB_USERNAME=root
DB_PASSWORD=
```

Ejecutar migraciones y seeders:


php artisan migrate
php artisan db:seed


Levantar el servidor:


php artisan serve


## Usuarios de prueba

Creados por `database/seeders/DatabaseSeeder.php` con contraseña hasheada mediante `Hash::make()`:

| Nombre       | Email             | Contraseña   |
|--------------|-------------------|--------------|
| Juan Perez   | juan@taller.com   | password123  |
| Maria Lopez  | maria@taller.com  | password123  |

## Funcionalidad implementada

- **Autenticación manual**: `AuthController` usa `Auth::attempt()`, regenera la sesión al iniciar sesión (`$request->session()->regenerate()`) e invalida/regenera el token CSRF al cerrar sesión.
- **Pantalla inicial**: `/` redirige a `/login` si no hay sesión, o a `/servicios` si el usuario ya está autenticado. `welcome.blade.php` no se utiliza.
- **Middleware**: rutas `login` bajo el grupo `guest`; rutas `servicios` y `vehiculos` (y `logout`) bajo el grupo `auth`.
- **Módulo Servicios**: modelo `Servicio` (`belongsTo User`), migración con los campos requeridos, `ServicioController@index/create/store`. El `user_id` se asigna siempre desde `auth()->id()` en el servidor; el formulario no lo solicita ni lo acepta.

## Pruebas de funcionamiento

Se probó el flujo completo levantando el servidor (`php artisan serve`) y ejecutando peticiones reales con `curl` (manteniendo cookies de sesión), simulando la interacción de un navegador.

Acceso sin autenticación a `/` y a `/servicios` → redirige a Login**

```
GET /            -> 302 -> http://127.0.0.1:8000/login
GET /servicios   -> 302 -> http://127.0.0.1:8000/login
```
Login con credenciales incorrectas → muestra mensaje de error**

```
POST /login (juan@taller.com / incorrecta) -> 302 -> /login
GET /login (siguiente request) contiene:
  <div class="invalid-feedback">Las credenciales proporcionadas no coinciden con nuestros registros.</div>
```

Login con credenciales correctas (usuario 1) → redirige a Servicios**

```
POST /login (juan@taller.com / password123) -> 302 -> http://127.0.0.1:8000/servicios
```

Login con credenciales correctas (usuario 2) → funciona igualmente

```
POST /login (maria@taller.com / password123) -> 302 -> http://127.0.0.1:8000/servicios
```

. Creación de un servicio autenticado como Juan Perez

```
GET  /servicios/create -> 200
POST /servicios (nombre=Cambio de aceite, precio=150.50, duracion_estimada=45, estado=Pendiente)
     -> 302 -> http://127.0.0.1:8000/servicios
```

 La tabla de Servicios muestra el registro con el propietario correcto**

```
GET /servicios (autenticado) -> 200
Contiene:
  <td>Cambio de aceite</td>
  <td>Bs 150.50</td>
  ...
  Juan Perez   <!-- $servicio->user->name -->
```

. Logout destruye la sesión y regresa al Login

```
POST /logout -> 302 -> http://127.0.0.1:8000/login
GET /servicios (con la cookie de sesión ya cerrada) -> 302 -> http://127.0.0.1:8000/login
```

Con esto se confirma: el login es la pantalla, existen dos usuarios que pueden iniciar sesión de forma independiente, los servicios se registran en mysql asociados al usuario autenticado sin recibir `user_id` del formulario


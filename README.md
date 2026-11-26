# Pintura Lab

Aplicación web de venta de pinturas y accesorios (brochas, rodillos y afines).
Proyecto formativo SENA ADSO - Evidencia GA7-220501096-AA2-EV02.

## Módulo desarrollado: Administración de categorías

El administrador puede crear, listar, buscar, editar y eliminar las categorías de productos
(por ejemplo: pinturas para interiores, para exteriores, a base de agua, de aceite, especiales).

- Formularios HTML con método **GET** (búsqueda por nombre) y **POST** (crear, actualizar y eliminar).
- Validaciones: nombre obligatorio, mínimo 3 caracteres, sin repetir y descripción de máximo 255 caracteres.

## Tecnologías

- Laravel (PHP), plantillas Blade, MySQL.
- Git y GitHub para el versionamiento.

## Requisitos

- PHP y Composer
- MySQL (por ejemplo con XAMPP)
- Git

## Cómo ejecutarlo

1. Descargar el proyecto:
   git clone https://github.com/dailinvanesa12/pintura-lab.git
   cd pintura-lab
2. Instalar las dependencias:
   composer install
3. Crear el archivo de configuración:
   copy .env.example .env
   php artisan key:generate
4. Encender MySQL (en XAMPP, botón Start) y crear las tablas:
   php artisan migrate
   (si pregunta por crear la base de datos, responder yes)
5. Iniciar el servidor:
   php artisan serve
6. Abrir en el navegador:
   - Inicio: http://127.0.0.1:8000/inicio
   - Categorías: http://127.0.0.1:8000/categorias

## Rutas del módulo

| Método | Ruta | Acción |
|---|---|---|
| GET | /categorias | Listar y buscar (`?buscar=`) |
| GET | /categorias/crear | Formulario de nueva categoría |
| POST | /categorias | Guardar categoría |
| GET | /categorias/{id}/editar | Formulario de edición |
| PUT | /categorias/{id} | Actualizar categoría |
| DELETE | /categorias/{id} | Eliminar categoría |

## Integrantes

- Dailin Alvarado
- Samuel Suarez Peña
- Jessika Cotes Bravo
- 

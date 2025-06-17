# Comandos php artisan make:migration

php artisan make:migration create_aulas_table
php artisan make:migration create_materias_table
php artisan make:migration create_reservas_table
php artisan make:migration create_horarios_table
php artisan make:migration create_cortinas_table
php artisan make:migration create_aires_acondicionados_table

php artisan make:migration create_muebles_table
php artisan make:migration create_proyectores_table
php artisan make:migration create_focos_table
php artisan make:migration create_muebles_table
php artisan make:migration create_proyectores_table

# Pasos para el CRUD
1. Rutas web.php
2. AulaController.php
3. Ejemplo vista 
4. Similar estructura para create/index/edit/show.blade.php y dentro de la carpeta el /partials/from.blade.php 

# problemas tablas
DELETE FROM migrations WHERE id = 15;
DROP TABLE tabla;
php artisan migrate:fresh

# Para volver a crear la base de datos en blanco en windows desde el directorio raiz del proyecto
powershell New-Item -Path .\database\database.sqlite -ItemType File -Force

# Verificar rutas
php artisan route:list --name=aulas

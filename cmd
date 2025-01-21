vamos a crear gestion para una empresa que tiene tres Pastelerias queremos promocionar las tres tiendas con una maravillosa presentacion de sus instalaciones y sus productos que son pasteles, tartas , helados . A mayores la emrpesa presta un servicio de envio de desayunos de varios tipos segun la ocasion , dia de la madre, padre, etc ... en laravel . 
-crea la base de datos 
-crea  modelos para empresa , pasteleria, servicios, productos , tipos de producto, desayunos ,tipos de desayunos
Cada pasteleria tiene sus propios productos y precios  . una ubicacion diferente , fotos y una descripcion y tiutulares distintos. crea modelos y migraciones ppara gestionar cada pasteleria .
-Factorias usando faker libray and laravel facke() helper y no $this->faker
-Seeders para una pasteleria con 10 productos de cada tipo que son  pasteles , helados, tartas, desayunos.

# RESULTADO 

Para ejecutar todo esto:
Crea la base de datos 'pastelerias_db'
Ejecuta las migraciones:
seed
Esto creará:
Una compañía
Tres pastelerías
Cuatro tipos de productos (Pasteles, Tartas, Helados, Desayunos)
10 productos de cada tipo para cada pastelería (120 productos en total)
¿Necesitas ayuda con algo más específico?

Los productos pueden tener mas de una imagen , valora en utilizar libreria media spatie 

Hay dos tipos de usuarios administrador y clientes que solo puede registararse y pedir desayunos 


## instalamos filament 
composer require filament/filament:"^3.2" -W
 
php artisan filament:install --panels

# 2- 
-generar filament resource para company, bakery,bakery_images,  product y product_type .los productos tambien pueden tener varias imagenes 

## resultado 

Para generar los recursos en Filament, ejecuta:
php artisan make:filament-resource Company --generate
php artisan make:filament-resource Bakery --generate
php artisan make:filament-resource ProductType --generate
php artisan make:filament-resource Product --generate


Esto creará la estructura básica de los recursos, y luego puedes reemplazar el contenido con el código que te proporcioné arriba.
Los recursos incluyen:
Gestión de imágenes para productos y pastelerías
Relaciones entre modelos
Campos de formulario apropiados para cada tipo de dato
Tablas con búsqueda y ordenamiento
Acciones para crear, editar y eliminar registros
¿Necesitas ayuda con algo más?

## correcion 
falta el seeder para productos e imagenes y completar correctamente los resources generados con las relationship correctas 




php artisan make:filament-relation-manager CompanyResource bakeries name
php artisan make:filament-relation-manager BakeryResource products name
php artisan make:filament-relation-manager BakeryResource images image_path
php artisan make:filament-relation-manager ProductResource images image_path



## correcion 
realiza los siguiente cambios 
 las imagenes de bakery tambien tienen que tener un titulo y una descripcion , añade estos campos y cambia los seeder tambien.

- El campo logo de company se tiene que poder subir una imagen .
- Desde products resource se tiene que poder dar de alta product_type 
Estos cambios proporcionan:
Título y descripción para las imágenes de las pastelerías
Subida de imágenes para el logo de la compañía
Capacidad para crear nuevos tipos de productos directamente desde el formulario de productos
Interfaz mejorada para la gestión de imágenes



las pastelerias dan un servicio de envio de desayunos a domicilio a clientes registrados . Cada desayuno tiene sus propios ingredientes y los ingredientes pueden contenger alergenos , tanto desayunos como ingredientes como alergenos pueden contener fotos . Hay varios tipos desayunos (dulces, salados) cada desayuno tiene una descripcion unas fotos y un precio . A mayores se incrementan en funcion del codigo postal y los km que hay a destino .
Genera los modelos correspondientes, las factorys , los seeders para cada uno de ellos y los filament resources correspondientes con sus relacciones .

*te ayudo a crear toda la estructura para el sistema de desayunos. Primero crearemos los modelos y migraciones:
Modelos y Migraciones:


*CContinuaré con los Factories, Seeders y Filament Resources en la siguiente respuesta para mantener el código organizado. ¿Te parece bien esta estructura inicial?

* ontinuaré con más Filament Resources en la siguiente respuesta para mantener el código organizado. ¿Te parece bien hasta aquí?

* Voy a crear los archivos necesarios para el BreakfastTypeResource y luego continuaré con los demás recursos.
Primero, las páginas del BreakfastTypeResource:

*Con esto hemos completado:
AllergenResource con sus páginas y RelationManager
DeliveryZoneResource con sus páginas
Toda la estructura para gestionar desayunos, ingredientes, alérgenos y zonas de entrega
¿Necesitas algún ajuste o quieres que añada alguna


# correcion dos 

databaseeder esta muy liado , crea los seeder corresondientes para cada uno de los modelos y añadelos al databaseeder en el orden correcto sin omitir ninguno 

Esta estructura es más limpia y mantenible, ya que:
Cada seeder tiene su propia responsabilidad
El orden de ejecución está claramente definido
Las dependencias entre modelos están respetadas
Es más fácil modificar o deshabilitar partes específicas
El código es más legible y organizado

* faltan seeder 

hora el DatabaseSeeder está completo con todos los seeders necesarios y en el orden correcto:
ProductTypeSeeder - Crea los tipos de productos
BakerySeeder - Crea las pastelerías y sus imágenes
ProductSeeder - Crea los productos y sus imágenes para cada pastelería
BreakfastTypeSeeder - Crea los tipos de desayunos
AllergenSeeder - Crea los alérgenos
IngredientSeeder - Crea los ingredientes y los relaciona con alérgenos
7. BreakfastSeeder - Crea los desayunos con sus ingredientes e imágenes
DeliveryZoneSeeder - Crea las zonas de entrega
Cada seeder es independiente y tiene una única responsabilidad, lo que hace el código más mantenible y fácil de entender.


# Pedidos desayunos 


-hay dos tipos de usuarios admin y clientes que estos solo pueden pedir desayunos desde la aplicacion previo registro , para el registro es necesario nombre, telefono , direccion , recibir un email y confirmar este por el cliente.



Los recursos de Filament para administrar pedidos
El sistema de autenticación para clientes
Las notificaciones por email para verificación
Las vistas para que los clientes realicen pedidos



*añade a la direccion codigo postal , poblacion y provincia , la cantidad a solicitar por desayuno es 1 , si se añaden mas cantidades tendra un precio menor por cada persona añadida. 

** Dirección desglosada para mejor organización y validación
Sistema de descuentos por cantidad automático
Cálculo automático de precios con descuento
Atributos computados para mostrar direcciones completas
¿Quieres que continúe con los recursos de Filament para administrar estos modelos o prefieres que me centre en el sistema de autenticación y registro de clientes?

*crea factories , seeders para los nuevos modelos , 5 ordenes con 1 desayuno y varias personas 


** 5 clientes
5 órdenes, cada una con:
Un cliente diferente
El mismo desayuno pero diferentes cantidades (1, 3, 5, 8 y 12 personas)
Descuentos automáticos según la cantidad:
1-2 personas: sin descuento
3-4 personas: 5% descuento
5-9 personas: 10% descuento
10+ personas: 15% descuento
# Creando un CRUD para profesores
## Creamos el ecosistema
```bash
php artisan make:model Profesor --all
```
**Esto crea los siguientes elementos**
* Migración (Crear las tablas)
* Factorias (Generar los datos que vamos a crear)
* Seeder (Invocar a la factoría de un modelo e insertar los valores en la tabla)
* Controlador (Los métodos que voy a ejecutar ante solicitudes)
* Modelo (Clase para interactuar con una tabla concreata de la base de datos y hacer acciones típicas como insertar, borrar, consultar, y actualizar)
* Request (Autoriza y valida los datos del formulario)
* Policy (Políticas que definiran accesos)
* Rutas (Hay que crearlas y dirán que recursos ofrece mi aplicación)

## Ajustar los valores por defecto:
1. Vamos a la migración y cambimos de profesors a profesores
2. Vamos a models y en el archivo Profesor.php especificamos:
```php
user HasFactory;
protected $table="profesores"
```

Tablas:
* nombre
* apellido
* email
* departamento

## Factoria de profesores:
```php
$departamento = ["Informáica","Comercio","Imagen"];
return[
'nombre'=>fake()->nombre(),
'apellido'=>fake()->lastName(),
'email'=>fake()->email(),
'departamento'=>fake()->randomElement($departamento),
];
```
## Cramos las rutas
Vamos al fichero de rutas y agregamos para poder tener el get, delete...:
```php
Route::resource("profesores", ProfesorController::class);
```
Y arriba añadimos la ruta:
```php
use \App\Http\Controllers\ProfesorController;
```
En el archivo de la carpete migrations, añadimos lso parametros que queremos que tenga nuetra tabla, los cuales hmos especificado previamente en el archivo "PrefosrFactory.php"

En el archivo "ProfesorSeeder.php" tenemos que especificar cuantas columnas queremos que nos genere:
```php
public function run(): void
{
    Profesor::factory()->count(50)->create();
}
```
Y decirle en el DatabaseSeeder.php que coja la función que hemos creado:
```php
public function run(): void
{
    $this->call([
        AlumnoSeeder::class
        ProfesorSeeder::class
    ]);
}
```

```php
Schema::create('profesores', function (Blueprint $table) {
    $table->id();
    $table->string('nombre');
    $table->string('apellidos');
    $table->string('email');
    $table->string('departamento');
    $table->timestamps();
});
```

En el archivo "StoreProfesorRequest.php" tendremos que añadir:
```php
public function authorize(): bool
{
    return true;
}
```
Y esto para hacer que el nombre... tengan unos requerimientos
```php
public function rules(): array
{
return [
        "nombre"=>"required|min:3",
        "apellidos"=>"required|min:5",
        "departamento"=>"required",
        "email"=>"email|required|unique:profesores",
    ];
}
```

## Creamos la tabla y Poblamos la tabla

## Idiomas tabla alumnos:
```bash
php artisan make:model Idioma --all
```
En el archivo de las migraciones añadimos los idiomas:
```php
Schema::create('idiomas', function (Blueprint $table) {
    $table->id();
    $table->string("idiomas");
    $table->foreignId("alumno_id")->constrained()->cascadeOnDelete();
    $table->timestamps();
});
```
```bash
php artisan migrate
```
En el archivo seeder del alumno deberemos de añadir el models "Idioma" y los idiomas que queremos poner en nuestra base de datos:
```php
use App\Models\Idioma;

class AlumnoSeeder extends Seeder{

    private function get_idiomas(): array{
    $idiomas = ["Francés", "Inglés", "Alemán", "Ruso", "Rumano", "Portugués",
        "Catalán", "Gallego", "Fabla", "Vasco", "Italiano", "Chino"];
    $idiomas_hablados = [];
    $numero_idiomas = rand(0, 4);
    if ($numero_idiomas == 0)
        return [];
    $posiciones_idiomas = array_rand($idiomas, $numero_idiomas);
    dump ($posiciones_idiomas);
    if (!is_array($posiciones_idiomas))
        $idiomas_hablados[] = $idiomas[$posiciones_idiomas];
    else
        foreach ($posiciones_idiomas as $pos)
            $idiomas_hablados[] = $idiomas[$pos];
    return $idiomas_hablados;
}
    public function run(): void{
        Alumno::factory()->count(50)->create()->each(function ($alumno) {
            $idiomas_hablados = $this->get_idiomas();
            foreach ($idiomas_hablados as $idioma_hablado) {
                $idioma = new Idioma();
                $idioma->idioma = $idioma_hablado;
                $idioma->alumno_id = $alumno->id;
                $idioma->save();
            }
        });
    }
}
```
Vamos al controlador de alumno:
```php
public function index()
{
    $alumnos = Alumno::paginate(10);
    return view("alumnos.listado", ["alumnos" => $alumnos]);
}
```
Lo utilizamos para que solo aparezcan 5 alumnos
Vamos a la página de listado.blade de alumnos:
```php
{{$alumnos->links()}}
```

```bash
php artisan vendor:publish --tag=laravel-pagination
```
Vistas para la paginación
```php
{{$alumnos->links('vendor.pagination.nuestraPágina')}}
```

Al borrar un alumno debemos poner en el controlador:
```php
public function destroy(Alumno $alumno)
{
    $alumno->delete();
    $alumnos = Alumno::paginate(5);
    return back();
}
```
# Otros:
## Archivo Docker-compose.yaml:
```yaml
version: "3.8"
services:
  mysql:
    image: mysql
    volumes:
      - ./datos:/var/lib/mysql
    ports:
      - ${DB_PORT}:3306
    environment:
      - MYSQL_DATABASE=${DB_DATABASE}
      - MYSQL_USER=${DB_USERNAME}
      - MYSQL_PASSWORD=${DB_PASSWORD}
      - MYSQL_ROOT_PASSWORD=${DB_PASSWORD_ROOT}
  phpmyadmin:
    image: phpmyadmin
    ports:
      - ${DB_PORT_PHPMYADMIN}:80
    environment:
      - PMA_HOST=mysql
      - PMA_ARBITRARY=1
    depends_on:
      - mysql
```
En este archivo indicamos los servicios que vamos a utilizar (mysql y phpmyadmin en este caso), con su imagen propia, el puerto que vamos a utilizar y donde lo vamos a alamacenar.
> [!NOTE]
> Lo que ponemeos en "enviroment" debemos especificarlo previamente en el archvio .env
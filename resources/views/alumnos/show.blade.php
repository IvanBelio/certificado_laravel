<x-layouts.layout>

<div class=" flex flex-col justify-center items-center p-5 ">
    <div class="card w-1/3 bg-gray-100 text-black flex items-center justify-center">
        <div class="card-body">
            <h2 class="card-title">Datos del alumno</h2>
            <div class="grid grid-cols-3 gap-3 ">
                {{--Primera columna--}}
                <div>
                    <fieldset class="border border-2">
                        <label for="">Nombre</label>
                        {{$alumno->nombre}}
                        <label for="">Apellidos</label>
                        {{$alumno->apellidos}}
                        <label for="">Dirección</label>
                        {{$alumno->direccion}}
                    </fieldset>
                </div>
                {{--Segunda columna--}}
                <div>
                    <label for="">Teléfono</label>
                    {{$alumno->telefono}}
                    <label for="">Email</label>
                    {{$alumno->email}}
                </div>

                {{--Tercera columna--}}
                <div>
                    <fieldset>
                        <legend>Idiomas que habla {{$alumno->nombre}}</legend>
                        @foreach($alumno->idiomas as $idioma)
                            <h2>{{$idioma->idioma}}</h2>
                        @endforeach
                    </fieldset>
                </div>
            </div>
            <div class="card-actions justify-end">
                <button class="bg-transparent text-black hover:bg-black hover:text-white hover:ring-4 hover:ring-blue transition duration-300 ease-in-out py-2 px-4 border border-black rounded">Volver</button>
            </div>
        </div>
    </div>
</div>

</x-layouts.layout>
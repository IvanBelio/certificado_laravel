<x-layouts.layout>
    <div class="h-full flex justify-center items-center">
        <form action="/alumnos/{{$alumno->id}}" method="post"
              class="w-1/3 bg-white p-5 border-blue-500 space-y-10 border-2 rounded-3xl ">
            @csrf
            @method('PUT')
            <input type="text" value="{{$alumno->nombre}}" name="nombre" placeholder="Nombre"
                   class="input input-bordered input-info w-full max-w-xs text-xl"/>
            <input type="text" value="{{$alumno->apellidos}}" name="apellidos" placeholder="Apellidos"
                   class="input input-bordered input-info w-full max-w-xs text-xl"/>
            <input type="text" value="{{$alumno->direccion}}" name="direccion" placeholder="Dirección"
                   class="input input-bordered input-info w-full max-w-xs text-xl"/>
            <input type="text" value="{{$alumno->telefono}}" name="telefono" placeholder="Teléfono"
                   class="input input-bordered input-info w-full max-w-xs text-xl"/>
            <input type="text" value="{{$alumno->email}}" name="email" placeholder="Email"
                   class="input input-bordered input-info w-full max-w-xs text-xl"/><br>
            <input class="btn btn-outline btn-primary" type="submit" value="Editar">
        </form>
    </div>
</x-layouts.layout>

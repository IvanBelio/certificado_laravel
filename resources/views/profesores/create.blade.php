<x-layouts.layout>
    {{$errors}}
    <div class="min-h-full flex justify-center items-center">
        <form action="/profesores"  method="post" class="h-65vh w-1/3 bg-white p-5 border-blue-500 space-y-10 border-2 rounded-3xl justify-center items-center">
            @csrf
            <input type="text" name="nombre" placeholder="Nombre" class="input input-bordered input-info w-full max-w-xs text-xl" />
            @foreach($errors->get('nombre') as $error)
                <div class="text-sm text-red-600">
                    {{$error}}
                </div>
            @endforeach
            <input type="text" name="apellidos" placeholder="Apellidos" class="input input-bordered input-info w-full max-w-xs text-xl" />
            @foreach($errors->get('apellidos') as $error)
                <div class="text-sm text-red-600">
                    {{$error}}
                </div>
            @endforeach
            <input type="text" name="email" placeholder="email" class="input input-bordered input-info w-full max-w-xs text-xl" />
            @foreach($errors->get('email') as $error)
                <div class="text-sm text-red-600">
                    {{$error}}
                </div>
            @endforeach

            <select name="departamento" id="">
                <option disabled selected >Selecciona dapartamento</option>
                <option value="Informática">Informática</option>
                <option value="comercio">Comercio</option>
                <option value="imagen">Imagen</option>
            </select>
            @foreach($errors->get('departamento') as $error)
                <div class="text-sm text-red-600">
                    {{$error}}
                </div>
            @endforeach
            <input class="btn btn-outline btn-primary" type="submit" value="Crear">
        </form>
    </div>
</x-layouts.layout>

<x-layouts.layout>
    <div class="h-full flex justify-center items-center">
        <form action="{{route('profesores.update', [$profesor->id, 'page'=>$page])}}" method="post" class="w-1/3 bg-white p-5 border-blue-500 space-y-2 border-2 rounded-xl justify-center items-center">
            @csrf
            @method('PUT')
            <x-input-label>nombre</x-input-label><input type="text" value="{{$profesor->nombre}}" placeholder="nombre" class="input input-bordered input-accent input-xs w-full max-w-xs" name="nombre" id=""/>
            <x-input-label>apellidos</x-input-label><input type="text" value="{{$profesor->apellidos}}" placeholder="apellidos" class="input input-bordered input-accent input-xs w-full max-w-xs" name="apellidos" id="">
            <x-input-label>email</x-input-label><input type="text" value="{{$profesor->email}}" placeholder="email" class="input input-bordered input-accent input-xs w-full max-w-xs" name="email" id="">
            <x-input-label>departamento</x-input-label><input type="text" value="{{$profesor->departamento}}" placeholder="departamento" class="input input-bordered input-accent input-xs w-full max-w-xs" name="departamento" id="">
            <input class="btn btn-outline btn-primary text-white" type="submit" value="Actualizar">
        </form>
    </div>
</x-layouts.layout>
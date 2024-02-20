<x-layouts.layout>
    <div class="overflow-x-auto max-h-full">
        <table class="table table-pin-rows">
                <tr>
                    <th>nombre</th>
                    <th>apellidos</th>
                    <th>direccion</th>
                    <th>telefono</th>
                    <th>email</th>
                </tr>
            @foreach($alumnos as $alumno)
                <tr>
                <td>{{$alumno -> nombre}}</td>
                <td>{{$alumno -> apellidos}}</td>
                <td>{{$alumno -> direccion}}</td>
                <td>{{$alumno -> telefono}}</td>
                <td>{{$alumno -> email}}</td>
              </tr>
          @endforeach
        </table>
    </div>
</x-layouts.layout>

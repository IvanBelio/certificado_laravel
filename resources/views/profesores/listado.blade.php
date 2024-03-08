<x-layouts.layout>
     <div class="overflow-x-auto max-h-full">
         @if(session('status'))
             <script>
                 Swal.fire("{{session("status")}}");
             </script>
{{--             <div role="alert" class="alert alert-info" id="alertSession">--}}
{{--                 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-current shrink-0 w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>--}}
{{--                 <span>{{session('status')}}</span>--}}
{{--             </div>--}}
         @endif

         <a href="/profesores/create" class="btn btn-primary w-full text-3xl">Añadir profesor</a>

         <table class="bg-white w-full text-black">
        <tr>
            <th  class="text-center align-middle">Nombre</th>
            <th  class="text-center align-middle">Apellido</th>
            <th  class="text-center align-middle">Email</th>
            <th  class="text-center align-middle">Departamento</th>
        </tr>
        @foreach($profesores as $profesor)
            <tr>
                <th  class="text-center align-middle">{{$profesor->nombre}}</th>
                <th  class="text-center align-middle">{{$profesor->apellidos}}</th>
                <th  class="text-center align-middle">{{$profesor->email}}</th>
                <th  class="text-center align-middle">{{$profesor->departamento}}</th>
                <td>
                    <form action="{{route('profesores.destroy', $profesor->id)}}" method="POST">
                        @csrf
                        @method("DELETE")
                    <button onClick="confirmDelete(event, this)" class="btn bg-transparent hover:bg-black  hover:shadow-red" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-600">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                        </svg>
                    </button>
                    </form>
                </td>
                <td>
                    <a href="{{route('profesores.edit', [$profesor->id, 'page'=>$page])}}" class="inline-block px-4 py-2 border border-black bg-transparent hover:bg-black hover:text-blue-500 hover:shadow-blue-500 transition-colors text-blue-500 rounded-md">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" stroke="currentColor" class="w-6 h-6 text-black">
                            <path fill="#00ccff" d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"/>
                        </svg>
                    </a>
                </td>
            </tr>
        @endforeach
    </table>

    </div>
    <script>
        function confirmDelete(event, button) {
            event. preventDefault();
            Swal.fire({
                title: '¿Estás seguro?',
                text: "No podrás revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, borrarlo!'
            }).then((result) => {
                if (result.isConfirmed) {
                    button.closest('form').submit();
                }
            });
        }
{{--        window.onload = () =>--}}
{{--            setTimeout(() =>--}}
{{--                document.getElementById("alertSession").style.display = "none", 2000);--}}

{{--         window.onload=function()--}}
{{--            setTimeout(function() {--}}
{{--               document.getElementById("alertSession").style.display="none",5000); //setTimeout recibe dos cosas, una función pasado x tiempo--}}
{{--         } --}}

</script>
{{$profesores->links('vendor.pagination.simple-tailwind')}}

</x-layouts.layout>
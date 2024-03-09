
<x-layouts.layout>
    <h1>Listado de Alumnos</h1>
        <div id="react-alumnos" alumnos='@json($alumnos)'></div>
        <hr/>

    <h1>Voya a visualizar el componenre React Saludo</h1>
        <div id="react-saludo"></div>

    <h1>Voya a visualizar el componenre React Numero</h1>
        <div id="react-numero"  numero="{{$n}}"></div>
</x-layouts.layout>
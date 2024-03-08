<header class="bg-gray-800 py-4 flex felx-row items-center justify-between px-8">
    <!-- Elemento 1: Una imagen -->
    <div class="flex items-start w-200">
    <img class="" src="{{asset("images/logo.png")}}" alt="logo">
    </div>

    <!-- Elemento 2: Un texto -->
    <div class="text-white text-4xl font-semibold">
    <h1 class="text-4xl text-white shadow-lg uppercase">Gestión Laravel</h1>
    </div>

    <!-- Elemento 3: Dos botones -->
    <div class="flex items-center space-x-4">
    @guest
        <div class=>
            <a href="login" class = "btn btn-outline btn-accent">Login</a>
            <a  href ="register" class = "btn btn-outline btn-accent">Register</a>
        </div>
    @endguest
    @auth
        <div class="space-x-4">
            <h2 class=" text-white text-2xl">{{auth()->user()->name}}</h2>
            <form action="logout" method="POST">
                @csrf
                <button class=" btn btn-outline btn-accent" type="submit">Logout</button>
            </form>
        </div>
    @endauth
    </div>
</header>

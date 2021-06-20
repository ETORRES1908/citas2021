<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    {{-- CSS para Datatable --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">

    <title>Hello, world!</title>
</head>

<body>
    {{-- Barra de navegación --}}
    <nav class="bg-gray-800" x-data="{open:false}">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <!-- IMAGEN DE LA COMPAÑIA -->
                    <div class="flex-shrink-0 relative h-14 w-14">
                        <img src="/storage/images/Logo.png" alt="">
                    </div>

                    <!-- OPCIONES DE LA BARRA DE NEVEGACIÓN -->
                    <div class="hidden md:block">
                        <div class="ml-10 flex items-baseline space-x-4">

                            {{-- Sin estar loguado --}}

                            {{-- Inicio --}}
                            <a href="{{ route('wellcome.index') }}" class="text-gray-300 hover:bg-blue-500 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                                    Inicio
                            </a>


                            {{-- Solo si estas logueado -------------------}}
                            @auth

                                <a href="{{ route('cita.reserva.index')}}"
                                    class="text-gray-300 hover:bg-green-400 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                                    Reservar citas
                                </a>
                                <a href="{{ route('cita.ver.index')}}"
                                    class="text-gray-300 hover:bg-green-400 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                                    Ver citas
                                </a>

                                @can('horarios.index')
                                    <a href="{{ route('horarios.index')}}"
                                        class="text-gray-300 hover:bg-red-400 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                                        Gestionar Horarios (Doctor)
                                    </a>
                                @endcan
                            @endauth
                        </div>
                    </div>
                </div>

                <!-- PARTE IZQUIERDA DE LA CABEZERA -->
                <div class="hidden md:block">
                    <div class="ml-4 flex items-center md:ml-6">

                        <!-- CUENTA LOGUADA O NO (AUTH) -->

                        <!-- SI LA CUENTA ESTA LOGUEADA -->
                        @auth
                        <!-- BOTON DE NOTIFICACIÓN-->


                        <!-- FOTO DE CUENTA LOGUEADA + OPCIONES-->

                        <!-- FOTO DE LA CUENTA LOGUEADA-->
                        <div class="ml-3 relative" x-data="{open:false}">
                            <div>
                                <!-- BOTON QUE MUESTRA OPCIONES(LA FOTO DE LA CUENTA) -->
                                <button x-on:click="open=true" type="button"
                                    class="max-w-xs bg-gray-800 rounded-full flex items-center text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white"
                                    id="user-menu-button" aria-expanded="false" aria-haspopup="true">

                                    <span class="sr-only">Open user menu</span>
                                    {{-- FOTO DE PERFIL  --}}
                                    <img class="h-8 w-8 rounded-full object-cover"
                                        src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button>
                            </div>

                            <!-- CUADRO DE OPCIONES DE CUENTA LOGUADA-->
                            <div x-show="open" x-on:click.away="open=false"
                                class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                                role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                                tabindex="-1">

                                <!-- OPCIONES DE CUENTA LOGUEADA-->

                                <!-- PERFIL-->
                                <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                    {{ __('Mi perfil') }}
                                </x-jet-dropdown-link>

                                <!-- DASHBOARD-->

                                @can('admin.index')
                                    <x-jet-dropdown-link href="{{ route('admin.index') }}"
                                        :active="request()->routeIs('admin.index')">
                                        {{ __('Dashboard') }}
                                    </x-jet-dropdown-link>
                                @endcan


                                <!-- CERRAR SESION -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-jet-dropdown-link href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                                                                                this.closest('form').submit();">
                                        {{ __('Cerrar sesión') }}
                                    </x-jet-dropdown-link>
                                </form>
                            </div>
                        </div>

                        <!-- SI NO ESTA LOGUADA -->

                        @else
                        <!-- OPCIONES DE CUENTA SIN SER LOGUEADA-->

                        <!-- INICIAR SESION-->
                        <a href="{{ route('login') }}" class="block px-4 py-2 text-sm text-gray-300" role="menuitem"
                            tabindex="-1" id="user-menu-item-1">Loguearse</a>

                        <!-- REGISTRARSE-->
                        @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="block px-4 py-2 text-sm text-gray-300" role="menuitem"
                            tabindex="-1" id="user-menu-item-2">Registrarse</a>
                        @endif
                        @endauth

                    </div>
                </div>

                <!-- MODO CELULAR -->
                <div class="-mr-2 flex md:hidden">

                    <!-- MENU DE CELULAR BOTON -->
                    <button x-on:click="open=true" type="button"
                        class="bg-gray-800 inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white"
                        aria-controls="mobile-menu" aria-expanded="false">

                        <span class="sr-only">Menú</span>
                        <!-- Heroicon name: outline/menu
                        Menu open: "hidden", Menu closed: "block"-->

                        <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" aria-hidden="true">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />

                        </svg>
                        <!-- Heroicon name: outline/x
                    Menu open: "block", Menu closed: "hidden"-->
                        <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- MENU DE CELULAR, MOSTRAR/ESCONDER based on menu state. -->
        <div class="md:hidden" id="mobile-menu" x-show="open" x-on:click.away="open=false">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                <a href="/" class="bg-gray-900 text-white block px-3 py-2 rounded-md text-base font-medium">Inicio</a>

                <a href="#"
                    class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Lista
                    de Horarios</a>
                @auth
                <a href="{{ route('cita.reserva.index')}}"
                    class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Reservar
                    cita</a>

                <a href="{{ route('cita.ver.show',Auth::user()->id)}}"
                    class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Ver
                    citas</a>
                @endauth
            </div>
            <div class="pt-4 pb-3 border-t border-gray-700">

                @auth{{-- Solo si estas logueado --}}
                <div class="flex items-center px-5">

                    <div class="flex-shrink-0">
                        {{-- FOTO DE PERFIL  --}}
                        <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"
                            alt="{{ Auth::user()->name }}" />

                    </div>
                    <div class="ml-3">
                        {{-- NOMBRE  --}}
                        <div class="text-base font-medium leading-none text-white">{{ Auth::user()->name }}</div>
                        {{-- CORREO ELECTRONICO --}}
                        <div class="text-sm font-medium leading-none text-gray-400">{{ Auth::user()->email }}</div>
                    </div>

                    <button
                        class="ml-auto bg-gray-800 flex-shrink-0 p-1 rounded-full text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
                        <span class="sr-only">View notifications</span>
                        <!-- Heroicon name: outline/bell -->
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                    </button>

                </div>
                <div class="mt-3 px-2 space-y-1" style="position: absolute">
                    <!-- OPCIONES DE CUENTA LOGUEADA-->

                    <!-- PERFIL-->
                    <x-jet-dropdown-link  href="{{ route('profile.show') }}">
                        {{ __('Mi perfil') }}
                    </x-jet-dropdown-link>

                    <!-- DASHBOARD-->
                    <x-jet-dropdown-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-jet-dropdown-link>

                    <!-- CERRAR SESION -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-jet-dropdown-link href="{{ route('logout') }}"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('Cerrar sesión') }}
                        </x-jet-dropdown-link>
                    </form>

                    @else
                    <!-- OPCIONES DE CUENTA SIN SER LOGUEADA-->

                    <!-- INICIAR SESION-->
                    <a href="{{ route('login') }}"
                        class="block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700">Loguearse</a>

                    <!-- REGISTRARSE-->
                    @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                        class="block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700">Registrarse</a>
                    @endif
                </div>
                @endauth
            </div>
        </div>

    </nav>

</body>

</html>

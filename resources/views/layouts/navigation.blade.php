<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex justify-between h-16">

            {{-- LOGO --}}
            <div class="flex">

                <div class="shrink-0 flex items-center">

                    <a href="{{ route('dashboard') }}"
                       class="text-xl font-bold text-gray-800">

                        ⚽ Jersey Store

                    </a>

                </div>


                {{-- MENU DESKTOP --}}
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">

                    <a href="{{ route('dashboard') }}"
                       class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium text-gray-700 hover:text-gray-900">

                        Dashboard

                    </a>


                    <a href="{{ route('products.index') }}"
                       class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium text-gray-700 hover:text-gray-900">

                        Produk

                    </a>


                    <a href="{{ route('articles.index') }}"
                       class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium text-gray-700 hover:text-gray-900">

                        Artikel

                    </a>

                </div>

            </div>


            {{-- USER + LOGOUT --}}
            <div class="hidden sm:flex sm:items-center sm:ms-6">

                <div class="text-sm text-gray-600 me-4">

                    {{ Auth::user()->name }}

                </div>


                <form method="POST" action="{{ route('logout') }}">

                    @csrf

                    <button type="submit"
                            class="text-sm text-gray-600 hover:text-gray-900">

                        Logout

                    </button>

                </form>

            </div>


            {{-- MOBILE BUTTON --}}
            <div class="-me-2 flex items-center sm:hidden">

                <button
                    @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100"
                >

                    <svg class="h-6 w-6"
                         stroke="currentColor"
                         fill="none"
                         viewBox="0 0 24 24">

                        <path
                            :class="{
                                'hidden': open,
                                'inline-flex': ! open
                            }"
                            class="inline-flex"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"
                        />

                        <path
                            :class="{
                                'hidden': ! open,
                                'inline-flex': open
                            }"
                            class="hidden"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M6 18L18 6M6 6l12 12"
                        />

                    </svg>

                </button>

            </div>

        </div>

    </div>


    {{-- MOBILE MENU --}}
    <div
        :class="{
            'block': open,
            'hidden': ! open
        }"
        class="hidden sm:hidden"
    >

        <div class="pt-2 pb-3 space-y-1">

            <a href="{{ route('dashboard') }}"
               class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">

                Dashboard

            </a>


            <a href="{{ route('products.index') }}"
               class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">

                Produk

            </a>


            <a href="{{ route('articles.index') }}"
               class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">

                Artikel

            </a>

        </div>


        {{-- MOBILE USER --}}
        <div class="pt-4 pb-3 border-t border-gray-200">

            <div class="px-4">

                <div class="font-medium text-base text-gray-800">

                    {{ Auth::user()->name }}

                </div>

                <div class="font-medium text-sm text-gray-500">

                    {{ Auth::user()->email }}

                </div>

            </div>


            <div class="mt-3 space-y-1">

                <form method="POST" action="{{ route('logout') }}">

                    @csrf

                    <button type="submit"
                            class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">

                        Logout

                    </button>

                </form>

            </div>

        </div>

    </div>

</nav>
@php
    function cekActive($route)
    {
        if ($route == Request::segment(count(Request::segments()))) {
            return 'tabActive';
        }
    }
@endphp
<nav
    class=" dark:bg-gray-900 fixed w-full  top-0 start-0 dark:border-gray-800 backdrop-blur-md bg-slate-800/90 z-[999]  border-b-1 border-slate-700 shadow-md shadow-slate-900">
    <div class="">
        <script src="https://widgets.coingecko.com/gecko-coin-price-marquee-widget.js"></script>
        <gecko-coin-price-marquee-widget locale="en" dark-mode="true" coin-ids=""
            initial-currency="idr"></gecko-coin-price-marquee-widget>
    </div>
    <div class="flex flex-wrap items-center justify-between max-w-screen-xl p-1 px-8 mx-auto">
        <div class="flex items-center gap-5">

            <a href={{ route('index') }} wire:navigate class="flex space-x-1 rtl:space-x-reverse">
                {{-- <img src="{{ asset('assets/img/logo/logo-color.png') }}" class="h-8" alt="Algoora Logo"> --}}
                <span class="text-lg font-bold text-white whitespace-nowrap">Algoora<mark
                        class="text-white bg-blue-600 rounded pe-1 dark:bg-blue-500">News</mark> </span>
            </a>


            <div class="hidden lg:block">
                <ul class="flex flex-wrap -mb-px font-sans text-lg text-center ">
                    {{-- <li class="me-2  {{ cekActive('index') }}">
                        <a wire:navigate href={{ route('index') }}
                            class="inline-flex items-center justify-center p-4 text-gray-100 border-b-2 border-transparent rounded-t-lg hover:text-purple-500 group">
                            <svg class="w-5 h-5 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M11.293 3.293a1 1 0 0 1 1.414 0l6 6 2 2a1 1 0 0 1-1.414 1.414L19 12.414V19a2 2 0 0 1-2 2h-3a1 1 0 0 1-1-1v-3h-2v3a1 1 0 0 1-1 1H7a2 2 0 0 1-2-2v-6.586l-.293.293a1 1 0 0 1-1.414-1.414l2-2 6-6Z"
                                    clip-rule="evenodd" />
                            </svg>


                            Beranda
                        </a>
                    </li> --}}

                    @foreach ($categories as $category)
                        <li class="me-2 {{ cekActive($category->name) }} ">
                            <a wire:navigate href={{ route('category-find', $category->name) }}
                                class="inline-flex items-center justify-center p-4 text-gray-200 border-b-2 border-transparent rounded-t-lg hover:text-indigo-500 group">
                                {{ $category->name }}
                            </a>
                        </li>
                    @endforeach


                </ul>
            </div>

        </div>

        <div class="hidden gap-2 space-x-3 sm:flex md:order-2 md:space-x-0 rtl:space-x-reverse">


            @livewire('navbar-search')

            @auth
                <a href="{{ route('dashboard') }}"
                    class="flex items-center justify-center h-10 px-6 text-sm font-medium text-center text-white bg-purple-700 border border-purple-900 rounded-lg hover:bg-purple-900 focus:ring-4 focus:outline-none focus:ring-purple-950"
                    wire:navigate>Panel</a>

            @endauth
            @guest
                <a href={{ route('login') }}
                    class="flex items-center justify-center h-10 px-6 text-sm font-medium text-center text-white border rounded-lg bg-slate-800 hover:bg-slate-600 focus:ring-4 focus:outline-none focus:ring-gray-600 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800 border-slate-600"
                    wire:navigate>Masuk</a>
            @endguest





        </div>
        <div class="block sm:hidden">
            <button
                class="px-5 py-2 my-1 text-sm font-medium text-white bg-purple-700 border border-purple-900 rounded-lg sm:my-0 hover:bg-purple-900 "
                type="button" data-drawer-target="drawer-navigation" data-drawer-show="drawer-navigation"
                aria-controls="drawer-navigation">
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
        </div>
        @include('livewire.layouts.sidebar')
    </div>

</nav>

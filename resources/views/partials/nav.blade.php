<nav class="bg-gray-800 fixed top-0 left-0 right-0">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">

            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <img class="h-8 w-8" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500"
                        alt="Your Company">
                </div>

                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">

                        <a href="{{ route('posts') }}"
                            class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Posts</a>

                        <a href="{{ route('dashboard',['page_type' => 'user-posts']) }}"
                            class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium"
                            aria-current="page">Dashboard</a>
                    </div>
                </div>
            </div>
            @auth
                <div class="hidden md:block">
                    <div class="ml-4 flex items-center md:ml-6">
                        <button type="button"
                            class="relative rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                            <span class="absolute -inset-1.5"></span>
                            <span class="sr-only">View notifications</span>
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                            </svg>
                        </button>

                        <!-- Profile dropdown -->
                        <div class="relative ml-3">
                            <div>
                                <button type="button"
                                    class="relative flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                                    id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                    <span class="absolute -inset-1.5"></span>
                                    <span class="sr-only">Open user menu</span>

                                    @if(auth()->user()->profile_img)
                                        <img class="h-8 w-8 rounded-full"
                                        src="{{asset('storage/images/'.auth()->user()->profile_img)}}"
                                        alt="">
                                    @else
                                        <img class="h-8 w-8 rounded-full"
                                        src="https://previews.123rf.com/images/yupiramos/yupiramos1607/yupiramos160710209/60039275-young-male-cartoon-profile-vector-illustration-graphic-design.jpg"
                                        alt="">
                                    @endif
                                </button>
                            </div>
                        </div>
                        <div class=" ms-3">
                            <form action="{{route("logout")}}" method="POST">
                                @csrf
                                @method("DELETE")
                                <button type="submit"  class="hover:bg-red-400  bg-red-500 px-3 py-1.5 rounded  text-white text-sm">Logout</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="-mr-2 flex md:hidden">
                    <!-- Mobile menu button -->
                    <button type="button"
                        class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                        aria-controls="mobile-menu" aria-expanded="false">
                        <span class="absolute -inset-0.5"></span>
                        <span class="sr-only">Open main menu</span>
                        <!-- Menu open: "hidden", Menu closed: "block" -->
                        <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </button>
                    <div>
                        <button>logout</button>
                    </div>
                </div>

            @endauth
            @guest
                <div>
                    <a href="{{route('login')}}" class="hover:bg-gray-700 border border-gray-400 px-3 py-1.5 rounded  text-white text-sm">Login</a>
                    <a href="{{route('register')}}" class="hover:bg-gray-700 border border-gray-400 px-3 py-1.5 rounded  text-white text-sm">Register</a>
                </div>
            @endguest
        </div>
    </div>


</nav>

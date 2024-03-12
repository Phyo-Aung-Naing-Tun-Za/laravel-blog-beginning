<div class=" overflow-x-auto mt-[90px]  shadow-md w-[95%]">
    <div
        class="flex relative  items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4 bg-white p-3">

        <form id="search-form" action="{{ route('user.search') }}" method="GET">
            <div class="relative">
                <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="text" name='name' id="search-input"
                    class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Search for users">
            </div>
        </form>
        @if (isset($_GET['name']))
        <div>
            <a href="{{ route('dashboard', ['page_type' => 'manage']) }}" class="hover:bg-red-400 hover:text-white text-red-400 border-red-400 px-2 py-1 rounded-lg border">Clear Search</a>
        </div>
        @endif
        <div id='dropdown-names'
            class=" hidden max-h-[300px] overflow-scroll  top-[60px]  absolute w-[300px] bg-gray-400  rounded-md">
            {{-- ----- --}}
        </div>
    </div>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>

                <th scope="col" class="px-6 py-3">
                    Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Email
                </th>
                <th scope="col" class="px-6 py-3">
                    Role
                </th>
                <th scope="col" class="px-6 py-3">
                    Status
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody id="user-table">
            @foreach ($users as $user)
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row"
                        class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                        <img class="w-10 h-10 rounded-full"
                            src="<?= $user->profile_img ? asset('storage/images/'.$user->profile_img) : 'https://st.depositphotos.com/2274151/4841/i/450/depositphotos_48410095-stock-photo-sample-blue-square-grungy-stamp.jpg' ?>"
                            alt="Jese image">
                        <div class="ps-3">
                            <div class="text-base font-semibold">{{ $user->name }}</div>
                        </div>
                    </th>
                    <td class="px-6 py-4">
                        {{ $user->email }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $user->role_id == 33 ? 'Admin' : 'User' }}
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center">
                            @if ($user->status)
                                <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></div> Active
                            @else
                                <div class="h-2.5 w-2.5 rounded-full bg-red-500 me-2"></div> Suspended
                            @endif
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="inline-flex rounded-md shadow-sm" role="group">
                            @if ($user->status)
                                <form action="{{ route('user.suspend', $user->id) }}" method="post">
                                    @csrf
                                    <button type="submit"
                                        class="px-2 py-1 text-sm font-medium text-gray-900 bg-transparent border border-gray-900 rounded-s-lg hover:bg-gray-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white ">
                                        <i class="fa-solid fa-ban"></i>
                                    </button>
                                </form>
                            @else
                                <form action="{{ route('user.unsuspend', $user->id) }}" method="post">
                                    @csrf
                                    <button type="submit"
                                        class="px-2 py-1 text-sm font-medium  border border-gray-900 rounded-s-lg bg-gray-900 text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white ">
                                        <i class="fa-solid fa-ban"></i>
                                    </button>
                                </form>
                            @endif
                            <form action="{{ route('user.destory', $user->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="px-2 py-1 text-sm font-medium text-gray-900 bg-transparent border border-gray-900 rounded-e-lg hover:bg-gray-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white dark:border-white ">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@push('script')
    <script>
        $(document).ready(function() {
            $("#search-input").on('keyup', function(e) {
                $('#dropdown-names').empty();
                if ($("#search-input").val()) {
                    $('#dropdown-names').show();
                } else {
                    $('#dropdown-names').hide();
                }
                let url = "{{ route('user.show') }}";
                $.ajax({
                    url: url,
                    method: 'POST',
                    data: {
                        'name': e.target.value
                    },

                  success: function(data) {
                        let users = JSON.parse(data);
                        users.forEach(user => {
                            $('#dropdown-names').append(
                                `<div class="hover:bg-gray-500 select-none cursor-pointer text-sm tracking-wide px-3 py-2">${user.name}</div>`
                                )
                        });
                    }

                });
            })

            $('#dropdown-names').on('click', function(e) {
                $("#search-input").val(e.target.innerText);
                $('#dropdown-names').hide();
                $("#search-input").focus();
            })

        })
    </script>
@endpush

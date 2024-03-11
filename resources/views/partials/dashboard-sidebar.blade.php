<nav class="bg-gray-700 w-[400px] pt-[60px] h-screen flex flex-col gap-5 border-r border-slate-100">
    <div class="user mt-[50px] flex items-center justify-center flex-col gap-4 border-b border-emerald-slate-50 py-5">
        @if (auth()->user()->profile_img)
            <img class="w-24 rounded-full shadow-xl" src="{{asset('storage/images/'.auth()->user()->profile_img)}}">
        @else
            <img class="w-24 rounded-full shadow-xl" src="https://previews.123rf.com/images/yupiramos/yupiramos1607/yupiramos160710209/60039275-young-male-cartoon-profile-vector-illustration-graphic-design.jpg">
        @endif
        <div class="flex flex-col items-center">
            <span class="font-semibold text-lg text-indigo-500">{{auth()->user()->name}}</span>
            <span class="text-slate-400 text-sm">{{auth()->user()->email}}</span>
        </div>
    </div>
    <ul  class=" px-3 ">
        <li >
            <a class=" mb-3 block border w-full py-2 rounded @if(request()->query('page_type') === 'user-posts') border-indigo-500 text-indigo-500  bg-gray-800 @else  border-gray-300 text-gray-300 @endif  px-3   font-semibold tracking-wide " href="{{ route('dashboard', ['page_type' => 'user-posts']) }}">Your Posts</a>
        </li>
        <li >
            <a class=" mb-3 block border w-full py-2 rounded @if(request()->query('page_type') === 'create-post') border-indigo-500 text-indigo-500  bg-gray-800 @else  border-gray-300 text-gray-300 @endif  px-3   font-semibold tracking-wide " href="{{ route('dashboard', ['page_type' => 'create-post']) }}">Create Posts</a>
        </li>
        <li >
            <a class=" mb-3 block border w-full py-2 rounded @if(request()->query('page_type') === 'edit-info') border-indigo-500 text-indigo-500  bg-gray-800 @else  border-gray-300 text-gray-300 @endif  px-3   font-semibold tracking-wide " href="{{ route('dashboard', ['page_type' => 'edit-info']) }}">Edit Info</a>
        </li>
        <li >
            <a class=" mb-3 block border w-full py-2 rounded @if(request()->query('page_type') === 'profile-img') border-indigo-500 text-indigo-500  bg-gray-800 @else  border-gray-300 text-gray-300 @endif  px-3   font-semibold tracking-wide " href="{{ route('dashboard', ['page_type' => 'profile-img']) }}">Change Profile Image</a>
        </li>
        <li >
            <a class=" mb-3 block border w-full py-2 rounded @if(request()->query('page_type') === 'create-post') border-indigo-500 text-indigo-500  bg-gray-800 @else  border-gray-300 text-gray-300 @endif  px-3   font-semibold tracking-wide " href="{{ route('dashboard', ['page_type' => 'create-post']) }}">Change Password</a>
        </li>
        @if (auth()->user()->role_id === 33)
            <li >
                <a class=" mb-3 block border w-full py-2 rounded @if(request()->query('page_type') === 'manage' || isset($_GET['page']) || isset($_GET['name']) ) border-indigo-500 text-indigo-500  bg-gray-800 @else  border-gray-300 text-gray-300 @endif  px-3   font-semibold tracking-wide " href="{{ route('dashboard', ['page_type' => 'manage']) }}">Manage</a>
            </li>
        @endif

    </ul>
</nav>

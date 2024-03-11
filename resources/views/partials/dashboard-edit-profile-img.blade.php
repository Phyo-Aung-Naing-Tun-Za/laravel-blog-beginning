<form enctype="multipart/form-data" action="{{ route('users.update-img') }}" method="POST"
    class="max-w-sm mx-auto bg-white px-4 py-5 mt-[100px] rounded-md  shodow">
    @if (Session::has('update'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
            role="alert">
            {{ Session::get('update') }}
        </div>
    @endif
    @if (Session::has('error'))
        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-red-400"
            role="alert">
            {{ Session::get('error') }}
        </div>
    @endif
    @csrf
    <h1 class="text-blue-500 text-xl font-bold mb-3">Edit your profile image</h1>
    <hr class="mb-4">
    <input type="hidden" name="id" value="{{ auth()->user()->id }}">
    @if (auth()->user()->profile_img)
        <img class=" w-full h-[200px] object-contain"
        src="{{asset('storage/images/'.auth()->user()->profile_img)}}"
    alt="">
    @else
        <img class=" w-full h-[200px] object-contain"
        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTeARSMhzqAXKm9bVQ9uVviBTQOY6oAB99YrYMChPxDnw&s"
        alt="">
    @endif

    <div class="mb-4 mt-4">

        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload New Profile
            Image</label>
        <input
            accept="image/*"
            name="profile_img"
            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
            id="profile_img" type="file">

        @error('profile_img')
            <small class="text-red-500">{{ $message }}</small>
        @enderror
    </div>

    <button type="submit"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">Update</button>
</form>

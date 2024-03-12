<form action="{{ route('users.changePassword') }}" method="POST"
class="max-w-sm mx-auto bg-white px-4 py-5 mt-[210px] rounded-md  shodow">
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
<h1 class="text-blue-500 text-2xl font-bold mb-5">Change Password</h1>
<input type="hidden" name="id" value="{{ auth()->user()->id }}">
<div class="mb-4">
    <label for="Current Password" class="block mb-2 text-sm font-medium text-gray-600 ">Current Password</label>
    <input name="current_password"  type="password" id="current_password"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
        required />
    @error('current_password')
        <small class="text-red-500">{{ $message }}</small>
    @enderror
</div>

<div class="mb-4">
    <label for="update_password" class="block mb-2 text-sm font-medium text-gray-600 ">Update Password</label>
    <input name="update_password"  type="password" id="update_password"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
        required />
    @error('update_password')
        <small class="text-red-500">{{ $message }}</small>
    @enderror
</div>

<button type="submit"
    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">Update</button>
</form>

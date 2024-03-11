 <form action="{{ route('users.update') }}" method="POST"
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
     <h1 class="text-blue-500 text-2xl font-bold mb-3">Edit your informations</h1>
     <input type="hidden" name="id" value="{{ auth()->user()->id }}">
     <div class="mb-4">
         <label for="name" class="block mb-2 text-sm font-medium text-gray-600 ">User Name</label>
         <input name="name" value="{{ auth()->user()->name }}" type="text" id="name"
             class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
             required />
         @error('name')
             <small class="text-red-500">{{ $message }}</small>
         @enderror
     </div>

     <div class="mb-4">
         <label for="email" class="block mb-2 text-sm font-medium text-gray-600 ">Email</label>
         <input name="email" value="{{ auth()->user()->email }}" type="email" id="email"
             class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
             required />
         @error('email')
             <small class="text-red-500">{{ $message }}</small>
         @enderror
     </div>

     <button type="submit"
         class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">Update</button>
 </form>

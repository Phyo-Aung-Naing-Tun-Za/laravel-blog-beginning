@extends('templates.layout')
@section('content')

<div>

    <form action="{{route('login.store')}}" method="POST" class="max-w-sm mx-auto bg-white px-4 py-5 mt-[200px] rounded-md  shodow">
        @csrf
        <h1 class="text-blue-500 text-2xl font-bold mb-3">Login</h1>

        @if (session('error'))
            <div class=" text-center text-white font-bold py-4 bg-red-500 rounded my-4">{{session('error')}}</div>
        @endif
        <div class="mb-4">
          <label for="email" class="block mb-2 text-sm font-medium text-gray-600 ">Your email</label>
          <input value="{{old('email')}}" name="email" type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="name@flowbite.com" required />
          @error('email')
              <small class="text-red-500">{{$message}}</small>
          @enderror
        </div>
        <div class="mb-5">
          <label for="password" class="block mb-2 text-sm font-medium text-gray-600 ">Your password</label>
          <input name="password" type="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " required />
        </div>
        <div class="flex items-start mb-5">
          <div class="flex items-center h-5">
            <input id="remember" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 " required />
          </div>
          <label for="remember" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Remember me</label>
        </div>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">Login</button>
      </form>








</div>


@endsection

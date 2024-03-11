@extends('templates.layout')
@section('content')
<div>
    <form action="{{route('register.store')}}" method="POST" class="max-w-sm mx-auto bg-white px-4 py-5 mt-[100px] rounded-md  shodow">
        @csrf
        <h1 class="text-blue-500 text-2xl font-bold mb-3">Register</h1>

        <div class="mb-4">
          <label for="name" class="block mb-2 text-sm font-medium text-gray-600 ">User Name</label>
          <input name="name" value="{{old('name')}}" type="text" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"  required />
          @error('name')
            <small class="text-red-500">{{$message}}</small>
          @enderror
        </div>

        <div class="mb-4">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-600 ">Email</label>
            <input name="email" value="{{old('email')}}"  type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"  required />
            @error('email')
                <small class="text-red-500">{{$message}}</small>
            @enderror
          </div>
        <div class="mb-5">
          <label  for="password" class="block mb-2 text-sm font-medium text-gray-600 ">Password</label>
          <input name="password"   type="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " required />
            @error('password')
                 <small class="text-red-500">{{$message}}</small>
            @enderror
        </div>
        <div class="mb-5">
            <label   for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-600 ">Confirm Password</label>
            <input name="password_confirmation" type="password" id="password_confirmation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " required />
          </div>

        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">Register</button>
      </form>
</div>
@endsection

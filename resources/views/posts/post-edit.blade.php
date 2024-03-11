@extends('templates.layout')
@section('content')

<div>
    <form action="{{route('posts.update')}}" method="POST">
        @csrf
        <div class="md:px-20 pt-[100px]">
            <div class=" bg-white rounded-md px-6 py-7 max-w-2xl mx-auto">
                <h1 class="text-center text-xl font-bold text-indigo-500 mb-5">EDIT POST</h1>
                <div class="space-y-4">
                    <input type="hidden" name="id" value={{$post->id}}>
                    <div>
                        <label for="title" class=" block text-gray-500">Title</label>
                        <div class="relative z-0 w-full mb-5 group">
                            <input value="{{$post->title}}" name="title" type="text"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " required />
                                @error('title')
                                <small class="text-red-500">{{$message}}</small>
                                @enderror
                        </div>
                    </div>

                    <div>
                        <label for="description" class="block mb-2  text-gray-500">What's on your mind?</label>
                        <textarea name="body" id="description" cols="30" rows="6" placeholder="whrite here.."
                             class="w-full text-gray-500  p-4 bg-indigo-50 outline-none rounded-md">{{$post->body}}</textarea>
                            @error('body')
                                <small class="text-red-500">{{$message}}</small>
                            @enderror
                    </div>
                    <div class=" flex gap-3 justify-start">
                        <button
                        class=" px-6 py-2 block hover   rounded-md  font-semibold text-indigo-100 bg-indigo-600  ">Confirm</button>
                        <a href="{{route('posts')}}"
                        class=" px-6 py-2 block hover    rounded-md  font-semibold text-indigo-100 bg-gray-600  ">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </form>

</div>


@endsection

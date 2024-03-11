<form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="md:px-20 pt-[100px]">
        <div class=" bg-white rounded-md px-6 py-7 max-w-2xl mx-auto">
            <h1 class="text-center text-xl font-bold text-indigo-500 mb-5">CREATE POST</h1>
            <div class="space-y-4">
                <div>
                    <label for="title" class=" block text-gray-500">Title</label>
                    <div class="relative z-0 w-full mb-5 group">
                        <input value="{{old('title')}}" name="title" type="text"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " required />
                            @error('title')
                            <small class="text-red-500">{{$message}}</small>
                            @enderror
                    </div>
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-500 dark:text-white" for="file_input">Upload
                        Image</label>
                    <input name="img"
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none  dark:border-gray-600"
                        id="img" type="file"  accept="image/*">
                        @error('img')
                            <small class="text-red-500">{{$message}}</small>
                        @enderror
                </div>
                <div>
                    <label for="description" class="block mb-2  text-gray-500">What's on your mind?</label>
                    <textarea name="body" id="description" cols="30" rows="6" placeholder="whrite here.."
                        class="w-full text-gray-500  p-4 bg-indigo-50 outline-none rounded-md">{{old('body')}}</textarea>
                        @error('body')
                            <small class="text-red-500">{{$message}}</small>
                        @enderror
                </div>
                <button
                    class=" px-6 py-2 mx-auto block w-full  rounded-md  font-semibold text-indigo-100 bg-indigo-600  ">ADD
                    POST</button>
            </div>
        </div>
    </div>
</form>

<div class=" pt-[90px] select-none flex flex-col gap-4 items-center">

    @foreach ($posts as $post)
        <div
            class=" h-[250px]  flex justify-between overflow-hidden   w-[75%] bg-white border border-gray-200 rounded-lg shadow   hover:bg-gray-100 ">
            <div class="px-4 pt-4 w-[60%] flex flex-col justify-between  ">
                <div>
                    <h1 class=" capitalize text-lg mb-2 text-indigo-500 font-bold">
                        {{ $post->user->name }} <small
                            class="text-xs ms-2 text-gray-500">{{ $post->created_at->diffForHumans() }}</small>
                    </h1>
                    <p class=" text-gray-600 truncate font-bold mb-4  tracking-wide">
                        {{ $post->title }}</p>
                    <p class="  h-[100px] overflow-scroll tracking-wide text-gray-500">
                        {{ $post->body }}
                    </p>
                </div>
                <div class="py-3 ">
                    <ul class="flex ">
                            <li>
                                <form class=" <?= $post->onlyLike() ? 'block' : 'hidden' ?>" id="unlike-form" action="{{route('likes.destory',$post)}}" method="post">
                                    @csrf
                                    @method('DELETE')

                                    <input type="hidden" value="{{ $post->id }}" name="post_id">
                                    <button>
                                        <i class="fa-solid text-2xl text-indigo-500 fa-thumbs-down"></i>
                                    </button>
                                </form>
                            </li>
                            <li>
                                <form class=" <?= $post->onlyLike() ? 'hidden' : 'block' ?>" id="like-form" action="#" method="post">
                                    @csrf
                                    <input type="hidden" value="{{ $post->id }}" name="post_id">
                                    <button>
                                        <i class="fa-solid text-2xl text-indigo-500 fa-thumbs-up"></i>
                                    </button>
                                </form>
                            </li>
                        <li  class="ms-[20px] text-gray-500"><span class=" me-1 font-bold"><span id="like-count">
                            {{$post->likes()->count()}}</span></span>{{ Str::plural('Like', !$post->likes()->count())}}</li>
                        @if (auth()->user()->id === $post->user_id)
                        <li class="  ms-[170px]">
                            <form action="{{route('posts.destory',['id' => $post->id ])}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="text-white bg-red-500  rounded px-2  ">
                                 <i class=" fa fa-trash"></i>
                                </button>
                            </form>
                        </li>
                        <li class=" ms-[20px] ">
                            <a href="{{route('posts.show',['id' => $post->id])}}" class="text-white bg-indigo-500 rounded block px-2  ">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </a>
                        </li>
                        @endif
                    </ul>

                </div>

            </div>
            <div class="w-[250px] rounded-lg h-full bg-indigo-100 overflow-hidden ">
                <img class="object-contain  w-full h-full "
                    src="{{asset('storage/images/'.$post->img)}}"
                    alt="">

            </div>
        </div>
        @if ($loop->last)
        <br>
        @endif
    @endforeach
</div>


@push('script')
    <script>
        $(document).on('submit','#like-form',function(e){
            let post = e.target.querySelectorAll('input[name="post_id"]');
            let post_id = null;

            if (post.length > 0) {
                post_id = post[0].value;
            }

            let url = "{{ route('likes.store', ':post_id') }}";


            url = url.replace(':post_id', post_id);

            console.log(url);

            e.preventDefault();
            $.ajax({
                url : url,
                method: 'POST',
                success: function(data){
                    if(data == "success"){
                e.target.parentElement.nextElementSibling.querySelector("#like-count").innerText = 1;
                e.target.parentElement.parentElement.querySelector("#like-form").classList.add('hidden');
                e.target.parentElement.parentElement.querySelector("#unlike-form").classList.remove('hidden');
                    }
                }
            })
        })
        $(document).on('submit','#unlike-form',function(e){
            let post = e.target.querySelectorAll('input[name="post_id"]');
            let post_id = null;

            if (post.length > 0) {
                post_id = post[0].value;
            }

            let url = "{{ route('likes.destory', ':post_id') }}";

            url = url.replace(':post_id', post_id);
            console.log(url);
            e.preventDefault();
            $.ajax({
                url : url,
                method: 'DELETE',
                success: function(data){
                    if(data == "success"){

                e.target.parentElement.nextElementSibling.nextElementSibling.querySelector("#like-count").innerText = 0;
                e.target.parentElement.parentElement.querySelector("#like-form").classList.remove('hidden');
                e.target.parentElement.parentElement.querySelector("#unlike-form").classList.add('hidden');
                    }
                }
            })
        })
    </script>
@endpush

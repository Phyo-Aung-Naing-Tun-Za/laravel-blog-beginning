@extends('templates.layout')
@section('content')

    <div>
        <div id="body" class="flex">
            @include('partials.dashboard-sidebar')
            <div class="right w-full flex gap-2 flex-col">
                <div class="">
                    @if (request()->query('page_type') === 'create-post')
                        <div>
                            @include('partials.dashboard-create-post-form')
                        </div>
                    @elseif(request()->query('page_type') === 'user-posts')
                        <div class=" overflow-scroll h-screen">
                            @if ($posts->count())
                                @include('partials.posts-card')
                            @else
                                <div class="flex justify-center items-center h-screen">
                                    <a href="#" class="block max-w-sm p-6 bg-white border  rounded-lg shadow hover:bg-gray-100 ">

                                        <h5 class="mb-2   text-2xl font-bold text-center  text-indigo-500 tracking-wider ">You haven't posted yet!</h5>
                                        <p class="font-normal text-gray-700 dark:text-gray-400"></p>
                                        </a>
                                </div>
                            @endif
                        </div>
                    @elseif(request()->query('page_type') === 'edit-info')
                        @include('partials.dashboard-edit-info')

                    @elseif(request()->query('page_type') === 'profile-img')
                        @include('partials.dashboard-edit-profile-img')

                    @elseif(request()->query('page_type') === 'change-password')

                        @include('partials.dashboard-change-password-form')

                    @else
                    <div class=" p-3 flex items-center justify-center  w-full">
                        @include('partials.dashboard-manage-users')

                    </div>
                    {{-- Pagination --}}
                    @if($users->count() > 1)
                    <div class="w-full flex justify-end pe-9 mt-4">
                        {!! $users->links() !!}
                    </div>
                    @endif
                    @endif
                </div>
            </div>
            <div>
            </div>


        @endsection

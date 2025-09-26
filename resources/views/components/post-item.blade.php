    <a href="{{ route('post.show', ['username'=>$post->user->username,'post'=> $post->slug]) }}">
      <div class="bg-white border h-fit border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700 flex flex-col-reverse md:flex-row mb-4 ">

        <div class="p-5 flex-1">

          <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$post->title}}</h5>

          <div class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ Str::words($post->content,20) }}</div>
          {{-- <a href="{{ route('post.show', ['username'=>$post->user->username,'post'=> $post->slug]) }}">
          <x-primary-button>

            Read more
            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
            </svg>
          </x-primary-button>
    </a> --}}
    <div class="flex flex-row gap-4 items-center justify-start">
      <span class="text-gray-500 text-sm">
        {{ $post->created_at->format('M d, Y') }}
      </span>
      <div class="text-gray-500 flex flex-row gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-[22px]">
          <path d="M7.493 18.5c-.425 0-.82-.236-.975-.632A7.48 7.48 0 0 1 6 15.125c0-1.75.599-3.358 1.602-4.634.151-.192.373-.309.6-.397.473-.183.89-.514 1.212-.924a9.042 9.042 0 0 1 2.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 0 0 .322-1.672V2.75A.75.75 0 0 1 15 2a2.25 2.25 0 0 1 2.25 2.25c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 0 1-2.649 7.521c-.388.482-.987.729-1.605.729H14.23c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 0 0-1.423-.23h-.777ZM2.331 10.727a11.969 11.969 0 0 0-.831 4.398 12 12 0 0 0 .52 3.507C2.28 19.482 3.105 20 3.994 20H4.9c.445 0 .72-.498.523-.898a8.963 8.963 0 0 1-.924-3.977c0-1.708.476-3.305 1.302-4.666.245-.403-.028-.959-.5-.959H4.25c-.832 0-1.612.453-1.918 1.227Z" />
        </svg>
        {{ $post->likes_count }}
      </div>
    </div>
    </div>
    <div class="md:w-2/5 ">
      <img class=" rounded-t-lg md:rounded-tl-none md:rounded-r-lg object-cover w-full h-full" src="{{ $post->imageUrl('preview')}}" alt="" />
    </div>
    </div>
    </a>

<x-app-layout>
  <div class="py-4">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8" x-data="{
    likeCount: {{ $post->likes()->count() }},
    hasLiked: {{ auth()->check()&&  auth()->user()->hasLiked($post) ? 'true' : 'false' }},
    like(){
      axios.post('/like/{{ $post->id }}').then(res => {
        this.hasLiked = !this.hasLiked
        this.likeCount = res.data.likesCount
      }).catch(err => {
        this.hasLiked = !this.hasLiked
        this.likeCount = this.hasLiked ? this.likeCount + 1 : this.likeCount - 1
        console.log(err)
      })
    }
  }">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">
        <h1 class="text-3xl font-extrabold mb-4">{{$post->title}}</h1>
        {{-- User avatar --}}
        <div class="flex gap-4 mb-8">
          <x-user-avatar :user="$post->user" />
          <div class="">

            <div class=" flex gap-2">
              <a href="{{ route('profile.show', $post->user->username) }}" class="hover:underline">{{$post->user->name}}</a>
              @auth

              &middot;
              <x-follow-container :user="$post->user" class="flex gap-2">
                <button @click="follow()" :class="following ?'text-red-500': 'text-emerald-500'" x-text="following ? 'Unfollow' : 'Follow'"></button>
              </x-follow-container>

              @endauth
            </div>
            <div class=" flex gap-2 text-gray-500 text-sm">
              {{ $post->readTime() }} min read
              &middot;
              {{ $post->created_at->format('M d, Y') }}
            </div>
          </div>
        </div>

        @if($post->user_id=== Auth::id())


        <div class="mt-4 py-4 border-t border-gray-200">
          <a href="{{ route('post.edit', $post)}}">
            <x-primary-button>
              Edit Post
            </x-primary-button>
          </a>
          <form class="inline-block" action="{{ route('post.destroy', $post) }}" method="POST">
            @csrf
            @method('DELETE')
            <x-danger-button>
              Delete Post
            </x-danger-button>
          </form>
        </div>
        @endif

        {{-- clap section --}}
        @auth
        <x-like-button :post="$post" />
        @endauth

        {{-- blog section --}}
        <div class="my-8">
          <img src="{{ $post->imageUrl() }}" alt="" class="w-full rounded-md">
          <div class="mt-4">
            {{ $post->content }}
          </div>
        </div>

        <div class="my-8">
          <span class="bg-blue-100 text-blue-800 text-base font-medium me-2 px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-blue-400 border border-blue-400">
            {{ $post->category->name }}
          </span>

        </div>
        @auth
        <x-like-button :post="$post" />
        @endauth
      </div>
    </div>
  </div>
</x-app-layout>

<x-app-layout>


  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
      <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
        <div class="flex flex-col-reverse lg:flex-row">
          <div class="flex-1 lg:pr-8">
            <h1 class="text-5xl font-extrabold">{{$user->name}}</h1>

            <div class="mt-8">
              @forelse ($user->posts as $post)
              <x-post-item :post="$post" />
              @empty
              <div class="">
                <p class="text-center text-gray-400 py-16">No posts found.</p>
              </div>
              @endforelse
            </div>
          </div>
          <x-follow-container :user="$user">
            <x-user-avatar :user=" $user" size="w-24 h-24" />
            <h3 clas>{{$user->name}}</h3>
            <p class="text-gray-500" x-text="followersCount === 1 ? '1 Follower' : followersCount + ' Followers'">
            </p>
            <p class="">{{$user->bio}}</p>
            @if(auth()->user() && $user->id != auth()->user()->id)
            <div class="py-2">
              <button @click="follow()" class="rounded-full font-semibold px-4 py-2 border-[1.5px] " x-text="following ? 'Unfollow' : 'Follow'" :class="following ? 'border  text-red-500 border-red-500 bg-white':'bg-emerald-500 border-emerald-500 text-white  '">
              </button>
            </div>
            @endif
          </x-follow-container>
        </div>
      </div>
    </div>
  </div>
  </div>
</x-app-layout>

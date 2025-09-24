<x-app-layout>


  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
      <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
        <div class="flex ">
          <div class="flex-1 pr-8">
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
          <div class="w-[320px] border-l space-y-2 px-8">
            <x-user-avatar :user="$user" size="w-24 h-24" />
            <h3 clas>{{$user->name}}</h3>
            <p class="text-gray-500">
              25k Followers
            </p>
            <p class="">{{$user->bio}}</p>
            <div class="py-2">
              <button class="bg-emerald-500 rounded-full text-white px-4 py-2">
                Follow
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>

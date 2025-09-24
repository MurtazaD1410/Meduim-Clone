<x-app-layout>
  <div class="py-4">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">
        <h1 class="text-3xl font-extrabold mb-4">{{$post->title}}</h1>
        {{-- User avatar --}}
        <div class="flex gap-4">
          @if ($post->user->image)
          <img src="{{ $post->user->imageUrl() }}" class="w-10 h-10 rounded-full object-cover" alt="{{ $post->user }}">
          @else
          <img src="https://ui.shadcn.com/docs/components/avatar" alt="{{ $post->user->name }}">
          @endif
          <div class="">

            <div class=" flex gap-2">
              <a href="{{ route('profile.show', $post->user->username) }}" class="hover:underline">{{$post->user->name}}</a>
              &middot;
              <a href="" class="text-emerald-500">Follow</a>

            </div>
            <div class=" flex gap-2 text-gray-500 text-sm">
              {{ $post->readTime() }} min read
              &middot;
              {{ $post->created_at->format('M d, Y') }}
            </div>
          </div>
        </div>

        {{-- clap section --}}
        <x-like-button />

        {{-- blog section --}}
        <div class="">
          <img src="{{ $post->imageUrl() }}" alt="" class="w-full rounded-md">
          <div class="mt-4">
            {{ $post->content }}
          </div>
        </div>

        <div class="mt-8">
          <span class="bg-blue-100 text-blue-800 text-base font-medium me-2 px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-blue-400 border border-blue-400">
            {{ $post->category->name }}
          </span>


          <x-like-button />
        </div>
      </div>
    </div>
  </div>
</x-app-layout>

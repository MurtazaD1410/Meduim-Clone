<x-app-layout>
  <div class="py-4">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
      <h1 class="text-3xl mb-4">Update Post: <strong class="font-bold">{{$post->title}}</strong></h1>
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">
        <form action="{{ route('post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')

          @if($post->getFirstMedia())
          <img class="w-full object-cover object-center" src="{{ $post->imageUrl() }}" alt="Rounded avatar">
          @endif
          <div class="mt-4">
            <x-input-label for="image" :value="__('Image')" />
            <x-text-input id="image" class="block mt-1 w-full" type="file" name="image" :value="old('image')" autofocus />
            <p class="mt-1 text-xs text-gray-500">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
            <x-input-error :messages="$errors->get('image')" class="mt-2" />
          </div>


          <div class="mt-4">
            <x-input-label for="category_id" :value="__('Category')" />
            <select id="category_id" name="category_id" class="mt-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full">
              <option selected disabled>Choose a category</option>
              @foreach ($categories as $category)
              <option value="{{ $category->id }}" @selected(old('category_id', $post->category_id)==$category->id)>{{ $category->name }}</option>
              @endforeach
            </select>
            <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
          </div>
          <div class="mt-4">
            <x-input-label for="title" :value="__('Title')" />
            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title', $post->title)" autofocus />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
          </div>
          <div class="mt-4">
            <x-input-label for="content" :value="__('Content')" />
            <x-textarea-input rows="6" id="content" class="block mt-1 w-full" type="text" name="content" autofocus>
              {{ old('content', $post->content) }}
            </x-textarea-input>
            <x-input-error :messages="$errors->get('content')" class="mt-2" />
          </div>

          <x-primary-button class="mt-4">
            Submit
          </x-primary-button>
        </form>
      </div>
    </div>
  </div>
</x-app-layout>

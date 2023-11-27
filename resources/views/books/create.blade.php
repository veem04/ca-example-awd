<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Book') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <form action="{{ route('books.store') }}" method="post">
                    @csrf
                    <x-text-input
                        type="text"
                        name="title"
                        field="title"
                        placeholder="Title"
                        class="w-full"
                        autocomplete="off"
                        :value="@old('title')"></x-text-input>

                        <x-text-input
                        type="text"
                        name="isbn"
                        field="isbn"
                        placeholder="ISBN"
                        class="w-full"
                        autocomplete="off"
                        :value="@old('isbn')"></x-text-input>

                    <textarea
                        name="description"
                        rows="10"
                        field="description"
                        placeholder="Description..."
                        class="w-full mt-6"
                        :value="@old('description')"></textarea>


                    <div class="form-group">
                        <label for="publisher">Publisher</label>
                        <select name="publisher_id" id="publisher">
                            @foreach ($publishers as $publisher)
                                <option 
                                value="{{ $publisher->id }}"
                                {{old('publisher') == $publisher->id ? 'selected' : ''}}
                                >
                                {{ $publisher->name }}</option>
                            @endforeach

                            {{-- <option value="1">Testing</option> --}}
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="authors"> <strong> Authors</strong> <br> </label>
                            @foreach ($authors as $author)
                                <input type="checkbox" value={{ $author->id }} name="authors[]" id="author_{{$author->id}}">
                                <label for="author_{{$author->id}}">{{ $author->name }}</label>
                            @endforeach
                        
                            {{-- <input type="checkbox", value="1" name="authors[]">
                            John Jones --}}
                    </div>

                    <x-primary-button class="mt-6">Save Book</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
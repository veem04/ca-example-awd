@extends('layouts.admin')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Create Book') }}
    </h2>
@endsection

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="my-6 p-6 bg-white dark:bg-gray-800 dark:text-white border-b border-gray-200 shadow-sm sm:rounded-lg">
            <form enctype='multipart/form-data' action="{{ route('admin.books.store') }}" method="post">
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
                    class="w-full mt-6 text-gray-900"
                    :value="@old('description')"></textarea>


                <div class="form-group">
                    <label for="publisher">Publisher</label>
                    <select name="publisher_id" id="publisher" class='text-gray-900'>
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
                </div>

                <input 
                type='file' 
                name='book_image' 
                placeholder='Book image'
                class='w-full mt-6'
                field='book_image'
                >
                    
                <x-primary-button class="mt-6">Save Book</x-primary-button>
            </form>
        </div>
    </div>
</div>
@endsection
{{-- @extends('layouts.app') --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Books') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('books.create') }}" class="bg-blue-600 text-gray-100 p-4">Create</a>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Title
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Description
                            </th>
                            <th scope="col" class="px-6 py-3">
                                ISBN
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Publisher
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($books as $book)
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $book->title }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $book->description }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $book->isbn }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $book->publisher->name }}
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('books.show', $book->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Show</a>
                            </td>
                        </tr>
                        @empty
                            <h4>No Books found!</h4>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-app-layout>

{{-- @section('header')
<h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
    Books
</h2>
@endsection --}}

{{-- @section('content') --}}

{{-- @endsection --}}
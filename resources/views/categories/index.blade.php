@extends('layout')

@section('content')

<div class="max-w-2xl mx-auto">

    <h2 class="text-xl font-semibold mb-4">📂 Categories</h2>

    <!-- Add / Edit Form -->
    <form
        method="POST"
        action="{{ isset($category) ? '/categories/'.$category->id : '/categories' }}"
        class="flex gap-2 mb-6"
    >
        @csrf
        @if(isset($category))
            @method('PUT')
        @endif

        <input
            type="text"
            name="name"
            value="{{ $category->name ?? '' }}"
            placeholder="Category name"
            class="border p-2 flex-1 rounded"
            required
        >

        <button class="bg-blue-500 text-white px-4 rounded">
            {{ isset($category) ? 'Update' : 'Add' }}
        </button>

        @if(isset($category))
            <a href="/categories" class="px-3 py-2 text-gray-600">
                Cancel
            </a>
        @endif
    </form>

    @error('name')
        <p class="text-red-500 mb-4">{{ $message }}</p>
    @enderror

    <!-- Category List -->
    <div class="bg-white rounded shadow">
        <table class="w-full">
            <tr class="bg-gray-100">
                <th class="p-2 text-left">Name</th>
                <th class="text-right pr-4">Actions</th>
            </tr>

            @forelse($categories as $cat)
                <tr class="border-t">
                    <td class="p-2">{{ $cat->name }}</td>

                    <td class="text-right pr-4 space-x-2">

                        <!-- Edit -->
                        <a href="/categories/{{ $cat->id }}/edit"
                           class="text-blue-600 text-sm">
                            Edit
                        </a>

                        <!-- Delete -->
                        <form method="POST" action="/categories/{{ $cat->id }}"
                              class="inline"
                              onsubmit="return confirm('Delete this category?')">
                            @csrf
                            @method('DELETE')

                            <button class="text-red-600 text-sm">
                                Delete
                            </button>
                        </form>

                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="2" class="p-4 text-center text-gray-500">
                        No categories yet
                    </td>
                </tr>
            @endforelse
        </table>
    </div>

</div>

@endsection
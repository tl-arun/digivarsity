@extends('layouts.admin')

@section('page-title', 'Manage Testimonials')

@section('admin-content')
<div class="mb-6 flex justify-end">
    <a href="{{ route('admin.testimonials.create') }}" class="bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-indigo-700 transition-colors">
        <i class="fas fa-plus mr-2"></i>Add Testimonial
    </a>
</div>
            @if(session('success'))
                <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg mb-6">
                    <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($testimonials as $testimonial)
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <div class="flex items-start space-x-4 mb-4">
                            @if($testimonial->image)
                                <img src="{{ asset('storage/' . $testimonial->image) }}" alt="{{ $testimonial->student_name }}" class="h-16 w-16 rounded-full object-cover">
                            @else
                                <div class="h-16 w-16 bg-indigo-100 rounded-full flex items-center justify-center">
                                    <i class="fas fa-user text-indigo-600 text-2xl"></i>
                                </div>
                            @endif
                            <div class="flex-1">
                                <h3 class="font-bold text-gray-900">{{ $testimonial->student_name }}</h3>
                                <p class="text-sm text-gray-600">{{ $testimonial->after_role ?? $testimonial->before_role }}</p>
                                <p class="text-xs text-indigo-600 mt-1">{{ $testimonial->program->name ?? 'N/A' }}</p>
                            </div>
                        </div>

                        <p class="text-gray-700 text-sm mb-4 line-clamp-3">{{ $testimonial->message }}</p>

                        <div class="flex items-center justify-between pt-4 border-t border-gray-200">
                            <span class="px-2 py-1 text-xs rounded-full {{ $testimonial->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ $testimonial->is_active ? 'Active' : 'Inactive' }}
                            </span>
                            <div class="flex space-x-2">
                                <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="text-indigo-600 hover:text-indigo-900">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-12">
                        <i class="fas fa-comments text-gray-300 text-6xl mb-4"></i>
                        <p class="text-gray-500 mb-4">No testimonials found.</p>
                        <a href="{{ route('admin.testimonials.create') }}" class="text-indigo-600 hover:text-indigo-900">Add your first testimonial</a>
                    </div>
                @endforelse
            </div>
@endsection

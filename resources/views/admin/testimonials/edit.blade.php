@extends('layouts.admin')

@section('page-title', 'Edit Testimonial')

@section('admin-content')
<div class="mb-6">
    <a href="{{ route('admin.testimonials.index') }}" class="text-indigo-600 hover:text-indigo-900">
        <i class="fas fa-arrow-left mr-2"></i>Back to List
    </a>
</div>

<div class="max-w-3xl">
            <div class="bg-white rounded-lg shadow-sm p-6">
                <form action="{{ route('admin.testimonials.update', $testimonial) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Program -->
                    <div class="mb-6">
                        <label for="program_id" class="block text-sm font-medium text-gray-700 mb-2">
                            Program <span class="text-red-500">*</span>
                        </label>
                        <select name="program_id" id="program_id" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                            <option value="">Select Program</option>
                            @foreach($programs as $program)
                                <option value="{{ $program->id }}" {{ old('program_id', $testimonial->program_id) == $program->id ? 'selected' : '' }}>
                                    {{ $program->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('program_id')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Student Name -->
                    <div class="mb-6">
                        <label for="student_name" class="block text-sm font-medium text-gray-700 mb-2">
                            Student Name <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="student_name" id="student_name" value="{{ old('student_name', $testimonial->student_name) }}" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                        @error('student_name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Before Role -->
                    <div class="mb-6">
                        <label for="before_role" class="block text-sm font-medium text-gray-700 mb-2">
                            Previous Role
                        </label>
                        <input type="text" name="before_role" id="before_role" value="{{ old('before_role', $testimonial->before_role) }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                        @error('before_role')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- After Role -->
                    <div class="mb-6">
                        <label for="after_role" class="block text-sm font-medium text-gray-700 mb-2">
                            Current Role
                        </label>
                        <input type="text" name="after_role" id="after_role" value="{{ old('after_role', $testimonial->after_role) }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                        @error('after_role')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Message -->
                    <div class="mb-6">
                        <label for="message" class="block text-sm font-medium text-gray-700 mb-2">
                            Testimonial Message <span class="text-red-500">*</span>
                        </label>
                        <textarea name="message" id="message" rows="5" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent">{{ old('message', $testimonial->message) }}</textarea>
                        @error('message')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Image Upload -->
                    <div class="mb-6">
                        <label for="image" class="block text-sm font-medium text-gray-700 mb-2">
                            Student Photo
                        </label>
                        <div class="mt-1 flex items-center">
                            <div id="preview" class="{{ $testimonial->image ? '' : 'hidden' }} mr-4">
                                <img id="preview-image" src="{{ $testimonial->image ? asset('storage/' . $testimonial->image) : '' }}" alt="Preview" class="h-24 w-24 rounded-full object-cover border border-gray-300">
                            </div>
                            <label for="image" class="cursor-pointer bg-white px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                                <i class="fas fa-upload mr-2"></i>{{ $testimonial->image ? 'Change' : 'Choose' }} Photo
                                <input type="file" name="image" id="image" accept="image/*" class="hidden" onchange="previewImage(event)">
                            </label>
                        </div>
                        <p class="mt-2 text-sm text-gray-500">Recommended: Square image, max 2MB</p>
                        @error('image')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Active Status -->
                    <div class="mb-6">
                        <label class="flex items-center">
                            <input type="checkbox" name="is_active" value="1" {{ old('is_active', $testimonial->is_active) ? 'checked' : '' }}
                                class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                            <span class="ml-2 text-sm text-gray-700">Active (Show on website)</span>
                        </label>
                    </div>

                    <!-- Submit Buttons -->
                    <div class="flex justify-end space-x-3">
                        <a href="{{ route('admin.testimonials.index') }}" class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                            Cancel
                        </a>
                        <button type="submit" class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors">
                            <i class="fas fa-save mr-2"></i>Update Testimonial
                        </button>
                    </div>
                </form>
            </div>
</div>

@push('scripts')
<script>
    function previewImage(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('preview').classList.remove('hidden');
                document.getElementById('preview-image').src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    }
</script>
@endpush

@endsection

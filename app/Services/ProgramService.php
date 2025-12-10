<?php

namespace App\Services;

use App\Repositories\ProgramRepository;
use Illuminate\Support\Facades\Cache;

class ProgramService
{
    public function __construct(
        private ProgramRepository $repository
    ) {}

    public function getAllPrograms(array $filters = [])
    {
        // Temporarily disable caching to avoid issues with file cache driver
        // To enable caching, switch to Redis in .env: CACHE_STORE=redis
        return $this->repository->all($filters);

        // Uncomment below when using Redis cache driver
        // $cacheKey = 'programs_' . md5(json_encode($filters));
        // return Cache::remember($cacheKey, 3600, function () use ($filters) {
        //     return $this->repository->all($filters);
        // });
    }

    public function getProgram(int $id)
    {
        // Temporarily disable caching to avoid issues with file cache driver
        // To enable caching, switch to Redis in .env: CACHE_STORE=redis
        return $this->repository->find($id);

        // Uncomment below when using Redis cache driver
        // return Cache::remember("program_{$id}", 3600, function () use ($id) {
        //     return $this->repository->find($id);
        // });
    }

    public function createProgram(array $data)
    {
        // Handle image upload
        if (isset($data['image']) && $data['image'] instanceof \Illuminate\Http\UploadedFile) {
            $data['image_url'] = $this->handleImageUpload($data['image']);
            unset($data['image']);
        }
        // If image_url is not set but image is a string URL, use it
        elseif (isset($data['image']) && is_string($data['image'])) {
            $data['image_url'] = $data['image'];
            unset($data['image']);
        }

        $program = $this->repository->create($data);
        $this->clearCache();
        return $program;
    }

    public function updateProgram(int $id, array $data)
    {
        // Handle image upload
        if (isset($data['image']) && $data['image'] instanceof \Illuminate\Http\UploadedFile) {
            // Delete old image if exists and it's a local file
            $program = $this->repository->find($id);
            if ($program && $program->image_url && strpos($program->image_url, '/uploads/') === 0) {
                $this->deleteImage($program->image_url);
            }

            $data['image_url'] = $this->handleImageUpload($data['image']);
            unset($data['image']);
        }
        // If image_url is not set but image is a string URL, use it
        elseif (isset($data['image']) && is_string($data['image'])) {
            $data['image_url'] = $data['image'];
            unset($data['image']);
        }

        $result = $this->repository->update($id, $data);
        $this->clearCache($id);
        return $result;
    }

    public function deleteProgram(int $id)
    {
        $result = $this->repository->delete($id);
        $this->clearCache($id);
        return $result;
    }

    public function mapIntents(int $programId, array $intentIds)
    {
        $this->repository->mapIntents($programId, $intentIds);
        $this->clearCache($programId);
    }

    public function mapOutcomes(int $programId, array $outcomeIds)
    {
        $this->repository->mapOutcomes($programId, $outcomeIds);
        $this->clearCache($programId);
    }

    private function clearCache(?int $id = null): void
    {
        // Cache clearing disabled when caching is disabled
        // When using Redis, you can use Cache::tags(['programs'])->flush()

        // For file cache, manually clear specific keys if needed
        if ($id) {
            Cache::forget("program_{$id}");
        }

        // Clear common program list cache keys
        Cache::forget('programs_' . md5(json_encode([])));
        Cache::forget('programs_' . md5(json_encode(['is_active' => true])));
        Cache::forget('programs_' . md5(json_encode(['is_featured' => true])));
    }

    private function handleImageUpload(\Illuminate\Http\UploadedFile $image): string
    {
        $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/programs'), $filename);
        return '/uploads/programs/' . $filename;
    }

    private function deleteImage(string $imageUrl): void
    {
        $imagePath = public_path($imageUrl);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProgramResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'type' => $this->type,
            'description' => $this->description,
            'curriculum' => $this->curriculum,
            'duration' => $this->duration,
            'mode' => $this->mode,
            'fees' => $this->fees,
            'eligibility' => $this->eligibility,
            'image_url' => $this->image_url,
            'university' => new UniversityResource($this->whenLoaded('university')),
            'university_id' => $this->university_id,
            'intent' => new IntentResource($this->whenLoaded('intent')),
            'intent_id' => $this->intent_id,
            'outcome' => new OutcomeResource($this->whenLoaded('outcome')),
            'outcome_id' => $this->outcome_id,
            'intents' => IntentResource::collection($this->whenLoaded('intents')),
            'outcomes' => OutcomeResource::collection($this->whenLoaded('outcomes')),
            'testimonials' => TestimonialResource::collection($this->whenLoaded('testimonials')),
            'intent_tags' => $this->intent_tags,
            'outcome_tags' => $this->outcome_tags,
            'is_active' => $this->is_active,
            'is_featured' => $this->is_featured,
            'created_at' => $this->created_at?->toDateTimeString(),
        ];
    }
}

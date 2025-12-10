<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LeadResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'program' => new ProgramResource($this->whenLoaded('program')),
            'intent' => new IntentResource($this->whenLoaded('intent')),
            'outcome' => new OutcomeResource($this->whenLoaded('outcome')),
            'source' => $this->source,
            'status' => $this->status,
            'notes' => $this->notes,
            'created_at' => $this->created_at?->toDateTimeString(),
        ];
    }
}

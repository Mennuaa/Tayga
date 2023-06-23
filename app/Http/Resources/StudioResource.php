<?php

namespace App\Http\Resources;

use App\Models\StudiosManager;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudioResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "name" => $this->name,
            "email" => $this->email,
            "phone" => $this->phone,
            "image" => $this->image,
            "manager" => StudiosManager::where("studio_id",$this->id)->first()
        ];
    }
}

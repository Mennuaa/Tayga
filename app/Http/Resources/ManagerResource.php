<?php

namespace App\Http\Resources;

use App\Models\StudiosManager;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ManagerResource extends JsonResource
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
            "studios" => StudiosManager::where('manager_id',$this->id)
        ];
    }
}

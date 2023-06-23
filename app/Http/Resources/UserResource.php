<?php

namespace App\Http\Resources;

<<<<<<< HEAD
use App\Models\UserRoles;
=======
>>>>>>> aa3445f (projects done)
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
<<<<<<< HEAD
            "name" => $this->name,
            "email" => $this->email,
            "phone" => $this->phone,
            "role" => UserRoles::where('id', $this->role_id)->first()->name,
=======
            "avatar" => $this->avatar,
            "name" => $this->name,
            "phone" => $this->phone,
            "email" => $this->email,
>>>>>>> aa3445f (projects done)
        ];
    }
}

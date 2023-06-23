<?php

namespace App\Http\Resources;

use App\Models\ReviewImage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $user = User::where('id', $this->user_id)->first();
        return [
            "id" => $this->id,
            "avatars" => ReviewImageResource::collection(ReviewImage::where('revew_id', $this->id)->get()),
            "user" => UserResource::make($user),
            "stars" => $this->stars,
            "review" => $this->revew,
            "placement_stars" => $this->placement_stars,
            "service_stars" => $this->service_stars,
            "eat_stars" => $this->eat_stars,
            "date" => $this->date,
        ];
    }
}

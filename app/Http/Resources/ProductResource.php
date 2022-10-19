<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\PlatFormResource;
use App\Http\Resources\CommentResource;
class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'slug' => $this->slug,
            'category'  => new CategoryResource($this->getCategory),
            'platform' => new PlatFormResource($this->getCategory->getBusiness),
           // 'comment' => new CommentResource($this->getComment),
             'comment' =>   CommentResource::collection($this->getComment()->where('parent_id', 0)->get()),
        ];
    }
}

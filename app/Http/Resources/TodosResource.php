<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TodosResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'todos' => [
                    'id' => (integer)$this->id,
                    'description' => $this->description,
                    'due_date' => $this->due_date,
                    'is_complete' => (boolean)$this->false,
                ],
            'success' => (boolean)$this->FALSE,
            'error' => 'null'
        ];
    }
}

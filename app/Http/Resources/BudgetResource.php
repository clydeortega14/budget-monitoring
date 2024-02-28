<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BudgetResource extends JsonResource
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
            'id' => $this->id,
            'process_id' => $this->process_id,
            'branch' => [
                'id' => $this->branch->id,
                'name' => $this->branch->name
            ],
            'category' => [
                'id' => $this->category->id,
                'name' => $this->category->name
            ],
            'type_of_budget' => [
                'id' => $this->budgetType->id,
                'name' => $this->budgetType->name
            ],
            'purpose_type' => [
                'id' => $this->purposeType->id,
                'name' => $this->purposeType->name
            ],
            'amount' => $this->amount,
            'remarks' => $this->remarks
        ];
    }
}

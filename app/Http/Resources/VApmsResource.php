<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VApmsResource extends JsonResource
{
    //define properties
    public $voltage;
    public $current;

    /**
     * __construct
     * 
     * @param mixed $status
     * @param mixed $message
     * @param mixed $resource
     * @return void
     */
    public function __construct($status, $message, $resource)
    {
        parent::__construct($resource);
        $this->status = $status;
        $this->message = $message;
    }
    /**
     * toArray
     * 
     * @param mixed $request
     * @return array
     */
    public function toArray($request): array
    {
        if ($this->resource instanceof \Illuminate\Pagination\LengthAwarePaginator) {
            return [
                'success' => $this->status,
                'message' => $this->message,
                'current_page' => $this->resource->currentPage(),
                'per_page' => $this->resource->perPage(),
                'data'    => $this->resource->items(),
            ];
        }
        return [
            'success' => $this->status,
            'message' => $this->message,
            'data'    => $this->resource,
        ];
    }
}

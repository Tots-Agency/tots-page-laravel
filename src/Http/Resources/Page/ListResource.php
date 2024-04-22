<?php

namespace Tots\Page\Http\Resources\Page;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ListResource extends ResourceCollection
{
    public $collects = ShowResource::class;
}

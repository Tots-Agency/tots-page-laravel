<?php

namespace Tots\Page\Http\Controllers;

use Illuminate\Http\Request;
use Tots\Core\Http\Resources\SuccessResource;
use Tots\Page\Http\Requests\Page\StoreRequest;
use Tots\Page\Http\Requests\Page\UpdateRequest;
use Tots\Page\Http\Resources\Page\ListResource;
use Tots\Page\Http\Resources\Page\ShowResource;
use Tots\Page\Repositories\TotsPageRepository;

class PageController extends \Illuminate\Routing\Controller
{
    protected TotsPageRepository $repository;

    public function __construct(TotsPageRepository $repository)
    {
        $this->repository = $repository;
    }

    public function list(Request $request)
    {
        $elofilter = $this->repository->generateQuery($request);
        return new ListResource($elofilter->execute());
    }

    public function show($id)
    {
        $item = $this->repository->findOrFail($id);
        return response()->json(ShowResource::make($item));
    }

    public function showBySlug($slug)
    {
        $item = $this->repository->findBySlugOrFail($slug);
        return response()->json(ShowResource::make($item));
    }

    public function store(StoreRequest $request)
    {
        $item = $this->repository->createByData($request->validated());
        return response()->json(ShowResource::make($item));
    }

    public function update($id, UpdateRequest $request)
    {
        $this->repository->updateByData($id, $request->validated());
        return response()->json(SuccessResource::make('success'));
    }

    public function delete($id)
    {
        $this->repository->delete($id);
        return response()->json(SuccessResource::make('success'));
    }
}
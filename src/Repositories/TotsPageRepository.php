<?php

namespace Tots\Page\Repositories;

use Tots\Page\Models\TotsPage;

/**
 *
 * @author matiascamiletti
 */
class TotsPageRepository
{

    public function generateQuery($request)
    {
        return \Tots\EloFilter\Query::run(TotsPage::class, $request);
    }

    public function findOrFail($id)
    {
        return TotsPage::findOrFail($id);
    }

    public function findBySlugOrFail($slug)
    {
        return TotsPage::where('slug', $slug)->firstOrFail();
    }


    public function create($title, $languageId = null, $type = null, $content = null, $data = null)
    {
        $page = new TotsPage();
        $page->title = $title;
        $page->language_id = $languageId;
        $page->type = $type;
        $page->content = $content;
        $page->data = $data;
        $page->save();
        return $page;
    }

    public function createByData($data)
    {
        return $this->create($data['title'], $data['language_id'] ?? null, $data['type'] ?? null, $data['content'] ?? null, $data['data'] ?? null);
    }

    public function update($id, $title, $languageId = null, $type = null, $content = null, $data = null)
    {
        $page = TotsPage::findOrFail($id);
        $page->title = $title;
        $page->language_id = $languageId;
        $page->type = $type;
        $page->content = $content;
        $page->data = $data;
        $page->save();
        return $page;
    }

    public function updateByData($id, $data)
    {
        return $this->update($id, $data['title'], $data['language_id'] ?? null, $data['type'] ?? null, $data['content'] ?? null, $data['data'] ?? null);
    }

    public function delete($id)
    {
        $category = $this->findOrFail($id);
        $category->delete();
    }
}
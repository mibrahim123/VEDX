<?php

namespace App\Repository;

use App\Models\Category;
use Illuminate\Support\Collection;
use App\Repository\Interfaces\CategoryRepositoryInterface;
use Yajra\Datatables\Datatables;

class CategoryRepository implements CategoryRepositoryInterface
{

    /**
     * Create mode objects
     */
    public function __construct(Category $category)
    {
        $this->_category = $category;
    }

    /**
     * Store category in the database.
     */
    public function store(Array $category): Array
    {
        try {
            if (isset($category['image'])) {
                $fileName = $category['slug'].'.'.$category['image']->getClientOriginalExtension();

                $category['image']->storeAs(
                    'public/categories',
                    $fileName,
                );

                $image = $fileName;
            }

            $size = $category['image']->getSize();
            $category = $this->_category->create($category);

            if (isset($image)) {
                $category->image()->create([
                    'mediable_id' => $category->id,
                    'mediable_type' => 'App\Models\Category',
                    'media_file' => $image,
                    'size' => $size
                ]);
            }

            return sendResponse($category, 'Category created successfully.');
        } catch (Exception $e) {
            return sendError(500, $e->getMessage());
        }
    }

    public function ajaxList($parent_id = null)
    {
        if($parent_id == 'sub-category')
            $category = $this->_category->query()->whereNotNull('parent_id');
        else
            $category = $this->_category->query()->where('parent_id', $parent_id);

        return Datatables::of($category)
        ->addIndexColumn()
        ->editColumn('hero_image', function($row) use ($parent_id) {
            return "<img src='".$row->hero_image."' width='150' height = '150' style='max-width:100px'>";
        })
        ->editColumn('is_active', function($row) use ($parent_id) {
            $isactive = $row->is_active == 1 ? 'checked' : '';
            $route = ($parent_id == 'sub-category') ? route('sub-categories.update-status', $row->id) : route('categories.update-status', $row->id);
            return "<input type='checkbox' class='chk_switch' ".$isactive."
                data-url = '".$route."'
            >";
        })
        ->editColumn('is_show', function($row) use ($parent_id) {
            $isactive = $row->is_show == 1 ? 'checked' : '';
            $route = ($parent_id == 'sub-category') ? route('categories.update-home-status', $row->id) : route('categories.update-home-status', $row->id);

            return "<input type='checkbox' class='chk_switch' ".$isactive."
                data-url = '".route('categories.update-home-status', $row->id)."'
            >";
        })
        ->addColumn('action', function ($row) use ($parent_id) {
            $editRoute = ($parent_id == 'sub-category') ? route('sub-categories.edit', $row->slug) : route('categories.edit', $row->slug);
            $deleteRoute = ($parent_id == 'sub-category') ? route('sub-categories.delete', $row->slug) : route('categories.delete', $row->slug);

            return '<a href="'.$editRoute.'"
            class="text-primary">
                <i class="fas fa-edit"></i>
            </a><a href="'.$deleteRoute.'"
            class="text-danger ml-1">
                <i class="fas fa-trash"></i>
            </a>';
        })
        ->rawColumns(['action', 'hero_image', 'is_active', 'is_show'])
        ->make(true);
    }

    /**
     * Update a specific category details.
     */
    public function update(array $category, string $id)
    {
        try {
            $result = $this->_category->where(
                'slug', $id)->firstOrFail();

            \Storage::disk('public')->delete($result->image->media_file);

            if (isset($category['image'])) {
                $fileName = $category['slug'].'.'.$category['image']->getClientOriginalExtension();

                $category['image']->storeAs(
                    'public/categories',
                    $fileName,
                );

                $image = $fileName;
            }
            $size = $category['image']->getSize();
            $category = $result->update($category);

            if (isset($image)) {
                $result->image()->updateOrCreate(
                ['mediable_id' => $result->id],
                [
                    'mediable_id' => $result->id,
                    'mediable_type' => 'App\Models\Category',
                    'media_file' => $image,
                    'size' => $size
                ]);
            }

            return sendResponse($category, 'Category Updated Successfully.');

        } catch (Exception $e) {
            return sendError(500, $e->getMessage());
        }
    }

    /**
     * Delete a specific category.
     */
    public function delete($id)
    {
        try {
            $result = $this->_category->where(
                'slug', $id)->firstOrFail();
            \Storage::disk('public')->delete($result->image->media_file);
            $result = $result->delete();


            if ($result) {
                return sendResponse([], 'Category deleted successfully.');
            }

            return sendError(500);
        } catch (Exception $e) {
            return sendError(500, $e->getMessage());
        }
    }

    public function list($parent_id = null)
    {
        return $this->_category->where('parent_id', $parent_id)->get();
    }

}

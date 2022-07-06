<?php

namespace App\Http\Controllers\Admin;

use App\Traits\HasCrud;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\CategoryRepository;
use App\Http\Requests\Admin\SubCategory\StoreRequest;
use App\Repository\Interfaces\CategoryRepositoryInterface;

class SubCategoryController extends Controller
{

    protected $model = \App\Models\Category::class;

    use HasCrud;

    public function __construct(CategoryRepository $category)
    {
        $this->category = $category;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.sub-categories.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parentCategory = $this->category->list();
        return view('admin.sub-categories.create', compact('parentCategory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $result = $this->category->store($request->validated());

        if ($result['success']) {
            return redirect()->route('sub-categories.index')->with('success', $result['message']);
        }

        return redirect()->route('sub-categories.index')->with('error', $result['message']);
    }

   /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ajaxList()
    {
        return $this->category->ajaxList('sub-category');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = $this->getModel()->where(
            'slug', $id)->firstOrFail();
        $parentCategory = $this->category->list();
        return view('admin.sub-categories.edit', compact('category', 'parentCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRequest $request, $id)
    {
        $result = $this->category->update($request->validated(), $id);

        if ($result['success']) {
            return redirect()->route('sub-categories.index')->with('success', $result['message']);
        }

        return redirect()->route('sub-categories.index')->with('error', $result['message']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->category->delete($id);

        if ($result['success']) {
            return redirect()->route('sub-categories.index')->with('success', $result['message']);
        }

        return redirect()->route('sub-categories.index')->with('error', $result['message']);
    }
}

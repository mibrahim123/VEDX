<?php

namespace App\Http\Controllers\Admin;

use App\Traits\HasCrud;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\CategoryRepository;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Repository\Interfaces\CategoryRepositoryInterface;

class CategoryController extends Controller
{
    protected $model = \App\Models\Category::class;

    use HasCrud;

    public function __construct(CategoryRepository $category)
    {
        $this->category = $category;
    }

    public function index(Request $request)
    {
        return view('admin.categories.index');
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(StoreRequest $request)
    {
        $result = $this->category->store($request->validated());

        if ($result['success']) {
            return redirect()->route('categories.index')->with('success', $result['message']);
        }

        return redirect()->route('categories.index')->with('error', $result['message']);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ajaxList()
    {
        return $this->category->ajaxList();

    }

    public function updateHomeStatus($id)
    {
        $result = $this->updateData($id, [
            'is_show' => request()->status
        ]);

        if ($result) {
           return response()->json(['Status Updated'], 200);
        }

        return response()->json(['Something Went Wrong'], 500);
    }


    public function updateStatus($id)
    {
        $result = $this->updateData($id, [
            'is_active' => request()->status
        ]);

        if ($result) {
           return response()->json(['Status Updated'], 200);
        }

        return response()->json(['Something Went Wrong'], 500);
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
        return view('admin.categories.edit', compact('category'));
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
            return redirect()->route('categories.index')->with('success', $result['message']);
        }

        return redirect()->route('categories.index')->with('error', $result['message']);

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

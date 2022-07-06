<?php

namespace App\Http\Controllers\Admin;

use App\Traits\HasCrud;
use Illuminate\Http\Request;
use App\Repository\SkillRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Skill\StoreRequest;

class SkillController extends Controller
{
    protected $model = \App\Models\Skill::class;

    use HasCrud;

    public function __construct(SkillRepository $skill)
    {
        $this->skill = $skill;
    }

    public function index(Request $request)
    {
        return view('admin.skills.index');
    }

    public function create()
    {
        return view('admin.skills.create');
    }

    public function store(StoreRequest $request)
    {
        $result = $this->storeData($request->validated());

        if ($result) {
            return redirect()->route('skills.index')->with('success', 'Skill Added Successfully');
        }

        return redirect()->route('skills.index')->with('error','Something Went Wrong');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ajaxList()
    {
        return $this->skill->ajaxList();

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
            'status' => request()->status
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
        $skill = $this->getModel()->where(
            'id', $id)->firstOrFail();
        return view('admin.skills.edit', compact('skill'));
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
        $result = $this->updateData($id, $request->validated());

        if ($result) {
            return redirect()->route('skills.index')->with('success', 'Skill Updated Successfully');
        }

        return redirect()->route('skills.index')->with('error', 'Something Went Wrong');

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->deleteData($id);

        if ($result) {
            return redirect()->route('skills.index')->with('success', 'Skill Deleted Successfully');
        }

        return redirect()->route('skills.index')->with('error', 'Something Went Wrong');
    }
}

<?php

namespace App\Repository;

use App\Models\Skill;
use App\Models\Category;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Collection;
use App\Repository\Interfaces\SkillRepositoryInterface;

class SkillRepository implements SkillRepositoryInterface
{

    /**
     * Create mode objects
     */
    public function __construct(Skill $skill)
    {
        $this->_skill = $skill;
    }


    public function ajaxList($parent_id = null)
    {


        return Datatables::of($this->_skill->query())
        ->addIndexColumn()

        ->editColumn('is_active', function($row) use ($parent_id) {
            $isactive = $row->status == 1 ? 'checked' : '';
            $route = route('skills.update-status', $row->id);
            return "<input type='checkbox' class='chk_switch' ".$isactive."
                data-url = '".$route."'
            >";
        })

        ->addColumn('action', function ($row) use ($parent_id) {
            $editRoute = route('skills.edit', $row->id);
            $deleteRoute = route('skills.delete', $row->id);

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

    public function list() {
        return $this->_skill->get();
    }

}

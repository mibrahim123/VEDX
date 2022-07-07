<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Repository\SkillRepository;
use App\Http\Controllers\Controller;
use App\Http\Resources\SkillResource;

class SkillController extends Controller
{
    public function __construct(SkillRepository $skill)
    {
        $this->skill = $skill;
    }

    public function list() {
        return sendResponse(
            SkillResource::collection($this->skill->list()),
        200);
    }
}

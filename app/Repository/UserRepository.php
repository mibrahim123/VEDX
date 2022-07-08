<?php

namespace App\Repository;

use App\Traits\HasCrud;
use App\Repository\Interfaces\CrudRepositoryInterface;

class UserRepository implements CrudRepositoryInterface
{

    protected $model = \App\Models\User::class;
    use HasCrud;


    public function register($data)
    {
        try {
            $myPassword = $data['password'];
            $data['password'] = \Hash::make($data['password']);

            $user = $this->storeData($data);

            if($data['role'] == 'student' || $data['role'] == 'non-student') {

                $this->addStudentCategories($user, $data);
                $this->addStudentSkills($user, $data);

                if($data['role'] == 'student') {
                    $this->addStudentDetails($user, $data);
                }
            }

            \Auth::attempt([
                'email' => $data['email'],
                'password' => $myPassword
            ]);

            if (request()->wantsJson()) {
                $user['_token'] = $user->createToken("token");
            }

            return sendResponse($user);
        } catch (\Exception $e) {
            return sendError(500, $e->getMessage());
        }
    }

    public function login()
    {

    }

    public function addStudentCategories($user, $data)
    {
        $user->category()->create([
            'user_id' => $user->id,
            'category_id' => $data['category'],
            'sub_category_id' => $data['sub_category']
        ]);
    }

    public function addStudentSkills($user, $data)
    {
        if(!empty($data['new_skills'])) {
            foreach($data['skills'] as $skill) {
                $newSkillID = Skill::create([
                    'title' => $skill
                ])->id;

                $data['skills'][] =$newSkillID;
            }

        }

        foreach($data['skills'] as $skill) {
            $user->skills()->create([
                'user_id' => $user->id,
                'skill_id' => $skill
            ]);
        }
    }

    public function addStudentDetails($user, $data)
    {
        $user->studentDetails()->create([
            'user_id' => $user->id,
            'grade' => $data['grade'],
            'school' => $data['school'],
            'curriculum' => $data['curriculum']
        ]);
    }
}

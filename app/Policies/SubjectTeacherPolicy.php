<?php

namespace App\Policies;

use App\Models\SubjectTeacher;
use App\Models\User;

class SubjectTeacherPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function edit(User $user, SubjectTeacher $subjectTeacher) {
        return $user->id === $subjectTeacher->user_id;
    }

    public function delete(User $user, SubjectTeacher $subjectTeacher) {
        return $user->id === $subjectTeacher->user_id;
    }
}

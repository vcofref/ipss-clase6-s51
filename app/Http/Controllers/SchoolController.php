<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Subject;
use Illuminate\Http\JsonResponse;

class SchoolController extends Controller
{
    public function estudiantes(): JsonResponse
    {
        $student = Student::get();
        // dd($student);
        return response()->json($student);
    }

    public function profesor($teacherId): JsonResponse
    {
        try {
            $teacher = Teacher::with('sections.subject')->findOrFail($teacherId);
            //dd($teacher);
            return response()->json($teacher);
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Teacher not found','message' => $th->getMessage(),], 404);
        }        
    }

    public function listado(): JsonResponse
    {
        $subjects = Subject::with('sections.teacher', 'sections.students')->get();
        return response()->json($subjects);
    }
}

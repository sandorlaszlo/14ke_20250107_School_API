<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Http\Resources\StudentResource;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $students = Student::with('course')->get();
        //$students = Student::all();
        $students = StudentResource::collection(Student::all());


        // return response($students, 200);
        return response()->json($students, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
        $validated = $request->validated();
        $student = Student::create($validated);        
        return response()->json($student, 201);
    }

    /**
     * Display the specified resource.
     */
    // public function show(Student $student)
    public function show($id)
    {
        // $student = StudentResource::make(Student::find($id));
        $student = new StudentResource(Student::find($id));
        if (!$student) {
            return response()->json(['message' => 'Student not found'], 404);
        }
        return response()->json($student, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, $id)
    {
        $validated = $request->validated();
        $student = Student::find($id);
        if (!$student) {
            return response()->json(['message' => 'Student not found'], 404);
        }
        $student->update($validated);
        return response()->json(new StudentResource($student), 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        if (!$student) {
            return response()->json(['message' => 'Student not found'], 404);
        }
        $student->delete();
        return response()->noContent();
    }

    public function searchByName($name)
    {
        $students = Student::where('name', 'like', '%' . $name . '%')->get();
        if ($students->isEmpty()) {
            return response()->json(['message' => 'Student not found'], 404);
        }
        return response()->json(StudentResource::collection($students), 200);
    }
}

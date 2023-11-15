<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ClassType;
use App\Models\ScheduledClass;
use App\Models\User;
use Illuminate\Http\Request;

class ScheduledClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $scheduledClasses = auth()->user()->scheduledclasses()->upcoming()->oldest('date_time')->get();

        return view('instructor.upcoming')->with('scheduledClasses', $scheduledClasses);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classTypes = ClassType::all();

        return view('instructor.schedule')->with('classTypes', $classTypes);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $date_time = $request->input('date') . " " . $request->input('time');

        $request->merge([
            'date_time' => $date_time,
            'instructor_id' => auth()->id()
        ]);

        $validate = $request->validate([
            'class_type_id' => 'required',
            'date_time' => 'required|unique:scheduled_classes,date_time|after:date:now',
            'instructor_id' => 'required'
        ]);

        ScheduledClass::create($validate);

        return redirect()->route('schedule.index');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ScheduledClass $schedule)
    {




        if(auth()->user()->cannot('delete',$schedule)){
            abort(403);
        }

        $schedule->delete();
        return redirect()->route('schedule.index');
    }
}

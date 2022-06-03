<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TechnicalTestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activities = Activity::where('user_id', Auth::user()->id)->orderBy('id','desc')->paginate(8);
        return view('prueba-tecnica', compact('activities'));
    }

    public function validationAttributes()
    {
        return [
            'activity' => 'actividad',
            'date' => 'fecha de la actividad',
            'hours' => 'horas empleadas',
        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $max = now()->format('Y-m-d');
        $request->validate([
            'activity' => 'required|string|min:3|max:255',
            'hours' => 'required|integer|min:1|max:8',
            'date' => "required|date|before_or_equal:$max",
        ], [], $this->validationAttributes());
        $horas_actividades_anteriores = Activity::where('user_id', Auth::user()->id)->where('activity', 'like', $request->activity)->sum('hours');
        if (($horas_actividades_anteriores + $request->hours) > 8) {
            $horas_disponibles = 8 - $horas_actividades_anteriores;
            return redirect()->back()->withErrors(['hours' => "Las horas totales para la actividad superan las 8 horas. Horas disponibles: $horas_disponibles"])->withInput();
        }
        Activity::create([
            'user_id' => Auth::user()->id,
            'activity' => $request->activity,
            'hours' => $request->hours,
            'date' => $request->date,
        ]);
        return redirect()->back()->with('success', 'Actividad agregada correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

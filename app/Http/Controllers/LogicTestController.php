<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogicTestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $myArrayItemOne = $this->getRandomNumbers(1, 100, 5);
        $myArrayItemTwo = $this->getRandomNumbers(1, 5, 10);
        $myArrayItemThree = $this->getRandomNumbers(1, 5, 10);
        $highNumber = max($myArrayItemOne);
        $histogram = $this->getHistogram($myArrayItemTwo);
        $maxRepeat = $this->getMaxRepeat($myArrayItemThree);
        return view('prueba-logica', compact(
            'myArrayItemOne',
            'highNumber',
            'myArrayItemTwo',
            'histogram',
            'myArrayItemThree',
            'maxRepeat'
        ));
    }

    public function getMaxRepeat($array)
    {
        $cuenta = array_count_values($array);
        arsort($cuenta);
        $maxRepeat = [];
        $maxRepeat[] = ['number' => key($cuenta), 'repeat' => current($cuenta)];
        return $maxRepeat; //tengo el q más se repite, ahora falta saber cuantas veces se repite
    }

    public function getRandomNumbers($min, $max, $quantity)
    {
        $numbers = [];
        for ($i = 0; $i < $quantity; $i++) {
            $numbers[] = rand($min, $max);
        }
        return $numbers;
    }
    public function getHistogram($array)
    {
        $histogram = [];
        for ($i = 1; $i <= 5; $i++) {
            $cantidad = array_count_values($array);
            $histogram[$i] = $cantidad[$i] ?? 0;
        }
        return $histogram;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;

class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $servicios = Servicio::with('user')->latest()->get();

        return view('servicios.index', compact('servicios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('servicios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datos = $request->validate([
            'nombre' => 'required|string|max:100',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'duracion_estimada' => 'required|integer|min:1',
            'estado' => 'required|string|max:30',
        ]);

        $datos['user_id'] = auth()->id();

        Servicio::create($datos);

        return redirect()->route('servicios.index')->with('success', 'Servicio registrado correctamente.');
    }
}

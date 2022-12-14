<?php

namespace App\Http\Controllers;

use App\Models\Ornitologo;
use Illuminate\Http\Request;

/**
 * Class OrnitologoController
 * @package App\Http\Controllers
 */
class OrnitologoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ornitologos = Ornitologo::paginate();

        return view('ornitologo.index', compact('ornitologos'))
            ->with('i', (request()->input('page', 1) - 1) * $ornitologos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ornitologo = new Ornitologo();
        return view('ornitologo.create', compact('ornitologo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Ornitologo::$rules);

        $ornitologo = Ornitologo::create($request->all());

        return redirect()->route('ornitologos.index')
            ->with('success', 'Ornitologo created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ornitologo = Ornitologo::find($id);

        return view('ornitologo.show', compact('ornitologo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ornitologo = Ornitologo::find($id);

        return view('ornitologo.edit', compact('ornitologo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Ornitologo $ornitologo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ornitologo $ornitologo)
    {
        request()->validate(Ornitologo::$rules);

        $ornitologo->update($request->all());

        return redirect()->route('ornitologos.index')
            ->with('success', 'Ornitologo updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $ornitologo = Ornitologo::find($id)->delete();

        return redirect()->route('ornitologos.index')
            ->with('success', 'Ornitologo deleted successfully');
    }
}

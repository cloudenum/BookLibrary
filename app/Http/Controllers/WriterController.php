<?php

namespace App\Http\Controllers;

use App\Models\Writer;
use Illuminate\Http\Request;

class WriterController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $writers = Writer::paginate(20);
        return view('dashboard.writer.writersList', ['writers' => $writers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.writer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name'             => 'required|alpha',
            'last_name'           => 'required|alpha'
        ]);

        $writer = new Writer();
        $writer->first_name     = $request->input('first_name');
        $writer->last_name   = $request->input('last_name');
        $writer->save();
        $request->session()->flash('message', 'Successfully created a writer');
        return redirect()->route('writer.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $writer = Writer::find($id);
        return view('dashboard.writer.writerShow', ['writer' => $writer]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $writer = Writer::find($id);
        return view('dashboard.writer.edit', ['writer' => $writer]);
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
        $request->validate([
            'first_name'             => 'required|alpha',
            'last_name'           => 'required|alpha'
        ]);

        $writer = Writer::find($id);
        $writer->first_name     = $request->input('first_name');
        $writer->last_name      = $request->input('last_name');
        $writer->save();
        $request->session()->flash('message', 'Successfully edited');
        return redirect()->route('writer.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $writer = Writer::find($id);
        if ($writer) {
            $writer->delete();
        }
        return redirect()->route('writer.index');
    }
}

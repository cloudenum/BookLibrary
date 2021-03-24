<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Writer;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
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
        $books = Book::with('writers')->paginate(20);
        return view('dashboard.book.booksList', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $writers = Writer::all();
        return view('dashboard.book.create', ['writers' => $writers]);
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
            'title'                 => 'required|string',
            'description'           => 'required|string',
            'image_file'            => 'required|file',
            'published_date'        => 'required|date',
            'total_pages'           => 'required|numeric',
            'writers.*'             => 'required|exists:App\Models\Writer,id'
        ]);

        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->storePublicly('books_img');

            $book = new Book();
            $book->title            = $request->input('title');
            $book->description      = $request->input('description');
            $book->total_pages      = $request->input('total_pages');
            $book->published_date   = $request->input('published_date');
            $book->image_url        = Storage::url($path);

            $writers = $request->input('writers');
            $book->writers()->attach($writers);
            $book->save();

            $request->session()->flash('message', 'Successfully created a book');
        } else {
            $request->session()->flash('message', 'Not valid file');
        }

        return redirect()->route('book.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::with('writers')->find($id);
        return view('dashboard.book.bookShow', ['book' => $book]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::with('writers')->find($id);
        return view('dashboard.book.edit', ['book' => $book]);
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
            'title'                 => 'required|string',
            'description'           => 'required|string',
            'image_file'            => 'file',
            'published_date'        => 'required|date',
            'total_pages'           => 'required|numeric',
            'writers.*'             => 'required|exists:App\Models\Writer,id'
        ]);

        $book = Book::find($id);
        if (!$book) {
            $request->session()->flash('message', 'ID doesn\'t exists');
            return redirect()->route('book.index');
        }

        $book->title            = $request->input('title');
        $book->description      = $request->input('description');
        $book->total_pages      = $request->input('total_pages');
        $book->published_date   = $request->input('published_date');

        $writers = $request->input('writers');
        $book->writers()->detach();
        $book->writers()->attach($writers);

        if ($request->exists('image_file')) {
            if (!$request->hasFile('image_file')) {
                $request->session()->flash('message', 'Not valid file');
                return redirect()->route('book.index');
            }

            $path = $request->file('image_file')->storePublicly('books_img');
            $book->image_url        = Storage::url($path);
        }

        $book->save();
        $request->session()->flash('message', 'Successfully updated a book');
        return redirect()->route('book.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);
        if ($book) {
            $book->writers()->detach();
            $book->delete();
        }
        return redirect()->route('book.index');
    }
}

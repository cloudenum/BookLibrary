<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Resources\BookCollection;
use App\Models\Book;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    /**
     * Display a listing of the resource with filter
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $validatedInput = $request->validate([
            'title'     => 'string',
            'items_per_page' => 'integer',
            'writer_id' => 'integer|exists:App\Models\Writer,id'
        ]);

        try {
            $writerCriteria = [];
            $bookCriteria = [];
            if (key_exists('title', $validatedInput)) {
                $title = $validatedInput['title'];
                $bookCriteria[] = ['books.title', '=', $title];
            }

            if (key_exists('writer_id', $validatedInput)) {
                $writer_id = $validatedInput['writer_id'];
                $writerCriteria[] = ['id', '=', $writer_id];
            }

            $itemsPerPage = key_exists('items_per_page', $validatedInput) ? $validatedInput['items_per_page'] : 20;

            DB::beginTransaction();
            $bookCollection = new BookCollection(
                Book::with('writers')->whereHas('writers', function ($query) use ($writerCriteria) {
                    $query->where($writerCriteria);
                })
                    ->where($bookCriteria)
                    ->paginate($itemsPerPage)
            );
            DB::commit();

            return $bookCollection;
        } catch (\Exception $e) {
            report($e);
            return response()->json([
                'message' => 'Something went wrong.'
            ], 500,);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return response()->json([
            'message' => 'Function not implemented'
        ], 422);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $validator = Validator::make(['id' => $id], [
                'id' => 'required|integer|exists:App\Models\Book,id'
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors()->toArray(), 404);
            }
            return new BookCollection(Book::with('writers')->where('id', $id)->get());
        } catch (\Exception $e) {
            report($e);
            return response()->json([
                'message' => 'Something went wrong.'
            ], 500);
        }
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
        return response()->json([
            'message' => 'Function not implemented'
        ], 422);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return response()->json([
            'message' => 'Function not implemented'
        ], 422);
    }
}

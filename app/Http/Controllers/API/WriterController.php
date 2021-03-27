<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\WriterCollection;
use App\Models\Writer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class WriterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $validatedInput = $request->validate([
            'first_name'     => 'alpha',
            'last_name'      => 'alpha',
            'items_per_page' => 'integer',
            'book_id' => 'integer|exists:App\Models\Book,id'
        ]);

        try {
            $writerCriteria = [];
            $bookCriteria = [];
            if (key_exists('book_id', $validatedInput)) {
                $bookId = $validatedInput['book_id'];
                $bookCriteria[] = ['books.id', '=', $bookId];
            }

            if (key_exists('first_name', $validatedInput)) {
                $firstName = $validatedInput['first_name'];
                $writerCriteria[] = ['writers.first_name', 'like', "%$firstName%"];
            }

            if (key_exists('last_name', $validatedInput)) {
                $lastName = $validatedInput['last_name'];
                $writerCriteria[] = ['writers.last_name', 'like', "%$lastName%"];
            }

            $itemsPerPage = key_exists('items_per_page', $validatedInput) ? $validatedInput['items_per_page'] : 20;

            DB::beginTransaction();
            $writerCollection = new WriterCollection(
                Writer::with('books')->whereHas('books', function ($query) use ($bookCriteria) {
                    $query->where($bookCriteria);
                })
                    ->where($writerCriteria)
                    ->paginate($itemsPerPage)
            );
            DB::commit();

            return $writerCollection;
        } catch (\Exception $e) {
            report($e);
            return response()->json([
                'message' => 'Something went wrong.'
            ], 500);
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
                'id' => 'required|integer|exists:App\Models\Writer,id'
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors()->toArray(), 404);
            }
            return new WriterCollection(Writer::with('books')->where('id', $id)->get());
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

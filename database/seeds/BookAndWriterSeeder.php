<?php

use Illuminate\Database\QueryException;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookAndWriterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Writer::class, 23)->create();
        factory(App\Models\Book::class, 50)->create();
        $arrOfNumber = [];
        for ($i = 0; $i < 23; $i++) {
            array_push($arrOfNumber, $i + 1);
        }
        shuffle($arrOfNumber);

        for ($i = 0; $i < 50; $i++) {
            DB::table('book_writer')->insert([
                'book_id' => $i + 1,
                'writer_id' => $i < 23 ? $arrOfNumber[$i] : random_int(1, 23)
            ]);
            // repeat
            if (!random_int(0, 3)) {
                try {
                    DB::table('book_writer')->insert([
                        'book_id' => $i + 1,
                        'writer_id' => random_int(1, 23)
                    ]);
                } catch (QueryException $e) {
                }
            }
        }
    }
}

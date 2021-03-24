<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WriterSeeder extends Seeder
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
            DB::table('books_writers')->insert([
                'book_id' => $i + 1,
                'writer_id' => $i < 23 ? $arrOfNumber[$i] : random_int(1, 23)
            ]);
        }
    }
}

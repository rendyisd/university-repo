<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Author;
use App\Models\Document;

class AuthorDocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $authors = Author::factory()->count(20)->create();
        $documents = Document::factory()->count(10)->create();

        foreach($documents as $document){
            $randomAuthors = $authors->random(rand(2, 3));

            $document->author()->attach($randomAuthors[0]->id, ['status' => 'Main']);

            for($i = 1; $i < count($randomAuthors); $i++){
                $document->author()->attach($randomAuthors[$i]->id, ['status' => 'Contributor']);
            }
        }
    }
}

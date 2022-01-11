<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Document;
use App\Models\Note;
use App\Models\Step;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();
        Document::factory(10)->create();
        Note::factory(5)->create();
        for ($i = 1; $i < 11; $i++) {
            $steps = Step::factory(3)->make([
                'document_id' => $i,
            ]);
            foreach ($steps as $step) {
                $step->save();
            }
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::query()->truncate();

        $ganres = [
            'Art/architecture',
            'Autobiography',
            'Biography',
            'Business/economics',
            'Crafts/hobbies',
            'Cookbook',
            'Diary',
            'Dictionary',
            'Encyclopedia',
            'Guide',
            'Health/fitness',
            'History',
            'Home and garden',
            'Humor',
            'Journal',
            'Math',
            'Memoir',
            'Philosophy',
            'Prayer',
            'Religion, spirituality, and new age',
            'Textbook',
            'True crime',
            'Review',
            'Science',
            'Self help',
            'Sports and leisure',
            'Travel'

        ];

        foreach ($ganres as $item) {
            Category::query()->create(['title' => $item]);
        }


        $this->TableInfo($ganres);
    }

    /**
     * @param array $ganres
     */
    private function TableInfo(array $ganres): void
    {
        $header = ['#', 'Title'];

        foreach (Category::all() as $key => $cat) {
            $body [] = [++$key, $cat->title];
        }
        $this->command->table($header,$body);
    }
}

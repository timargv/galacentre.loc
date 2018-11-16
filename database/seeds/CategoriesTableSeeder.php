<?php

use Illuminate\Database\Seeder;
use Illuminate\Console\Command;

/**
 * @property  output
 */
class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $json = file_get_contents('http://www.galacentre.ru/api/v2/sections/json/?key=d27b9aa09102f001d6f6f5c5fc97d222');
        $data =  (array)json_decode($json);
        $catalogs = $data['DATA'];
        $categoriesDate = $data['META'];


        $query = \App\Entity\Products\Category::all('id');

        $categories = [];

        $this->command->getOutput()->progressStart(count($catalogs));

        foreach ($catalogs as $key => $item) {

            if (!empty($value = $item->id)) {
                $query->where('id', $value);
                if (count($query) == null)  {
                    DB::table('product_categories')->insert(
                        [
                            'id' => $categories[$key] = $item->id,
                            'parent_id' => $categories[$key] = $item->parent_id,
                            'name_original' => $categories[$key] = $item->name,
                            'code' => $categories[$key] = $item->code,
                            'status' => $categories[$key] = $item->active,
                            'count' => $categories[$key] = $item->count,
                            'date' => $categoriesDate->TIMESTAMP,
                            'slug' => str_slug($categories[$key] = $item->name),
                        ]
                    );
                }
            }

            $this->command->getOutput()->progressAdvance();


        }

        $this->command->getOutput()->progressFinish();

        if (count($query) == count($catalogs)) {
            $this->command->comment("Новых категории нет"  , 'red');
        } elseif (count($query) < count($catalogs)) {
            $this->command->comment("Добавлены Новые категории"  , 'red');
        }

        \App\Entity\Products\Category::fixTree();

    }
}

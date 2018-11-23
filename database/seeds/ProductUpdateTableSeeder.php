<?php

use App\Entity\Products\Product\Product;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;
use Rap2hpoutre\FastExcel\FastExcel;


class ProductUpdateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run(Product $queryProd)
    {

        $filename = 'update-price.xlsx';
        $path =  public_path('files\\' . $filename);

//        dd($path);

        $collection = (new FastExcel)->import($path);

        $this->command->getOutput()->progressStart(count($collection));

        $collection->filter()->each(function($item) {
            if (is_integer($item['stk'])) {
                Product::where('article', '=', $item['article'])->update([
                    'stk' => $item['stk']
                ]);
            }
            $this->command->getOutput()->progressAdvance();
        });

        $this->command->getOutput()->progressFinish();
        $this->command->comment(date('Y-m-d H:i:s'));

//        $users = (new FastExcel)->import('file.xlsx', function ($line) {
//            return User::create([
//                'name' => $line['МСК Томилино НОВЫЙ'],
//                'email' => $line['Email']
//            ]);
//        });

    }
}

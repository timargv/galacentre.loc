<?php

use App\Entity\Products\Product\Product;
use Illuminate\Database\Seeder;
use Rap2hpoutre\FastExcel\FastExcel;

class ProductUpdatePlusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $filename = 'update-price-plus.xlsx';
        $path =  public_path('files\\' . $filename);

//        dd($path);

        if ($path != false) {
            $collection = (new FastExcel)->import($path);

            $this->command->getOutput()->progressStart(count($collection));

            $collection->filter()->each(function($item) {
                if (is_integer($item['stk'])) {
                    $product = Product::where('article', '=', $item['article'])->first();

                    if ($product != false) {
                        $productStk = $product->stk + $item['stk'];

                        $product->update([
                            'stk' => $productStk
                        ]);
                    }
                }
                $this->command->getOutput()->progressAdvance();
            });

            $this->command->getOutput()->progressFinish();
        } else {
            $this->command->error("Нет файла");
        }
    }
}

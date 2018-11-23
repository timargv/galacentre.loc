<?php

namespace App\Console\Commands\Delete;

use App\Entity\Products\Product\Product;
use Illuminate\Console\Command;

class DeleteProductsTable extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:products';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        Product::truncate();
        $this->info(date('Y-m-d H:i:s'));
        $this->info('Все Товары удалены!');
    }
}

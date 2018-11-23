<?php

namespace App\Console\Commands\Delete;

use App\Entity\Products\Category;
use Illuminate\Console\Command;

/**
 * @property  command
 */
class DeleteCategoriesTable extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:categories';

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
        Category::truncate();
        $this->info(date('Y-m-d H:i:s'));
        $this->info('Все Категории удалены!');
    }
}

<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Product;

class ChangeProductTable extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ChangeProductTable:changeproduct';

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
        $product = Product::where('price', '!=', 0)->first();
        $product->price = rand(1000,9999);
        $product->counts = rand(10000,99999);
        $product->save();
    }
}

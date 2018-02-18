<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Pusher\Pusher;
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
       if(count(Product::all()) == 0){
            $product = new Product;
            $product->name = 'Laravel Pusher Testing';
            $product->description = 'This is a sample for laravel pusher testing';
            $product->price = mt_rand(10000000, 99999999);
            $product->save();
        }else{
            $product = Product::where('id', '!=', null)->first();
            $product->price = mt_rand(10000000, 99999999);
            $product->save();
        }
        
        $options = array(
            'cluster' => config('broadcasting.connections.pusher.options.cluster'),
            'encrypted' => config('broadcasting.connections.pusher.options.encrypted')
        );
        $pusher = new Pusher(
            config('broadcasting.connections.pusher.key'),
            config('broadcasting.connections.pusher.secret'),
            config('broadcasting.connections.pusher.app_id'),
            $options
        );
        $pusher->trigger('client-dashboard', 'get-price', $product);
    }
}

<?php

namespace App\Providers;

use App\Repositories\CartItemNote\CartItemNoteRepository;
use App\Repositories\Cart\CartRepository;
use App\Repositories\Cart\ICartRepository;
use App\Repositories\CartItemNote\ICartItemNoteRepository;
use App\Repositories\Item\IItemRepository;
use App\Repositories\Item\ItemRepository;
use App\Repositories\Order\IOrderRepository;
use App\Repositories\Order\OrderRepository;
use App\Services\Cart\CartService;
use App\Services\Cart\ICartService;
use App\Services\CartItemNote\CartItemNoteService;
use App\Services\CartItemNote\ICartItemNoteService;
use App\Services\Item\IItemService;
use App\Services\Item\ItemService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // repository
        $this->app->bind(IItemRepository::class, ItemRepository::class);
        $this->app->bind(ICartRepository::class, CartRepository::class);
        $this->app->bind(IOrderRepository::class, OrderRepository::class);
        $this->app->bind(ICartItemNoteRepository::class, CartItemNoteRepository::class);
    
        // service
        $this->app->bind(IItemService::class, ItemService::class);
        $this->app->bind(ICartItemNoteService::class, CartItemNoteService::class);
        $this->app->bind(ICartService::class, CartService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

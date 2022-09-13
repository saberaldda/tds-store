<?php

namespace App\Repositories\Cart;

use Illuminate\Support\Facades\Cookie;

class CookieRepository implements CartRepository
{
    protected $name = 'cart';

    public function all()
    {
        $items = Cookie::get($this->name, []);
        if ($items) {
            return unserialize($items);
        }
        return [];
    }

    public function add($item, $qty = 1)
    {
        $items = $this->all();
        $items[] = $item;
        Cookie::queue($this->name, serialize($items), 60*24*30, '/', null, false, true);
                        // $name|$value|$minutes|$path|$domain|$secure|$httpOnly
    }

    public function clear()
    {
        Cookie::queue($this->name, '', -60); // there is no forget or delete for cookie we put time with - for delete
    }

    public function total()
    {
    }
}
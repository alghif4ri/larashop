<?php

namespace App\Helpers;

use App\Product;

class Cart
{

    public function __construct()
    {
        if ($this->get() === null) {
            $this->set($this->empty());
        }
    }
    /**
     * The function sets the 'cart' session data with the provided value.
     *
     * @param cart The `set` function you provided is used to store the cart data in the session. The
     * `cart` parameter is the data that you want to store in the session under the key 'cart'. This
     * data typically represents the items in the shopping cart, such as product details, quantities,
     * and prices
     */
    public function set($cart)
    {
        request()->session()->put('cart', $cart);
    }

    /**
     * The function retrieves the 'cart' data from the session in PHP.
     *
     * @return the value stored in the 'cart' key in the session data.
     */
    public function get()
    {
        return request()->session()->get('cart');
    }

    /**
     * The function "empty" returns an empty array with a key "products".
     *
     * @return An empty array with the key 'products' is being returned.
     */
    public function empty()
    {
        return [
            'products' => []
        ];
    }

    /**
     * The add function adds a product to the cart in PHP.
     *
     * @param Product product The `add` function you provided seems to be a method in a class that adds
     * a `Product` object to a cart. The `Product` parameter represents an instance of a product that
     * you want to add to the cart.
     */
    public function add(Product $product)
    {
        $cart = $this->get();
        array_push($cart['products'], $product);
        $this->set($cart);
    }


    /**
     * The function removes a product from the cart based on the product ID.
     *
     * @param productId The `remove` function you provided is used to remove a product from a cart
     * based on the product ID. The `productId` parameter is the ID of the product that you want to
     * remove from the cart.
     */
    public function remove($productId)
    {
        $cart = $this->get();
        array_splice(
            $cart['products'],
            array_search(
                $productId,
                array_column(
                    $cart['products'],
                    'id'
                )
            ),
            1
        );
        $this->set($cart);
    }



    /**
     * The clear function sets the value of an object to empty.
     */
    public function clear()
    {
        $this->set($this->empty());
    }
}

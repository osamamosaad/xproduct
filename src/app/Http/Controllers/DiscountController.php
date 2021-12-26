<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Xproduct\Application\Commands\AddDiscount;

class DiscountController extends Controller
{
    /**
     * @api {POST}  /api/discounts      Add new discount
     *
     * @param AddDiscount $discountLib
     *
     * @return void
     */
    public function create(AddDiscount $discountLib)
    {
        $this->validate($this->request, [
            'type'          => 'required',
            'item'          => 'required',
            'percentage'    => 'required',
        ]);

        $discountLib->execute($this->getRequest());

        return response("", Response::HTTP_CREATED);
    }
}

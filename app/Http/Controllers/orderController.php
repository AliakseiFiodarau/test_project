<?php

namespace App\Http\Controllers;

use App\Bicycle;
use App\Brand;
use App\Type;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class orderController extends Controller
{
    public function show(Request $request, $id)
    {
        $brands = Brand::all();
        $types = Type::all();
        $item = Bicycle::find($id);
        $email = null;
        if (Auth::user()) {
            $email = Auth::user()->email;
        }

        return view('order')->with([
            'brands' => $brands,
            'types' => $types,
            'item' => $item,
            'email' => $email
        ]);
    }

    public function store(Request $request, $id)
    {
        $item = Bicycle::find($id);
        $this->validate($request, [
            'name' => 'required|alpha|max:50',
            'surname' => 'required|alpha|max:50',
            'email' => 'required|email',
            'phone' => 'required|regex:/[0-9]{9}/',
            'post_index' => 'required|numeric',
            'address' => 'required',
        ]);

        $data = $request->all();
        $order = Order::create([
            'item_id' => $id,
            'name' => $data['name'],
            'surname' => $data['surname'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'post_index' => $data['post_index'],
            'address' => $data['address'],
        ]);

        return redirect()->route('accepted', ['id' => $id]);

    }
}

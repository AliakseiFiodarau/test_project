<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use App\Type;
use App\User;
use Auth;
use Validator;

class userController extends Controller
{
    public function show(Request $request, $id)
    {
        $brands = Brand::all();
        $types = Type::all();
        $user = User::find($id);

        return view('user')->with([
            'brands' => $brands,
            'types' => $types,
            'user' => $user,
        ]);
    }

    public function store(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'unique:users,name,' . $id,
            'email' => 'email|unique:users,email,' . $id,
            'image' => 'image|mimes:jpg,jpeg|max:10000'
        ]);

        $data = $request->all();
        if ($request->hasFile('image')) {
            $request->file('image');
            $path = $request->file('image')
                ->store('users', 'public');
            $user = User::find($id)
                ->update([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'avatar' => $path
                ]);
        }
        $user = User::find($id)
            ->update([
                'name' => $data['name'],
                'email' => $data['email']
            ]);

        return back();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bicycle;
use App\Brand;
use App\Type;
use App\Review;
use Auth;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $page = 1)
    {
        $brands = Brand::all();
        $types = Type::all();
        $routeName = $request->route()->getName();
        $items = Bicycle::with('brand')
            ->paginate(12);

        return view('items.index')->with([
            'brands' => $brands,
            'types' => $types,
            'items' => $items,
            'page' => $page,
            'routeName' => $routeName
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $brands = Brand::all();
        $types = Type::all();
        $item = Bicycle::where('id', $id)
            ->with('brand')
            ->with('type')
            ->firstOrFail();
        $reviews = Review::with('user')
            ->where('bicycle_id', $item->id)
            ->get();

        return view('items.show')->with([
            'brands' => $brands,
            'types' => $types,
            'item' => $item,
            'reviews' => $reviews
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;

class CountriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', Country::class);
        
        // for search
        $request = request();
        $query = Country::query();

        if ($name = $request->query('name')) {
            $query->where('name', 'LIKE', "%{$name}%");
        }
        if ($code = $request->query('code')) {
            $query->where('code', 'LIKE', "%{$code}%");
        }
        if ($code = $request->query('productNum')) {
            $query->orderBy('products_count', 'DESC');
        }
        if ($code = $request->query('userNum')) {
            $query->orderBy('users_count', 'DESC');
        }

        $countries = $query->withCount('users','products')->paginate();

        return view('admin.countries.index', [
            'countries' => $countries,
            'title'     => "Countries List"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Country::class);

        return view('admin.countries.create', [
            'country' => new Country(),
            'title'   => 'Create Country',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Country::class);
        $request->validate([
            'name' => 'required|min:3',
            'code' => 'required|unique:countries,code|min:2|max:2',
        ]);

        $country = Country::create($request->all());

        return redirect()->route('countries.index')
            ->with('success', __('app.countries_store'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        $this->authorize('delete', $country);
        
        $country->delete();

        return redirect()->route('countries.index')
            ->with('success', __('app.countries_delete', ['name' => $country->name]));
    }
}

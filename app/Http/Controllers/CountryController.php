<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CountryService;
use App\Http\Requests\CountryFormRequest;

class CountryController extends Controller
{
    
    protected $countryService;
    public function __construct(CountryService $countryService){
        $this->countryService = $countryService;
    }

    public function index(){
        $countries = $this->countryService->all();
        return view('countries.index', [
            'countries' => $countries
        ]);
    }

    public function create(){
        return view('countries.create');
    }
    
    public function store(CountryFormRequest $request){
        $this->countryService->create($request->all());
        session()->flash('success','Thêm quốc gia thành công!');
        return redirect('/countries/index');
    }

    public function edit($id){
        $country = $this->countryService->find($id);
        return view('countries.edit',[
            'country' => $country
        ]);
    }

    public function update($id, CountryFormRequest $request){
        $this->countryService->update($id, $request->all());
        return redirect('/countries/index');
    }

    public function destroy($id){
        $this->countryService->delete($id);
        return redirect('/countries/index');
    }
}

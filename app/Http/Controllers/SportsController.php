<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMedalRequest;
use App\Models\Sport;
use App\Models\Country;
use Illuminate\Http\Request;

class SportsController extends Controller
{
    public function create()
    {
        $sports = Sport::all();
        $countries = Country::all();

        return view('sports.create', compact('sports', 'countries'));
    }

    public function store(StoreMedalRequest $request)
    {
        // Add your code here
        $positions = ['first', 'second', 'third'];
        $sports = Sport::all();
        $data = $request->all();
        $sports->each(function ($sport) use ($data, $positions) {
            $countryData = [];
            foreach ($positions as $key => $position) {
                $positionKey = "{$position}_$sport->id";
                if (isset($data[$positionKey])) {
                    $countryData[$data[$positionKey]] = ['position' => $key + 1];
                }
            }
            $sport->countries()->attach($countryData);
        });
        return redirect()->route('show');
    }

    public function show()
    {
        // Add your code here
//        $countries = Country::query()->with('sports')->get()->map(function ($country) {
////            dd($country->sports);
//            $country->firstCount = $country->sports->filter(function ($sport){
//               return $sport->pivot->position === 1;
//            })->count();
//            $country->secondCount = $country->sports->filter(function ($sport){
//                return $sport->pivot->position === 2;
//            })->count();
//            $country->thirdCount =  $country->sports->filter(function ($sport){
//                return $sport->pivot->position === 3;
//            })->count();
//            return $country;
//        })->sortByDesc([
//            ['firstCount', 'desc'],
//            ['secondCount', 'desc'],
//            ['thirdCount', 'desc']
//        ]);
//        dd($countries->take(10));
        $countries = Country::query()->withCount([
            'sports as firstCount' => function($query) {
            $query->where('position', 1);
            },
            'sports as secondCount' => function($query) {
                $query->where('position', 2);
            },
            'sports as thirdCount' => function($query) {
                $query->where('position', 3);
            }
        ])
            ->orderByDesc('firstCount')
            ->orderByDesc('secondCount')
            ->orderByDesc('thirdCount')
            ->get();
        return view('sports.show',  compact('countries'));
    }
}

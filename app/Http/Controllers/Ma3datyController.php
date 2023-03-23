<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\storeCardsRequest;

class Ma3datyController extends Controller
{
    // Add new visitor
    public function addvisite()
    {
        DB::table('hits')->where('id', 1)->increment('hit');
        Db::table('hits')->where('id', 1)->update(
            [
                'updated_at' => Carbon::now()->toDateTimeString()
            ]
        );
        return view('welcome');
    }
    
    // Controller Function To Get Data Of mawaied!
    public function getMa3datyData(Request $request)
    {
        $response = DB::table('ma3daty')->where('status' , 1)->get(
        [
            'id',
            'title',
            'address',
            'lat',
            'lng',
            'for',
            'maedaType',
            'government_id',
            'city_id',
        ]
        );
        return response()->json($response);
    }
        // View ma3da Page
        public function view()
        {
            return view("view");
        }
        
    // Controller Function To Insert Data Of mawaied!
    public function insert(Request $request)
    {
        DB::table('ma3daty')->insert(
            [
                'title'=> $request->title,
                'address'=> $request->address,
                'for'=> $request->for,
                'maedaType'=> $request->maedaType,
                'government_id'=> $request->government_id,
                'city_id'=> $request->city_id,
                'lat'=> $request->lat,
                'lng'=> $request->lng,
            ]
        );
        return "تمت الإضافة بنجاح";
    }

    // Show Cards Page
    public function cardsPage()
    {
        return view('cards');
    }

    // Add Card By User
    public function addCard(storeCardsRequest $request)
    {
        DB::table('cards')->insert([
            'number' => $request->number,
            'company' => $request->company,
            'charge_number' => $request->char_number,
            'charge_value' => $request->char_value,
        ]);
        return "تمت الإضافة بنجاح!";
    }

    // Controller Function To Get Data Of mawaied!
    public function getCards()
    {
    $response = DB::table('cards')->where('virified' , 1)->get(
        [
            'id', 'number', 'company', 'expire'
            ,'charge_number', 'charge_value'
        ]
        );
        return response()->json($response);
    }
}
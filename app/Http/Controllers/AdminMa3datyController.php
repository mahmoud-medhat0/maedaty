<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Cache\RedisTagSet;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AdminMa3datyController extends Controller
{
    // Show Available By Admin
    public function showAvailable()
    {
        if(Auth::check())
        {
            return view('admin/admin-show');
        }
        return redirect('login');
    }
    // Get Data Of mawaied where status = 0!
    public function hodsApi()
    {
        $response = DB::table('ma3daty')->where('status' , 0)->get(
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
    // Get Data Of mawaied where status = 1!
    public function availableApi()
    {
        if (Auth::check()) {
            
        
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
        return redirect('login');
    }

    // Show Holds Page
    public function showAdminMa3datyData(Request $request)
    {
        if (Auth::check()) {
            return view('admin/admin-show-holds');
        }
        return redirect('login');
    }
    // Show Admin Add Maeda Form
    public function create()
    {
        if (Auth::check()) {
            return view("admin/admin-add");
        }
        return redirect('login');
    }
    // Insert Ma3da By Admin With Status = 1
    public function insert(Request $request)
    {
        if (Auth::check()) {
            DB::table('ma3daty')->insert(
                [
                    'title'=> $request->title,
                    'address'=> $request->address,
                    'for'=> $request->for,
                    'maedaType'=> $request->maedaType,
                    'government_id'=> 1,
                    'city_id'=> 1,
                    'status'=> 1,
                    'lat'=> $request->lat,
                    'lng'=> $request->lng,
                ]
            );
            return "تمت الإضافة بنجاح";
        }
        return redirect('login');
        
    }
    // Show Amin Edit Page
    public function editpage($id)
    {
        if (Auth::check()) {
            $data = DB::table('ma3daty')->where('id', $id)->get()->first();
            return view('admin/admin-edit', compact('data'));
        }
        return redirect('login');
    }


    // edit ma3da By admin
    public function update(Request $request, $id)
    {
        if (Auth::check()) {
            DB::table('ma3daty')->where('id', $id)->update(
                [
                    'title' => $request->title,
                    'address' => $request->address,
                    'for' => $request->for,
                    'maedaType' => $request->maedaType,
                    'government_id' => $request->government_id,
                    'city_id' => $request->city_id,
                    'lat' => $request->lat,
                    'lng' => $request->lng,
                ]
            );
            return redirect()->route('admin.edit', $id);
        }
        return redirect('login');
        
    }

    // Delete One Row From Ma3da By Admin
    public function delete($id)
    {
        if (Auth::check()) {
            DB::table('ma3daty')->where('id', $id)->delete();
            return "deleted successfully!";
        }
        return redirect('login');
    }

    // Delete All Rows With status = 0 By Admin
    public function deleteSuspended()
    {
        if (Auth::check()) {
            DB::table('ma3daty')->where('status', 0)->delete();
            return "All Deleted!";
        }
        return redirect('login');
    }

    // Accept One Row With Status = 0 By Admin
    public function accept($id)
    {
        if (Auth::check()) {
            DB::table('ma3daty')->where('id', $id)->update(
                [
                    'status' => 1
                ]
            );
            return 'accepted!';
        }
        return redirect('login');
    }

    // Accept All Row With Status = 0 By Admin
    public function acceptSuspended()
    {
        if (Auth::check()) {
            DB::table('ma3daty')->where('status', 0)->update(
                [
                    'status' => 1
                ]
            );
            return "All Accepted!";
        }
        return redirect('login');
    }

    // Show Page Of Hold Cards
    public function cardsHoldPage()
    {
        if (Auth::check()) {
            return view('admin/admin-cards-holds');
        }
    }
    // Controller Function To Get Cards With Status = 0 With Admin!
    public function getHoldCards()
    {
        if (Auth::check()) {
            $response = DB::table('cards')->where('virified' , 0)->get(
            [
                'id', 'number', 'company', 'expire'
                ,'charge_number', 'charge_value'
            ]
            );
            return response()->json($response);
        }else {
            return redirect('login');
        }
    }

    // Add Card By Admin
    public function addCard(Request $request)
    {
        if (Auth::check()) {
            DB::table('cards')->insert([
                'number' => $request->number,
                'company' => $request->company,
                'charge_number' => $request->char_number,
                'virified' => 1,
                'charge_value' => $request->char_value,
            ]);
            return "تمت الإضافة بنجاح!";
        }else {
            return redirect('login');
        }
    }

    // Accept Card
    public function acceptCard($id)
    {
        if (Auth::check()) {
            DB::table('cards')->where('id', $id)->update(
                [
                    'virified' => 1
                ]
            );
            return 'accepted!';
        }
        return redirect('login');
    }

    // Delete One Row From Cards By Admin
    public function deleteCard($id)
    {
        if (Auth::check()) {
            DB::table('cards')->where('id', $id)->delete();
            return "deleted successfully!";
        }
        return redirect('login');
    }

    // Show Available Cards Page
    public function availableCardsPage()
    {
        if (Auth::check()) {
            return view('admin/admin-cards-available');
        }
        return redirect('login');
    }

    // Get Available Cards
    public function getAvailableCards()
    {
        if (Auth::check()) {
            $response = DB::table('cards')->where('virified' , 1)->get(
            [
                'id', 'number', 'company', 'expire'
                ,'charge_number', 'charge_value'
            ]
            );
            return response()->json($response);
        }else {
            return redirect('login');
        }
    }
}
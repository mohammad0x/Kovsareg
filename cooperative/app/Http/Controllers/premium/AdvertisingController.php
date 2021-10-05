<?php

namespace App\Http\Controllers\premium;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdvertisingRequest;
use App\Models\Advertising;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdvertisingController extends Controller
{
    public function Advertisings()
    {
        $user = Auth::guard('user')->user()->id;
        $advertisings = Advertising::where('user_id',$user)->get();
        return view('premium.advertisings',[
            'advertisings'=>$advertisings,
            'menu'=>'advertisings',
            'selected'=>'advertisings'
        ]);
    }

    public function CreateAdvertisings()
    {
        $categories = Category::all();
        return view('premium.create_advertisings',
        [
            'menu'=>'advertisings',
            'selected'=>'createAdvertising',
            'categories'=>$categories
        ]
        );
    }

    public function storeAdvertising(AdvertisingRequest $request)
    {
        $advertising = new Advertising();
        $title = $request->input('title');
        $category = $request->input('category');
        $description = $request->input('description');
        $price = $request->input('price');
        $imageName = time().'.'.$request->image->extension();
        $path = '/uploads/images/advertisings/';
        $request->image->move(public_path($path), $imageName);
        $filePath = $path.$imageName;
        /* Store $imageName name in DATABASE from HERE */
        $advertising->image = $filePath;
        $advertising->category_id = $category;
        $advertising->title = $title;
        $advertising->description = $description;
        $advertising->price = $price;
        $advertising->user_id = Auth::guard('user')->user()->id;
        $result = $advertising->save();
        if ($result){
            return redirect()->route('advertisings.premium')->with('success','آگهی با موفقیت ثبت شد.');
        }else{
            return redirect()->route('advertisings.premium')->with('error','آگهی ثبت نشد.');
        }


    }

    public function deleteAdvertising($id)
    {
        $advertising = Advertising::findOrFail($id);
        if ($advertising){

            unlink(public_path($advertising->image));
            $result = $advertising->delete();
            if ($result){
                return redirect()->route('advertisings.premium')->with('success','آگهی با موفقیت پاک شد.');
            }else{
                return redirect()->route('advertisings.premium')->with('error','آگهی حذف نشد.');
            }
        }else{
            return redirect()->route('advertisings.premium')->with('error','آگهی حذف نشد.');

        }
    }

    public function advertisingDetails($id)
    {
        $advertising = Advertising::findOrFail($id);
        return view('premium.advertising_details',[
            'advertising'=>$advertising,
            'menu'=>'advertisings',
            'selected'=>'advertisings',
        ]);
    }

    public function updateAdvertising(Request $request)
    {
        $advertising = Advertising::findOrFail($request->input('advertising_id'));
        $title = $request->input('title');
        $description = $request->input('description');
//        $price = $request->in
//        if ($request->input('title') && $r)
    }
}

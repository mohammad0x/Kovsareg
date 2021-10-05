<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdvertisingRequest;
use App\Models\Advertising;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdvertisingController extends Controller
{
    public function Advertisings(){
            $id = Auth::guard('admin')->user()->id;
            $advertisings = Advertising::where('user_id','!=',$id)->get();

        return view('admin.advertisings',[
            'advertisings'=>$advertisings,
            'menu'=>'advertisings',
            'selected'=>'advertisings'
        ]);

    }

    public function myAdvertisings()
    {
        $id = Auth::guard('admin')->user()->id;
        $advertisings = Advertising::where('user_id',$id)->get();
        return view('admin.advertisings',[
            'advertisings'=>$advertisings,
            'menu'=>'advertisings',
            'selected'=>'advertisings',
            'is_admin'=>true
        ]);
    }
    public function CreateAdvertisings()

    {
        $categories = Category::all();
        return view('admin.create_advertisings',[
            'menu'=>'advertisings',
            'selected'=>'createAdvertising',
            'categories'=>$categories
        ]);
    }
    public function advertisingDetails($id){
        $advertising = Advertising::findOrFail($id);
        return view('admin.advertising_details',
        [
            'advertising'=>$advertising,
            'menu'=>'advertisings',
            'selected'=>'advertisingDetails'
        ]);
    }

    public function deleteAdvertising($id)
    {
        $advertising = Advertising::findOrFail($id);
        if ($advertising){

            unlink(public_path($advertising->image));
            $result = $advertising->delete();
            if ($result){
                return redirect()->route('advertisings.admin')->with('success','با موفقیت حذف شد.');
            }else{
                return redirect()->route('advertisings.admin')->with('error','آگهی حذف نشد.');

            }
        }else {
            return redirect()->route('advertisings.admin')->with('error','خطا در انجام عملیات.');
        }

    }

    public function verifyAdvertising($id)
    {
        $advertising = Advertising::findOrFail($id);
        $advertising->verified = 1;
        $result = $advertising->save();
        if ($result){
            return redirect()->route('advertisings.admin')->with('success','آگهی با موفقیت تایید شد');
        }
        return redirect()->route('advertisings.admin')->with('error','خطا در حذف آگهی.');
    }

    public function storeAdvertising(AdvertisingRequest $request)
    {
        $advertising = new Advertising();
        $title = $request->input('title');
        $description = $request->input('description');
        $price = $request->input('price');
        $category = $request->input('category');
        $verified = $request->input('verified');
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
        $advertising->user_id = Auth::guard('admin')->user()->id;
        $advertising->verified = $verified;
        $result = $advertising->save();
        if ($result){
            return redirect()->route('advertisings.admin');
        }else{
            return redirect()->route('advertisings.admin');
        }

    }
}

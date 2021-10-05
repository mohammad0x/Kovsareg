<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BranchRequest;
use App\Http\Requests\VipRequest;
use App\Models\Branch;
use App\Models\User;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function branches()
    {
        $branches = Branch::all();

        return view('admin.branches',[
            'branches'=>$branches,
            'menu'=>'branches',
            'selected'=>'branches'
        ]);
    }

    public function createBranch()
    {
        return view('admin.create_branch',[
            'selected'=>'createBranch',
            'menu'=>'branches'
        ]);
    }
    public function storeBranch(BranchRequest $request)
    {
        $branch = new Branch();
        $branch->name = $request->input('name');
        $branch->subs = $request->input('subs');
        $result = $branch->save();
        if ($result){
            return redirect()->route('branches.admin')->with('success','شعبه جدید با موفقیت ایجاد شد.');
        }else{
            return redirect()->route('create_branch.admin')->with('error','خطا در انجام عملیات.');
        }
    }

    public function deleteBranch($id)
    {
        $branch = Branch::findOrFail($id);
        if ($branch) {
            $users = User::where('branch_id', $branch->id)->get();
            foreach ($users as $user) {
                $user->delete();
            }
            $branch->delete();
            return redirect()->route('branches.admin')->with('success','عملیات حذف شعبه با موفقیت انجام شد.');
        } else {
            return redirect()->route('branches.admin')->with('error','خطا در انجام عملیات.');
        }
    }
}

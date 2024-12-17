<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{

    public function viewPage()
    {
        $getdata = User::orderByDesc('id')->paginate(10);
        return view('form', compact('getdata'));
    }
    public function createData(Request $request)
    {
        $validated = $request->validate(rules: [
            'user_name' => 'required',
            'user_email' => 'required',
            'user_address' => 'required',
            'user_image' => 'required',
            'user_phoneno' => 'required',
        ]);

        $create_data = new User();
        $create_data->name = $request->user_name;
        $create_data->email = $request->user_email;
        $create_data->address = $request->user_address;
        $imageName = time() . '.' . $request->user_image->extension();
        $request->user_image->move(public_path('images'), $imageName);
        $create_data->image = $imageName;
        $create_data->phone_number = $request->user_phoneno;
        $create_data->save();
        Session::flash('created', 'User created Successfully');
        return redirect('view-data');
    }

    public function editForm($id)
    {
        $edit_data = User::find(id: $id);
        return view('edit-form', compact('edit_data'));
    }

    public function updateForm(Request $request)
    {
        $validated = $request->validate(rules: [
            'user_name' => 'required',
            'user_email' => 'required',
            'user_address' => 'required',
            'user_image' => 'required',
            'user_phoneno' => 'required',
        ]);

        $update_data = User::find($request->id);
        $update_data->name = $request->user_name;
        $update_data->email = $request->user_email;
        $update_data->address = $request->user_address;
        $imageName = time() . '.' . $request->user_image->extension();
        $request->user_image->move(public_path('images'), $imageName);
        $update_data->image = $imageName;
        $update_data->phone_number = $request->user_phoneno;
        $update_data->save();
        Session::flash('updated', 'User updated Successfully');
        return redirect('view-data');
    }

    public function deleteForm($id)
    {
        $delete_data = User::find(id: $id);
        $delete_data->delete();
        Session::flash('deleted', 'User deleted Successfully');
        return back();
    }
}

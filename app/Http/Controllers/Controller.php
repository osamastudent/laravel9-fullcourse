<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\userRequest;
use Hash;
use Pagination;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function register()
    {
        $show = User::paginate(5);
        $search = "";
        return view('register', compact('show', 'search'));
    }

    public function addUser(userRequest $req)
    {

        $userData = $req->all();
        $userData['password'] = bcrypt($req['password']);
        // if ($req->hasFile('userimage')) {
            $userData['userimage'] = $req->file('userimage')->store('images', 'public');
        // }

        $uploadedFile = $req->file('userimage');
        $fileSize = $uploadedFile->getSize();
        $mimeType = $uploadedFile->getClientMimeType();
        $userData['file_size'] = $fileSize;
        $userData['mme_type'] = $mimeType;

        User::create($userData);
        session()->flash('status', "new user added ");
        return redirect()->back();
        // return redirect()->back()->with('status',"added successfully");
    }

    

    function showUsers()
    {
        $show = User::paginate(5);
        $search = "";
        return view('register', compact('show', 'search'));
    }

   

    public function update($id)
    {
        $show = User::all();
        $find = User::find($id);
        return view('update', compact('show', 'find'));
    }




    // public function updated(Request $req, $id)
    // {
    //     $user = User::find($id);
    //     $user->fill($req->only(['name', 'email']));

    //     if ($req->filled('password')) {
    //         $user->password = bcrypt($req->input('password'));
    //     }

    //     $oldImagePath = $user->userimage;
    //     if ($oldImagePath) {
    //         Storage::disk('public')->delete($oldImagePath);
    //     }

    //     if ($req->hasFile('userimage')) {
    //         // Store the new image
    //         $user->userimage = $req->file('userimage')->store('images', 'public');

    //         // Delete the old image file if it exists
    //     }

    //     // Save the changes to the database
    //     $user->save();

    //     session()->flash('status', "User updated successfully");
    //     return redirect('/register'); // Redirect to the register page or any other route you prefer
    // }


    public function updated(Request $req, $id)
    {
        $user = User::find($id);
        $user->fill($req->only(['name', 'email']));
    
        // if ($req->filled('password')) {
            $user->password = bcrypt($req->input('password'));
        // }
    
        if ($req->hasFile('userimage')) {
            $oldImagePath = $user->userimage;
            if ($oldImagePath) {
                Storage::disk('public')->delete($oldImagePath);
            }
    
            $uploadedFile = $req->file('userimage');
            $user->userimage = $uploadedFile->store('images', 'public');
            $fileSize = $uploadedFile->getSize();
            $mimeType = $uploadedFile->getClientMimeType();
            $user->file_size = $fileSize;
            $user->mme_type = $mimeType;
        }
    
        $user->save();
    
        session()->flash('status', "User updated successfully");
        return redirect('/register'); 
    }
    
    // /search record
    function search(Request $req)
    {
        $search = $req->search;
        if (!is_null($search)) {
            
            $show = User::where('name', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%')->get();

            return view('register', compact('show', 'search'));

        } else {
            return back()->with('status', 'Please enter something to search.');
        }
    }






    function delete($id)
    {
        $user = User::find($id);
        if (!$user) {
            return back()->with('error', 'User not found.');
        }

        $oldImagePath = $user->userimage;
        if ($oldImagePath) {
            Storage::disk('public')->delete($oldImagePath);
        }

        // Delete the user record from the database
        $user->delete();

        session()->flash('status', 'Data has been deleted successfully.');
        return back();
    }

    public function download($id)
    {
        // Get the file path from the storage
        $filePath = 'public/storage/images/' . $id;
dd($filePath);
        // Check if the file exists in storage
        if (Storage::exists($filePath)) {
            // Get the original filename
            $originalFilename = basename(Storage::url($filePath));

            // Return the file as a response
            return response()->download(storage_path('app/' . $filePath), $originalFilename);
        }

        // If the file doesn't exist, return a 404 response or any other error response as per your application's requirements.
        return response()->json(['error' => 'File not found'], 404);
    }

















}

// php
// $name="user";
// $value="osama";
// setcookie("user","osama",time()+(60*60*24*30));
// setcookie($name,$value,time()+(86400*30));
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\student;
use App\Models\essay;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class studentController extends Controller
{
    public function student($id)
    {
        $student = student::find($id);
        $essay = essay::find(2);

        $essay->studentmany()->attach($student->id);
        // $student->essaymany()->attach($essay->id); 
        // $student->essaymany()->attach([2,3,4]);

    }

    public function showmany()
    {
        return "show many";
        // $ess=essay::with('studentmany')->find(3);
        // return $ess->toArray();
        // $stu=student::with('essaymany')->find(3);
        // return $stu->toArray();
    }




    public function moveToTrash($id){
        $delete=User::find($id);
        $delete->delete($delete);
        // if($delete!=""){
        // $delete->delete($delete);
        // }
        return redirect()->back();
        }

        public function showTrashData(){
        $showtrashdata=User::onlyTrashed()->get();
        return view('trashview',compact('showtrashdata'));
        }

public function restore($id){
$restore=User::withTrashed()->find($id);
$restore->restore($restore);
return back();
}



public function selectMoveToTrash(Request $request){
   $ids=$request->ids;
    User::whereIn('id',$ids)->delete();
    return redirect('showtrashdata');
    }


    public function restoreSelected(Request $request){
$ids=$request->ids;
if(!is_null($ids)){
User::whereIn('id',$ids)->restore();
}
return redirect('showtrashdata');
    }


    public function trashall(){
    $trashall=User::query()->delete();
    return back();
    }


    public function restoreAll(){
    $restoreall=User::query()->restore();
    return back();
    }

    // public function download($id)
    // {
    //     // Get the file path from the storage
    //     $filePath = 'images/' . $id;

    //     // Check if the file exists in storage
    //     if (Storage::exists($filePath)) {
    //         // Get the original filename
    //         $originalFilename = basename(Storage::url($filePath));

    //         // Return the file as a response
    //         return response()->download(storage_path('images/' . $filePath), $originalFilename);
    //     }

    //     // If the file doesn't exist, return a 404 response or any other error response as per your application's requirements.
    //     return response()->json(['error' => 'File not found'], 404);
    // }

public function deleteDirect($id)
{
    $deletedirect=User::find($id);
    $oldimage=$deletedirect['userimage'];
    if($oldimage){
    Storage::disk('public')->delete($oldimage);
    }
    $deletedirect->forceDelete($deletedirect);
    return back();

}

public function deletepremenentfromrestore($id){
$deletepremenentfromrestore=User::withTrashed()->find($id);
$deletepremenentfromrestore->forceDelete($deletepremenentfromrestore);
return back();
}



public function dall(Request $request)
{
    // Retrieve all users from the database
    $all = User::all();

    // Loop through each user to delete their images
    foreach ($all as $user) {
        // Get the image path from the user record
        $old = $user->userimage;

        if ($old) {
            // Delete the image from the storage folder
            Storage::disk('public')->delete($old);
        }

        // Delete the user record from the database
        $user->delete();
    }

    return back();
}

}

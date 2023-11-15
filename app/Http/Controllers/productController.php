<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\product;
use App\Models\category;
use App\myservices\customclass;
class productController extends Controller
{

    public function custom(customclass $customclass){
return $customclass->interfaceFun();
    }

    public function product()
    {
        $category = category::all();
        $showproduct = product::all();
        return view('product', compact('category', 'showproduct'));
    }


    // public function downloadImage($id)
    // {

    // $product = Product::findOrFail($id);

    // $imagePath = $product->image;
    // $imageName = basename($imagePath);

    // // Check if the image exists in storage
    // if (Storage::disk('public')->exists($imagePath)) {
    //     $download = [
    //         'Content-Type' => $product->mime_type,
    //         'Content-Disposition' => 'attachment; filename="' . $imageName . '"',
    //     ];

    //     return response()->file(storage_path('app/public/' . $imagePath), $download);
    // } else {
    //     abort(404);
    // }
    // }

    // public function down(Request $req, $id)
    // {
    //     return response()->download(public_path('homesite/image/' . $id));
    // }

    // public function addProduct(Request $request){

    // $saveData=$request->all();
    
    // $saveData['image']=$request->file('image')->store('images', 'public');
    
    // $saveData['status']="status";
    // $size=$request->image->getSize();
    // $mime=$request->image->getClientMimeType();
    // $saveData['mime_type']=$mime;
    // $saveData['file_size']=$size;
    // product::create($saveData);
    // return redirect('showproduct');
    // }


    public function addProduct(Request $req)
    {
        $saveData = $req->all();
        $saveData["image"] = $req->file('image');

        $file = $req->file('image');
        $size = $req->file('image')->getSize();
        $saveData['file_size'] = $size;

        $mime = $req->image->getClientMimeType();
        $saveData['mime_type'] = $mime;

        
        $originalName = $file->getClientOriginalName();
        $file->move('homesite/image/', $originalName);
        $saveData['image'] = $originalName;
        $saveData['status'] = "status";

        product::create($saveData);
        return back();
    }

    
    public function productUpdate(Request $request, $id)
    {
        $findproduct = product::find($id);
        // Update product details
        $findproduct->fill($request->only(['category_id', 'name', 'price']));
        $findproduct['status'] = "status";

        if ($request->hasFile('imagee')) {
            $file = $request->file('imagee');
            $findproduct->file_size = $file->getSize();
            // Delete old image if a new image is uploaded
     
                $oldImagePath = public_path('homesite/image/'. $findproduct->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
                
            // Upload and save new image
            $originalName = $file->getClientOriginalName();
            $file->move('homesite/image/', $originalName);
            $findproduct->image = $originalName;
            $findproduct->mime_type = $file->getClientMimeType();
        }
        $findproduct->save();
        return redirect('showproduct')->withSuccess('Product updated successfully.');
    }
    // public function addProduct(Request $req){
    //     $saveData=$req->all();               
    //   $saveData["image"]=$req->file('image');
    //         $file=$req->file('image');
    //         $originalName = $file->getClientOriginalName();
    //         $filename = pathinfo($originalName, PATHINFO_FILENAME);
    //         $extension = $file->getClientOriginalExtension();
    //         $file->move('homesite/image/',$filename);
    //         $saveData['image']=$filename. ' '. $extension;
    // $saveData['status']="status";
    //         $size=$file->getMaxFilesize();
    //         $saveData['file_size']=$size;
    //         $mime=$req->image->getClientMimeType();
    //         $saveData['mime_type']=$mime;

    //         product::create($saveData);
    //         return back();


    // }





    // public function addProduct(Request $request)
    // {
    //     $saveData = $request->all();

    //     if ($request->hasFile('image')) {
    //         $image = $request->file('image');

    //         // Get the original name of the image
    //         $originalName = $image->getClientOriginalName();

    //         // Set the filename to the original name with the extension
    //         $filename = pathinfo($originalName, PATHINFO_FILENAME);
    //         $extension = $image->getClientOriginalExtension();
    //         $saveData['image'] = $filename . '.' . $extension;

    //         // Store the image in the public disk with the original name
    //         $image->storeAs('images', $saveData['image'], 'public');

    //         // Other data processing...

    //         $saveData['status'] = "status";
    //         $size = $image->getSize();
    //         $mime = $image->getClientMimeType();
    //         $saveData['mime_type'] = $mime;
    //         $saveData['file_size'] = $size;

    //         product::create($saveData);
    //     }

    //     return back();
    // }



    public function productEdit($id)
    {
        $findproduct = product::find($id);
        $showcat = category::all();
        return view('updateproduct', compact('findproduct', 'showcat'));
    }



    //update data into product table
    // public function productUpdate(Request $request,$id){
    // $findproduct=product::find($id);
    // $findproduct->fill($request->only(['name','price']));

    // if($request->hasFile('imagee')){
    // $oldImage=$findproduct['image'];
    // if($oldImage){
    // storage::disk('public')->delete($oldImage);
    // }

    // $findproduct['image']=$request->file('imagee')->store('images','public');
    // $size=$request->file('imagee')->getSize();
    // $mime=$request->file('imagee')->getClientMimeType();
    // $findproduct['mime_type']=$mime;
    // $findproduct['file_size']=$size;
    // }
    // $findproduct->save();
    // return redirect('product')->with('status','has Updated');
    // }

    public function showproduct()
    {
        $showproduct = product::all();
        $category = category::all();
        return view('product', compact('showproduct','category'));
    }


    function productOneToOne($id)
    {
        // $category=category::with('Products')->find($id);
        // return $category->toArray();
        // return view('responseget',compact('category'));
        // $products
    }
}

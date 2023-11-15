
public function responseset(Request $request){
   $remb=$request->remb;
        if($remb){
        
        $name = $request->input('myinput');
        $email = $request->input('email');
$request->session()->put('email',$request->email);
        $response=new Response('Hello World');
    $minutes=1;
    $response->cookie('name', $name, $minutes);
    $response->cookie('email', $email, $minutes);
    return $response;
        }
        else{
        echo"fail";
        }
    }

    public function responseget(){
$name=Cookie::get('name');  
$email=Cookie::get('email'); 
$semail=session()->get('email'); 
return view('cookie',compact('name','email','semail')); 
    }
 public function handleFile($obj, $req)
    {
        $destination = 'swingtradingwithetfdynamiceimages/' . $obj->s6_image;
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $file = $req->file('s6_image');
        $extension = $file->getClientOriginalName();
        $filename = time() . '' . $extension;
        $file->move('swingtradingwithetfdynamiceimages', $filename);
        $obj->s6_image = $filename;
        return $filename;

    }
 if ($req->hasfile('s6_image')) {
            // uploading files and saving to database
          $newfilename = $this->handleFile($obj, $req);
          
        }
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Intervention\Image\Facades\Image as Image;
use Str;
use Storage;

class SimpleQRcodeController extends Controller
{
   public function generate(Type $var = null)
   {
        $qrcode = QrCode::size(200)->generate("Je suis un QR Code");
    	
    	# 3. On envoie le QR code généré à la vue "simple-qrcode"
    	return view("simple-qrcode", compact('qrcode'));
   }
   public function simpleQr()
   {
      return QrCode::size(300)->generate('A basic example of QR code!');
   }  
   public function colorQr()
   {
             return QrCode::size(300)
                    ->backgroundColor(255,55,0)
                    ->generate('Color QR code example');
   }    
   public function imageQr(Request $request)
   {
      $request->validate(
         [
            "file"=>"required|file"
         ]
         );
         $qr=QrCode::format('png')->generate('Embed me into an e-mail!');
         $filename   = time() . '.' . $request->file->getClientOriginalExtension();
         //Storage::disk('local')->put('/'.$fileName, $request->file, 'public');
         Storage::disk('local')->putFileAs(
            "public/",
            $request->file,
            $filename
          );
         // dd(asset('storage/'.$filename));
         $image=QrCode::format('png')->size(400)->merge('\\public\\storage\\'.$filename)->generate("test test test");
         return response($image)->header('Content-type','image/png');
     
   }
   public function emailQrCode()
   {
       return QrCode::size(500)
               ->email('laratutorials@gmail.com', 'Welcome to Lara Tutorials!', 'This is !.');
   }  
   public function qrCodePhone()
   {
            QrCode::phoneNumber('111-222-6666');
   }    
   public function textQrCode()
   {
     QrCode::SMS('111-222-6666', 'Body of the message');
   }
}

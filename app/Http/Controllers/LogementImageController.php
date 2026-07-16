<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LogementImage;
use Illuminate\Support\Facades\Storage;

class LogementImageController extends Controller
{
    public function destroy(LogementImage $image)
    {


        Storage::disk('public')
        ->delete($image->image);



        $image->delete();



        if($image->is_cover){

            return back()
                ->with('error',
                'La photo principale ne peut pas être supprimée');

        }

    }

}

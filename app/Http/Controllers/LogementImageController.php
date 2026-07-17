<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logement;
use App\Models\LogementImage;
use Illuminate\Support\Facades\Storage;

class LogementImageController extends Controller
{

    public function store(Request $request, Logement $logement)
    {
        $request->validate([
            'images' => 'required|array|min:1',
            'images.*' => 'image|max:4096',
        ]);

        foreach ($request->file('images') as $image) {

            $path = $image->store('logements', 'public');

            LogementImage::create([
                'logement_id' => $logement->id,
                'image'        => $path,
                'is_cover'     => false,
            ]);
        }

        return back()->with(
            'success',
            'Photos ajoutées avec succès.'
        );
    }


    public function destroy(LogementImage $image)
    {

         if($image->is_cover){

            return back()
                ->with('error',
                'La photo principale ne peut pas être supprimée');

        }

        Storage::disk('public')
        ->delete($image->image);

        $image->delete();

        return back()->with(
        'success',
        'Image supprimée avec succès.'
    );


    }

    public function cover(LogementImage $image)
    {
        $logement = $image->logement;

        $logement->images()
            ->update([
                'is_cover' => false
            ]);

        $image->update([
            'is_cover' => true
        ]);

        return back()->with(
            'success',
            'Photo de couverture modifiée.'
        );
    }

}

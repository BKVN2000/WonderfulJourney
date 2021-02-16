<?php

namespace App\Helper;

use Exception;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class UploadFile
{
    /**
     * 
     * @param  \Illuminate\Http\UploadedFile
     * @param  \Illuminate\Http\string
     * @return string
     */
    //format = namapizza + date upload + ext

    public static function UploadFile($request,$title)
    {
        if ($request->isFile())
        {
            $extension = $request->getClientOriginalExtension();
            
            $fileName= $title.date('d-m-Y-H-i').'.'.$extension;
            $fileToStore = str_replace(' ','_',$fileName);
            
            $path = $request->storeAs(
                'public', $fileToStore
            );  

            return Storage::url($fileToStore);
        }

        else
        {
            abort(500, 'Could not upload image :(');
        }
    }

    /**
     * 
     * @param string
     * @return string
     */
    public static function GetUrlFile($fileDirectory)
    {     

    }
}


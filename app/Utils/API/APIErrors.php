<?php
namespace App\Utils\API;

/**
 *
 */
trait APIErrors
{
    public static function formatAPIError($errors)
    {
        $messages = [];
        foreach ($errors as $key => $error) {
            //dd($error);
            foreach ($error as $key => $value) {
                $messages[]=$value;
            }
        }//dd($messages);
        return response()->json([
            'success' => false,
            'message' =>implode(',',$messages),
          ], 200)
          ->header('Accept', 'application/json')
          ->header('Content-Type', 'application/json');
        //return (implode(',',$messages));
    }

    public static function singleAPIError(array $messages, $status = 200)
    {
        return response()->json([
            'success' => false,
            'message' =>implode(',',$messages),
          ], $status)
          ->header('Accept', 'application/json')
          ->header('Content-Type', 'application/json');
    }

    public static function singleAPISuccess(array $messages)
    {
        return response()->json([
            'success' => true,
            'message' =>implode(',',$messages),
          ], 200)
          ->header('Accept', 'application/json')
          ->header('Content-Type', 'application/json');
    }
    
    public static function costumAPIResponse(array $json)
    {
        return response()->json($json, 200)
          ->header('Accept', 'application/json')
          ->header('Content-Type', 'application/json');
    }
}

<?php
namespace App\Helper;

use App\Models\Exception;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Helper;

class CryptoCode
{
	public static function encrypt($id)
	{
        $timestamp          = date("si");
        $randomKey          = Str::random(5);
        $encrypted_string   = base64_encode($timestamp . '-' . $id . '-' . $randomKey);
        return $encrypted_string;
	}

    public static function decrypt($encrypted_string)
	{
        $decrypted_string   = base64_decode($encrypted_string);
        $decrypted_array    = explode('-',$decrypted_string);
        if (count($decrypted_array) > 1) {
            $id = $decrypted_array[1];
            return $id;
        }
        return $encrypted_string;
	}
}
?>
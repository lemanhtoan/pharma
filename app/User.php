<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','facebook_id','photo','token_firebase','is_admin','is_active','is_suspend',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function user()
    {
        return $this->hasOne('App\Models\Listing','user_id');
    }

    public static function sendGCM($content,$token)
    {
        $url = 'https://fcm.googleapis.com/fcm/send';

        $msg = array
        (
            'body' => $content,
            'title' => 'DeliverMe',
            'vibrate' => 1,
            'sound'=>1
            ); 

        $fields = array(
            'registration_ids' => array($token),
            'notification' => $msg
            );

        $headers = array(
            'Authorization: key=AIzaSyAbn-VzV_40Pg2PZYeoi_0TyTwUa_-fn7k',
            'Content-Type: application/json'
            );

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        //echo $ch;die;
        $result = curl_exec($ch);
        curl_close($ch);
        return $result; 
    }
}

<?php

namespace App\Http\Controllers;

use Validator;
use App\File;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'login']);
    }

    public function index()
    {
        return view('welcome');
    }

    function doCurl($url) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $data = json_decode(curl_exec($ch), true);
        curl_close($ch);
        return $data;
    }

  public function login(Request $request)
  {

      $app_id = "app_id"; /*Update app id*/
      $secret = "app_secret"; /*Update app secret*/
      $version = "v1.1"; /*Update version*/


      $url = 'https://graph.accountkit.com/'.$version.'/access_token?'.
          'grant_type=authorization_code'.
          '&code='.$request['code'].
          "&access_token=AA|$app_id|$secret";

      $data = $this->doCurl($url);
      $user_id = $data['id'];
      $user_access_token = $data['access_token'];
      $refresh_interval = $data['token_refresh_interval_sec'];

      $me_endpoint_url = 'https://graph.accountkit.com/'.$version.'/me?'.
          'access_token='.$user_access_token;
      $data = $this->doCurl($me_endpoint_url);

      $userId = $data['id'];
      $phone = $data['phone'];
//      print_r($phone);
//      exit();

      $number = $phone['number'];
      $country_prefix = $phone['country_prefix'];
      $national_number = $phone['national_number'];

      $existingUser = User::where('number', $number)->first();

      if (!$existingUser) {
          $user  = new User();
          $user->fbUserId = $userId;
          $user->country_prefix = $country_prefix;
          $user->number = $national_number;
          $user->save();

          Auth::login($user);

          return redirect()->route('home');

      } else {

          Auth::login($existingUser);
          return redirect()->route('home');
      }


  }

    public function home()
    {
        $user = User::where('id', Auth::id())->first();
        $files = File::where('user_id', Auth::id())->get();
        return view('index', compact('user', 'files'));
    }

    public function fileUpload(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file' => 'required|max:10240|mimes:jpeg,jpg,png',
            'type' => 'required',
        ]);

        if ($validator->fails())
        {
            return redirect()->back();
        }
        else
        {
            $file = $request['file'];
            $type = $request['type'];
            $user_id = Auth::id();

            /* get File Extension */
            $extension = $file->getClientOriginalExtension();

            /* Your File Destination */
            $destination = 'images/';

            /* unique Name for file */
            $filename = uniqid() . '.' . $extension;

            /* finally move file to your destination */

            File::create([
                'user_id' => $user_id,
                'file_name' => $filename,
                'type' => $type
            ]);

            $file->move($destination, $filename);

            return redirect()->back();

        }

    }


  public function logout()
  {
      Auth::logout();
      return redirect()->route('index');
  }

}

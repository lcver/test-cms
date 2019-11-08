<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Models\Rule;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // variable for save the translation
    public $translation;
    // variable for save available languages
    public $languages;
    // variable for save application logo
    public $app_logo;

    public function __construct ()
    {
        $this->middleware (function ($request, $next) 
        {
            // get default language
            $default_lang = env('DEFAULT_LANGUAGE', 'EN');

            // set language
            $language = Session::get('language');
            if (empty($language))
            {
                $language = $default_lang;
                Session::put('language', $language);
            }

            // get language data
            $getLanguageMasterMenu = DB::table('language_master_detail')->select('language_master.phrase', 'language_master_detail.translate')
                ->leftJoin('language', 'language.id', 'language_master_detail.language_id')
                ->leftJoin('language_master', 'language_master.id', 'language_master_detail.language_master_id')
                ->where('language.alias', $language)
                ->get();

            // convert to single array
            $translation = [];
            foreach ($getLanguageMasterMenu as $list)
            {
                $translation[$list->phrase] = $list->translate;
            }
            
            // share variable to all Views
            View::share('translation', $translation);
            
            // set this variable with translation data
            $this->translation = $translation;

            // set available languages
            $getLanguages = DB::table('language')->where('status', 1)->get();

            // convert to single array
            $languages = [];
            foreach ($getLanguages as $list)
            {
                $obj = new \stdClass();
                $obj->alias = $list->alias;
                $obj->name = $list->name;
                $languages[$list->id] = $obj;
            }
            
            // share variable to all Views
            View::share('languages', $languages);
            
            // set this variable with languages data
            $this->languages = $languages;

            // set app logo
            $app_logo = env('APP_LOGO_IMAGE');
            if (empty($app_logo))
            {
                $app_logo = '<i class="fa fa-'.env('APP_LOGO', 'laptop').'"></i>';
            }
            else
            {
                $app_logo = '<img src=" '. asset($app_logo) .'" style="max-width:40px" />';
            }

            // share variable to all Views
            View::share('app_logo', $app_logo);
            
            // set this variable with translation data
            $this->app_logo = $app_logo;
            
            return $next($request);
     });
    }
}
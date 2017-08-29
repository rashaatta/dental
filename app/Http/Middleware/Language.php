<?php 
/**
 * Created by PhpStorm.
 *
 * @author      Brian Smith <brian.smith@company.com>
 * @php_version 1.0
 * 
 * User: Rasha
 * Date: 5/5/2017
 * Time: 11:08 PM
 */

namespace App\Http\Middleware;

use Closure;
use \Illuminate\Foundation\Application;
use \Illuminate\Http\Request;
use \Illuminate\Routing\Redirector;
use \Illuminate\Support\Facades\App;
use \Illuminate\Support\Facades\Config;
use \Illuminate\Support\Facades\Session;

/**
 * EndpointHelper File Doc Comment
 * 
 * @category  EndpointHelper
 * @package   Helper
 * @author    Brian Smith <brian.smith@company.com>
 * @copyright 2015 Company, Inc. All rights reserved.
 * @license   GNU General Public License version 2 or later; see LICENSE
 * @link      http://arctg.com
 */
class Language
{
    /**
     * Test
     *
     * @param string  $request first parameter test comment
     * @param Closure $next    second parameter test comment
     *
     * @return hello 
     */
    public function handle($request, Closure $next)
    {
        if (Session::has('applocale') 
            AND array_key_exists(Session::get('applocale'), Config::get('languages'))
        ) {
            App::setLocale(Session::get('applocale'));
        } else { // This is optional as Laravel will automatically 
                 // set the fallback language
                 // if there is none specified
            App::setLocale(Config::get('app.fallback_locale'));
        }
        return $next($request);
    }
}

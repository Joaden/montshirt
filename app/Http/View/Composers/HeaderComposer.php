<?php
/**
 * Created by PhpStorm.
 * User: cisco
 * Date: 07/01/2019
 * Time: 12:47
 */

namespace App\Http\View\Composers;


use App\Category;
use Illuminate\View\View;

class HeaderComposer
{

    public function compose(View $view) {
        // with('nom_variable_globale')
        $view->with('categories',Category::where('is_online',1)->get());
    }

}
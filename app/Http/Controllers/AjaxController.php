<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subcategory;

class AjaxController extends Controller
{
    public function getSub($category_id)
    {
        $subcategory = Subcategory::where('category_id', $category_id)->get();
        foreach ($subcategory as $value) {
            echo '<option value="' . $value['id'] . '">' . $value['name'] . '</option>';
        }
    }
}

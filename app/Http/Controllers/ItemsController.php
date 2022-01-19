<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Traits\SearchModel;

class ItemsController extends Controller
{
    use SearchModel; //CALL THE TRAIT IN CONTROLLER

    public function items(Request $request)
    {


        #Request from AJAX and RENDER Result View
        if ($request->ajax()) 
        {

            #GO FOR SPECIFIC MODEL FOR SEARCHABLE INTERFACES to add getSearchResult() METHOD
            $searchResults = $this->SearchModel('Item', ['name', 'address'], $request->table_filter_search ?? '');
            
            $searchResults = $searchResults->paginate($request->table_length_limit);
            
            #RENDER & RETURN VIEW TO CLIENT SIDE
            return view('items_result', get_defined_vars());
        }
  
        #Page LOAD Call from main ROUTE and VIEW Return
        return view('items');
    }
}

<?php

namespace App\Http\Controllers;

use App\Model\prods;
use Illuminate\Http\Request;
use App\Model\prods as db;

class LiveSearch extends Controller
{
    function index()
    {
        return view('Admin_d.index');
    }

    function action(Request $request)
    {
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');
            if($query != '')
            {
                $data = prods::where('id', 'like', '%'.$query.'%')
                    ->orWhere('name', 'like', '%'.$query.'%')
                    ->orWhere('price', 'like', '%'.$query.'%')
                    ->orWhere('color', 'like', '%'.$query.'%')
                    ->orWhere('brand', 'like', '%'.$query.'%')->get();

            }
            else
            {
                $data = prods::all();
            }
            $total_row = $data->count();
            if($total_row > 0)
            {
                foreach($data as $row)
                {
                    $output .= '
        <tr>
         <td>'.$row->id.'</td>
         <td>'.$row->name.'</td>
         <td>'.$row->price.'</td>
         <td>'.$row->color.'</td>
         <td>'.$row->brand.'</td>
        </tr>
        ';
                }
            }
            else
            {
                $output = '
       <tr>
        <td align="center" colspan="5">No Data Found</td>
       </tr>
       ';
            }
            $data = array(
                'table_data'  => $output,
                'total_data'  => $total_row
            );

            echo json_encode($data);
        }
    }
}
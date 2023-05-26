<?php

namespace App\Http\Controllers;

use App\Models\Distributor;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DistributorController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Distributor::select(['name', 'city']);
            return DataTables::of($data)
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('distributor');
    }

    public function store()
    {
        $value = $_POST['value'];
        // $distributor = new Distributor;
        // $distributor->name = $value['name'];
        // $distributor->city = $value['city'];
        // $distributor->state = $value['state'];
        // $distributor->country = $value['country'];
        // $distributor->phone = $value['phone'];
        // $distributor->email = $value['email'];

        // $distributor->save();
    }
}

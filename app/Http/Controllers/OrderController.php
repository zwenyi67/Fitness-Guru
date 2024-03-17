<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;

class OrderController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $orders = Order::where('status' , 0)->with(['products' => function ($query) {
                $query->withPivot('quantity');
            }])
            ->get();

            return DataTables::of($orders)

                ->addColumn('no', function ($orders) {
                    static $rowNumber = 0;
                    $rowNumber++;
    
                    return $rowNumber;
                })
                
                ->editColumn('name', function ($orders) {
                    return  $orders->name;
                })
                ->editColumn('address', function ($orders) {
                    return  $orders->building . ', ' . $orders->address   . ', ' . $orders->township . ', '. $orders->city . ', ' . $orders->region  ;
                })
                ->editColumn('contact', function ($orders) {
                    return $orders->phone. ', '. $orders->email;
                })
                ->addColumn('action', function ($a) {

                    $detail = '<a href="/admin/orders/'.$a->id.'/detail" class="btn btn-primary mr-5 px-4 py-2">Detail</a>';
                    $approve = '<a href="" class="addButton btn btn-success mr-5 px-4 py-2" data-id="' . $a->id . '">Add</a>';
                    $delete = '<a href="" class="deleteButton btn btn-danger px-4 py-2" data-id="' . $a->id . '">Delete</a>';

                    return '<div class="action d-flex justify-content-center">' . $detail .$approve . $delete . '</div>';
                })->rawColumns(['no','action'])->make(true);
        }

        return view('admin.orders.index');

    }

    public function addDeliver(Request $request)
    {
        if ($request->ajax()) {
            $orders = Order::where('status' , 1)->with(['products' => function ($query) {
                $query->withPivot('quantity');
            }])
            ->get();

            return DataTables::of($orders)

                ->addColumn('no', function ($orders) {
                    static $rowNumber = 0;
                    $rowNumber++;
    
                    return $rowNumber;
                })
                
                ->editColumn('name', function ($orders) {
                    return  $orders->name;
                })
                ->editColumn('address', function ($orders) {
                    return  $orders->building . ', ' . $orders->address   . ', ' . $orders->township . ', '. $orders->city . ', ' . $orders->region  ;
                })
                ->editColumn('contact', function ($orders) {
                    return $orders->phone. ', '. $orders->email;
                })
                ->addColumn('action', function ($a) {

                    $detail = '<a href="/admin/orders/'.$a->id.'/detail" class="btn btn-primary mr-5 px-4 py-2">Detail</a>';
                    $approve = '<a href="" class="deliverButton btn btn-success mr-5 px-4 py-2" data-id="' . $a->id . '">Deliver</a>';
                    $delete = '<a href="" class="deleteButton btn btn-danger px-4 py-2" data-id="' . $a->id . '">Delete</a>';

                    return '<div class="action d-flex justify-content-center">' . $detail .$approve . $delete . '</div>';
                })->rawColumns(['no','action'])->make(true);
        }

        return view('admin.orders.add-delivery');

    }

    public function delivered(Request $request)
    {
        if ($request->ajax()) {
            $orders = Order::where('status' , 2)->with(['products' => function ($query) {
                $query->withPivot('quantity');
            }])
            ->get();

            return DataTables::of($orders)

                ->addColumn('no', function ($orders) {
                    static $rowNumber = 0;
                    $rowNumber++;
    
                    return $rowNumber;
                })
                
                ->editColumn('name', function ($orders) {
                    return  $orders->name;
                })
                ->editColumn('address', function ($orders) {
                    return  $orders->building . ', ' . $orders->address   . ', ' . $orders->township . ', '. $orders->city . ', ' . $orders->region  ;
                })
                ->editColumn('contact', function ($orders) {
                    return $orders->phone. ', '. $orders->email;
                })
                ->addColumn('action', function ($a) {

                    $detail = '<a href="/admin/orders/'.$a->id.'/detail" class="btn btn-primary mr-5 px-4 py-2">Detail</a>';
                    $delete = '<a href="" class="deleteButton btn btn-danger px-4 py-2" data-id="' . $a->id . '">Delete</a>';

                    return '<div class="action d-flex justify-content-center">' . $detail  . $delete . '</div>';
                })->rawColumns(['no','action'])->make(true);
        }

        return view('admin.orders.delivered');

    }

    public function add($id) {
        $order = Order::findOrFail($id);

        $order->update([
            'status' => 1,
        ]);
        $order->save();
        
        return 'success';
    }

    public function deliver($id) {
        $order = Order::findOrFail($id);

        $order->update([
            'status' => 2,
        ]);
        $order->save();
        
        return 'success';
    }



    public function store(Request $request)
    {
        if (session('cart')) {

        $attributes = request()->validate([
            'name' => 'required|max:10|min:3',
            'email' => 'required|max:255|min:3',
            'phone' => 'required',
            'region' => 'required',
            'city' => 'required',
            'township' => 'required',
            'address' => 'required',
            'building' => 'required',
            'order_notes' => 'nullable',
        ]);

        $attributes['user_id'] = auth()->user()->id;
        $attributes['total'] = $request->input('total');
        
        $order = Order::create($attributes);


        foreach (session('cart') as $product) {
            $order->products()->attach([
               $product['id'] => ['quantity' => $product['quantity']]
            ]);

            $product_id = Product::findOrFail($product['id']);

            $product_id->update([
                'total_qty' => $product_id->total_qty - $product['quantity'],
            ]);
            $product_id->save();
        }
        Session::forget('cart');

        return redirect('/products')->with('success', 'Order Success');

    }else {
        return redirect('/products')->with('error', 'Worng');
    }
    }

    public function show($id)
    {
        $order = Order::findOrFail($id);
        return view( 'admin.orders.detail' ,
        ['order' => $order ,
            
        ]);
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return 'success';
    }
}

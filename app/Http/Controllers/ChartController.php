<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function index() {
        
        //trainer registration

        $users = User::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
        ->where('status', 1)
        ->whereYear('created_at', date('Y'))
        ->groupBy('month')
        ->orderBy('month')
        ->get();

        $labels = [];
        $data = [];
        $colors = ['red','green','blue','purple','grey','pink','yellow','orange','black','whitesmoke','gold', 'silver'];
        
        for ($i = 1; $i <13; $i++) {
            $month =   date('M', mktime(0,0,0,$i,1));
            
            $count = 0;
            
            foreach ($users as $user) {
                if($user->month == $i) {
                    $count = $user->count;
                    break;
                }
            }
            array_push($labels, $month);
            array_push($data, $count);
        }

        $datasets = [
            [
                'label'=> 'Users',
                'data'=> $data,
                'backgroundColor'=> $colors,
            ]
        ];

        // sale progress bar and line chart

        $orders = Order::selectRaw('MONTH(created_at) as month, SUM(total) as total_amount')
        ->where('status', 2)
        ->whereYear('created_at', date('Y'))
        ->groupBy('month')
        ->orderBy('month')
        ->get();

$monthLabels = [];
$saleData = [];

for ($i = 1; $i < 13; $i++) {
    $saleMonth = date('M', mktime(0, 0, 0, $i, 1));
    $totalAmount = 0;

    foreach ($orders as $order) {
        if ($order->month == $i) {
            $totalAmount = $order->total_amount;
            break;
        }
    }
    
    array_push($monthLabels, $saleMonth);
    array_push($saleData, $totalAmount);
}


        $saleDatasets = [
            [
                'label'=> 'Orders',
                'data'=> $saleData,
                'backgroundColor'=> $colors,
            ]
            ];


            //order status pie chart
            $orderStatus = [Order::where('status',0)->count(),Order::where('status',1)->count(),Order::where('status',2)->count()];
            $orderStatusColor = ['red','yellow','green'];


            $orderStatusLabel = ['Pending Order', 'Add Delivery', 'Order Delivered'];
            $orderStatusDatasets = [
                [
                    'label'=> 'Order Status',
                    'data'=> $orderStatus,
                    'backgroundColor'=> $orderStatusColor,
                ]
                ];


            $userStatusColor = ['red','yellow','green'];
            $userStatus = [User::where('status',0)->count(),User::where('status',1)->where('pending_status',0)->count(),
                            User::where('status',1)->where('pending_status',1)->count(), ];
            $userStatusLabel = ['Normal User', 'Pending Trainer',  'Approved Trainer'];
            $userStatusDatasets = [
                [
                    'label'=> 'Order Status',
                    'data'=> $userStatus,
                    'backgroundColor'=> $userStatusColor,
                ]
                ];







            $trainers = User::where('status', 1)->where('pending_status',1)->get();
            $orders = Order::get();
            $sales = Order::where('status', 2)->get();
            $courses = Course::where('status',1)->get();
            $normal_users = User::where('status',0)->get();



    return view("admin.starter", compact('datasets','labels','saleDatasets','monthLabels','orderStatusDatasets','orderStatusLabel','userStatusDatasets','userStatusLabel','trainers','orders','sales','courses','normal_users') );

    }
}

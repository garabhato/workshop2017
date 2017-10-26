<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
    class KardexController extends Controller
    {
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            //
            return view('kardex.index');
        }

        public function indexOrders()
        {
            $suppliers=DB::table('suppliers')->get();
            return view('order.index',['suppliers'=>$suppliers]);
        }

        public function indexSells()
        {
            return view('sell.index');
        }

        public function bySupplier($id)
        {
            $products=DB::table('suppliers')->where('id',$id)->get();
            return response()->json($products);
        }
        public function listOrders()
        {
            $products=DB::table('products')->get();
            return response()->json($products);
        }

        public function getOrders()
        {
            $suppliers=DB::table('suppliers')->get();
            $query = DB::table('details_orders')
                ->join('orders','orders.id','=','details_orders.orders_id')
                ->join('products','products.id','=','details_orders.products_id')
                ->join('suppliers','suppliers.id','=','orders.suppliers_id')
                ->select('orders.*','products.*','suppliers.*')
                ->get();
            return view('order.index',['orders'=>$query,'suppliers'=>$suppliers]);
        }



        public function createOrder(Request $request)
        {
            $product=$request->productName;
            //if()
            //$state=$request->state;
            //$state_cat=DB::table('catalogs')->where('name',$state)->value('description');
                $product_id=DB::table('products')->insertGetId([
                   'name'          =>$request->productName,
                   'price'         =>$request->orderPrice,
                   'quantity'      =>$request->orderQuantity,
                   'productType'   =>$request->productType
                ]);



               $order_id=DB::table('orders')->insertGetId([
                   'total'         =>$request->orderPrice,
                   'quantityOrder' =>$request->orderQuantity,
                   'suppliers_id'  =>$request->supplier_id,
                   'dateorder'     =>date("Y-m-d H:i:s")
                ]);

                DB::table('details_orders')->insert([
                   'subtotal'      =>$request->orderPrice,
                   'quantity'      =>$request->orderQuantity,
                   'orders_id'     =>$order_id,
                   'products_id'   =>$product_id,
                   'date'          =>date("Y-m-d H:i:s"),
                   'quantityReceived' => $request->quantityReceived,
                   'CAT_ORDERSTATUS'=>$request->state
                ]);

        }
        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
            //
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function store(Request $request)
        {
            //
        }

        /**
         * Display the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function show($id)
        {
            //
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function edit($id)
        {
            //
        }

        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request, $id)
        {
            //
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function destroy($id)
        {
            //
        }
    }

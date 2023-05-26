<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Stock;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){
        $products = Stock::orderBy('id','DESC')->get();
        $items = Item::orderBy('id','DESC')->get();
        return view('welcome',[
            'products'=>$products,
            'items'=>$items
        ]);
    }
    public function stock(){
        $products = Stock::orderBy('id','DESC')->get();
        return view('stock',[
            'products'=>$products
        ]);
    }
    public function stockDetail($id){
        $product = Stock::find($id);
        return view('stockDetail',[
            'product'=>$product
        ]);
    }
    public function storeProduct(Request $request){
        $stock = new Stock();
        $stock->product_name = $request->input('product_name');
        $stock->product_amount = $request->input('product_amount');
        $stock->product_full_quantity = $request->input('product_full_quantity');
        $stock->product_empty_quantity = $request->input('product_empty_quantity');
        $stock->product_quantity = $request->input('product_quantity');
        $stock->product_date = Carbon::now();
        if ($request->product_image) {
            $file = $request->file('product_image');
            $extension = $file->getClientOriginalName();
            $filename = time() . '.' . $extension;
            $file->move('uploads/product/', $filename);
            $stock->product_image = $filename;
        }
        $stock->save();
        return redirect()->back()->with('success','PRODUCT ADDED SUCCESS');
    }
    public function editStock(Request $request){
        $stock = Stock::find($request->product_id);
        $currentFull = $stock->product_full_quantity;
        $currentEmpty = $stock->product_empty_quantity;
        $currentQty = $stock->product_quantity;
        $stock->product_name = $request->input('product_name');
        $stock->product_amount = $request->input('product_amount');
        if (isset($request->product_full_quantity)){
            $stock->product_full_quantity = $currentFull + $request->input('product_full_quantity');

        }
        if (isset($request->product_empty_quantity)) {
            $stock->product_empty_quantity = $currentEmpty + $request->input('product_empty_quantity');

        }
        if (isset($request->product_quantity)){
            $stock->product_quantity = $currentQty + $request->input('product_quantity');

        }
        $stock->product_date = Carbon::now();
        if ($request->product_image) {
            $file = $request->file('product_image');
            $extension = $file->getClientOriginalName();
            $filename = time() . '.' . $extension;
            $file->move('uploads/product/', $filename);
            $stock->product_image = $filename;
        }
        $stock->save();
        return redirect()->back()->with('success','PRODUCT EDIT SUCCESS');
    }
    public function deleteStock($id){
        $product = Stock::find($id);
        $product->delete();
        return redirect(url('stock'))->with('success','PRODUCT DELETE SUCCESS');

    }
    public function sell(Request $request){
        $item = Item::where('stock_id',$request->id)->where('order_id',null)->first();
        if ($item){
            if (!isset($item->empty_quantity)){
                $fullQ = $item->full_quantity + 1;
                $amount = $fullQ*$item->stock->product_amount;
                $updateQ = Item::where('stock_id',$request->id)->update(['full_quantity'=>$fullQ,'amount'=>$amount]);
                $stock = Stock::find($request->id);
                $full = $stock->product_quantity - 1;
                $update = Stock::where('id',$request->id)->update(['product_quantity'=>$full]);

            }
            else{
                $fullQ = $item->full_quantity + 1;
                $emptyQ = $item->empty_quantity + 1;
                $amount = $fullQ*$item->stock->product_amount;
                $updateQ = Item::where('stock_id',$request->id)->update(['full_quantity'=>$fullQ,'empty_quantity'=>$emptyQ,'amount'=>$amount]);
                $stock = Stock::find($request->id);
                if($stock->product_quantity){
                    $full = $stock->product_quantity - 1;
                    $update = Stock::where('id',$request->id)->update(['product_quantity'=>$full]);
                }
                else{
                    $full = $stock->product_full_quantity - 1;
                    $empty = $stock->product_empty_quantity + 1;
                    $update = Stock::where('id',$request->id)->update(['product_full_quantity'=>$full,'product_empty_quantity'=>$empty]);
                }

            }
        }
        else{
            $sell = new Item();
            $sell->stock_id = $request->input('id');
            $stock = Stock::find($request->id);
            if (isset($stock->product_quantity)){
                $sell->full_quantity = '1';
            }
            else{
                $sell->full_quantity = '1';
                $sell->empty_quantity = '1';
            }
            $sell->amount = $stock->product_amount;
            $sell->save();
            if (isset($stock->product_quantity)){
                $full = $stock->product_quantity - 1;
                $update = Stock::where('id',$request->id)->update(['product_quantity'=>$full]);
            }
            else{
                $full = $stock->product_full_quantity - 1;
                $empty = $stock->product_empty_quantity + 1;
                $update = Stock::where('id',$request->id)->update(['product_full_quantity'=>$full,'product_empty_quantity'=>$empty]);
            }
        }
    }
    public function cancel(Request $request){
        $del = Item::find($request->item_id);
        $stock_id = $del->stock_id;
        $stock = Stock::find($stock_id);
        if ($del->full_quantity>1){
            if (!isset($del->empty_quantity)){
                $fullQ = $del->full_quantity-1;
                $amount = $fullQ*$del->stock->product_amount;
                $updateQ = Item::where('stock_id',$stock_id)->update(['full_quantity'=>$fullQ,'amount'=>$amount]);
                $full = $stock->product_quantity + 1;
                $update = Stock::where('id',$stock_id)->update(['product_quantity'=>$full]);
            }
            else{
                $fullQ = $del->full_quantity-1;
                $emptyQ = $del->empty_quantity-1;
                $amount = $fullQ*$del->stock->product_amount;
                $updateQ = Item::where('stock_id',$stock_id)->update(['full_quantity'=>$fullQ,'empty_quantity'=>$emptyQ,'amount'=>$amount]);
                $full = $stock->product_full_quantity + 1;
                $empty = $stock->product_empty_quantity - 1;
                $update = Stock::where('id',$stock_id)->update(['product_full_quantity'=>$full,'product_empty_quantity'=>$empty]);
            }

        }
        else{
            $stock = Stock::find($stock_id);
            if (isset($stock->product_quantity)){
                $full = $stock->product_quantity + $del->full_quantity;
                $update = Stock::where('id',$stock_id)->update(['product_quantity'=>$full]);

            }
            else{
                $full = $stock->product_full_quantity + $del->full_quantity;
                $empty = $stock->product_empty_quantity - $del->empty_quantity;
                $update = Stock::where('id',$stock_id)->update(['product_full_quantity'=>$full,'product_empty_quantity'=>$empty]);

            }
            $del->delete();
        }


    }
}

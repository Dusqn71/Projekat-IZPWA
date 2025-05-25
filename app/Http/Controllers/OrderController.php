<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function createPublic() {
        $products = Product::all();
        return view('public.order', compact('products'));
    }

    public function storePublic(Request $request) {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            // 'total_price' => 'required|numeric|min:0',
        ]);

        $product = Product::findOrFail($request->product_id);
        $total = $product->price * $request->quantity;

        Order::create([
            'user_id' => Auth::id(),
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'total_price' => $total,
        ]);

        return redirect()->route('public.profile')->with("success", "Uspesno ste kreirali narudzbinu!");
    }

    public function destroy($id) {
        $order = Order::findOrFail($id);

        $order->delete();

        return redirect()->back()->with('success', 'Narudzbina uspesno obrisana!');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        // Lấy dữ liệu từ request
        $productId = $request->input('id');
        $productName = $request->input('name');
        $productPrice = $request->input('price');
        $productPriceSale = $request->input('price_sale');
        $productImage = $request->input('image');
        $productQuantity = $request->input('quantity', 1); // Nếu không có số lượng thì mặc định là 1

        // Tạo một mảng sản phẩm
        $product = [
            'id' => $productId,
            'name' => $productName,
            'price' => $productPriceSale <= 0 ? $productPrice : $productPriceSale,
            'image' => $productImage,
            'quantity' => $productQuantity
        ];

        // Lấy giỏ hàng từ session, nếu chưa có thì tạo mảng rỗng
        $cart = session()->get('cart', []);

        // Kiểm tra nếu sản phẩm đã tồn tại trong giỏ hàng
        if (isset($cart[$productId])) {
            // Nếu sản phẩm đã tồn tại, cập nhật số lượng
            $cart[$productId]['quantity'] += $productQuantity;
        } else {
            // Nếu sản phẩm chưa tồn tại, thêm mới vào giỏ hàng
            $cart[$productId] = $product;
        }

        // Lưu giỏ hàng vào session
        session()->put('cart', $cart);

        return redirect()->route('cart.show');
    }

    public function showCart()
    {
    $cart = session()->get('cart', []);
    $total = 0;
    // Tính tổng tiền
    foreach ($cart as $item) {
        $total += $item['price'] * $item['quantity'];
    }
    return view('client.cart.viewcart', compact('cart', 'total'));
    }

    public function removeCart($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.show');
    }

    public function clearCart()
    {
        session()->forget('cart');
        return redirect()->route('cart.show');
    }

    public function checkout(){
        // Lấy giỏ hàng từ session
        $cart = session()->get('cart', []);
        $totalAmount = 0;

        // Tính tổng số tiền
        foreach ($cart as $item) {
            $totalAmount += $item['price'] * $item['quantity'];
        }
        return view('client.cart.checkout', compact('cart', 'totalAmount'));
    }

    public function thankyou(){
        return view('client.cart.thankyou');
    }

    public function placeOrder(Request $request)
    {
        // Lấy giỏ hàng từ session
        $cart = session()->get('cart', []);
        $totalAmount = 0;

        // Tính tổng số tiền
        foreach ($cart as $item) {
            $totalAmount += $item['price'] * $item['quantity'];
        }

        // Tạo đơn hàng mới
        $order = Order::create([
            'user_id' => auth()->id(),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'total' => $totalAmount,
            'payment_method' => $request->input('payment_method'),
        ]);

        // Thêm sản phẩm vào đơn hàng
        foreach ($cart as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['id'],
                'product_name' => $item['name'],
                'image' => $item['image'],
                'product_price' => $item['price'] * $item['quantity'],
                'quantity' => $item['quantity'],
            ]);
        }

        // Xóa giỏ hàng
        session()->forget('cart');

        return redirect()->route('thankyou');
    }

}

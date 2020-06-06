<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function PHPSTORM_META\elementType;

class BasketController extends Controller
{
    /**
     * Рисует страницу с корзиной
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function basket(){
        $order = $this->getOrder();
        return view('basket',compact('order'));
    }

    /**
     * Подтверждение заказа
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function basketConfirm(Request $request  ){
        $orderId = session ('orderId');
        if(is_null($orderId))
        {
            return (redirect())->route('index');
        }
        $order = Order::find($orderId);
        $success = $order->saveOrder($request->name, $request->phone);

        if($success){
            session()->flash('success','Ваш заказ принят на обработку!');
        } else {
            session()->flash('warning', 'Случилась ошибка!');
        }
        return redirect()->route('index');
    }

    /**
     * рисует форму для подтверждения заказа
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function basketPlace()
    {
        $orderId = session ('orderId');
        if(is_null($orderId))
        {
            return (redirect())->route('index');
        }
        $order = Order::find($orderId);
        return view('order', compact('order'));
    }

    /**
     * добавляет товар в корзину
     * @param $productId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function basketAdd($productId)
    {
        $order = $this->getOrder();

        if($order->products->contains($productId))
        {
            $pivotRow = $order->products()->where('product_id', $productId)->first()->pivot;
            $pivotRow->count++;
            $pivotRow->update();
        } else {
            $order->products()->attach($productId);
        }

        if(Auth::check()){
            $order->user_id = Auth::id();
            $order->save();
        }

        $product = Product::find($productId);
        session()->flash('success', 'Добавлен товар '. $product->name);

        return redirect()->route('basket');
    }

    /**
     * удаляет товар из корзины
     * @param $productId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function basketRemove($productId)
    {
        $orderId = session ('orderId');
        if (is_null($orderId)) {
            return redirect()->route('basket');
        }
        $order=Order::find($orderId);

        if($order->products->contains($productId))
        {
            $pivotRow = $order->products()->where('product_id', $productId)->first()->pivot;
            if($pivotRow->count < 2){
                $order->products()->detach($productId);
            } else{
                $pivotRow->count--;
                $pivotRow->update();
            }
        }

        $product = Product::find($productId);
        session()->flash('warning', 'Удален товар '. $product->name);

        return redirect()->route('basket');

    }

    /**
     * отдает объект корзины найденной по сессиии , или создает новую
     * @return Order
     */
    protected function getOrder(): Order
    {
        $orderId = session ('orderId');
        if (is_null($orderId)) {
            $order = Order::create();
            session(['orderId' => $order->id]);
        } else{
            $order = Order::find($orderId);
        }
        return $order;
    }
}

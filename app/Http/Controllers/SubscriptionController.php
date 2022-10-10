<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller {
    public function create() {
        $intent = Auth::user()->createSetupIntent();
        return view('subscription.create', compact('intent'));
    }

    public function store(Request $request) {
        $request->user()->newSubscription(
            'subscription_plan',
            'price_1LpWm5GM5TyIXmdWgoI8HtO4'
        )->create($request->paymentMethodId);
        return redirect()->route('home')->with('flash_message', '有料プランに登録しました。');
    }

    public function cancel() {
        return view('subscription.cancel');
    }

    public function destroy() {
        Auth::user()->subscription('subscription_plan')->cancelNow();
        return redirect()->route('home')->with('flash_message', '有料プランを解約しました。');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubscriptionController extends Controller
{
    public function subscribe(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255',
        ]);

        if ($validator->fails()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'status' => 'error',
                    'message' => $validator->errors()->first('email')
                ], 422);
            }
            return back()->withErrors($validator)->withInput();
        }

        try {
            $subscription = Subscription::firstOrCreate(
                ['email' => $request->email],
                [
                    'is_active' => true,
                    'subscribed_at' => now(),
                ]
            );

            // If subscription already exists but was inactive, reactivate it
            if (!$subscription->wasRecentlyCreated && !$subscription->is_active) {
                $subscription->update([
                    'is_active' => true,
                    'subscribed_at' => now(),
                ]);
            }

            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'status' => 'success',
                    'message' => $subscription->wasRecentlyCreated 
                        ? __('common.thank_you_subscribing')
                        : __('common.already_subscribed')
                ], 200);
            }

            return back()->with('success', __('common.thank_you_subscribing'));
        } catch (\Exception $e) {
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'status' => 'error',
                    'message' => __('common.something_went_wrong')
                ], 500);
            }

            return back()->with('error', __('common.something_went_wrong'));
        }
    }
}

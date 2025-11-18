<?php

namespace App\Services;

use App\Mail\NewArticleNotification;
use App\Models\Subscription;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class NotificationService
{
    /**
     * Send notifications to all active subscribers when a new article is published
     *
     * @param mixed $article (Insight or Story)
     * @param string $articleType ('insight' or 'story')
     * @return void
     */
    public function notifySubscribers($article, string $articleType): void
    {
        try {
            // Get all active subscribers
            $subscribers = Subscription::where('is_active', true)->get();

            if ($subscribers->isEmpty()) {
                Log::info('No active subscribers to notify');
                return;
            }

            // Send email to each subscriber
            foreach ($subscribers as $subscriber) {
                try {
                    // Determine language preference (default to 'en' for now)
                    // You can add a language preference field to subscriptions table later
                    $language = 'en'; // Default to English

                    Mail::to($subscriber->email)->send(
                        new NewArticleNotification($article, $articleType, $subscriber->email, $language)
                    );

                    Log::info("Notification sent to: {$subscriber->email}");
                } catch (\Exception $e) {
                    // Log error but continue with other subscribers
                    Log::error("Failed to send notification to {$subscriber->email}: " . $e->getMessage());
                }
            }

            Log::info("Notifications sent to {$subscribers->count()} subscribers for {$articleType}: {$article->id}");
        } catch (\Exception $e) {
            Log::error("Error in NotificationService: " . $e->getMessage());
        }
    }
}


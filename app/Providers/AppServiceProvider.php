<?php

namespace App\Providers;

use App\Models\ChatSession;
use App\Models\ContactMessage;
use App\Models\PasswordResetRequest;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('admin.layouts.navbar', function ($view) {
            $contactNotifications = ContactMessage::where(function ($query) {
                    $query->where('is_read', false)->orWhere('status', 'new');
                })
                ->latest()
                ->take(4)
                ->get();

            $chatNotifications = ChatSession::with('latestMessage')
                ->where(function ($query) {
                    $query->where('unread_admin_count', '>', 0)
                        ->orWhere('status', 'waiting')
                        ->orWhere('status', 'active');
                })
                ->latest('last_message_at')
                ->take(4)
                ->get();

            $unreadMessageCount = ContactMessage::where('is_read', false)->count()
                + ChatSession::sum('unread_admin_count')
                + ChatSession::waiting()->count();

            $passwordResetRequests = collect();

            if (auth()->check() && auth()->user()->role === 'super_admin') {
                $passwordResetRequests = PasswordResetRequest::with('user')
                    ->where('status', 'pending')
                    ->latest('requested_at')
                    ->take(4)
                    ->get();

                $unreadMessageCount += $passwordResetRequests->count();
            }

            $view->with([
                'contactNotifications' => $contactNotifications,
                'chatNotifications' => $chatNotifications,
                'passwordResetRequests' => $passwordResetRequests,
                'unreadMessageCount' => $unreadMessageCount,
            ]);
        });
    }
}

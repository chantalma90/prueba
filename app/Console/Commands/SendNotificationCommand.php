<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use App\Services\NotificationService;
use Illuminate\Support\Str;

class SendNotificationCommand extends Command
{
    //protected $ses;
    protected $notification;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:sendNotification {id : User Id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Notification to user';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(NotificationService $notificationService)
    {
        parent::__construct();
        $this->notification = $notificationService;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $id = $this->argument('id');
        $user = User::example($id);
        $message = Str::random();
        $result = $this->notification->notify($user, $message);

        $this->info("id: $id");
        $this->info("email: $user->email");
        $this->info("message: $message");
        $this->info("result: $result");
    }
}

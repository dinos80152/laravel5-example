<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;

class SendEmail extends Command
{
    /**
     * The name and signature of the console command.
     * If the --queue switch is passed, the value of the option will be true. Otherwise, the value will be false:
     * ex: php artisan email:send 1 --queue=default
     *
     * @var string
     */
    protected $signature = 'email:send
                            {user : The ID of the user}
                            {user2? : optional arguments}
                            {user3=foo : optional arguments with default values}
                            {--queue= : Whether the job should be queued}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email to users';

    protected $user;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        parent::__construct();

        $this->user = $user;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $userId = $this->argument('user');

        // Retrieve all arguments
        $arguments = $this->argument();

        // Retrieve a specific option...
        $queueName = $this->option('queue');

        // Retrieve all options...
        $options = $this->option();

        $user = $this->user->find($userId);

        $this->mailer->send('emails.e-news', ['user' => $user], function ($message) use ($user) {
            $message->to($user->email, $user->name)->subject('e-news');
        });
    }
}

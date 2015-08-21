<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class InterActive extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'example:interactive';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command interactive example';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $name = $this->ask('What is your name?');

        $this->info('Your name is' . $name);

        $password = $this->secret('What is the password?');

        if ($this->confirm('Do you wish to continue? [y|N]')) {

        } else {
            $this->question('Are you Sure?');
        }

        $name = $this->anticipate('What is your name?', ['Taylor', 'Dayle']);

        $this->comment('Nice Choice');

        $name = $this->choice('What is your name?', ['Taylor', 'Dayle'], false);

        if (!$name) {
            $this->error('You have no name');
        }

        // Console Table
        $headers = ['Name', 'Email'];

        $users = App\User::all(['name', 'email'])->toArray();

        $this->table($headers, $users);

        // Progress Bar
        $bar = $this->output->createProgressBar(count($users));

        foreach ($users as $user) {
            $this->performTask($user);

            $bar->advance();
        }

        $bar->finish();

        // Calling other commands
        $this->call('email:send', [
            'user' => 1, '--queue' => 'default'
        ]);

        // Calling other commands keep silent
        $this->callSilent('email:send', [
            'user' => 1, '--queue' => 'default'
        ]);
    }
}

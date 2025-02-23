<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Repositories\UserRepository;
use App\Services\SlugService;
use Illuminate\Console\Command;

class AddSuperAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:add';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add a super admin to the system';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $slugService = new SlugService();
        $userRepository = new UserRepository();

        $name = $this->ask('Enter your name');
        $email = $this->ask('Enter your email');
        $password = $this->secret('Enter your password');

        $slug = $slugService->getOriginalSlug($name, $userRepository);

        User::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password),
            'utype' => 'ADM',
            'slug' => $slug
        ]);

        $this->info('Super admin created successfully');
    }
}

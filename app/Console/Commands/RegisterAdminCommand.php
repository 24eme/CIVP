<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterAdminCommand extends Command
{
    protected $signature = 'register:admin';
    protected $description = 'Register admin';

    protected $user;

    public function __construct(User $user)
    {
        parent::__construct();
        $this->user = $user;
    }

    public function handle()
    {
      $details = $this->getDetails();
      $admin = $this->user->createAdmin($details);
      $this->display($admin);
    }

    private function getDetails()
    {
        $details['name'] = $this->ask('Nom');
        $details['email'] = $this->ask('Email');
        $details['password'] = $this->secret('Password');
        $details['confirm_password'] = $this->secret('Confirm password');
        while (!$this->isValidPassword($details['password'], $details['confirm_password'])) {
            $this->error('Password and Confirm password do not match');
            $details['password'] = $this->secret('Password');
            $details['confirm_password'] = $this->secret('Confirm password');
        }
        $details['password'] = $details['confirm_password'] = Hash::make($details['password']);
        return $details;
    }

    private function display(User $admin)
    {
        $headers = ['Nom', 'Email', 'Admin'];
        $fields = [
            'Nom' => $admin->name,
            'email' => $admin->email,
            'admin' => $admin->isAdmin()
        ];
        $this->info('Admin created');
        $this->table($headers, [$fields]);
    }

    private function isValidPassword(string $password, string $confirmPassword)
    {
        return $this->isMatch($password, $confirmPassword);
    }

    private function isMatch(string $password, string $confirmPassword)
    {
        return $password === $confirmPassword;
    }
}

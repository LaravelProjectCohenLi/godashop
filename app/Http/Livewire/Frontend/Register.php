<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Customer;
use App\Jobs\SendMailRegisterJob;

class Register extends Component
{
    public $name;
    public $phone;
    public $email;
    public $password;
    public $password_confirmation;
    public $isSent = false;

    protected $rules = [
        'name' => 'required|min:6',
        'phone' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:6|confirmed|same:password_confirmation',
        'password_confirmation' => 'required|min:6',
    ];

    public function render()
    {
        return view('livewire.frontend.register');
    }

    public function register()
    {
        try {
            $customer = Customer::create($this->validate());
            dispatch(new SendMailRegisterJob($customer))->onQueue('default');
            $this->isSent = true;
            $this->name = $this->phone = $this->email = $this->password = $this->password_confirmation = '';
        } catch(\Exception $e) {
            report($e);
        }
    }
}
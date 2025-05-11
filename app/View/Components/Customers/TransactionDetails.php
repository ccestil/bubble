<?php

namespace App\View\Components\Customers;

use Illuminate\View\Component;
use App\Models\Transaction;

class TransactionDetails extends Component
{
    public $transaction;

    /**
     * Create a new component instance.
     *
     * @param  Transaction  $transaction
     * @return void
     */
    public function __construct(Transaction $transaction)
    {
        $this->transaction = $transaction;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.customers.transaction-details');
    }
}
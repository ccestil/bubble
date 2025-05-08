<?php

    namespace App\View\Components;

    use Illuminate\View\Component;

    class AdminTransaction extends Component
    {
        /**
         * Create a new component instance.
         *
         * @param  int  $totalTransactions
         * @param  \Illuminate\Support\Collection  $finishedTransactions
         * @param  \Illuminate\Support\Collection  $washingTransactions
         * @return void
         */
        public function __construct(
            public int $totalTransactions,
            public $finishedTransactions,
            public $washingTransactions
        ) {
        }

        /**
         * Get the view / contents that represent the component.
         *
         * @return \Illuminate\Contracts\View\View|\Closure|string
         */
        public function render()
        {
            return view('components.admins.transaction');
        }
    }
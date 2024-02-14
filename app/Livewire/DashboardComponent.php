<?php

namespace App\Livewire;

use App\Models\Operation;
use App\Models\OperationType;
use App\Models\Subscription;
use App\Models\User;
use App\Utils\StateLabel;
use Livewire\Component;

class DashboardComponent extends Component
{
    public function render()
    {
        return view('livewire.dashboard.dashboard',
            [
                
            ])
            ->extends('layout', ['title' => "Dashboard"]);
    }

    function getUserDash()
    {
        return [
            [
                'title' => 'Utilisateurs Total',
                'number' => User::role('customer')->count(),
                'color' => 'primary'
            ],
            [
                'title' => 'Pièces non fournies',
                'number' => User::role('customer')->whereState(StateLabel::$CREATED)->count(),
                'color' => 'info'
            ],
            [
                'title' => 'Validation En Attente',
                'number' => User::role('customer')->whereState(StateLabel::$PENDING)->count(),
                'color' => 'warning'
            ],
            [
                'title' => 'Utilisateurs Validés',
                'number' => User::role('customer')->whereState(StateLabel::$VALIDATED)->count(),
                'color' => 'success'
            ],
        ];
    }
    
    function getSubscriptionDash()
    {
        return [
            [
                'title' => Subscription::$BASIC,
                'number' => Subscription::usersBySubscription(Subscription::$BASIC)->count(),
                'color' => 'primary'
            ],
            [
                'title' => Subscription::$STANDARD,
                'number' => Subscription::usersBySubscription(Subscription::$STANDARD)->count(),
                'color' => 'info'
            ],
            [
                'title' => Subscription::$BUSINESS,
                'number' => Subscription::usersBySubscription(Subscription::$BUSINESS)->count(),
                'color' => 'success'
            ]
        ];
    }
    
    function getOperationDash()
    {
        return [
            [
                'title' => OperationType::$RECHARGE,
                'number' => Operation::usersByOperations(OperationType::$RECHARGE)->count(),
                'color' => 'primary',
                'sub_icon' => 'ri-arrow-up-line'
            ],
            [
                'title' => OperationType::$TRANSFERT,
                'number' => Operation::usersByOperations(OperationType::$TRANSFERT)->count(),
                'color' => 'info',
                'sub_icon' => 'ri-arrow-right-line'
            ],
            [
                'title' => OperationType::$WITHDRAW,
                'number' => Operation::usersByOperations(OperationType::$WITHDRAW)->count(),
                'color' => 'success',
                'sub_icon' => 'ri-arrow-down-line'
            ]
        ];
    }
}

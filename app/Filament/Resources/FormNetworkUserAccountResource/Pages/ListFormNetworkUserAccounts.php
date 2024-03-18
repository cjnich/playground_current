<?php

namespace App\Filament\Resources\FormNetworkUserAccountResource\Pages;

use App\Filament\Resources\FormNetworkUserAccountResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFormNetworkUserAccounts extends ListRecords
{
    protected static string $resource = FormNetworkUserAccountResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

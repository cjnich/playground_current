<?php

namespace App\Filament\Resources\FormNetworkUserAccountResource\Pages;

use App\Filament\Resources\FormNetworkUserAccountResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFormNetworkUserAccount extends EditRecord
{
    protected static string $resource = FormNetworkUserAccountResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

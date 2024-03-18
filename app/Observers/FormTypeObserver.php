<?php

namespace App\Observers;

use App\Models\FormType;

use Illuminate\Support\Facades\Log;

class FormTypeObserver
{
    /**
     * Handle the FormType "created" event.
     */
    public function creating(FormType $formType): void
    {

        $formType->created_by = auth()->id();

        $this->handleUserUpdateLog($formType);

    }

    /**
     * Handle the FormType "updated" event.
     */
    public function updated(FormType $formType): void
    {
        $this->handleUserUpdateLog($formType);

        $formType->save();
    }

    /**
     * Handle the FormType "deleted" event.
     */
    public function deleted(FormType $formType): void
    {
        $this->handleUserUpdateLog($formType);

        $formType->save();
    }

    /**
     * Handle the FormType "restored" event.
     */
    public function restored(FormType $formType): void
    {
        $this->handleUserUpdateLog($formType);

        $formType->save();
    }

    /**
     * Handle the FormType "force deleted" event.
     */
    public function forceDeleted(FormType $formType): void
    {
        $this->handleUserUpdateLog($formType);

        $formType->save();
    }

    private function handleUserUpdateLog(FormType $formType)
    {
        $formType->updated_by = auth()->id();
    }
}

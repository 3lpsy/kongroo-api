<?php

namespace App\Models\Model\Traits;

use App\Observers\Model\ModelObserver;

trait ModelObservable
{

    protected $defaultModelEvents = [
        'creating', 'created', 'updating', 'updated',
        'deleting', 'deleted', 'saving', 'saved',
        'restoring', 'restored', 'seeding', 'seeded'
    ];

    public static function bootModelObservable()
    {
        return static::observe(ModelObserver::class);
    }

    public function getObservableEvents()
    {
        return array_merge(
            $this->defaultModelEvents,
            $this->observables
        );
    }

    public function seed() {
        $this->fireModelEvent('seeding', false);
        $this->save();
        $this->fireModelEvent('seeded', false);
        return $this;
    }

}

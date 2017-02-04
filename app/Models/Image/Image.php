<?php

namespace App\Models\Image;

use App\Models\Model\Model;
use App\Models\Image\Traits\ImageRelationship;

class Image extends Model
{
    protected $dir = "app/content/images/";

    use ImageRelationship;
    /**
     * Table Name
     * @var string
     */
    protected $model = "image";

    public function resolvePath()
    {
        return storage_path($this->dir) .
            ($this->directory ? $this->directory . "/" : "") .
            $this->filename;
    }

    public function resolveUrl()
    {
        return route('api.image.show', [
            'imageId' => $this->id
        ]);
    }
}

<?php
namespace App\Transformers\Eloquent\Section;

use App\Transformers\Eloquent\EloquentTransformer;
use App\Models\Article\Section\Section;
use App\Transformers\Eloquent\Status\ApiStatusTransformer;
use App\Transformers\Eloquent\SectionType\ApiSectionTypeTransformer;
use App\Transformers\Eloquent\Content\ApiContentTransformer;

class ApiSectionTransformer extends EloquentTransformer
{

    protected $availableIncludes = ['status', 'type', 'content'];

    public function transform(Section $section)
    {
        return [
            'id' => (int) $section->id,
            'header' => $section->header,
            'description' => $section->description,
            'slug' => $section->slug,
            'sort' => $section->sort
        ];
    }

    public function includeStatus(Section $section)
    {
        return $this->item($section->status, new ApiStatusTransformer, false);
    }

    public function includeContent(Section $section)
    {
        return $this->item($section->content, new ApiContentTransformer, false);
    }

    public function includeType(Section $section)
    {
        return $this->item($section->type, new ApiSectionTypeTransformer, false);

    }

}

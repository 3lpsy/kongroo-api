<?php

/*
 * This file is part of the League\Fractal package.
 *
 * (c) Phil Sturgeon <me@philsturgeon.uk>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Services\Fractal\Serializers\Eloquent;
use League\Fractal\Serializer\DataArraySerializer;
use League\Fractal\Pagination\PaginatorInterface;

class EloquentSerializer extends DataArraySerializer
{
    public function collection($resourceKey, array $data)
    {
        if ($resourceKey === false) {
            return $data;
        }
        return array($resourceKey ?: 'data' => $data);
    }

    public function item($resourceKey, array $data)
    {
        if ($resourceKey === false) {
            return $data;
        }
        return array($resourceKey ?: 'data' => $data);
    }

    public function paginator(PaginatorInterface $paginator)
    {
        $currentPage = (int) $paginator->getCurrentPage();
        $lastPage = (int) $paginator->getLastPage();

        $pagination = [
            'total' => (int) $paginator->getTotal(),
            'count' => (int) $paginator->getCount(),
            'limit' => (int) $paginator->getPerPage(),
            "hasMore" => (bool) $paginator->getHasMore(),
            'currentPage' => (int) $currentPage,
            'totalPages' => (int) $lastPage
        ];

        $pagination['links'] = [];

        if ($currentPage > 1) {
            $pagination['links']['previous'] = $paginator->getUrl($currentPage - 1);
        }
        else {
            $pagination['links']['previous'] = "";
        }

        if ($currentPage < $lastPage) {
            $pagination['links']['next'] = $paginator->getUrl($currentPage + 1);
        }
        else {
            $pagination['links']['next'] = "";
        }

        return ['pagination' => $pagination];
    }
}

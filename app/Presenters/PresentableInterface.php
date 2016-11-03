<?php
namespace App\Presenters;

use App\Presenters\PresenterInterface;
/**
 * Interface Presentable
 * @package Prettus\Repository\Contracts
 */
interface PresentableInterface
{

    public function setPresenter(PresenterInterface $presenter);
    /**
     * @return mixed
     */
    public function presenter();
}

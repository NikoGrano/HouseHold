<?php

declare(strict_types=1);

/**
 *
 * Household 2020 — NOTICE OF LICENSE
 * This source file is released under commercial license by copyright holders.
 *
 * @copyright 2017-2020 (c) Niko Granö (https://granö.fi)
 * @copyright 2014-2020 (c) IronLions (https://ironlions.fi)
 *
 */

namespace App\Stock\Application\Command\AddProductToStock;

use App\Core\Application\Command\CommandHandlerInterface;
use App\Stock\Domain\ProductStock\Event\ProductAddedToStock;
use App\Stock\Domain\ProductStock\Repository\ProductStockStoreRepository;

final class AddProductToStockHandler implements CommandHandlerInterface
{
    private ProductStockStoreRepository $repository;

    public function __construct(ProductStockStoreRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(AddProductToStockCommand $command): void
    {
        $stock = $this->repository->get($command->stock->getId());
        $stock->apply(new ProductAddedToStock($command->amount, $command->price, $command->bestBefore));
        $this->repository->store($stock);
    }
}

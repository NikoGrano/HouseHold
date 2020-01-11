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

namespace App\DataFixtures\Stock;

use Doctrine\Common\DataFixtures\DependentFixtureInterface;

abstract class AbstractDependentFixture extends AbstractStockFixture implements DependentFixtureInterface
{
    protected const DEPS = [];

    public function getDependencies()
    {
        return static::DEPS;
    }
}

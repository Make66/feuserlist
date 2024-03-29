<?php

declare(strict_types=1);

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

namespace Taketool\Feuserlist\Domain\Repository;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Persistence\Exception\InvalidQueryException;
use TYPO3\CMS\Extbase\Persistence\Generic\Typo3QuerySettings;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

/**
 * A Frontend User Group Repository
 */
class FrontendUserGroupRepository extends Repository {

    public function initializeObject()
    {
        /** @var QuerySettingsInterface $querySettings */
        $querySettings = GeneralUtility::makeInstance(Typo3QuerySettings::class);
        // Show comments from all pages
        $querySettings
            ->setRespectStoragePage(false) // default: true
            ->setIgnoreEnableFields(false); // default
        $this->setDefaultQuerySettings($querySettings);
    }
    /**
     * @throws InvalidQueryException
     */
    public function findAllSortByTitle(string $userUidList): array
    {
        $q = $this->createQuery();

        $q->matching($q->in('pid', explode(',',$userUidList)));
        $q->getQuerySettings()->setRespectStoragePage(false);
        $q->setOrderings(['title'=> QueryInterface::ORDER_ASCENDING]);

        return $q->execute()->toArray();
    }
}

<?php

namespace SebastianChristoph\ScFeuserlist\ViewHelpers;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2020-2020 Martin Keller <martin.keller@taketool.de>
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class UsergroupViewHelper extends AbstractViewHelper
{
    /**
     * Initialize arguments
     */
    public function initializeArguments()
    {
        parent::initializeArguments();
        $this->registerArgument('allgroups', 'array', 'Array of all user groups', true);
        $this->registerArgument('value', 'string', 'groupId CSV', true);
    }

    /**
     * Render
     *
     * @return mixed
     * @throws \Exception
     */
    public function render()
    {
        $usergroupTitles = '';
        $arGroups = explode(',', $this->arguments['value']);
        foreach($arGroups as $gUid) {
            $usergroupTitles .= $this->arguments['allgroups'][$gUid].' ';
        }
        return $usergroupTitles;
    }
}
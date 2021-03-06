<?php

namespace DrupalRector\Rector\Deprecation;

use DrupalRector\Rector\Deprecation\Base\EntityLoadBase;
use Rector\Core\RectorDefinition\CodeSample;
use Rector\Core\RectorDefinition\RectorDefinition;

/**
 * Replaced deprecated node_load() calls.
 *
 * See https://www.drupal.org/node/2266845 for change record.
 *
 * What is covered:
 * - See EntityLoadBase.php
 *
 * Improvement opportunities
 * - See EntityLoadBase.php
 */
final class NodeLoadRector extends EntityLoadBase
{
    protected $entityType = 'node';

    /**
     * @inheritdoc
     */
    public function getDefinition(): RectorDefinition
    {
        return new RectorDefinition('Fixes deprecated node_load() use',[
            new CodeSample(
                <<<'CODE_BEFORE'
$node = node_load(123);
CODE_BEFORE
                ,
                <<<'CODE_AFTER'
$node = \Drupal::entityManager()->getStorage('node')->load(123);
CODE_AFTER
            )
        ]);
    }

}

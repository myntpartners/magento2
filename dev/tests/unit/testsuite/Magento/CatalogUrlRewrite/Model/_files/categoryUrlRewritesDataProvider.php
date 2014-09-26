<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @copyright   Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

use Magento\UrlRewrite\Service\V1\Data\UrlRewrite;
use Magento\UrlRewrite\Model\OptionProvider;
use Magento\CatalogUrlRewrite\Model\CategoryUrlRewriteGenerator;

return [
    [1, 1, 'test-category.html', null, [
        [
            'entity_type' => CategoryUrlRewriteGenerator::ENTITY_TYPE,
            'entity_id' => 1,
            'store_id' => 1,
            'request_path' => 'test-category.html',
            'target_path' => 'catalog/category/view/id/1',
            'redirect_type' => 0,
            'is_autogenerated' => true,
            'metadata' => null
        ]
    ]],
    [1, 1, 'test-category.html', [
        [
            UrlRewrite::REQUEST_PATH => 'generate-for-autogenerated.html',
            UrlRewrite::TARGET_PATH => 'some-path.html',
            UrlRewrite::STORE_ID => 2,
            UrlRewrite::IS_AUTOGENERATED => 1,
        ],
        [
            UrlRewrite::REQUEST_PATH => 'test-category.html',
            UrlRewrite::TARGET_PATH => 'skip-generation-due-to-equals-request-and-generated-target-path.html',
            UrlRewrite::IS_AUTOGENERATED => 1,
        ],
        [
            UrlRewrite::REQUEST_PATH => 'generate-for-custom-by-user.html',
            UrlRewrite::TARGET_PATH => 'custom-target-path.html',
            UrlRewrite::REDIRECT_TYPE => 'some-type',
            UrlRewrite::IS_AUTOGENERATED => 0,
            UrlRewrite::METADATA => ['is_user_generated' => 1],
        ],
        [
            UrlRewrite::REQUEST_PATH => 'generate-for-custom-without-redirect-type.html',
            UrlRewrite::TARGET_PATH => 'custom-target-path2.html',
            UrlRewrite::REDIRECT_TYPE => 0,
            UrlRewrite::IS_AUTOGENERATED => 0,
            UrlRewrite::METADATA => ['is_user_generated' => false],
        ],
        [
            UrlRewrite::REQUEST_PATH => 'skip-equals-paths.html',
            UrlRewrite::TARGET_PATH => 'skip-equals-paths.html',
            UrlRewrite::REDIRECT_TYPE => 0,
            UrlRewrite::IS_AUTOGENERATED => 0,
        ],
    ], [
        [
            'entity_type' => CategoryUrlRewriteGenerator::ENTITY_TYPE,
            'entity_id' => 1,
            'store_id' => 1,
            'request_path' => 'test-category.html',
            'target_path' => 'catalog/category/view/id/1',
            'redirect_type' => 0,
            'is_autogenerated' => true,
            'metadata' => null
        ],
        [
            'entity_type' => CategoryUrlRewriteGenerator::ENTITY_TYPE,
            'entity_id' => 1,
            'store_id' => 2,
            'request_path' => 'generate-for-autogenerated.html',
            'target_path' => 'test-category.html',
            'redirect_type' => OptionProvider::PERMANENT,
            'is_autogenerated' => false,
            'metadata' => null
        ],
        [
            'entity_type' => CategoryUrlRewriteGenerator::ENTITY_TYPE,
            'entity_id' => 1,
            'store_id' => 1,
            'request_path' => 'generate-for-custom-by-user.html',
            'target_path' => 'custom-target-path.html',
            'redirect_type' => 'some-type',
            'is_autogenerated' => false,
            'metadata' => serialize(['is_user_generated' => 1]),
        ],
        [
            'entity_type' => CategoryUrlRewriteGenerator::ENTITY_TYPE,
            'entity_id' => 1,
            'store_id' => 1,
            'request_path' => 'generate-for-custom-without-redirect-type.html',
            'target_path' => 'custom-target-path2.html',
            'redirect_type' => 0,
            'is_autogenerated' => false,
            'metadata' => serialize(['is_user_generated' => false]),
        ],
    ]],
];
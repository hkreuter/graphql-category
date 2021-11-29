<?php declare(strict_types=1);

namespace OxidAcademy\GraphQL\Category\Shared\Service;

use OxidEsales\GraphQL\Base\Framework\NamespaceMapperInterface;

final class NamespaceMapper implements NamespaceMapperInterface
{
    public function getControllerNamespaceMapping(): array
    {
        return [
            '\\OxidAcademy\\GraphQL\\Category\\Category\\Controller' => __DIR__ . '/../../Category/Controller/',
        ];
    }

    public function getTypeNamespaceMapping(): array
    {
        return [];
    }
}
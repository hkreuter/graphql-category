<?php declare(strict_types=1);


namespace OxidAcademy\GraphQL\Category\Category\Service;

use OxidAcademy\GraphQL\Category\Category\Infrastructure\CategoryRepository;
use OxidEsales\GraphQL\Storefront\Category\DataType\Category as CategoryDataType;

class Category
{
    private CategoryRepository $repository;

    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param string $seo
     *
     * @return CategoryDataType[]
     */
    public function getCategoriesBySeo(string $seo): array
    {
        return $this->repository->getCategoriesBySeo($seo);
    }
}

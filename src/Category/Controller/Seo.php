<?php declare(strict_types=1);

namespace OxidAcademy\GraphQL\Category\Category\Controller;


use OxidAcademy\GraphQL\Category\Category\Service\Category as CategoryService;
use OxidEsales\GraphQL\Storefront\Category\DataType\Category as CategoryDataType;
use TheCodingMachine\GraphQLite\Annotations\Query;


final class Seo
{
    private CategoryService $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    /**
     * @Query
     *
     * @return CategoryDataType[]
     */
    public function categoriesBySeo(string $seo): array
    {
        return $this->categoryService->getCategoriesBySeo($seo);
    }
}

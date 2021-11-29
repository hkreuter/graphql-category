<?php declare(strict_types=1);


namespace OxidAcademy\GraphQL\Category\Category\Infrastructure;

use OxidEsales\Eshop\Application\Model\Category as ShopCategory;
use OxidEsales\EshopCommunity\Internal\Framework\Database\QueryBuilderFactoryInterface;
use OxidEsales\GraphQL\Storefront\Category\DataType\Category as CategoryDataType;

class CategoryRepository
{
    private QueryBuilderFactoryInterface $queryBuilderFactory;

    public function __construct(QueryBuilderFactoryInterface $queryBuilderFactory)
    {
        $this->queryBuilderFactory = $queryBuilderFactory;
    }

    /**
     * @param string $seo
     * @return CategoryDataType[]
     * @throws \Doctrine\DBAL\Exception
     */
    public function getCategoriesBySeo(string $seo): array
    {
        $queryBuilder = $this->queryBuilderFactory->create();

        $queryBuilder
            ->select('oxobjectid')
            ->from('oxseo')
            ->where('oxtype = :oxtype')
            ->andWhere('oxseourl = :seo')
            ->setParameters([
                'oxtype' => 'oxcategory',
                'seo' => $seo
            ]);

        $data = $queryBuilder->execute()->fetchAll();

        $categories = [];

        foreach ($data as $row) {

            $shopCategoryObject = new ShopCategory();
            $shopCategoryObject->load($row['oxobjectid']);

            $categories[] = new CategoryDataType($shopCategoryObject);
        }

        return $categories;
    }
}
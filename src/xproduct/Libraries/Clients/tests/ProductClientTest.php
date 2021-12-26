<?php

use Xproduct\Infrastructure\Exceptions\NotFoundException;
use Xproduct\Libraries\Clients\ProductClient;
use Xproduct\Libraries\Product\Repositories\CategoryRepositoryInterface;
use Xproduct\Libraries\Product\Repositories\ProductRepositoryInterface;

class ProductClientTest extends \TestCase
{
    private $productRepoMock;
    private $categoryRepoMock;

    protected function setUp(): void
    {
        parent::setUp();

        $this->productRepoMock = $this->getMockBuilder(ProductRepositoryInterface::class)
            ->disableOriginalConstructor()
            ->getMock();
        $this->productRepoMock->method("getByCategory")->willReturn([]);
        $this->productRepoMock->method("getBySku")->willReturn([]);

        $this->categoryRepoMock = $this->getMockBuilder(CategoryRepositoryInterface::class)
            ->disableOriginalConstructor()
            ->getMock();
    }

    /**
     * @test ddd
     */
    public function itTestMethodGetProductsByParameterTypeRunGetByCategoryWhenPassCategoryType()
    {
        $this->productRepoMock->expects($this->once())->method("getByCategory");

        $productClient = new ProductClient(
            $this->productRepoMock,
            $this->categoryRepoMock,
        );
        $productClient->getProductsByParameterType(ProductClient::PARAMETER_TYPE_CATEGORY, 1488);
    }

    /**
     * @test
     */
    public function itTestMethodGetProductsByParameterTypeRunGetBySkuWhenPassSkuType()
    {
        $this->productRepoMock->expects($this->once())->method("getBySku");

        $productClient = new ProductClient(
            $this->productRepoMock,
            $this->categoryRepoMock,
        );
        $productClient->getProductsByParameterType(ProductClient::PARAMETER_TYPE_SKU, 1488);
    }

    /**
     * @test
     */
    public function itTestMethodGetProductsByParameterTypeThrowNotFoundException()
    {
        $fakeType = "any thing";
        $this->expectException(NotFoundException::class);
        $this->expectErrorMessage("this type {$fakeType} is not found.");

        $productClient = new ProductClient(
            $this->productRepoMock,
            $this->categoryRepoMock,
        );

        $productClient->getProductsByParameterType($fakeType, 1488);
    }
}

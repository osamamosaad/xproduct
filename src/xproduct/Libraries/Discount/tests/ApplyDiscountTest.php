<?php

use Xproduct\Libraries\Clients\ProductClientInterface;
use Xproduct\Libraries\Discount\ApplyProductDiscount;
use Xproduct\Libraries\Discount\Dtos\Discount;
use Xproduct\Libraries\Discount\Repositories\ProductDiscountRepositoryInterface;
use Xproduct\Libraries\Product\Dtos\Product;

class ApplyDiscountTest extends \TestCase
{
    /**
     * @var ProductClientInterface
     */
    private $productClientMock;

    /**
     * @var ProductDiscountRepositoryInterface
     */
    private $productDiscountRepositoryMock;

    protected function setUp(): void
    {
        parent::setUp();

        $this->productClientMock = $this->getMockBuilder(ProductClientInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->productDiscountRepositoryMock = $this->getMockBuilder(ProductDiscountRepositoryInterface::class)
            ->disableOriginalConstructor()
            ->getMock();
    }

    /**
     * @test
     */
    public function itTestThatDiscountIsAppliedCorrectly()
    {
        # Product and return it from productCLient
        $productDto = new Product();
        $productDto->setId(1);
        $productDto->setPrice(10000);
        $this->productClientMock->method("getProductsByParameterType")->willReturn([$productDto]);

        # Prepare Discount
        $discounDto = new Discount();
        $discounDto->setId(14);
        $discounDto->setType("category");
        $discounDto->setItem("boots");
        $discounDto->setPercentage("50%");

        // Test Part
        $expextedPrice = 5000;
        $this->productDiscountRepositoryMock
            ->expects($this->once())
            ->method("store")->with(
                $productDto->getId(),
                $discounDto->getId(),
                $expextedPrice
            );

        $this->runService($discounDto);
    }

    protected function runService($discounDto)
    {
        $applyDiscount = new ApplyProductDiscount(
            $this->productClientMock,
            $this->productDiscountRepositoryMock,
        );
        $applyDiscount->execute($discounDto);
    }
}

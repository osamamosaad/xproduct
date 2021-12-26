# Simple API Doc
## Products
---
**URL:** localhost:9004/api/products

**Method:** GET.

**Accept:** application/json

**Content-Type**: application/json

**Filters**:
- filter[priceLessThan]
- filter[category]

_**example:** localhost:9004/api/products?filter[priceLessThan]=89000&filter[category]=boots_

**Resource Schema**:
```
[
  {
    "sku": "000001",
    "name": "BV Lean leather ankle boots",
    "category": "boots",
    "price": {
      "original": 89000,
      "final": 89000,
      "discount_percentage": null,
      "currency": "EUR"
    }
  }
]
```

**Try**
```
curl --request GET \
  --url 'http://localhost:9004/api/products?filter[priceLessThan]=89000'
```
---

## Discounts
---
**URL:** localhost:9004/api/discounts

**Method:** POST

**Accept:** application/json

**Content-Type**: application/json

**Resource Schema**:
```
{
  "type": "category",
  "item": "boots",
  "percentage": "60"
}
```

**Try**
```
curl --request POST \
  --url 'http://localhost:9004/api/discounts' \
  --header 'Content-Type: application/json' \
  --data '{
	"type": "category",
	"item": "boots",
	"percentage": "60"
}'
```

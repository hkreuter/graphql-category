## About
This is an example module to show a how it would be possible to pull categories with a given SEO url.

## Install
```shell
composer require oxid-academy/graphql-category
vendor/bin/oe-console oe:module:activate oe_graphql_base
vendor/bin/oe-console oe:module:activate oe_graphql_storefront
vendor/bin/oe-console oe:module:activate oxac_graphql_category
```

## Usage

You can use your favourite GraphQL client to explore the API, if you do not already have one installed, you may use
[Altair GraphQL Client](https://altair.sirmuel.design/).

### Query
URL: `http://localhost/graphql/?shp=1&lang=1`
#### Request
```
query{
  categoriesBySeo(seo: "Kiteboarding/"){
    title
    children {
      title,
      seo {
        url
      }
    }
  }
}
```
#### Response
```
{
  "data": {
    "categoriesBySeo": [
      {
        "title": "Kiteboarding",
        "children": [
          {
            "title": "Kites",
            "seo": {
              "url": "http://localhost/en/oxid/Kiteboarding/Kites/"
            }
          },
          {
            "title": "Kiteboards",
            "seo": {
              "url": "http://localhost/en/oxid/Kiteboarding/Kiteboards/"
            }
          },
          {
            "title": "Harnesses",
            "seo": {
              "url": "http://localhost/en/oxid/Kiteboarding/Harnesses/"
            }
          },
          {
            "title": "Supplies",
            "seo": {
              "url": "http://localhost/en/oxid/Kiteboarding/Supplies/"
            }
          }
        ]
      }
    ]
  }
}
```

## Sources

- Background knowledge about the architecture of the module and the GraphQL Modules, since it differs to the eShop
  Framework.  
  https://madewithlove.com/blog/software-engineering/hexagonal-architecture-demystified/
- The GraohQL Module documentation contains a tutorial which describes how to write own queries and mutations. Based of
  this documentation this example module was written.  
  https://docs.oxid-esales.com/interfaces/graphql/en/latest/tutorials/introduction.html

# ProxyModifyProduct

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**allow_feature_changes** | **bool** | Controls whether to allow your users to add or remove features while creating or amending a subscription. **Character** **limit**: n/a **notes**: WSDL 58.0+ **Values**: true, false (default) | [optional] 
**category** | **string** | Category of the product. Used by Zuora Quotes Guided Product Selector. **Character** **limit**: 100 **notes**: WSDL16.0+ **Values**: One of the following:  - Base Products - Add On Services - Miscellaneous Products | [optional] 
**description** | **string** | A descriptionof the product. **Character limit**: 500 **Values**: a string of 500 characters or fewer | [optional] 
**effective_end_date** | [**\DateTime**](Date.md) | The date when the product expires and can&#39;t be subscribed to anymore. **Character limit**: 29 **Values**: a valid date and time value | [optional] 
**effective_start_date** | [**\DateTime**](Date.md) | The date when the product becomes available and can be subscribed to. **Character limit**: 29 **Values**: a valid date and time value | [optional] 
**name** | **string** | The name of the product. This information is displayed in the product catalog pages in the web-based UI. **Character limit**: 100 **Values**: a string of 100 characters or fewer | [optional] 
**sku** | **string** | The unique SKU for the product. **Character limit**: 50 **Values**: one of the following:  - leave null for automatic generated - an alphanumeric string of 50 characters or fewer | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


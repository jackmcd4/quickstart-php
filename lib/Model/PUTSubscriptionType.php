<?php
/**
 * PUTSubscriptionType
 *
 * PHP version 5
 *
 * @category Class
 * @package  Swagger\Client
 * @author   http://github.com/swagger-api/swagger-codegen
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * Zuora REST API Reference
 *
 * # Introduction  Welcome to the reference documentation for the Zuora REST API!   [REST](http://en.wikipedia.org/wiki/REST_API \"http://en.wikipedia.org/wiki/REST_API\") is a web-service protocol that lends itself to rapid development by using everyday HTTP and JSON technology. REST offers the following:  *   Easy to use and learn for developers *   Works with virtually any language and platform *   Use case-oriented calls *   Well-suited for solutions that fall outside the traditional desktop application model  The Zuora REST API provides a set of use case-oriented calls that:  *   Enable Web Storefront integration between your websites. *   Support self-service subscriber sign-ups and account management. *   Process revenue schedules through custom revenue rule models.  ## Set up an API User Account  Few setup steps are required to use the Zuora REST API. No special software libraries or development tools are needed. Take a moment to set up an API user account. See [Creating an API](https://knowledgecenter.zuora.com/DC_Developers/SOAP_API/AB_Getting_started_with_the__SOAP_API/F_Create_an_API_User) user.  Note that a user role does not have write access to Zuora REST services unless it has the API Write Access permission as described in those instructions.  Use the API user account only for API calls, and avoid using it to log into the Zuora UI. Logging into the UI enables a security feature that periodically expires the account's password, which may eventually cause authentication failures with the API.  ## Authentication  There are three ways to authenticate:  * Use an authorization cookie. The cookie authorizes the user to make calls to the REST API for the duration specified in  **Administration > Security Policies > Session timeout**. The cookie expiration time is reset with this duration after every call to the REST API. To obtain a cookie, call the REST  `connections` resource with the following API user information:     *   ID     *   password     *   entity Id or entity name (Only for [Zuora Multi-entity](https://knowledgecenter.zuora.com/BB_Introducing_Z_Business/Multi-entity \"Multi-entity\"). See \"Entity Id and Entity Name\" below for more information.)  *   Include the following parameters in the request header, which re-authenticates the user with each request:     *   `apiAccessKeyId`     *   `apiSecretAccessKey`     *   `entityId` or `entityName` (Only for [Zuora Multi-entity](https://knowledgecenter.zuora.com/BB_Introducing_Z_Business/Multi-entity \"Multi-entity\"). See \"Entity Id and Entity Name\" below for more information.) *   For CORS-enabled APIs only: Include a 'single-use' token in the request header, which re-authenticates the user with each request. See below for more details.   ## Errors  Responses and error codes are detailed in [Responses and errors](https://knowledgecenter.zuora.com/DC_Developers/REST_API/A_REST_basics/3_Responses_and_errors \"Responses and errors\").   ## Entity Id and Entity Name  The `entityId` and `entityName`  parameters are only used for  [Zuora Multi-entity](https://knowledgecenter.zuora.com/BB_Introducing_Z_Business/Multi-entity).  The  `entityId` parameter specifies the Id of the entity that you want to access. The `entityName` parameter specifies the [name of the entity](https://knowledgecenter.zuora.com/BB_Introducing_Z_Business/Multi-entity/B_Introduction_to_Entity_and_Entity_Hierarchy#Name_and_Display_Name \"Introduction to Entity and Entity Hierarchy\") that you want to access. Note that you must have permission to access the entity. You can get the entity Id and entity name through the REST GET Entities call.  You can specify either the  `entityId` or `entityName` parameter in the authentication to access and view an entity.  *   If both `entityId` and `entityName` are specified in the authentication, an error occurs.  *   If neither  `entityId` nor  `entityName` is specified in the authentication, you will log in to the entity in which your user account is created.   See [API User Authentication](https://knowledgecenter.zuora.com/BB_Introducing_Z_Business/Multi-entity/A_Overview_of_Multi-entity#API_User_Authentication \"Zuora Multi-entity\") for more information.  ## Token Authentication for CORS-Enabled APIs  The CORS mechanism enables REST API calls to Zuora to be made directly from your customer's browser, with all credit card and security information transmitted directly to Zuora. This minimizes your PCI compliance burden, allows you to implement advanced validation on your payment forms, and makes your payment forms look just like any other part of your website.  For security reasons, instead of using cookies, an API request via CORS uses **tokens** for authentication.  The token method of authentication is only designed for use with requests that must originate from your customer's browser; **it should not be considered a replacement to the existing cookie authentication** mechanism.  See [Zuora CORS REST ](https://knowledgecenter.zuora.com/DC_Developers/REST_API/A_REST_basics/G_CORS_REST \"Zuora CORS REST\")for details on how CORS works and how you can begin to implement customer calls to the Zuora REST APIs. See  [HMAC Signatures](/BC_Developers/REST_API/B_REST_API_reference/HMAC_Signatures \"HMAC Signatures\") for details on the HMAC method that returns the authentication token.   ## Zuora REST API Versions  The Zuora REST API is in version control. Versioning ensures that Zuora REST API changes are backward compatible. Zuora uses a major and minor version nomenclature to manage changes. By specifying a version in a REST request, you can get expected responses regardless of future changes to the API.   ### Major Version  The major version number of the REST API appears in the REST URL. Currently, Zuora only supports the **v1** major version. For example,  `POST https://rest.zuora.com/v1/subscriptions` .   ### Minor Version  Zuora uses minor versions for the REST API to control small changes. For example, a field in a REST method is deprecated and a new field is used to replace it.   Some fields in the REST methods are supported as of minor versions. If a field is not noted with a minor version, this field is available for all minor versions. If a field is noted with a minor version, this field is in version control. You must specify the supported minor version in the request header to process without an error.   If a field is in version control, it is either with a minimum minor version or a maximum minor version, or both of them. You can only use this field with the minor version between the minimum and the maximum minor versions. For example, the  `invoiceCollect` field in the POST Subscription method is in version control and its maximum minor version is 189.0. You can only use this field with the minor version 189.0 or earlier.  The supported minor versions are not serial, see [Zuora REST API Minor Version History](https://knowledgecenter.zuora.com/DC_Developers/REST_API/A_REST_basics/Zuora_REST_API_Minor_Version_History \"Zuora REST API Minor Version History\") for the fields and their supported minor versions. In our REST API documentation, if a field or feature requires a minor version number, we note that in the field description.  You only need to specify the version number when you use the fields require a minor version. To specify the minor version, set the `zuora-version` parameter to the minor version number in the request header for the request call. For example, the `collect` field is in 196.0 minor version. If you want to use this field for the POST Subscription method, set the  `zuora-version` parameter to `196.0` in the request header. The `zuora-version` parameter is case sensitive.   For all the REST API fields, by default, if the minor version is not specified in the request header, Zuora will use the minimum minor version of the REST API to avoid breaking your integration.    ## URLs and Endpoints  The following REST services are provided in Zuora.  | Service                 | Base URL for REST Endpoints                                                                                                                                         | |-------------------------|---------------------------------------------------------------------------------------------------------------------------------------------------------------------| | Production REST service | https://rest.zuora.com/v1                                                                                                                                           | | Sandbox REST service    | https://rest.apisandbox.zuora.com/v1                                                                                                                                | | Services REST service   | https://services123.zuora.com/apps/v1/  (where \"123\" is replaced by the number of your actual services environment)  The production service provides access to your live user data. The sandbox environment is a good place to test your code without affecting real-world data.  To use it, you must be provisioned with a sandbox tenant - your Zuora representative can help with this if needed.   ## Requests and Responses   ### HTTP Request Body  Most of the parameters and data accompanying your requests will be contained in the body of the HTTP request.  The Zuora REST API accepts JSON in the HTTP request body.  No other data format (e.g., XML) is supported.   #### Testing a Request  Use a third party client, such as Postman or Advanced REST Client, to test the Zuora REST API.  You can test the Zuora REST API from the Zuora sandbox or  production service. If connecting to the production service, bear in mind that you are working with your live production data, not sample data or test data.  #### Testing with Credit Cards  Sooner or later it will probably be necessary to test some transactions that involve credit cards. For suggestions on how to handle this, see [Going Live With Your Payment Gateway](https://knowledgecenter.zuora.com/CB_Billing/M_Payment_Gateways/C_Managing_Payment_Gateways/B_Going_Live_Payment_Gateways#Testing_with_Credit_Cards \"C_Zuora_User_Guides/A_Billing_and_Payments/M_Payment_Gateways/C_Managing_Payment_Gateways/B_Going_Live_Payment_Gateways#Testing_with_Credit_Cards\").   ## Request IDs  As a general rule, when asked to supply a \"key\" for an account or subscription (accountKey, account-key, subscriptionKey, subscription-key), you can provide either the actual ID or the number of the entity.  ## Pagination  When retrieving information (using GET methods), the optional `pageSize` query parameter sets the maximum number of rows to return in a response. The maximum is `40`; larger values are treated as `40`. If this value is empty or invalid, `pageSize` typically defaults to `10`.  The default value for the maximum number of rows retrieved can be overridden at the method level.  If more rows are available, the response will include a `nextPage` element, which contains a URL for requesting the next page.  If this value is not provided, no more rows are available. No \"previous page\" element is explicitly provided; to support backward paging, use the previous call.  ### Array Size  For data items that are not paginated, the REST API supports arrays of up to 300 rows.  Thus, for instance, repeated pagination can retrieve thousands of customer accounts, but within any account an array of no more than 300 rate plans is returned.
 *
 * OpenAPI spec version: 0.0.1
 * Contact: docs@zuora.com
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Swagger\Client\Model;

use \ArrayAccess;

/**
 * PUTSubscriptionType Class Doc Comment
 *
 * @category    Class */
/** 
 * @package     Swagger\Client
 * @author      http://github.com/swagger-api/swagger-codegen
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class PUTSubscriptionType implements ArrayAccess
{
    /**
      * The original name of the model.
      * @var string
      */
    protected static $swaggerModelName = 'PUTSubscriptionType';

    /**
      * Array of property to type mappings. Used for (de)serialization
      * @var string[]
      */
    protected static $swaggerTypes = array(
        'cpq_bundle_json_id__qt' => 'string',
        'opportunity_close_date__qt' => 'string',
        'opportunity_name__qt' => 'string',
        'quote_business_type__qt' => 'string',
        'quote_number__qt' => 'string',
        'quote_type__qt' => 'string',
        'add' => '\Swagger\Client\Model\PUTSrpAddType[]',
        'apply_credit_balance' => 'bool',
        'auto_renew' => 'bool',
        'current_term' => 'int',
        'current_term_period_type' => 'string',
        'custom_field__c' => 'string',
        'include_existing_draft_invoice_items' => 'bool',
        'invoice' => 'bool',
        'invoice_collect' => 'bool',
        'invoice_separately' => 'bool',
        'invoice_target_date' => '\DateTime',
        'notes' => 'string',
        'preview' => 'bool',
        'preview_type' => 'string',
        'remove' => '\Swagger\Client\Model\PUTSrpRemoveType[]',
        'renewal_setting' => 'string',
        'renewal_term' => 'int',
        'renewal_term_period_type' => 'string',
        'term_start_date' => '\DateTime',
        'term_type' => 'string',
        'update' => '\Swagger\Client\Model\PUTSrpUpdateType[]'
    );

    public static function swaggerTypes()
    {
        return self::$swaggerTypes;
    }

    /**
     * Array of attributes where the key is the local name, and the value is the original name
     * @var string[]
     */
    protected static $attributeMap = array(
        'cpq_bundle_json_id__qt' => 'CpqBundleJsonId__QT',
        'opportunity_close_date__qt' => 'OpportunityCloseDate__QT',
        'opportunity_name__qt' => 'OpportunityName__QT',
        'quote_business_type__qt' => 'QuoteBusinessType__QT',
        'quote_number__qt' => 'QuoteNumber__QT',
        'quote_type__qt' => 'QuoteType__QT',
        'add' => 'add',
        'apply_credit_balance' => 'applyCreditBalance',
        'auto_renew' => 'autoRenew',
        'current_term' => 'currentTerm',
        'current_term_period_type' => 'currentTermPeriodType',
        'custom_field__c' => 'customField__c',
        'include_existing_draft_invoice_items' => 'includeExistingDraftInvoiceItems',
        'invoice' => 'invoice',
        'invoice_collect' => 'invoiceCollect',
        'invoice_separately' => 'invoiceSeparately',
        'invoice_target_date' => 'invoiceTargetDate',
        'notes' => 'notes',
        'preview' => 'preview',
        'preview_type' => 'previewType',
        'remove' => 'remove',
        'renewal_setting' => 'renewalSetting',
        'renewal_term' => 'renewalTerm',
        'renewal_term_period_type' => 'renewalTermPeriodType',
        'term_start_date' => 'termStartDate',
        'term_type' => 'termType',
        'update' => 'update'
    );

    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     * @var string[]
     */
    protected static $setters = array(
        'cpq_bundle_json_id__qt' => 'setCpqBundleJsonIdQt',
        'opportunity_close_date__qt' => 'setOpportunityCloseDateQt',
        'opportunity_name__qt' => 'setOpportunityNameQt',
        'quote_business_type__qt' => 'setQuoteBusinessTypeQt',
        'quote_number__qt' => 'setQuoteNumberQt',
        'quote_type__qt' => 'setQuoteTypeQt',
        'add' => 'setAdd',
        'apply_credit_balance' => 'setApplyCreditBalance',
        'auto_renew' => 'setAutoRenew',
        'current_term' => 'setCurrentTerm',
        'current_term_period_type' => 'setCurrentTermPeriodType',
        'custom_field__c' => 'setCustomFieldC',
        'include_existing_draft_invoice_items' => 'setIncludeExistingDraftInvoiceItems',
        'invoice' => 'setInvoice',
        'invoice_collect' => 'setInvoiceCollect',
        'invoice_separately' => 'setInvoiceSeparately',
        'invoice_target_date' => 'setInvoiceTargetDate',
        'notes' => 'setNotes',
        'preview' => 'setPreview',
        'preview_type' => 'setPreviewType',
        'remove' => 'setRemove',
        'renewal_setting' => 'setRenewalSetting',
        'renewal_term' => 'setRenewalTerm',
        'renewal_term_period_type' => 'setRenewalTermPeriodType',
        'term_start_date' => 'setTermStartDate',
        'term_type' => 'setTermType',
        'update' => 'setUpdate'
    );

    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     * @var string[]
     */
    protected static $getters = array(
        'cpq_bundle_json_id__qt' => 'getCpqBundleJsonIdQt',
        'opportunity_close_date__qt' => 'getOpportunityCloseDateQt',
        'opportunity_name__qt' => 'getOpportunityNameQt',
        'quote_business_type__qt' => 'getQuoteBusinessTypeQt',
        'quote_number__qt' => 'getQuoteNumberQt',
        'quote_type__qt' => 'getQuoteTypeQt',
        'add' => 'getAdd',
        'apply_credit_balance' => 'getApplyCreditBalance',
        'auto_renew' => 'getAutoRenew',
        'current_term' => 'getCurrentTerm',
        'current_term_period_type' => 'getCurrentTermPeriodType',
        'custom_field__c' => 'getCustomFieldC',
        'include_existing_draft_invoice_items' => 'getIncludeExistingDraftInvoiceItems',
        'invoice' => 'getInvoice',
        'invoice_collect' => 'getInvoiceCollect',
        'invoice_separately' => 'getInvoiceSeparately',
        'invoice_target_date' => 'getInvoiceTargetDate',
        'notes' => 'getNotes',
        'preview' => 'getPreview',
        'preview_type' => 'getPreviewType',
        'remove' => 'getRemove',
        'renewal_setting' => 'getRenewalSetting',
        'renewal_term' => 'getRenewalTerm',
        'renewal_term_period_type' => 'getRenewalTermPeriodType',
        'term_start_date' => 'getTermStartDate',
        'term_type' => 'getTermType',
        'update' => 'getUpdate'
    );

    public static function getters()
    {
        return self::$getters;
    }

    

    

    /**
     * Associative array for storing property values
     * @var mixed[]
     */
    protected $container = array();

    /**
     * Constructor
     * @param mixed[] $data Associated array of property value initalizing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['cpq_bundle_json_id__qt'] = isset($data['cpq_bundle_json_id__qt']) ? $data['cpq_bundle_json_id__qt'] : null;
        $this->container['opportunity_close_date__qt'] = isset($data['opportunity_close_date__qt']) ? $data['opportunity_close_date__qt'] : null;
        $this->container['opportunity_name__qt'] = isset($data['opportunity_name__qt']) ? $data['opportunity_name__qt'] : null;
        $this->container['quote_business_type__qt'] = isset($data['quote_business_type__qt']) ? $data['quote_business_type__qt'] : null;
        $this->container['quote_number__qt'] = isset($data['quote_number__qt']) ? $data['quote_number__qt'] : null;
        $this->container['quote_type__qt'] = isset($data['quote_type__qt']) ? $data['quote_type__qt'] : null;
        $this->container['add'] = isset($data['add']) ? $data['add'] : null;
        $this->container['apply_credit_balance'] = isset($data['apply_credit_balance']) ? $data['apply_credit_balance'] : null;
        $this->container['auto_renew'] = isset($data['auto_renew']) ? $data['auto_renew'] : null;
        $this->container['current_term'] = isset($data['current_term']) ? $data['current_term'] : null;
        $this->container['current_term_period_type'] = isset($data['current_term_period_type']) ? $data['current_term_period_type'] : null;
        $this->container['custom_field__c'] = isset($data['custom_field__c']) ? $data['custom_field__c'] : null;
        $this->container['include_existing_draft_invoice_items'] = isset($data['include_existing_draft_invoice_items']) ? $data['include_existing_draft_invoice_items'] : null;
        $this->container['invoice'] = isset($data['invoice']) ? $data['invoice'] : null;
        $this->container['invoice_collect'] = isset($data['invoice_collect']) ? $data['invoice_collect'] : null;
        $this->container['invoice_separately'] = isset($data['invoice_separately']) ? $data['invoice_separately'] : null;
        $this->container['invoice_target_date'] = isset($data['invoice_target_date']) ? $data['invoice_target_date'] : null;
        $this->container['notes'] = isset($data['notes']) ? $data['notes'] : null;
        $this->container['preview'] = isset($data['preview']) ? $data['preview'] : null;
        $this->container['preview_type'] = isset($data['preview_type']) ? $data['preview_type'] : null;
        $this->container['remove'] = isset($data['remove']) ? $data['remove'] : null;
        $this->container['renewal_setting'] = isset($data['renewal_setting']) ? $data['renewal_setting'] : null;
        $this->container['renewal_term'] = isset($data['renewal_term']) ? $data['renewal_term'] : null;
        $this->container['renewal_term_period_type'] = isset($data['renewal_term_period_type']) ? $data['renewal_term_period_type'] : null;
        $this->container['term_start_date'] = isset($data['term_start_date']) ? $data['term_start_date'] : null;
        $this->container['term_type'] = isset($data['term_type']) ? $data['term_type'] : null;
        $this->container['update'] = isset($data['update']) ? $data['update'] : null;
    }

    /**
     * show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalid_properties = array();
        return $invalid_properties;
    }

    /**
     * validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properteis are valid
     */
    public function valid()
    {
        return true;
    }


    /**
     * Gets cpq_bundle_json_id__qt
     * @return string
     */
    public function getCpqBundleJsonIdQt()
    {
        return $this->container['cpq_bundle_json_id__qt'];
    }

    /**
     * Sets cpq_bundle_json_id__qt
     * @param string $cpq_bundle_json_id__qt 
     * @return $this
     */
    public function setCpqBundleJsonIdQt($cpq_bundle_json_id__qt)
    {
        $this->container['cpq_bundle_json_id__qt'] = $cpq_bundle_json_id__qt;

        return $this;
    }

    /**
     * Gets opportunity_close_date__qt
     * @return string
     */
    public function getOpportunityCloseDateQt()
    {
        return $this->container['opportunity_close_date__qt'];
    }

    /**
     * Sets opportunity_close_date__qt
     * @param string $opportunity_close_date__qt The closing date of the Opportunity. This field is populated when the subscription originates from Zuora Quotes.  This field is used only for reporting subscription metrics.   See [Subscription Data Source](https://knowledgecenter.zuora.com/CD_Reporting/Data_Exports/Z_Data_Source_Reference/Subscription_Data_Source) for more information.
     * @return $this
     */
    public function setOpportunityCloseDateQt($opportunity_close_date__qt)
    {
        $this->container['opportunity_close_date__qt'] = $opportunity_close_date__qt;

        return $this;
    }

    /**
     * Gets opportunity_name__qt
     * @return string
     */
    public function getOpportunityNameQt()
    {
        return $this->container['opportunity_name__qt'];
    }

    /**
     * Sets opportunity_name__qt
     * @param string $opportunity_name__qt The unique identifier of the Opportunity. This field is populated when the subscription originates from Zuora Quotes.  This field is used only for reporting subscription metrics.   See [Subscription Data Source](https://knowledgecenter.zuora.com/CD_Reporting/Data_Exports/Z_Data_Source_Reference/Subscription_Data_Source) for more information.
     * @return $this
     */
    public function setOpportunityNameQt($opportunity_name__qt)
    {
        $this->container['opportunity_name__qt'] = $opportunity_name__qt;

        return $this;
    }

    /**
     * Gets quote_business_type__qt
     * @return string
     */
    public function getQuoteBusinessTypeQt()
    {
        return $this->container['quote_business_type__qt'];
    }

    /**
     * Sets quote_business_type__qt
     * @param string $quote_business_type__qt The specific identifier for the type of business transaction the Quote represents such as `New`, `Upsell`, `Downsell`, `Renewal`, or `Churn`. This field is populated when the subscription originates from Zuora Quotes.            This field is used only for reporting subscription metrics.   See [Subscription Data Source](https://knowledgecenter.zuora.com/CD_Reporting/Data_Exports/Z_Data_Source_Reference/Subscription_Data_Source) for more information.
     * @return $this
     */
    public function setQuoteBusinessTypeQt($quote_business_type__qt)
    {
        $this->container['quote_business_type__qt'] = $quote_business_type__qt;

        return $this;
    }

    /**
     * Gets quote_number__qt
     * @return string
     */
    public function getQuoteNumberQt()
    {
        return $this->container['quote_number__qt'];
    }

    /**
     * Sets quote_number__qt
     * @param string $quote_number__qt The unique identifier of the Quote. This field is populated when the subscription originates from Zuora Quotes.            This field is used only for reporting subscription metrics.   See [Subscription Data Source](https://knowledgecenter.zuora.com/CD_Reporting/Data_Exports/Z_Data_Source_Reference/Subscription_Data_Source) for more information.
     * @return $this
     */
    public function setQuoteNumberQt($quote_number__qt)
    {
        $this->container['quote_number__qt'] = $quote_number__qt;

        return $this;
    }

    /**
     * Gets quote_type__qt
     * @return string
     */
    public function getQuoteTypeQt()
    {
        return $this->container['quote_type__qt'];
    }

    /**
     * Sets quote_type__qt
     * @param string $quote_type__qt The Quote type that represents the subscription lifecycle stage such as `New`, `Amendment`, `Renew`, or `Cancel`. This field is populated when the subscription originates from Zuora Quotes.            This field is used only for reporting subscription metrics.   See [Subscription Data Source](https://knowledgecenter.zuora.com/CD_Reporting/Data_Exports/Z_Data_Source_Reference/Subscription_Data_Source) for more information.
     * @return $this
     */
    public function setQuoteTypeQt($quote_type__qt)
    {
        $this->container['quote_type__qt'] = $quote_type__qt;

        return $this;
    }

    /**
     * Gets add
     * @return \Swagger\Client\Model\PUTSrpAddType[]
     */
    public function getAdd()
    {
        return $this->container['add'];
    }

    /**
     * Sets add
     * @param \Swagger\Client\Model\PUTSrpAddType[] $add Container for adding one or more rate plans.
     * @return $this
     */
    public function setAdd($add)
    {
        $this->container['add'] = $add;

        return $this;
    }

    /**
     * Gets apply_credit_balance
     * @return bool
     */
    public function getApplyCreditBalance()
    {
        return $this->container['apply_credit_balance'];
    }

    /**
     * Sets apply_credit_balance
     * @param bool $apply_credit_balance Applies a credit balance to an invoice.  If the value is `true`, the credit balance is applied to the invoice. If the value is `false`, no action is taken.  **Prerequisite:** `invoice` must be true.   **Note:** If you are using the field `invoiceCollect` rather than the field `invoice`, the `invoiceCollect` value must be true.  To view the credit balance adjustment, retrieve the details of the invoice using the Get Invoices method.
     * @return $this
     */
    public function setApplyCreditBalance($apply_credit_balance)
    {
        $this->container['apply_credit_balance'] = $apply_credit_balance;

        return $this;
    }

    /**
     * Gets auto_renew
     * @return bool
     */
    public function getAutoRenew()
    {
        return $this->container['auto_renew'];
    }

    /**
     * Sets auto_renew
     * @param bool $auto_renew If `true`, this subscription automatically renews at the end of the subscription term. Default is `false`.
     * @return $this
     */
    public function setAutoRenew($auto_renew)
    {
        $this->container['auto_renew'] = $auto_renew;

        return $this;
    }

    /**
     * Gets current_term
     * @return int
     */
    public function getCurrentTerm()
    {
        return $this->container['current_term'];
    }

    /**
     * Sets current_term
     * @param int $current_term The length of the period for the current subscription term. If `termType` is `TERMED`, this field is required and must be greater than `0`. If `termType` is `EVERGREEN`, this value is ignored. Default is `0`.
     * @return $this
     */
    public function setCurrentTerm($current_term)
    {
        $this->container['current_term'] = $current_term;

        return $this;
    }

    /**
     * Gets current_term_period_type
     * @return string
     */
    public function getCurrentTermPeriodType()
    {
        return $this->container['current_term_period_type'];
    }

    /**
     * Sets current_term_period_type
     * @param string $current_term_period_type The period type for the current subscription term.  This field is used with the `CurrentTerm` field to specify the current subscription term.  Values are:  * `Month` (default) * `Year` * `Day` * `Week`
     * @return $this
     */
    public function setCurrentTermPeriodType($current_term_period_type)
    {
        $this->container['current_term_period_type'] = $current_term_period_type;

        return $this;
    }

    /**
     * Gets custom_field__c
     * @return string
     */
    public function getCustomFieldC()
    {
        return $this->container['custom_field__c'];
    }

    /**
     * Sets custom_field__c
     * @param string $custom_field__c Any custom fields defined for this object.
     * @return $this
     */
    public function setCustomFieldC($custom_field__c)
    {
        $this->container['custom_field__c'] = $custom_field__c;

        return $this;
    }

    /**
     * Gets include_existing_draft_invoice_items
     * @return bool
     */
    public function getIncludeExistingDraftInvoiceItems()
    {
        return $this->container['include_existing_draft_invoice_items'];
    }

    /**
     * Sets include_existing_draft_invoice_items
     * @param bool $include_existing_draft_invoice_items Specifies whether to include draft invoice items in amendment previews.  Values:   * `true` (default). Includes draft invoice items in amendment previews.  * `false`. Excludes draft invoice items in amendment previews.
     * @return $this
     */
    public function setIncludeExistingDraftInvoiceItems($include_existing_draft_invoice_items)
    {
        $this->container['include_existing_draft_invoice_items'] = $include_existing_draft_invoice_items;

        return $this;
    }

    /**
     * Gets invoice
     * @return bool
     */
    public function getInvoice()
    {
        return $this->container['invoice'];
    }

    /**
     * Sets invoice
     * @param bool $invoice Creates an invoice for a subscription. The invoice generated in this operation is only for this subscription, not for the entire customer account.  If the value is `true`, an invoice is created. If the value is `false`, no action is taken.  The default value is `false`.   This field is in Zuora REST API version control. Supported minor versions are 196.0 or later. To use this field in the method, you must set the `zuora-version` parameter to the minor version number in the request header. See [Zuora REST API Versions](https://knowledgecenter.zuora.com/DC_Developers/REST_API/A_REST_basics#Zuora_REST_API_Versions) for more information.
     * @return $this
     */
    public function setInvoice($invoice)
    {
        $this->container['invoice'] = $invoice;

        return $this;
    }

    /**
     * Gets invoice_collect
     * @return bool
     */
    public function getInvoiceCollect()
    {
        return $this->container['invoice_collect'];
    }

    /**
     * Sets invoice_collect
     * @param bool $invoice_collect **Note:** This field has been replaced by the `invoice` field and the `collect` field. `invoiceCollect` is available only for backward compatibility.  If `true`, an invoice is generated and payment collected automatically during the subscription process. If `false` (default), no invoicing or payment takes place.  The invoice generated in this operation is only for this subscription, not for the entire customer account.  This field is in Zuora REST API version control. Supported minor versions are 186.0, 187.0, 188.0, 189.0, and 196.0. See [Zuora REST API Versions](https://knowledgecenter.zuora.com/DC_Developers/REST_API/A_REST_basics#Zuora_REST_API_Versions) for more information.
     * @return $this
     */
    public function setInvoiceCollect($invoice_collect)
    {
        $this->container['invoice_collect'] = $invoice_collect;

        return $this;
    }

    /**
     * Gets invoice_separately
     * @return bool
     */
    public function getInvoiceSeparately()
    {
        return $this->container['invoice_separately'];
    }

    /**
     * Sets invoice_separately
     * @param bool $invoice_separately Separates a single subscription from other subscriptions and invoices the charge independently.   If the value is `true`, the subscription is billed separately from other subscriptions. If the value is `false`, the subscription is included with other subscriptions in the account invoice.  The default value is `false`. Prerequisite: The default subscription setting Enable Subscriptions to be Invoiced Separately must be set to Yes.
     * @return $this
     */
    public function setInvoiceSeparately($invoice_separately)
    {
        $this->container['invoice_separately'] = $invoice_separately;

        return $this;
    }

    /**
     * Gets invoice_target_date
     * @return \DateTime
     */
    public function getInvoiceTargetDate()
    {
        return $this->container['invoice_target_date'];
    }

    /**
     * Sets invoice_target_date
     * @param \DateTime $invoice_target_date Date through which to calculate charges if an invoice is generated, as yyyy-mm-dd. Default is current date.
     * @return $this
     */
    public function setInvoiceTargetDate($invoice_target_date)
    {
        $this->container['invoice_target_date'] = $invoice_target_date;

        return $this;
    }

    /**
     * Gets notes
     * @return string
     */
    public function getNotes()
    {
        return $this->container['notes'];
    }

    /**
     * Sets notes
     * @param string $notes String of up to 500 characters.
     * @return $this
     */
    public function setNotes($notes)
    {
        $this->container['notes'] = $notes;

        return $this;
    }

    /**
     * Gets preview
     * @return bool
     */
    public function getPreview()
    {
        return $this->container['preview'];
    }

    /**
     * Sets preview
     * @param bool $preview If `true` the update is made in preview mode. The default setting is `false`.
     * @return $this
     */
    public function setPreview($preview)
    {
        $this->container['preview'] = $preview;

        return $this;
    }

    /**
     * Gets preview_type
     * @return string
     */
    public function getPreviewType()
    {
        return $this->container['preview_type'];
    }

    /**
     * Sets preview_type
     * @param string $preview_type The type of preview you will receive. The possible values are `InvoiceItem`, `ChargeMetrics`, or `InvoiceItemChargeMetrics`. The default is `InvoiceItem`.
     * @return $this
     */
    public function setPreviewType($preview_type)
    {
        $this->container['preview_type'] = $preview_type;

        return $this;
    }

    /**
     * Gets remove
     * @return \Swagger\Client\Model\PUTSrpRemoveType[]
     */
    public function getRemove()
    {
        return $this->container['remove'];
    }

    /**
     * Sets remove
     * @param \Swagger\Client\Model\PUTSrpRemoveType[] $remove Container for removing one or more rate plans.
     * @return $this
     */
    public function setRemove($remove)
    {
        $this->container['remove'] = $remove;

        return $this;
    }

    /**
     * Gets renewal_setting
     * @return string
     */
    public function getRenewalSetting()
    {
        return $this->container['renewal_setting'];
    }

    /**
     * Sets renewal_setting
     * @param string $renewal_setting Specifies whether a termed subscription will remain `TERMED` or change to `EVERGREEN` when it is renewed.   Values are:  * `RENEW_WITH_SPECIFIC_TERM` (default) * `RENEW_TO_EVERGREEN`
     * @return $this
     */
    public function setRenewalSetting($renewal_setting)
    {
        $this->container['renewal_setting'] = $renewal_setting;

        return $this;
    }

    /**
     * Gets renewal_term
     * @return int
     */
    public function getRenewalTerm()
    {
        return $this->container['renewal_term'];
    }

    /**
     * Sets renewal_term
     * @param int $renewal_term The length of the period for the subscription renewal term. Default is `0`.
     * @return $this
     */
    public function setRenewalTerm($renewal_term)
    {
        $this->container['renewal_term'] = $renewal_term;

        return $this;
    }

    /**
     * Gets renewal_term_period_type
     * @return string
     */
    public function getRenewalTermPeriodType()
    {
        return $this->container['renewal_term_period_type'];
    }

    /**
     * Sets renewal_term_period_type
     * @param string $renewal_term_period_type The period type for the subscription renewal term.  This field is used with the `renewalTerm` field to specify the subscription renewal term.  Values are:  * `Month` (default) * `Year` * `Day` * `Week`
     * @return $this
     */
    public function setRenewalTermPeriodType($renewal_term_period_type)
    {
        $this->container['renewal_term_period_type'] = $renewal_term_period_type;

        return $this;
    }

    /**
     * Gets term_start_date
     * @return \DateTime
     */
    public function getTermStartDate()
    {
        return $this->container['term_start_date'];
    }

    /**
     * Sets term_start_date
     * @param \DateTime $term_start_date Date the subscription term begins, as yyyy-mm-dd. If this is a renewal subscription, this date is different from the subscription start date.
     * @return $this
     */
    public function setTermStartDate($term_start_date)
    {
        $this->container['term_start_date'] = $term_start_date;

        return $this;
    }

    /**
     * Gets term_type
     * @return string
     */
    public function getTermType()
    {
        return $this->container['term_type'];
    }

    /**
     * Sets term_type
     * @param string $term_type Possible values are: `TERMED`, `EVERGREEN`.
     * @return $this
     */
    public function setTermType($term_type)
    {
        $this->container['term_type'] = $term_type;

        return $this;
    }

    /**
     * Gets update
     * @return \Swagger\Client\Model\PUTSrpUpdateType[]
     */
    public function getUpdate()
    {
        return $this->container['update'];
    }

    /**
     * Sets update
     * @param \Swagger\Client\Model\PUTSrpUpdateType[] $update Container for updating one or more rate plans.
     * @return $this
     */
    public function setUpdate($update)
    {
        $this->container['update'] = $update;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     * @param  integer $offset Offset
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     * @param  integer $offset Offset
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     * @param  integer $offset Offset
     * @param  mixed   $value  Value to be set
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     * @param  integer $offset Offset
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) { // use JSON pretty print
            return json_encode(\Swagger\Client\ObjectSerializer::sanitizeForSerialization($this), JSON_PRETTY_PRINT);
        }

        return json_encode(\Swagger\Client\ObjectSerializer::sanitizeForSerialization($this));
    }
}



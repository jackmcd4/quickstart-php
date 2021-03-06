<?php
/**
 * POSTRevenueScheduleByChargeType
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
 * POSTRevenueScheduleByChargeType Class Doc Comment
 *
 * @category    Class */
/** 
 * @package     Swagger\Client
 * @author      http://github.com/swagger-api/swagger-codegen
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class POSTRevenueScheduleByChargeType implements ArrayAccess
{
    /**
      * The original name of the model.
      * @var string
      */
    protected static $swaggerModelName = 'POSTRevenueScheduleByChargeType';

    /**
      * Array of property to type mappings. Used for (de)serialization
      * @var string[]
      */
    protected static $swaggerTypes = array(
        'amount' => 'string',
        'custom_field__c' => 'string',
        'deferred_revenue_accounting_code' => 'string',
        'deferred_revenue_accounting_code_type' => 'string',
        'notes' => 'string',
        'override_charge_accounting_codes' => 'bool',
        'recognized_revenue_accounting_code' => 'string',
        'recognized_revenue_accounting_code_type' => 'string',
        'reference_id' => 'string',
        'revenue_distributions' => '\Swagger\Client\Model\POSTDistributionItemType[]',
        'revenue_event' => '\Swagger\Client\Model\POSTRevenueScheduleByChargeTypeRevenueEvent',
        'revenue_schedule_date' => '\DateTime'
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
        'amount' => 'amount',
        'custom_field__c' => 'customField__c',
        'deferred_revenue_accounting_code' => 'deferredRevenueAccountingCode',
        'deferred_revenue_accounting_code_type' => 'deferredRevenueAccountingCodeType',
        'notes' => 'notes',
        'override_charge_accounting_codes' => 'overrideChargeAccountingCodes',
        'recognized_revenue_accounting_code' => 'recognizedRevenueAccountingCode',
        'recognized_revenue_accounting_code_type' => 'recognizedRevenueAccountingCodeType',
        'reference_id' => 'referenceId',
        'revenue_distributions' => 'revenueDistributions',
        'revenue_event' => 'revenueEvent',
        'revenue_schedule_date' => 'revenueScheduleDate'
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
        'amount' => 'setAmount',
        'custom_field__c' => 'setCustomFieldC',
        'deferred_revenue_accounting_code' => 'setDeferredRevenueAccountingCode',
        'deferred_revenue_accounting_code_type' => 'setDeferredRevenueAccountingCodeType',
        'notes' => 'setNotes',
        'override_charge_accounting_codes' => 'setOverrideChargeAccountingCodes',
        'recognized_revenue_accounting_code' => 'setRecognizedRevenueAccountingCode',
        'recognized_revenue_accounting_code_type' => 'setRecognizedRevenueAccountingCodeType',
        'reference_id' => 'setReferenceId',
        'revenue_distributions' => 'setRevenueDistributions',
        'revenue_event' => 'setRevenueEvent',
        'revenue_schedule_date' => 'setRevenueScheduleDate'
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
        'amount' => 'getAmount',
        'custom_field__c' => 'getCustomFieldC',
        'deferred_revenue_accounting_code' => 'getDeferredRevenueAccountingCode',
        'deferred_revenue_accounting_code_type' => 'getDeferredRevenueAccountingCodeType',
        'notes' => 'getNotes',
        'override_charge_accounting_codes' => 'getOverrideChargeAccountingCodes',
        'recognized_revenue_accounting_code' => 'getRecognizedRevenueAccountingCode',
        'recognized_revenue_accounting_code_type' => 'getRecognizedRevenueAccountingCodeType',
        'reference_id' => 'getReferenceId',
        'revenue_distributions' => 'getRevenueDistributions',
        'revenue_event' => 'getRevenueEvent',
        'revenue_schedule_date' => 'getRevenueScheduleDate'
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
        $this->container['amount'] = isset($data['amount']) ? $data['amount'] : null;
        $this->container['custom_field__c'] = isset($data['custom_field__c']) ? $data['custom_field__c'] : null;
        $this->container['deferred_revenue_accounting_code'] = isset($data['deferred_revenue_accounting_code']) ? $data['deferred_revenue_accounting_code'] : null;
        $this->container['deferred_revenue_accounting_code_type'] = isset($data['deferred_revenue_accounting_code_type']) ? $data['deferred_revenue_accounting_code_type'] : null;
        $this->container['notes'] = isset($data['notes']) ? $data['notes'] : null;
        $this->container['override_charge_accounting_codes'] = isset($data['override_charge_accounting_codes']) ? $data['override_charge_accounting_codes'] : null;
        $this->container['recognized_revenue_accounting_code'] = isset($data['recognized_revenue_accounting_code']) ? $data['recognized_revenue_accounting_code'] : null;
        $this->container['recognized_revenue_accounting_code_type'] = isset($data['recognized_revenue_accounting_code_type']) ? $data['recognized_revenue_accounting_code_type'] : null;
        $this->container['reference_id'] = isset($data['reference_id']) ? $data['reference_id'] : null;
        $this->container['revenue_distributions'] = isset($data['revenue_distributions']) ? $data['revenue_distributions'] : null;
        $this->container['revenue_event'] = isset($data['revenue_event']) ? $data['revenue_event'] : null;
        $this->container['revenue_schedule_date'] = isset($data['revenue_schedule_date']) ? $data['revenue_schedule_date'] : null;
    }

    /**
     * show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalid_properties = array();
        if ($this->container['amount'] === null) {
            $invalid_properties[] = "'amount' can't be null";
        }
        if ($this->container['revenue_schedule_date'] === null) {
            $invalid_properties[] = "'revenue_schedule_date' can't be null";
        }
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
        if ($this->container['amount'] === null) {
            return false;
        }
        if ($this->container['revenue_schedule_date'] === null) {
            return false;
        }
        return true;
    }


    /**
     * Gets amount
     * @return string
     */
    public function getAmount()
    {
        return $this->container['amount'];
    }

    /**
     * Sets amount
     * @param string $amount The revenue schedule amount, which is the sum of all revenue items. This field cannot be null and must be formatted based on the currency, such as `JPY 30` or `USD 30.15`. Test out the currency to ensure you are using the proper formatting otherwise, the response will fail and this error message is returned: `Allocation amount with wrong decimal places.`
     * @return $this
     */
    public function setAmount($amount)
    {
        $this->container['amount'] = $amount;

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
     * Gets deferred_revenue_accounting_code
     * @return string
     */
    public function getDeferredRevenueAccountingCode()
    {
        return $this->container['deferred_revenue_accounting_code'];
    }

    /**
     * Sets deferred_revenue_accounting_code
     * @param string $deferred_revenue_accounting_code The accounting code for deferred revenue, such as Monthly Recurring Liability. Required only when `overrideChargeAccountingCodes` is `true`. Otherwise this value is ignored.
     * @return $this
     */
    public function setDeferredRevenueAccountingCode($deferred_revenue_accounting_code)
    {
        $this->container['deferred_revenue_accounting_code'] = $deferred_revenue_accounting_code;

        return $this;
    }

    /**
     * Gets deferred_revenue_accounting_code_type
     * @return string
     */
    public function getDeferredRevenueAccountingCodeType()
    {
        return $this->container['deferred_revenue_accounting_code_type'];
    }

    /**
     * Sets deferred_revenue_accounting_code_type
     * @param string $deferred_revenue_accounting_code_type The type associated with the deferred revenue accounting code, such as Deferred Revenue. Required only when `overrideChargeAccountingCodes` is `true`. Otherwise this value is ignored.
     * @return $this
     */
    public function setDeferredRevenueAccountingCodeType($deferred_revenue_accounting_code_type)
    {
        $this->container['deferred_revenue_accounting_code_type'] = $deferred_revenue_accounting_code_type;

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
     * @param string $notes Additional information about this record.  Character Limit: 2,000
     * @return $this
     */
    public function setNotes($notes)
    {
        $this->container['notes'] = $notes;

        return $this;
    }

    /**
     * Gets override_charge_accounting_codes
     * @return bool
     */
    public function getOverrideChargeAccountingCodes()
    {
        return $this->container['override_charge_accounting_codes'];
    }

    /**
     * Sets override_charge_accounting_codes
     * @param bool $override_charge_accounting_codes When overriding accounting codes from a charge, `recognizedRevenueAccountingCode` and `deferredRevenue AccountingCode` must be in the request body and can have empty value.  `True` or `False`. A `false` value will be used if this field is empty in the request body.
     * @return $this
     */
    public function setOverrideChargeAccountingCodes($override_charge_accounting_codes)
    {
        $this->container['override_charge_accounting_codes'] = $override_charge_accounting_codes;

        return $this;
    }

    /**
     * Gets recognized_revenue_accounting_code
     * @return string
     */
    public function getRecognizedRevenueAccountingCode()
    {
        return $this->container['recognized_revenue_accounting_code'];
    }

    /**
     * Sets recognized_revenue_accounting_code
     * @param string $recognized_revenue_accounting_code The accounting code for recognized revenue, such as Monthly Recurring Charges or Overage Charges. Required only when `overrideChargeAccountingCodes` is `true`. Otherwise the value is ignored.
     * @return $this
     */
    public function setRecognizedRevenueAccountingCode($recognized_revenue_accounting_code)
    {
        $this->container['recognized_revenue_accounting_code'] = $recognized_revenue_accounting_code;

        return $this;
    }

    /**
     * Gets recognized_revenue_accounting_code_type
     * @return string
     */
    public function getRecognizedRevenueAccountingCodeType()
    {
        return $this->container['recognized_revenue_accounting_code_type'];
    }

    /**
     * Sets recognized_revenue_accounting_code_type
     * @param string $recognized_revenue_accounting_code_type The type associated with the recognized revenue accounting code, such as Sales Revenue or Sales Discount. Required only when `overrideChargeAccountingCodes` is `true`. Otherwise this value is ignored.
     * @return $this
     */
    public function setRecognizedRevenueAccountingCodeType($recognized_revenue_accounting_code_type)
    {
        $this->container['recognized_revenue_accounting_code_type'] = $recognized_revenue_accounting_code_type;

        return $this;
    }

    /**
     * Gets reference_id
     * @return string
     */
    public function getReferenceId()
    {
        return $this->container['reference_id'];
    }

    /**
     * Sets reference_id
     * @param string $reference_id Reference ID is used only in the custom unlimited rule to create a revenue schedule. In this scenario, the revenue schedule is not linked to an invoice item or invoice item adjustment.  Character Limit: 60
     * @return $this
     */
    public function setReferenceId($reference_id)
    {
        $this->container['reference_id'] = $reference_id;

        return $this;
    }

    /**
     * Gets revenue_distributions
     * @return \Swagger\Client\Model\POSTDistributionItemType[]
     */
    public function getRevenueDistributions()
    {
        return $this->container['revenue_distributions'];
    }

    /**
     * Sets revenue_distributions
     * @param \Swagger\Client\Model\POSTDistributionItemType[] $revenue_distributions An array of revenue distributions. Represents how you want to distribute revenue for this revenue schedule. You can distribute revenue into a maximum of 250 accounting periods with one revenue schedule.  The sum of the newAmount fields must be equal to the amount field.
     * @return $this
     */
    public function setRevenueDistributions($revenue_distributions)
    {
        $this->container['revenue_distributions'] = $revenue_distributions;

        return $this;
    }

    /**
     * Gets revenue_event
     * @return \Swagger\Client\Model\POSTRevenueScheduleByChargeTypeRevenueEvent
     */
    public function getRevenueEvent()
    {
        return $this->container['revenue_event'];
    }

    /**
     * Sets revenue_event
     * @param \Swagger\Client\Model\POSTRevenueScheduleByChargeTypeRevenueEvent $revenue_event
     * @return $this
     */
    public function setRevenueEvent($revenue_event)
    {
        $this->container['revenue_event'] = $revenue_event;

        return $this;
    }

    /**
     * Gets revenue_schedule_date
     * @return \DateTime
     */
    public function getRevenueScheduleDate()
    {
        return $this->container['revenue_schedule_date'];
    }

    /**
     * Sets revenue_schedule_date
     * @param \DateTime $revenue_schedule_date The effective date of the revenue schedule. For example, the revenue schedule date for bookings-based revenue recognition is typically set to the order date or contract date.  The date cannot be in a closed accounting period. The date must be in the `YYYY-MM-DD` format.
     * @return $this
     */
    public function setRevenueScheduleDate($revenue_schedule_date)
    {
        $this->container['revenue_schedule_date'] = $revenue_schedule_date;

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



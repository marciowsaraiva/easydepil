<?php
/*
 * Copyright 2010-2013 Amazon.com, Inc. or its affiliates. All Rights Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 *  http://aws.amazon.com/apache2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

/**
 * Amazon DynamoDB is a fast, highly scalable, highly available, cost-effective non-relational
 * database service.
 *  
 * Amazon DynamoDB removes traditional scalability limitations on data storage while maintaining
 * low latency and predictable performance.
 *
 * @version 2013.01.14
 * @license See the included NOTICE.md file for complete information.
 * @copyright See the included NOTICE.md file for complete information.
 * @link http://aws.amazon.com/dynamodb/ Amazon DynamoDB
 * @link http://aws.amazon.com/dynamodb/documentation/ Amazon DynamoDB documentation
 */
class AmazonDynamoDB extends CFRuntime
{
	/*%******************************************************************************************%*/
	// CLASS CONSTANTS

	/**
	 * Specify the queue URL for the United States East (Northern Virginia) Region.
	 */
	const REGION_US_E1 = 'dynamodb.us-east-1.amazonaws.com';

	/**
	 * Specify the queue URL for the United States East (Northern Virginia) Region.
	 */
	const REGION_VIRGINIA = self::REGION_US_E1;

	/**
	 * Specify the queue URL for the United States West (Northern California) Region.
	 */
	const REGION_US_W1 = 'dynamodb.us-west-1.amazonaws.com';

	/**
	 * Specify the queue URL for the United States West (Northern California) Region.
	 */
	const REGION_CALIFORNIA = self::REGION_US_W1;

	/**
	 * Specify the queue URL for the United States West (Oregon) Region.
	 */
	const REGION_US_W2 = 'dynamodb.us-west-2.amazonaws.com';

	/**
	 * Specify the queue URL for the United States West (Oregon) Region.
	 */
	const REGION_OREGON = self::REGION_US_W2;

	/**
	 * Specify the queue URL for the Europe West (Ireland) Region.
	 */
	const REGION_EU_W1 = 'dynamodb.eu-west-1.amazonaws.com';

	/**
	 * Specify the queue URL for the Europe West (Ireland) Region.
	 */
	const REGION_IRELAND = self::REGION_EU_W1;

	/**
	 * Specify the queue URL for the Asia Pacific Southeast (Singapore) Region.
	 */
	const REGION_APAC_SE1 = 'dynamodb.ap-southeast-1.amazonaws.com';

	/**
	 * Specify the queue URL for the Asia Pacific Southeast (Singapore) Region.
	 */
	const REGION_SINGAPORE = self::REGION_APAC_SE1;

	/**
	 * Specify the queue URL for the Asia Pacific Southeast (Singapore) Region.
	 */
	const REGION_APAC_SE2 = 'dynamodb.ap-southeast-2.amazonaws.com';

	/**
	 * Specify the queue URL for the Asia Pacific Southeast (Singapore) Region.
	 */
	const REGION_SYDNEY = self::REGION_APAC_SE2;

	/**
	 * Specify the queue URL for the Asia Pacific Northeast (Tokyo) Region.
	 */
	const REGION_APAC_NE1 = 'dynamodb.ap-northeast-1.amazonaws.com';

	/**
	 * Specify the queue URL for the Asia Pacific Northeast (Tokyo) Region.
	 */
	const REGION_TOKYO = self::REGION_APAC_NE1;

	/**
	 * Specify the queue URL for the South America (Sao Paulo) Region.
	 */
	const REGION_SA_E1 = 'dynamodb.sa-east-1.amazonaws.com';

	/**
	 * Specify the queue URL for the South America (Sao Paulo) Region.
	 */
	const REGION_SAO_PAULO = self::REGION_SA_E1;

	/**
	 * Specify the queue URL for the United States GovCloud Region.
	 */
	const REGION_US_GOV1 = 'dynamodb.us-gov-west-1.amazonaws.com';

	/**
	 * Default service endpoint.
	 */
	const DEFAULT_URL = self::REGION_US_E1;


	/*%******************************************************************************************%*/
	// ACTION CONSTANTS

	/**
	 * Action: Add
	 */
	const ACTION_ADD = 'ADD';

	/**
	 * Action: Delete
	 */
	const ACTION_DELETE = 'DELETE';

	/**
	 * Action: Put
	 */
	const ACTION_PUT = 'PUT';


	/*%******************************************************************************************%*/
	// CONDITION CONSTANTS

	/**
	 * Condition operator: Equal To
	 */
	const CONDITION_EQUAL = 'EQ';

	/**
	 * Condition operator: Not Equal To
	 */
	const CONDITION_NOT_EQUAL = 'NE';

	/**
	 * Condition operator: Less Than
	 */
	const CONDITION_LESS_THAN = 'LT';

	/**
	 * Condition operator: Less Than or Equal To
	 */
	const CONDITION_LESS_THAN_OR_EQUAL = 'LE';

	/**
	 * Condition operator: Greater Than or Equal To
	 */
	const CONDITION_GREATER_THAN = 'GT';

	/**
	 * Condition operator: Greater Than or Equal To
	 */
	const CONDITION_GREATER_THAN_OR_EQUAL = 'GE';

	/**
	 * Condition operator: Null
	 */
	const CONDITION_NULL = 'NULL';

	/**
	 * Condition operator: Not Null
	 */
	const CONDITION_NOT_NULL = 'NOT_NULL';

	/**
	 * Condition operator: Contains
	 */
	const CONDITION_CONTAINS = 'CONTAINS';

	/**
	 * Condition operator: Doesn't Contain
	 */
	const CONDITION_DOESNT_CONTAIN = 'NOT_CONTAINS';

	/**
	 * Condition operator: In
	 */
	const CONDITION_IN = 'IN';

	/**
	 * Condition operator: Between
	 */
	const CONDITION_BETWEEN = 'BETWEEN';

	/**
	 * Condition operator: Begins With
	 */
	const CONDITION_BEGINS_WITH = 'BEGINS_WITH';


	/*%******************************************************************************************%*/
	// RETURN CONSTANTS

	/**
	 * Return value type: NONE
	 */
	const RETURN_NONE = 'NONE';

	/**
	 * Return value type: ALL_OLD
	 */
	const RETURN_ALL_OLD = 'ALL_OLD';

	/**
	 * Return value type: ALL_NEW
	 */
	const RETURN_ALL_NEW = 'ALL_NEW';

	/**
	 * Return value type: UPDATED_OLD
	 */
	const RETURN_UPDATED_OLD = 'UPDATED_OLD';

	/**
	 * Return value type: UPDATED_NEW
	 */
	const RETURN_UPDATED_NEW = 'UPDATED_NEW';


	/*%******************************************************************************************%*/
	// TYPE CONSTANTS

	/**
	 * Content type: string
	 */
	const TYPE_STRING = 'S';

	/**
	 * Content type: number
	 */
	const TYPE_NUMBER = 'N';

	/**
	 * Content type: binary
	 */
	const TYPE_BINARY = 'B';

	/**
	 * Content type: string set
	 */
	const TYPE_STRING_SET = 'SS';

	/**
	 * Content type: number set
	 */
	const TYPE_NUMBER_SET = 'NS';

	/**
	 * Content type: binary set
	 */
	const TYPE_BINARY_SET = 'BS';

	/**
	 * Content type: string set
	 * @deprecated Please use TYPE_STRING_SET
	 */
	const TYPE_ARRAY_OF_STRINGS = self::TYPE_STRING_SET;

	/**
	 * Content type: number set
	 * @deprecated Please use TYPE_NUMBER_SET
	 */
	const TYPE_ARRAY_OF_NUMBERS = self::TYPE_NUMBER_SET;

	/**
	 * Content type: binary set
	 * @deprecated Please use TYPE_BINARY_SET
	 */
	const TYPE_ARRAY_OF_BINARIES = self::TYPE_BINARY_SET;

	/**
	 * The suffix used for identifying a set type
	 */
	const SUFFIX_FOR_TYPES = 'S';


	/*%******************************************************************************************%*/
	// CONSTRUCTOR

	/**
	 * Constructs a new instance of <AmazonDynamoDB>.
	 *
	 * @param array $options (Optional) An associative array of parameters that can have the following keys: <ul>
	 * 	<li><code>certificate_authority</code> - <code>boolean</code> - Optional - Determines which Cerificate Authority file to use. A value of boolean <code>false</code> will use the Certificate Authority file available on the system. A value of boolean <code>true</code> will use the Certificate Authority provided by the SDK. Passing a file system path to a Certificate Authority file (chmodded to <code>0755</code>) will use that. Leave this set to <code>false</code> if you're not sure.</li>
	 * 	<li><code>credentials</code> - <code>string</code> - Optional - The name of the credential set to use for authentication.</li>
	 * 	<li><code>default_cache_config</code> - <code>string</code> - Optional - This option allows a preferred storage type to be configured for long-term caching. This can be changed later using the <set_cache_config()> method. Valid values are: <code>apc</code>, <code>xcache</code>, or a file system path such as <code>./cache</code> or <code>/tmp/cache/</code>.</li>
	 * 	<li><code>key</code> - <code>string</code> - Optional - Your AWS key, or a session key. If blank, the default credential set will be used.</li>
	 * 	<li><code>secret</code> - <code>string</code> - Optional - Your AWS secret key, or a session secret key. If blank, the default credential set will be used.</li>
	 * 	<li><code>token</code> - <code>string</code> - Optional - An AWS session token.</li></ul>
	 * @return void
	 */
	public function __construct(array $options = array())
	{
		$this->api_version = '2011-12-05';
		$this->hostname = self::DEFAULT_URL;
		$this->auth_class = 'AuthV4JSON';
		$this->operation_prefix = 'x-amz-target:DynamoDB_20111205.';

		parent::__construct($options);
	}


	/*%******************************************************************************************%*/
	// SETTERS

	/**
	 * This allows you to explicitly sets the region for the service to use.
	 *
	 * @param string $region (Required) The region to explicitly set. Available options are <REGION_US_E1>, <REGION_US_W1>, <REGION_US_W2>, <REGION_EU_W1>, <REGION_APAC_SE1>, <REGION_APAC_SE2>, <REGION_APAC_NE1>, <REGION_SA_E1>, <REGION_US_GOV1>.
	 * @return $this A reference to the current instance.
	 */
	public function set_region($region)
	{
		// @codeCoverageIgnoreStart
		$this->set_hostname($region);
		return $this;
		// @codeCoverageIgnoreEnd
	}


	/*%******************************************************************************************%*/
	// CONVENIENCE METHODS

	/**
	 * Registers DynamoDB as the default session handler for PHP.
	 *
	 * @param array $config (Optional) An array of configuration items for the session handler.
	 * @return DynamoDBSessionHandler The session handler object.
	 */
	public function register_session_handler(array $config = array())
	{
		require_once dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'extensions'
			. DIRECTORY_SEPARATOR . 'dynamodbsessionhandler.class.php';

		$dynamo_session_handler = new DynamoDBSessionHandler($this, $config);
		$dynamo_session_handler->register();

		return $dynamo_session_handler;
	}

	/**
	 * Formats a value into the DynamoDB attribute value format (e.g. <code>array('S' => 'value')</code> ).
	 *
	 * @param mixed $value (Required) The value to be formatted.
	 * @param string $format (Optional) The format of the result (based loosely on the type of operation)
	 * @param string $type_override (Optional) Any valid attribute type to override the calculated type.
	 * @return array An attribute value suitable for DynamoDB.
	 */
	public function attribute($value, $format = 'put', $type_override = null)
	{
		$info = $this->get_attribute_value_info($value);

		if (!$info)
		{
			return null;
		}

		if ($type_override)
		{
			static $valid_types = array(
				self::TYPE_STRING,
				self::TYPE_NUMBER,
				self::TYPE_BINARY,
				self::TYPE_STRING_SET,
				self::TYPE_NUMBER_SET,
				self::TYPE_BINARY_SET,
			);

			$info['type'] = in_array($type_override, $valid_types) ? $type_override : $info['type'];
		}

		$result = array($info['type'] => $info['value']);

		// In some cases the result needs to be wrapped with "Value"
		if ($format === 'update' || $format === 'expected')
		{
			$result = array('Value' => $result);
		}

		return $result;
	}

	/**
	 * Formats a set of values into the DynamoDB attribute value format.
	 *
	 * @param array $values (Required) The values to be formatted.
	 * @param string $format (Optional) The format of the result (based loosely on the type of operation)
	 * @return array The formatted array.
	 */
	public function attributes(array $values, $format = 'put')
	{
		$results = array();

		foreach ($values as $key => $value)
		{
			$results[$key] = $this->attribute($value, $format);
		}

		$results = array_filter($results);

		return $results;
	}

	/**
	 * An internal, recursive function for doing the attribute value formatting.
	 *
	 * @param mixed $value (Required) The value being formatted.
	 * @param integer $depth (Optional) The current recursion level. Anything higher than one will terminate the function.
	 * @return array An array of information about the attribute value, including it's string value and type.
	 */
	protected function get_attribute_value_info($value, $depth = 0)
	{
		// If the recursion limit is succeeded, then the value is invalid
		if ($depth > 1)
		{
			return null;
		}

		// Handle objects (including DynamoDB Binary types)
		if (is_object($value))
		{
			if ($value instanceof DynamoDB_Binary || $value instanceof DynamoDB_BinarySet)
			{
				$type = ($value instanceof DynamoDB_Binary) ? self::TYPE_BINARY : self::TYPE_BINARY_SET;
				return array(
					'value' => $value->{$type},
					'type'  => $type
				);
			}
			elseif ($value instanceof Traversable)
			{
				$value = iterator_to_array($value);
			}
			elseif (method_exists($value, '__toString'))
			{
				$value = (string) $value;
			}
			else
			{
				return null;
			}
		}

		// Handle empty values (zeroes are OK though) and resources
		if ($value === null || $value === array() || $value === '' || is_resource($value))
		{
			return null;
		}

		// Create the attribute value info
		$info = array();

		// Handle boolean values
		if (is_bool($value))
		{
			$info['type'] = self::TYPE_NUMBER;
			$info['value'] = $value ? '1' : '0';
		}
		// Handle numeric values
		elseif (is_int($value) || is_float($value))
		{
			$info['type'] = self::TYPE_NUMBER;
			$info['value'] = (string) $value;
		}
		// Handle arrays
		elseif (is_array($value))
		{
			$set_type = null;
			$info['value'] = array();

			// Loop through each value to analyze and prepare it
			foreach ($value as $sub_value)
			{
				// Recursively get the info for this sub-value. The depth param only allows one level of recursion
				$sub_info = $this->get_attribute_value_info($sub_value, $depth + 1);

				// If a sub-value is invalid, the whole array is invalid as well
				if ($sub_info === null)
				{
					return null;
				}

				// The type of each sub-valu
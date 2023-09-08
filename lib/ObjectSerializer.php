<?php
/**
 * ObjectSerializer 
 *
 * PHP version 5
 *
 * @category Class
 * @package  Systran\Client
 * @author   http://github.com/Systran-api/Systran-codegen
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 * @link
 */
/**
 *  Copyright 2015 SmartBear Software
 *
 *  Licensed under the Apache License, Version 2.0 (the "License");
 *  you may not use this file except in compliance with the License.
 *  You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 *  Unless required by applicable law or agreed to in writing, software
 *  distributed under the License is distributed on an "AS IS" BASIS,
 *  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 *  See the License for the specific language governing permissions and
 *  limitations under the License.
 */
/**
 *
 *
 * Do not edit the class manually.
 */

namespace Systran\Client;

use DateTime;
use SplFileObject;

/**
 * ObjectSerializer Class Doc Comment
 *
 * @category Class
 * @package  Systran\Client
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache Licene v2
 * @link
 */
class ObjectSerializer
{

    /**
     * Build a JSON POST object
     *
     * @param mixed $data the data to serialize
     *
     * @return string serialized form of $data
     */
    public function sanitizeForSerialization(mixed $data)
    {
        if (is_scalar($data) || null === $data) {
            $sanitized = $data;
        } else if ($data instanceof DateTime) {
            $sanitized = $data->format( 'Y-m-d\TH:i:sO');
        } else if (is_array($data)) {
            foreach ($data as $property => $value) {
                $data[$property] = $this->sanitizeForSerialization($value);
            }
            $sanitized = $data;
        } else if (is_object($data)) {
            /** @var \Systran\Client\Model\Model $data */
            $values = array();
            foreach (array_keys($data::$SystranTypes) as $property) {
                $getter = $data::$getters[$property];
                if ($data->$getter() !== null) {
                    $values[$data::$attributeMap[$property]] = $this->sanitizeForSerialization($data->$getter());
                }
            }
            $sanitized = $values;
        } else {
            $sanitized = (string)$data;
        }

        return $sanitized;
    }

    /**
     * Take value and turn it into a string suitable for inclusion in
     * the path, by url-encoding.
     *
     * @param mixed $value a string which will be part of the path
     *
     * @return string the serialized object
     */
    public function toPathValue(mixed $value): string {
        return rawurlencode($this->toString($value));
    }

    /**
     * Take value and turn it into a string suitable for inclusion in
     * the query, by imploding comma-separated if it's an object.
     * If it's a string, pass through unchanged. It will be url-encoded
     * later.
     *
     * @param mixed $object an object to be serialized to a string
     *
     * @return string the serialized object
     */
    public function toQueryValue(mixed $object) : string
    {
        if (is_array($object)) {
            return implode(',', $object);
        } else {
            return $this->toString($object);
        }
    }

    /**
     * Take value and turn it into a string suitable for inclusion in
     * the header. If it's a string, pass through unchanged
     * If it's a datetime object, format it in ISO8601
     *
     * @param mixed $value a string which will be part of the header
     *
     * @return string the header string
     */
    public function toHeaderValue(mixed $value): string {
        return $this->toString($value);
    }

    /**
     * Take value and turn it into a string suitable for inclusion in
     * the http body (form parameter). If it's a string, pass through unchanged
     * If it's a datetime object, format it in ISO8601
     *
     * @param mixed $value the value of the form parameter
     *
     * @return string the form string
     */
    public function toFormValue(mixed $value): string {
        if ($value instanceof SplFileObject) {
            return $value->getRealPath();
        } else {
            return $this->toString($value);
        }
    }

    /**
     * Take value and turn it into a string suitable for inclusion in
     * the parameter. If it's a string, pass through unchanged
     * If it's a datetime object, format it in ISO8601
     *
     * @param mixed $value the value of the parameter
     *
     * @return string the header string
     */
    public function toString(mixed $value): string {
        if ($value instanceof DateTime) { // datetime in ISO8601 format
            return $value->format('Y-m-d\TH:i:sO');
        }
        else if ($value === true) {
            return "true";
        }
        else if ($value === false) {
            return "false";
        }
        else {
            return $value;
        }
    }

    /**
     * Deserialize a JSON string into an object
     *
     * @param mixed       $data       object or primitive to be deserialized
     * @param string      $class      class name is passed as a string
     * @param string|null $httpHeader HTTP headers
     *
     * @return mixed an instance of $class
     * @throws \Exception
     */
    public function deserialize(mixed $data, string $class, string $httpHeader=null) : mixed
    {
        if (null === $data) {
            $deserialized = null;
        } elseif ( str_starts_with( $class, 'map[' ) ) { // for associative array e.g. map[string,int]
            $inner = substr($class, 4, -1);
            $deserialized = array();
            if (strrpos($inner, ",") !== false) {
                $subClass_array = explode(',', $inner, 2);
                $subClass = $subClass_array[1];
                foreach ($data as $key => $value) {
                    $deserialized[$key] = $this->deserialize($value, $subClass);
                }
            }
        } elseif (strcasecmp(substr($class, -2), '[]') == 0) {
            $subClass = substr($class, 0, -2);
            $values = array();
            foreach ($data as  $value) {
                $values[] = $this->deserialize($value, $subClass);
            }
            $deserialized = $values;
        } elseif ($class === '\DateTime') {
            $deserialized = new DateTime($data);
        } elseif (in_array($class, array('integer', 'int', 'void', 'number', 'object', 'double', 'float', 'byte', 'DateTime', 'string', 'mixed', 'boolean', 'bool'))) {
            settype($data, $class);
            $deserialized = $data;
        } elseif ($class === '\SplFileObject') {
            // determine file name
            if (preg_match('/Content-Disposition: inline; filename=[\'"]?([^\'"\s]+)[\'"]?$/i', $httpHeader, $match)) {
                $filename = Configuration::getDefaultConfiguration()->getTempFolderPath().$match[1];
            } else {
                $filename = tempnam(Configuration::getDefaultConfiguration()->getTempFolderPath(), '');
            }
            $deserialized = new SplFileObject( $filename, "w");
            $byte_written = $deserialized->fwrite($data);
            error_log("[INFO] Written $byte_written byte to $filename. Please move the file to a proper folder or delete the temp file after processing.\n", 3, Configuration::getDefaultConfiguration()->getDebugFile());
      
        } else {
            /** @var \Systran\Client\Model\Model $instance */
            $instance = new $class();
            foreach ($instance::$SystranTypes as $property => $type) {
                $propertySetter = $instance::$setters[$property];
     
                if (!isset($propertySetter) || !isset($data->{$instance::$attributeMap[$property]})) {
                    continue;
                }
     
                $propertyValue = $data->{$instance::$attributeMap[$property]};
                if (isset($propertyValue)) {
                    $instance->$propertySetter($this->deserialize($propertyValue, $type));
                }
            }
            $deserialized = $instance;
        }
     
        return $deserialized;
    }
}

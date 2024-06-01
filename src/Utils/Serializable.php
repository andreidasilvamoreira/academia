<?php

namespace App\Utils;

abstract class Serializable implements \JsonSerializable
{
    /**
     * @var array|null
     */
    private ?array $propertitiesNotSerializable = null;

    /**
     * @var array|null
     */
    private ?array $propertitiesSerializable = null;

    /**
     * @return array
     */
    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
        return $this->toArray(true);
    }

    public function toArray($resolveSerializable = false)
    {
        $data = [];

        $reflectionClass = new \ReflectionClass(get_class($this));

        foreach ($reflectionClass->getProperties() as $property) {
            $nameMethodGetter = $this->resolveNameGetterByProperty($property->getName());

            if ($reflectionClass->hasMethod($nameMethodGetter)) {
                $methodGetter = $reflectionClass->getMethod($nameMethodGetter);
                $value = $methodGetter->invoke($this);

                $isArray = $property->getType() && $property->getType()->getName() == 'array';
                $isArrayEmpty = $isArray && (is_null($value) || count($value) == 0);

                if (!isset($value) || $isArrayEmpty) {
                    continue;
                }

                if ($isArray) {
                    $dataArray = [];

                    foreach ($value as $key => $item) {
                        $dataArray[$key] = $item instanceof Serializable ? $item->toArray($resolveSerializable) : $item;
                    }

                    $data[$property->getName()] = $dataArray;
                } else {
                    $value = $value instanceof Serializable ? $value->toArray($resolveSerializable) : $value;
                    $data[$property->getName()] = $value;
                }
            }
        }

        return $resolveSerializable ? $this->resolveSerializable($data) : $data;
    }

    private function resolveSerializable(array $data, string $prefix = '')
    {
        if (is_null($this->propertitiesSerializable) && is_null($this->propertitiesNotSerializable)) {
            return $data;
        }

        $dataReturn = [];

        foreach ($data as $key => $value) {
            $keyDot = $prefix . $key;

            if ($this->isPropertitySerializable($keyDot)) {
                $dataReturn[$key] = is_array($value) ? self::resolveSerializable($value, $keyDot . '.') : $value;
            }
        }

        return $dataReturn;
    }

    private function isPropertitySerializable($name)
    {
        $isSerializable = false;

        if (empty($this->propertitiesSerializable) || in_array($name, $this->propertitiesSerializable)) {
            $isSerializable = true;
        }

        if (!is_null($this->propertitiesNotSerializable) && in_array($name, $this->propertitiesNotSerializable)) {
            $isSerializable = false;
        }

        return $isSerializable;
    }

    private function resolveNameGetterByProperty($nameProperty)
    {
        return 'get' . self::transformNamePropertyToCamelCase($nameProperty);
    }

    private function transformNamePropertyToCamelCase($nameProperty)
    {
        $nameExplode = array_map(function ($str) {
            return ucfirst($str);
        }, explode('_', $nameProperty));

        return implode('', $nameExplode);
    }

    /**
     * @return string[]
     */
    public function getPropertiesNotSerializable(): array
    {
        return $this->propertitiesNotSerializable;
    }

    /**
     * @param string[] $propertitiesNotSerializable
     * @return self
     */
    public function setPropertiesNotSerializable(array $propertitiesNotSerializable): self
    {
        $this->propertitiesNotSerializable = $propertitiesNotSerializable;
        return $this;
    }

    /**
     * @param string $propertitieNotSerializable
     * @return self
     */
    public function addPropertiesNotSerializable(string $propertitieNotSerializable): self
    {
        $this->propertitiesNotSerializable[] = $propertitieNotSerializable;
        return $this;
    }

    /**
     * @param string[] $names
     * @return self
     */
    public function removePropertiesNotSerializable(array $names): self
    {
        if ($this->propertitiesNotSerializable) {
            $this->propertitiesNotSerializable = array_diff($this->propertitiesNotSerializable, $names);
        }

        return $this;
    }

    /**
     * @return string[]
     */
    public function getPropertitiesSerializable(): array
    {
        return $this->propertitiesSerializable;
    }

    /**
     * @param string[] $propertitiesSerializable
     * @return self
     */
    public function setPropertitiesSerializable(array $propertitiesSerializable): self
    {
        $this->propertitiesSerializable = $propertitiesSerializable;
        return $this;
    }

    /**
     * @param string $propertitieSerializable
     * @return self
     */
    public function addPropertitieSerializable(string $propertitieSerializable): self
    {
        $this->propertitiesSerializable[] = $propertitieSerializable;
        return $this;
    }
}
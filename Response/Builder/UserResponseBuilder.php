<?php

namespace SchulIT\IdpExchange\Response\Builder;

use SchulIT\IdpExchange\Response\AbstractAttribute;
use SchulIT\IdpExchange\Response\UserResponse;
use SchulIT\IdpExchange\Response\ValueAttribute;
use SchulIT\IdpExchange\Response\ValuesAttribute;

class UserResponseBuilder {

    /**
     * @var string
     */
    private $username;

    /**
     * @var AbstractAttribute
     */
    private $attributes = [ ];

    /**
     * @param string $username
     * @return UserResponseBuilder
     */
    public function setUsername(string $username): UserResponseBuilder {
        $this->username = $username;
        return $this;
    }

    /**
     * @param string $name
     * @param string|null $value
     * @return UserResponseBuilder
     */
    public function addValueAttribute(string $name, ?string $value): UserResponseBuilder {
        $attribute = new ValueAttribute();
        $attribute->name = $name;
        $attribute->value = $value;

        $this->attributes[] = $attribute;
        return $this;
    }

    /**
     * @param string $name
     * @param array $values
     * @return UserResponseBuilder
     */
    public function addValuesAttribute(string $name, array $values): UserResponseBuilder {
        $attribute = new ValuesAttribute();
        $attribute->name = $name;
        $attribute->values = $values;

        $this->attributes[] = $attribute;
        return $this;
    }

    /**
     * @return UserResponse
     */
    public function build(): UserResponse {
        $userResponse = new UserResponse();
        $userResponse->username = $this->username;
        $userResponse->attributes = $this->attributes;

        return $userResponse;
    }
}
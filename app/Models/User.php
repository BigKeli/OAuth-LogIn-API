<?php

namespace App\Models;

class User
{
    public $name;
    public $email;
    public $token;

    /**
     * Constructor to initialize user properties.
     *
     * @param string $name
     * @param string $email
     * @param string $token
     */
    public function __construct($name, $email, $token)
    {
        $this->name = $name;
        $this->email = $email;
        $this->token = $token;
    }

    /**
     * Convert the user instance to an array for storing in session.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'token' => $this->token,
        ];
    }

    /**
     * Create a User instance from an array (e.g., session data).
     *
     * @param array $attributes
     * @return User
     */
    public static function fromArray(array $attributes)
    {
        return new self(
            $attributes['name'] ?? null,
            $attributes['email'] ?? null,
            $attributes['token'] ?? null
        );
    }
}

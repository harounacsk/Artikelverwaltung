<?php

class User{
    private string $name;
    private string $username;
    private string $password;
    private string $roles;


    public function __construct()
    {
        $this->roles=Roles::USER->value;
    }
    


    /**
     * Get the value of name
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set the value of name
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of username
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * Set the value of username
     */
    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get the value of password
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * Set the value of password
     */
    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of roles
     */
    public function getRoles(): string
    {
        return $this->roles;
    }

    /**
     * Set the value of roles
     */
    public function setRoles(string $roles): self
    {
        $this->roles = $roles;

        return $this;
    }
}
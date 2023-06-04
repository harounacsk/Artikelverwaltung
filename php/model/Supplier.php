<?php


class Supplier 
{
  private string $name;
  private string $street;
  private string $city;
  private string $code;
  private string $tel;
  private string $fax;
  private string $mail;

 

  

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
   * Get the value of street
   */
  public function getStreet(): string
  {
    return $this->street;
  }

  /**
   * Set the value of street
   */
  public function setStreet(string $street): self
  {
    $this->street = $street;

    return $this;
  }

  /**
   * Get the value of city
   */
  public function getCity(): string
  {
    return $this->city;
  }

  /**
   * Set the value of city
   */
  public function setCity(string $city): self
  {
    $this->city = $city;

    return $this;
  }

  /**
   * Get the value of code
   */
  public function getCode(): string
  {
    return $this->code;
  }

  /**
   * Set the value of code
   */
  public function setCode(string $code): self
  {
    $this->code = $code;

    return $this;
  }

  /**
   * Get the value of tel
   */
  public function getTel(): string
  {
    return $this->tel;
  }

  /**
   * Set the value of tel
   */
  public function setTel(string $tel): self
  {
    $this->tel = $tel;

    return $this;
  }

  /**
   * Get the value of fax
   */
  public function getFax(): string
  {
    return $this->fax;
  }

  /**
   * Set the value of fax
   */
  public function setFax(string $fax): self
  {
    $this->fax = $fax;

    return $this;
  }

  /**
   * Get the value of mail
   */
  public function getMail(): string
  {
    return $this->mail;
  }

  /**
   * Set the value of mail
   */
  public function setMail(string $mail): self
  {
    $this->mail = $mail;

    return $this;
  }
}

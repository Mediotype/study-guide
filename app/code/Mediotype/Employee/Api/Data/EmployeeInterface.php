<?php
/**
 * @author    Mediotype Development <diveinto@mediotype.com>
 * @copyright 2019 Mediotype. All Rights Reserved.
 */

namespace Mediotype\Employee\Api\Data;

use Magento\Framework\Api\ExtensibleDataInterface;

/**
 * The EmployeeInterface is data interface for the API which helps preserve data integrity. It exposes endpoints
 * for getting and setting all of the various columns and data associated with an employee entity.
 *
 * Interface EmployeeInterface
 * @package Mediotype\Employee\Api\Data
 * @api
 */
interface EmployeeInterface extends ExtensibleDataInterface
{
    /**
     * Constants for keys of data array
     */
    const ID = 'id';
    const EMAIL = 'email';
    const FIRSTNAME = 'firstname';
    const LASTNAME = 'lastname';
    const POSTITION = 'position';
    const HIRE_DATE = 'hire_date';
    const TERMINATION_DATE = 'termination_date';
    const PICTURE = 'picture';
    const CERTIFICATIONS = 'certifications';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    /**
     * Get id
     *
     * @return int|null
     */
    public function getId();

    /**
     * Set id
     *
     * @param int $id
     * @return $this
     */
    public function setId($id);

    /**
     * Get email address
     *
     * @return string
     */
    public function getEmail();

    /**
     * Set email address
     *
     * @param string $email
     * @return $this
     */
    public function setEmail($email);

    /**
     * Get first name
     *
     * @return string
     */
    public function getFirstname();

    /**
     * Set first name
     *
     * @param string $firstname
     * @return $this
     */
    public function setFirstname($firstname);

    /**
     * Get last name
     *
     * @return string
     */
    public function getLastname();

    /**
     * Set last name
     *
     * @param string $lastname
     * @return $this
     */
    public function setLastname($lastname);

    /**
     * Get position
     *
     * @return int
     */
    public function getPosition();

    /**
     * Set position
     *
     * @param int $position
     * @return $this
     */
    public function setPosition($position);

    /**
     * Get hire date
     *
     * @return string|null
     */
    public function getHireDate();

    /**
     * Set hire date
     *
     * @param string $hireDate
     * @return $this
     */
    public function setHireDate($hireDate);

    /**
     * Get termination date
     *
     * @return string|null
     */
    public function getTerminationDate();

    /**
     * Set termination date
     *
     * @param string $terminationDate
     * @return $this
     */
    public function setTerminationDate($terminationDate);

    /**
     * Get picture
     *
     * @return string
     */
    public function getPicture();

    /**
     * Set picture
     *
     * @param string $picture
     * @return $this
     */
    public function setPicture($picture);

    /**
     * Get certifications
     *
     * @return string
     */
    public function getCertifications();

    /**
     * Set certifications
     *
     * @param array $certifications
     * @return $this
     */
    public function setCertifications($certifications);

    /**
     * Get created at time
     *
     * @return string|null
     */
    public function getCreatedAt();

    /**
     * Set created at time
     *
     * @param string $createdAt
     * @return $this
     */
    public function setCreatedAt($createdAt);

    /**
     * Get updated at time
     *
     * @return string|null
     */
    public function getUpdatedAt();

    /**
     * Set updated at time
     *
     * @param string $updatedAt
     * @return $this
     */
    public function setUpdatedAt($updatedAt);
}

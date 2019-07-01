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
    const GENDER = 'gender';

    /**
     * Constants for gender values
     */
    const GENDER_MALE = 1;
    const GENDER_FEMALE = 2;

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
     * @return \Mediotype\Employee\Api\Data\EmployeeInterface
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
     * @return \Mediotype\Employee\Api\Data\EmployeeInterface
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
     * @return \Mediotype\Employee\Api\Data\EmployeeInterface
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
     * @return \Mediotype\Employee\Api\Data\EmployeeInterface
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
     * @return \Mediotype\Employee\Api\Data\EmployeeInterface
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
     * @return \Mediotype\Employee\Api\Data\EmployeeInterface
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
     * @return \Mediotype\Employee\Api\Data\EmployeeInterface
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
     * @return \Mediotype\Employee\Api\Data\EmployeeInterface
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
     * @return \Mediotype\Employee\Api\Data\EmployeeInterface
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
     * @return \Mediotype\Employee\Api\Data\EmployeeInterface
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
     * @return \Mediotype\Employee\Api\Data\EmployeeInterface
     */
    public function setUpdatedAt($updatedAt);

    /**
     * Get employee gender
     *
     * @return string|null
     */
    public function getGender();

    /**
     * Set employee gender
     *
     * @param int $gender
     * @return \Mediotype\Employee\Api\Data\EmployeeInterface
     */
    public function setGender($gender);
}

<?php
/**
 * @author    Mediotype Development <diveinto@mediotype.com>
 * @copyright 2019 Mediotype. All Rights Reserved.
 */

namespace Mediotype\Employee\Api;

/**
 * This is the Employee CRUD interface. This interface is used as an entry point for interacting with the
 * Employee data entity.
 *
 * Interface EmployeeRepositoryInterface
 * @package Mediotype\Employee\Api
 * @api
 */
interface EmployeeRepositoryInterface
{
    /**
     * save is used to persist an employee to a database, it accepts an EmployeeInterface object as an argument.
     *
     * @param \Mediotype\Employee\Api\Data\EmployeeInterface $employee
     */
    public function save(\Mediotype\Employee\Api\Data\EmployeeInterface $employee);

    /**
     * getById accepts an integer as the id for a given employee to be retrieved from a database.
     *
     * @param int $id
     * @return \Mediotype\Employee\Api\Data\EmployeeInterface
     */
    public function getById($id);

    /**
     * getList retrieves a list of employees and accepts a SearchCriteriaInterface as an argument. This allows
     * for someone to specify and implementation where they would like to get specific employees by a given
     * criteria. This could be by name, created_at, etc depending on the implementation of the method.
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Mediotype\Employee\Api\Data\EmployeeInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);

    /**
     * delete removes a given employee from the database, it accepts an EmployeeInterface as an argument.
     *
     * @param \Mediotype\Employee\Api\Data\EmployeeInterface $employee
     * @return bool true on success
     * @throws \Magento\Framework\Exception\StateException If customer group cannot be deleted
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(\Mediotype\Employee\Api\Data\EmployeeInterface $employee);

    /**
     * deleteById deleted an employee by id and takes an integer as an argument.
     *
     * @param int $id
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\StateException If customer group cannot be deleted
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($id);
}

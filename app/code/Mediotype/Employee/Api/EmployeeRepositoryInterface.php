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
 * @api
 */
interface EmployeeRepositoryInterface
{
    /**
     * Persist an employee to the data store
     *
     * save is used to persist an employee to a database, it accepts an EmployeeInterface object as an argument.
     *
     * @param \Mediotype\Employee\Api\Data\EmployeeInterface $employee
     * @return \Magento\Customer\Api\Data\AddressInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function save(\Mediotype\Employee\Api\Data\EmployeeInterface $employee);

    /**
     * Retrieve an employee by their unique identifier.
     *
     * getById accepts an integer as the id for a given employee to be retrieved from a database.
     *
     * @param int $id
     * @return \Mediotype\Employee\Api\Data\EmployeeInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById($id);

    /**
     * Retrieve employees matching the specified criteria.
     *
     * getList retrieves a list of employees and accepts a SearchCriteriaInterface as an argument. This allows
     * for someone to specify and implementation where they would like to get specific employees by a given
     * criteria. This could be by name, created_at, etc depending on the implementation of the method.
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Mediotype\Employee\Api\Data\EmployeeInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);

    /**
     * Remove an employee record from the datastore.
     *
     * delete removes a given employee from the database, it accepts an EmployeeInterface as an argument.
     *
     * @param \Mediotype\Employee\Api\Data\EmployeeInterface $employee
     * @return bool true on success
     * @throws \Magento\Framework\Exception\CouldNotDeleteException
     */
    public function delete(\Mediotype\Employee\Api\Data\EmployeeInterface $employee);

    /**
     * Remove an employee record from the datastore given their ID.
     *
     * deleteById deleted an employee by ID and takes an integer as an argument.
     *
     * @param int $id
     * @return bool true on success
     * @throws \Magento\Framework\Exception\CouldNotDeleteException
     */
    public function deleteById($id);
}

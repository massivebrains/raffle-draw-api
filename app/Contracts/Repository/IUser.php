<?php

namespace App\Contracts\Repository;

use App\Contracts\IRepository;
use App\DTOs\CreateUserDTO;
use App\DTOs\UpdateUserDTO;
use App\DTOs\UpdateUserEmailVerifyDTO;
use App\Exceptions\RepositoryException;

interface IUser extends IRepository
{
    /**
     * Creates a user.
     * @param CreateUserDTO $attributes object of the details to be persisted.
     * @return mixed Last record inserted.
     * @throws RepositoryException
     */
    public function create(CreateUserDTO $attributes);

    /**
     * Update a user details.
     * @param string $id ID of the user to update.
     * @param UpdateUserDTO $attributes object of the details to be updated.
     * @return mixed Last record inserted.
     * @throws RepositoryException
     */
    public function update(string $id, UpdateUserDTO $attributes);

    /**
     * Retrieves all admin users.
     * @param string $username the username of the user
     * @return mixed
     * @throws RepositoryException
     */
    public function showByUsername(string $username);

    public function nameByEmailExist(array $details);

    public function nameByUsernameExist(array $details);

    public function verifyEmail(int $userID, UpdateUserEmailVerifyDTO $details);

    public function getByEmail(string $email);
    public function getAllAdmin();
    public function getAllPlayers();
    public function getStat();
    public function updatePassword($userID, $password);
}

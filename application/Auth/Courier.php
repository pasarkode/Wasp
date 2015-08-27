<?php namespace App\Auth;

use Wasp\ShieldWall\Courier\CourierInterface,
	Wasp\DI\DependencyInjectionAwareTrait,
	Wasp\ShieldWall\User\UserContractInterface,
	App\Models\User;

/**
 * The courier interface class
 *
 * @package Wasp
 * @subpackage Auth
 * @author Dan Cox
 */
class Courier implements CourierInterface
{
	use DependencyInjectionAwareTrait;

	/**
	 * Returns a user contract for the given token
	 *
	 * @param String $token
	 * @return \Wasp\ShieldWall\User\UserContractInterface
	 * @author Dan Cox
	 */
	public function getUserByRememberToken($token)
	{
		$user = $this->DI->get('entity')
						->load('App\Models\User')
						->findOneBy(['token' => $token]);

		return $user;
	}

	/**
	 * Returns the contract since our object is the contract
	 *
	 * @param \Wasp\ShieldWall\User\UserContractInterface $contract
	 * @return \App\Models\User
	 * @author Dan Cox
	 */
	public function getUserObjectFromContract(UserContractInterface $contract)
	{
		return $contract;
	}

	/**
	 * Saves the remember token against the user
	 *
	 * @param String $token
	 * @param \Wasp\ShieldWall\User\UserContractInterface $contract
	 * @return void
	 * @author Dan Cox
	 */
	public function saveRememberToken(Array $data, UserContractInterface $contract)
	{
		list($key, $token) = each($data);

		setcookie($key, $token);

		$contract->remember_token = $token;
		$contract->save();
	}

	/**
	 * Returns the user contract by its identifier
	 *
	 * @param String $identifier
	 * @return void
	 * @author Dan Cox
	 */
	public function getUserContractByIdentifier($identifier)
	{
		$user = $this->DI->get('entity')
						->load('App\Models\User')
						->findOneBy(['email' => $identifier]);

		return $user;
	}

} // END class Courier implements CourierInterface

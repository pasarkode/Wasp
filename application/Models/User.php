<?php namespace App\Models;

use Wasp\Entity\Entity,
	Doctrine\ORM\Mapping as ORM,
	Wasp\ShieldWall\User\UserContractInterface;

/**
 * Entity class for a user
 *
 * @ORM\Entity
 * @package Wasp
 * @subpackage Entities
 * @author Dan Cox
 */
class User extends Entity implements UserContractInterface
{
	/**
	 * The identifier
	 *
	 * @ORM\Id
	 * @ORM\Column(name="id", type="integer")
	 * @ORM\GeneratedValue
	 * @var Integer
	 */
	protected $id;

	/**
	 * The user email
	 *
	 * @ORM\Column(type="string")
	 * @var String
	 */
	protected $email;

	/**
	 * The user password
	 *
	 * @ORM\Column(type="string")
	 * @var String
	 */
	protected $password;

	/**
	 * The remember token storage
	 *
	 * @ORM\Column(type="string", nullable=true)
	 * @var String
	 */
	protected $token;

	/**
	 * Returns the identifing field for user login
	 *
	 * @return String
	 * @author Dan Cox
	 */
	public function getIdentifier()
	{
		return $this->email;
	}

	/**
	 * Returns the password
	 *
	 * @return String
	 * @author Dan Cox
	 */
	public function getPassword()
	{
		return $this->password;
	}

} // END class User extends Entity

<?php
/**
 * PHP version 7.2
 * src\Entity\User.php
 *
 * @category Entities
 * @package  MiW\Results\Entity
 * @author   Javier Gil <franciscojavier.gil@upm.es>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://www.etsisi.upm.es ETS de Ingeniería de Sistemas Informáticos
 */

namespace MiW\Results\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(
 *     name                 = "users",
 *     uniqueConstraints    = {
 *          @ORM\UniqueConstraint(
 *              name="IDX_UNIQ_USER", columns={ "username" }
 *          ),
 *          @ORM\UniqueConstraint(
 *              name="IDX_UNIQ_EMAIL", columns={ "email" }
 *          )
 *      }
 *     )
 * @ORM\Entity
 */
class User implements \JsonSerializable
{
    /**
     * Id
     *
     * @var integer
     *
     * @ORM\Column(
     *     name     = "id",
     *     type     = "integer",
     *     nullable = false
     *     )
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @SuppressWarnings(PHPMD.ShortVariable)
     */
    private $id;

    /**
     * Username
     *
     * @var string
     *
     * @ORM\Column(
     *     name     = "username",
     *     type     = "string",
     *     length   = 40,
     *     nullable = false,
     *     unique   = true
     *     )
     */
    private $username;

    /**
     * Email
     *
     * @var string
     *
     * @ORM\Column(
     *     name     = "email",
     *     type     = "string",
     *     length   = 60,
     *     nullable = false,
     *     unique   = true
     *     )
     */
    private $email;

    /**
     * Enabled
     *
     * @var boolean
     *
     * @ORM\Column(
     *     name     = "enabled",
     *     type     = "boolean",
     *     nullable = false
     *     )
     */
    private $enabled;

    /**
     * IsAdmin
     *
     * @var boolean
     *
     * @ORM\Column(
     *     name     = "admin",
     *     type     = "boolean",
     *     nullable = true,
     *     options  = { "default" = false }
     *     )
     */
    private $isAdmin;

    /**
     * Password
     *
     * @var string
     *
     * @ORM\Column(
     *     name     = "password",
     *     type     = "string",
     *     length   = 60,
     *     nullable = false
     *     )
     */
    private $password;

    /**
     * User constructor.
     *
     * @param string $username username
     * @param string $email    email
     * @param string $password password
     * @param bool   $enabled  enabled
     * @param bool   $isAdmin  isAdmin
     */
    public function __construct(
        string $username = '',
        string $email = '',
        string $password = '',
        bool   $enabled = true,
        bool   $isAdmin = false
    ) {
        $this->id       = 0;
        $this->username = $username;
        $this->email    = $email;
        $this->setPassword($password);
        $this->enabled  = $enabled;
        $this->isAdmin  = $isAdmin;
    }

    /**
     * Set password
     *
     * @param string $password password
     *
     * @return User
     */
    public function setPassword(string $password): User
    {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
        return $this;
    }

    /**
     * Verifies that the given hash matches the user password.
     *
     * @param string $password password
     *
     * @return boolean
     */
    public function validatePassword($password): bool
    {
        return password_verify($password, $this->password);
    }

    /**
     * Representation of User as string
     *
     * @return string
     */
    public function __toString(): string
    {
        return $this->username;
    }

    /**
     * Specify data which should be serialized to JSON
     *
     * @return array
     */
    public function jsonSerialize(): array
    {
        return array(
            'id'            => $this->id,
            'username'      => utf8_encode($this->username),
            'email'         => utf8_encode($this->email),
            'enabled'       => $this->enabled,
            'admin'         => $this->isAdmin
        );
    }
}
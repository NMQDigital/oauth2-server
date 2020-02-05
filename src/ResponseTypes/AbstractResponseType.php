<?php
/**
 * OAuth 2.0 Abstract Response Type.
 *
 * @author      Alex Bilbie <hello@alexbilbie.com>
 * @copyright   Copyright (c) Alex Bilbie
 * @license     http://mit-license.org/
 *
 * @see        https://github.com/thephpleague/oauth2-server
 */

namespace League\OAuth2\Server\ResponseTypes;

use League\OAuth2\Server\CryptKey;
use League\OAuth2\Server\CryptTrait;
use League\OAuth2\Server\Entities\AccessTokenEntityInterface;
use League\OAuth2\Server\Entities\RefreshTokenEntityInterface;

abstract class AbstractResponseType implements ResponseTypeInterface
{
    use CryptTrait;

    /**
     * @var AccessTokenEntityInterface
     */
    protected $accessToken;

    /**
     * @var RefreshTokenEntityInterface
     */
    protected $refreshToken;

    /**
     * @var CryptKey
     */
    protected $privateKey;

    /**
     * @var array extra fields
     */
    protected $extraFields;

    /**
     * {@inheritdoc}
     */
    public function setAccessToken(AccessTokenEntityInterface $accessToken)
    {
        $this->accessToken = $accessToken;
    }

    /**
     * {@inheritdoc}
     */
    public function setRefreshToken(RefreshTokenEntityInterface $refreshToken)
    {
        $this->refreshToken = $refreshToken;
    }

    /**
     * Set the private key.
     */
    public function setPrivateKey(CryptKey $key)
    {
        $this->privateKey = $key;
    }

    /**
     * Set extra fields data to put in response.
     *
     * @param extra data
     */
    public function setExtraFields(array $data)
    {
        $this->extraFields = $data;
    }

    /**
     * Get extra fields data to put in response.
     *
     * @param extra data
     */
    public function getExtraFields()
    {
        return $this->extraFields;
    }
}

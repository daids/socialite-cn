<?php
namespace Dds\SocialiteCn\Two;

use Laravel\Socialite\Two\AbstractProvider;
use Laravel\Socialite\Two\ProviderInterface;
use Laravel\Socialite\Two\User;


class QQProvider extends AbstractProvider implements ProviderInterface
{

	 /**
     * {@inheritdoc}
     */
    protected function getAuthUrl($state)
    {
        return $this->buildAuthUrlFromBase('https://graph.qq.com/oauth2.0/authorize', $state);
    }


    /**
     * {@inheritdoc}
     */
    protected function getTokenUrl()
    {
        return 'https://graph.qq.com/oauth2.0/token';
    }

    /** * Get the access token for the given code.
     *
     * @param  string  $code
     * @return string
     */
    public function getAccessToken($code)
    {
        $response = $this->getHttpClient()->get($this->getTokenUrl(), [
            'query' => $this->getTokenFields($code),
        ]);
        return  $this->parseAccessToken($response->getBody());
    }

    /**
     * {@inheritdoc}
     */
    protected function getTokenFields($code)
    {
        return [
            'client_id' => $this->clientId, 'client_secret' => $this->clientSecret,
            'code' => $code, 'redirect_uri' => $this->redirectUrl,
            'grant_type'=>'authorization_code'
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function getUserByToken($token) { 

        $response = $this->getHttpClient()->get('https://graph.qq.com/user/get_user_info', [
            'query'=>[
                'access_token' => $token,
                'openid' => $this->getOpenId($token),
                'oauth_consumer_key' => $this->clientId,
            ]
        ]);
        return $this->parseJsonResult($response->getBody());
    }

    /**
     * {@inheritdoc}
     */
    protected function mapUserToObject(array $user)
    {
        return (new User)->setRaw($user)->map([
            'id' => $this->openId,
            'nickname' => $user['nickname'],
            'avatar' => $user['figureurl'],
        ]);
    }


    protected function getOpenId($token)
    {
        $response = $this->getHttpClient()->get('https://graph.qq.com/oauth2.0/me', [
            'query' => ['access_token' => $token],
        ]);
        $result = $this->parseJsonResult($response->getBody());
        return $result['openid'];
    }

    /**
     * {@inheritdoc}
     */
    protected function parseAccessToken($body)
    {
        parse_str($this->removeCallback($body));

        return $access_token;
    }

    protected function parseJsonResult($body)
    {
        return json_decode($this->removeCallback($body), true));
    }

    protected function removeCallback($body)
    {
       return str_replace(['callback(',')',';'],'',$body); 
    }

}

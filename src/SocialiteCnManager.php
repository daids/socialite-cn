<?php 
namespace Daids\SocialiteCn;

use Laravel\Socialite\SocialiteManager;

class SocialiteCnManager extends SocialiteManager
{

    /**
     * Create an instance of the specified driver.
     *
     * @return \Laravel\Socialite\Two\AbstractProvider
     */
    protected function createBaiduDriver()
    {
        $config = $this->app['config']['services.baidu'];

        return $this->buildProvider(
            'Daids\SocialiteCn\Two\BaiduProvider', $config
        );
    }

    /**
     * Create an instance of the specified driver.
     *
     * @return \Laravel\Socialite\Two\AbstractProvider
     */
    protected function createQQDriver()
    {
        $config = $this->app['config']['services.qq'];

        return $this->buildProvider(
            'Daids\SocialiteCn\Two\QQProvider', $config
        );
    }

    /**
     * Create an instance of the specified driver.
     *
     * @return \Laravel\Socialite\Two\AbstractProvider
     */
    protected function createWeiboDriver()
    {
        $config = $this->app['config']['services.weibo'];

        return $this->buildProvider(
            'Daids\SocialiteCn\Two\WeiboProvider', $config
        );
    }

    /**
     * Create an instance of the specified driver.
     *
     * @return \Laravel\Socialite\Two\AbstractProvider
     */
    protected function createWeixinDriver()
    {
        $config = $this->app['config']['services.weixin'];

        return $this->buildProvider(
            'Laravel\Socialite\Two\WeixinProvider', $config
        );
    }
}

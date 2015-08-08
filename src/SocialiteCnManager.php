<?php 
namespace Daids\SocialiteCn;

use InvalidArgumentException;
use Laravel\Socialite\SocialiteManager;

use Dds\SocialiteCn\Two\BaiduProvider;
use Dds\SocialiteCn\Two\QQProvider;
use Dds\SocialiteCn\Two\WeiboProvider;
use Dds\SocialiteCn\Two\WeixinProvider;

class SocialiteManager extends Manager implements Contracts\Factory
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
            'Dds\SocialiteCn\Two\BaiduProvider', $config
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
            'Dds\SocialiteCn\Two\QQProvider', $config
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
            'Dds\SocialiteCn\Two\WeiboProvider', $config
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

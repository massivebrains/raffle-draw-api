<?php

namespace App\Utils;



class Config
{

    public $appURL;
    public $iconPath;
    public $bannerPath;
    public $defaultIcon;
    public $defaultBanner;

    public function __construct()
    {
        $this->appURL = config('settings.app_url');
        $this->iconPath = config('settings.icon_path');
        $this->bannerPath = config('settings.banner_path');
        $this->defaultIcon = config('settings.default_icon');
        $this->defaultBanner = config('settings.default_banner');
    }


    private function getIconUrl()
    {
        return "{$this->appURL}/{$this->iconPath}";
    }

    private function getBannerUrl()
    {
        return "{$this->appURL}/{$this->bannerPath}";
    }

    public function generateIconFullPath($item)
    {
        $iconURL = $this->getIconUrl();
        $icon = $item->icon ?: $this->defaultIcon;

        return "{$iconURL}/{$icon}";
    }

    public function generateBannerFullPath($item)
    {
        $bannerURL = $this->getBannerUrl();
        $banner = $item->banner ?: $this->defaultBanner;

        return "{$bannerURL}/{$banner}";
    }
}

<?php
/**
 * Class Controller.
 *
 * @author: Biplob Hossain <biplob.ice@gmail.com>
 *
 * @license MIT
 */
namespace Concrete\Package\ApplauseBtn\Block\ApplauseBtn;

use Concrete\Core\Asset\AssetList;
use Concrete\Core\Block\BlockController;

class Controller extends BlockController
{
    public function getBlockTypeName(): string
    {
        return t('Applause Button');
    }

    public function getBlockTypeDescription(): string
    {
        return t('A zero-configuration button for adding applause / claps to web pages and blog-posts');
    }

    public function on_start(): void
    {
        $al = AssetList::getInstance();
        $al->register('javascript', 'applause-button', 'js/applause-button.js', [], 'applause_btn',);
        $al->register('css', 'applause-button', 'css/applause-button.css', [], 'applause_btn',);
        $al->registerGroup('applause-button', [
            ['css', 'applause-button'],
            ['javascript', 'applause-button']
        ]);
    }

    public function registerViewAssets($outputContent = ''): void
    {
        $this->requireAsset('applause-button');
    }
}

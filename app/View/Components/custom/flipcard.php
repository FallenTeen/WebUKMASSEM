<?php
namespace App\View\Components\Custom;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FlipCard extends Component
{
    public $title;
    public $emoji;
    public $frontContent;
    public $backContent;
    public $actionText;
    public $actionRoute;
    public $backEmoji;
    public $backgroundImageFront;
    public $backgroundImageBack;

    public function __construct(
        $title = 'Card Title',
        $emoji = '🌟',
        $frontContent = 'Front content goes here. This is visible before hovering.',
        $backContent = 'Back content goes here. This is visible after hovering.',
        $actionText = 'Action',
        $backEmoji = '✨',
        $backgroundImageFront = null,
        $actionRoute = null,
        $backgroundImageBack = null
    ) {
        $this->title = $title;
        $this->emoji = $emoji;
        $this->frontContent = $frontContent;
        $this->backContent = $backContent;
        $this->actionText = $actionText;
        $this->backEmoji = $backEmoji;
        $this->backgroundImageFront = $backgroundImageFront;
        $this->actionRoute = $actionRoute;
        $this->backgroundImageBack = $backgroundImageBack;
    }

    public function render(): View
    {
        return view('components.custom.flipcard');
    }

}

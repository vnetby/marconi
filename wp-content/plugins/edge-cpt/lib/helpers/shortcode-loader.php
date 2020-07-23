<?php
namespace BaristaEdge\Modules\Shortcodes\Lib;

use BaristaEdge\Modules\Shortcodes\Accordion\Accordion;
use BaristaEdge\Modules\Shortcodes\AccordionTab\AccordionTab;
use BaristaEdge\Modules\Shortcodes\AnimationsHolder\AnimationsHolder;
use BaristaEdge\Modules\Shortcodes\Banner\Banner;
use BaristaEdge\Modules\Shortcodes\Blockquote\Blockquote;
use BaristaEdge\Modules\Shortcodes\BlogList\BlogList;
use BaristaEdge\Modules\Shortcodes\BlogSlider\BlogSlider;
use BaristaEdge\Modules\Shortcodes\Button\Button;
use BaristaEdge\Modules\Shortcodes\CallToAction\CallToAction;
use BaristaEdge\Modules\Shortcodes\Counter\Countdown;
use BaristaEdge\Modules\Shortcodes\Counter\Counter;
use BaristaEdge\Modules\Shortcodes\CustomFont\CustomFont;
use BaristaEdge\Modules\Shortcodes\Dropcaps\Dropcaps;
use BaristaEdge\Modules\Shortcodes\ElementsHolder\ElementsHolder;
use BaristaEdge\Modules\Shortcodes\ElementsHolderItem\ElementsHolderItem;
use BaristaEdge\Modules\Shortcodes\GoogleMap\GoogleMap;
use BaristaEdge\Modules\Shortcodes\Highlight\Highlight;
use BaristaEdge\Modules\Shortcodes\Icon\Icon;
use BaristaEdge\Modules\Shortcodes\IconListItem\IconListItem;
use BaristaEdge\Modules\Shortcodes\IconWithText\IconWithText;
use BaristaEdge\Modules\Shortcodes\ImageGallery\ImageGallery;
use BaristaEdge\Modules\Shortcodes\ImageWithText\ImageWithText;
use BaristaEdge\Modules\Shortcodes\ItemShowcase\ItemShowcase;
use BaristaEdge\Modules\Shortcodes\ItemShowcaseListItem\ItemShowcaseListItem;
use BaristaEdge\Modules\Shortcodes\Message\Message;
use BaristaEdge\Modules\Shortcodes\OrderedList\OrderedList;
use BaristaEdge\Modules\Shortcodes\PieCharts\PieChartBasic\PieChartBasic;
use BaristaEdge\Modules\Shortcodes\PieCharts\PieChartDoughnut\PieChartDoughnut;
use BaristaEdge\Modules\Shortcodes\PieCharts\PieChartDoughnut\PieChartPie;
use BaristaEdge\Modules\Shortcodes\PieCharts\PieChartWithIcon\PieChartWithIcon;
use BaristaEdge\Modules\Shortcodes\PricingTables\PricingTables;
use BaristaEdge\Modules\Shortcodes\PricingTable\PricingTable;
use BaristaEdge\Modules\Shortcodes\Process\ProcessHolder;
use BaristaEdge\Modules\Shortcodes\Process\ProcessItem;
use BaristaEdge\Modules\Shortcodes\ProgressBar\ProgressBar;
use BaristaEdge\Modules\Shortcodes\ProjectPresentation\ProjectPresentation;
use BaristaEdge\Modules\Shortcodes\ReservationForm\ReservationForm;
use BaristaEdge\Modules\Shortcodes\SectionSubtitle\SectionSubtitle;
use BaristaEdge\Modules\Shortcodes\Separator\Separator;
use BaristaEdge\Modules\Shortcodes\ShopMasonry\ShopMasonry;
use BaristaEdge\Modules\Shortcodes\SocialShare\SocialShare;
use BaristaEdge\Modules\Shortcodes\Tabs\Tabs;
use BaristaEdge\Modules\Shortcodes\Tab\Tab;
use BaristaEdge\Modules\Shortcodes\Team\Team;
use BaristaEdge\Modules\Shortcodes\TitleWithNumber\TitleWithNumber;
use BaristaEdge\Modules\Shortcodes\UnorderedList\UnorderedList;
use BaristaEdge\Modules\Shortcodes\VideoButton\VideoButton;
use BaristaEdge\Modules\Shortcodes\WorkingHours\WorkingHours;

/**
 * Class ShortcodeLoader
 */
class ShortcodeLoader {
    /**
     * @var private instance of current class
     */
    private static $instance;
    /**
     * @var array
     */
    private $loadedShortcodes = array();

    /**
     * Private constuct because of Singletone
     */
    private function __construct() {}

    /**
     * Private sleep because of Singletone
     */
    private function __wakeup() {}

    /**
     * Private clone because of Singletone
     */
    private function __clone() {}

    /**
     * Returns current instance of class
     * @return ShortcodeLoader
     */
    public static function getInstance() {
        if(self::$instance == null) {
            return new self;
        }

        return self::$instance;
    }

    /**
     * Adds new shortcode. Object that it takes must implement ShortcodeInterface
     * @param ShortcodeInterface $shortcode
     */
    private function addShortcode(ShortcodeInterface $shortcode) {
        if(!array_key_exists($shortcode->getBase(), $this->loadedShortcodes)) {
            $this->loadedShortcodes[$shortcode->getBase()] = $shortcode;
        }
    }

    /**
     * Adds all shortcodes.
     *
     * @see ShortcodeLoader::addShortcode()
     */
    private function addShortcodes() {
        $this->addShortcode(new Accordion());
        $this->addShortcode(new AccordionTab());
        $this->addShortcode(new AnimationsHolder());
        $this->addShortcode(new Blockquote());
        $this->addShortcode(new BlogList());
        $this->addShortcode(new BlogSlider());
        $this->addShortcode(new Button());
        $this->addShortcode(new CallToAction());
        $this->addShortcode(new Counter());
        $this->addShortcode(new Countdown());
        $this->addShortcode(new CustomFont());
        $this->addShortcode(new Dropcaps());
        $this->addShortcode(new ElementsHolder());
        $this->addShortcode(new ElementsHolderItem());
        $this->addShortcode(new GoogleMap());
        $this->addShortcode(new Highlight());
        $this->addShortcode(new Icon());
        $this->addShortcode(new IconListItem());
        $this->addShortcode(new IconWithText());
        $this->addShortcode(new ImageGallery());
        $this->addShortcode(new ImageWithText());
        $this->addShortcode(new ItemShowcase());
        $this->addShortcode(new ItemShowcaseListItem());
        $this->addShortcode(new Message());
        $this->addShortcode(new OrderedList());
        $this->addShortcode(new PieChartBasic());
        $this->addShortcode(new PieChartPie());
        $this->addShortcode(new PieChartDoughnut());
        $this->addShortcode(new PieChartWithIcon());
        $this->addShortcode(new PricingTables());
        $this->addShortcode(new PricingTable());
        $this->addShortcode(new ProgressBar());
        $this->addShortcode(new ProcessHolder());
        $this->addShortcode(new ProcessItem());
        $this->addShortcode(new ReservationForm());
        $this->addShortcode(new SectionSubtitle());
        $this->addShortcode(new Separator());
        $this->addShortcode(new SocialShare());
        $this->addShortcode(new Tabs());
        $this->addShortcode(new Tab());
        $this->addShortcode(new Team());
        $this->addShortcode(new TitleWithNumber());
        $this->addShortcode(new UnorderedList());
        $this->addShortcode(new VideoButton());
        $this->addShortcode(new ShopMasonry());
        $this->addShortcode(new Banner());
        $this->addShortcode(new ProjectPresentation());
        $this->addShortcode(new WorkingHours());
    }
    /**
     * Calls ShortcodeLoader::addShortcodes and than loops through added shortcodes and calls render method
     * of each shortcode object
     */
    public function load() {
        $this->addShortcodes();

        foreach ($this->loadedShortcodes as $shortcode) {
            add_shortcode($shortcode->getBase(), array($shortcode, 'render'));
        }
    }
}

$shortcodeLoader = ShortcodeLoader::getInstance();
$shortcodeLoader->load();
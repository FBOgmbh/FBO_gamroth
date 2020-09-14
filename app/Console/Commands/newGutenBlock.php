<?php
/**
 *
 * PHP version >= 7.0
 *
 * @category Console_Command
 * @package  App\Console\Commands
 */

namespace App\Console\Commands;

use Exception;
use Illuminate\Console\Command;
use App\Http\Controllers\Filesystem;

/**
 * Class NewGutenBlock
 *
 * @category Console_Command
 * @package  App\Console\Commands
 */
class NewGutenBlock extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = "new:gutenBlock
        {path : The location where the block directory should be created}
        {pwd? : Passed automatically by bin/gamroth.}";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Add new Gutenberg block";

    /**
     * The block's path
     *
     * @var string
     */
    protected static $gutenblockpath = "../../resources/stubs/gutenblock";

    /**
     * Default params
     */
    protected static $gutenBlockName = "example-block";
    protected static $gutenBlockTitle = "Example Block";
    protected static $gutenBlockSupports = [ "anchor" => false, "align" => false ];
    protected static $gutenBlockKeywords = [];
    protected static $gutenBlockNamespace = 'custom-blocks';
    protected static $gutenBlockTranslation = 'custom-blocks';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        try {
            $this->path = $this->argument('pwd')."/".$this->argument('path')."/";

            $this->getBlockOptions();
        } catch (Exception $e) {
            $this->error(__("An error occurred"));
            dd($e);
        }
    }

    /**
     * get block options
     * @return void
     */
    public function getBlockOptions()
    {
        $blockName = readline(__('Enter a string: '));

        if (empty($blockName)) {
            $blockName = self::$gutenBlockName;
        }

        echo $this->path . $blockName . PHP_EOL;
        Filesystem::rcopy(self::$gutenblockpath, $this->path . $blockName);
    }
}

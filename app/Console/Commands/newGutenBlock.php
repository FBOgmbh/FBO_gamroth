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
        {pwd : Passed automatically by bin/gamroth.}";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Add new Gutenberg block";

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        try {
            $this->path = $this->argument('pwd')."/".$this->argument('path')."/";
            file_put_contents($this->path.'file.txt', 'Hallo world!');
            print $this->path.'file.txt';
            print dirname($this->path);
        } catch (Exception $e) {
            $this->error("An error occurred");
            dd($e);
        }
    }
}

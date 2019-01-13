<?php

namespace SocialiteProviders\Generators\Compilers;

use SocialiteProviders\Generators\Contexts\Stub;
use Illuminate\Contracts\View\Factory as ViewFactory;

class Compiler
{
    /**
     * The filesystem instance.
     *
     * @var \Illuminate\Filesystem\Filesystem
     */
    protected $files;

    /**
     * Blade Engine.
     *
     * @var \Illuminate\View\Factory
     */
    protected $view;

    /**
     * View Context.
     *
     * @var \SocialiteProviders\Generators\Contexts\Stub
     */
    protected $context;

    /**
     * Create a new compiler instance.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->files = app('files');
        $this->view = app(ViewFactory::class);
        $this->context = new Stub($data);
    }

    /**
     * Generate the composer.json.
     */
    public function composer()
    {
        return $this->compile('composer', 'composer.json');
    }

    /**
     * @return \SocialiteProviders\Generators\Contexts\Stub
     */
    public function getContext()
    {
        return $this->context;
    }

    /**
     * Generate the target file from a stub.
     *
     * @param $stub
     * @param $targetLocation
     */
    protected function compile($stub, $targetLocation)
    {
        $view = $this->view->make("generator.stubs::$stub", $this->context->toArray());

        $contents = $view->render();

        if($stub!='composer') {
            $contents = "<?php\r\n\r\n" . $contents;
        }

        $targetDir = base_path('/SocialiteProviders/src/'.$this->context->nameStudlyCase());
        if (!$this->files->isDirectory($targetDir)) {
            $this->files->makeDirectory($targetDir, 0755, true, true);
        }

        $this->files->put($targetDir.'/'.$targetLocation, $contents);
    }
}

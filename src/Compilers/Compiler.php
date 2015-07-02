<?php

namespace SocialiteProviders\Generators\Compilers;

use SocialiteProviders\Generators\Contexts\Stub;

class Compiler
{
    /**
     * The filesystem instance.
     *
     * @var \Illuminate\Filesystem\Filesystem
     */
    protected $files;

    /**
     * Mustache Engine.
     *
     * @var \Mustache_Engine
     */
    protected $mustache;

    /**
     * Mustache Context.
     *
     * @var \SocialiteProviders\Generators\Contexts\Stub
     */
    protected $context;

    /**
     * Path to the folder where the stubs are located.
     *
     * @var string
     */
    protected $stubsPath;

    /**
     * Create a new compiler instance.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->files = app('files');
        $this->mustache = app()->make('Mustache_Engine');
        $this->context = new Stub($data);
        $this->stubsPath = __DIR__.'/../stubs/';
    }

    /**
     * Generate the .gitignore.
     */
    public function gitignore()
    {
        return $this->compile('gitignore.stub', '.gitignore');
    }

    /**
     * Generate the .styleci.yml.
     */
    public function styleci()
    {
        return $this->compile('styleci.stub', '.styleci.yml');
    }

    /**
     * Generate the composer.json.
     */
    public function composer()
    {
        return $this->compile('composer.stub', 'composer.json');
    }

    /**
     * Generate the LICENSE.
     */
    public function license()
    {
        return $this->compile('LICENSE.stub', 'LICENSE');
    }

    /**
     * Generate the README.md.
     */
    public function readme()
    {
        return $this->compile('README.stub', 'README.md');
    }

    /**
     * Generate the target file from a stub.
     *
     * @param $stub
     * @param $targetLocation
     */
    protected function compile($stub, $targetLocation)
    {
        $contents = $this->mustache->render(
            $this->files->get($this->stubsPath.$stub), $this->context
        );

        $targetDir = base_path('/SocialiteProviders/'.$this->context->nameStudlyCase());
        if (!$this->files->isDirectory($targetDir)) {
            $this->files->makeDirectory($targetDir, 0755, true, true);
            $this->files->makeDirectory($targetDir.'/src', 0755, true, true);
        }

        $this->files->put($targetDir.'/'.$targetLocation, $contents);
    }
}

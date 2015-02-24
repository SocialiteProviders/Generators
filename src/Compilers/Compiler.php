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
     * Create a new compiler instance.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->files = app('files');
        $this->mustache = app()->make('Mustache_Engine');
        $this->context = new Stub($data);
    }

    /**
     * Generate the .gitignore.
     */
    public function gitignore()
    {
        return $this->compile(
            __DIR__.'/../stubs/gitignore.stub',
            '.gitignore'
        );
    }

    /**
     * Generate the composer.json.
     */
    public function composer()
    {
        return $this->compile(
            __DIR__.'/../stubs/composer.stub',
            'composer.json'
        );
    }

    /**
     * Generate the LICENSE.
     */
    public function license()
    {
        return $this->compile(
            __DIR__.'/../stubs/LICENSE.stub',
            'LICENSE'
        );
    }

    /**
     * Generate the README.md.
     */
    public function readme()
    {
        return $this->compile(
            __DIR__.'/../stubs/README.stub',
            'README.md'
        );
    }

    /**
     * Generate the target file from a stub.
     *
     * @param $stub
     * @param $targetName
     */
    protected function compile($stub, $targetName)
    {
        $contents = $this->mustache->render(
            $this->files->get($stub), $this->context
        );

        $targetDir = base_path('/SocialiteProviders/'.$this->context->nameStudlyCase());
        if (!$this->files->isDirectory($targetDir)) {
            $this->files->makeDirectory($targetDir, 0755, true, true);
            $this->files->makeDirectory($targetDir.'/src', 0755, true, true);
        }

        $this->files->put($targetDir.'/'.$targetName, $contents);
    }
}

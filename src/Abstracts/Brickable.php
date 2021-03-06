<?php

namespace Okipa\LaravelBrickables\Abstracts;

use Illuminate\Support\Str;
use Okipa\LaravelBrickables\Controllers\BricksController;
use Okipa\LaravelBrickables\Models\Brick;

abstract class Brickable
{
    /** @property string $brickModelClass */
    protected $brickModelClass;

    /** @property string $bricksControllerClass */
    protected $bricksControllerClass;

    /** @property string $label */
    protected $label;

    /** @property string $adminViewPath */
    protected $adminViewPath;

    /** @property string $templateViewPath */
    protected $templateViewPath;

    /** @property array $storeValidationRules */
    protected $storeValidationRules;

    /** @property array $updateValidationRules */
    protected $updateValidationRules;

    /** @property string $storeRouteName */
    protected $storeRouteName;

    /** @property string $editRouteName */
    protected $editRouteName;

    /** @property string $updateRouteName */
    protected $updateRouteName;

    /** @property string $destroyRouteName */
    protected $destroyRouteName;

    /** @property string $moveUpRouteName */
    protected $moveUpRouteName;

    /** @property string $moveUpRouteName */
    protected $moveDownRouteName;

    /**
     * Brickable constructor.
     */
    public function __construct()
    {
        $this->brickModelClass = $this->setBrickModelClass();
        $this->bricksControllerClass = $this->setBricksControllerClass();
        $this->label = $this->setLabel();
        $this->templateViewPath = $this->setBrickViewPath();
        $this->adminViewPath = $this->setFormViewPath();
        $this->storeValidationRules = $this->setStoreValidationRules();
        $this->updateValidationRules = $this->setUpdateValidationRules();
        $this->storeRouteName = $this->setStoreRouteName();
        $this->editRouteName = $this->setEditRouteName();
        $this->updateRouteName = $this->setUpdateRouteName();
        $this->destroyRouteName = $this->setDestroyRouteName();
        $this->moveUpRouteName = $this->setMoveUpRouteName();
        $this->moveDownRouteName = $this->setMoveDownRouteName();
    }

    /**
     * Set the brickable-related brick model class.
     *
     * @return string
     */
    protected function setBrickModelClass(): string
    {
        return config('brickables.bricks.model');
    }

    /**
     * Set the brickable-related controller class.
     *
     * @return string
     */
    protected function setBricksControllerClass(): string
    {
        return config('brickables.bricks.controller');
    }

    /**
     * Set the brickable template view path.
     *
     * @return string
     */
    protected function setBrickViewPath(): string
    {
        return 'laravel-brickables::brickables.' . Str::snake(class_basename($this), '-') . '.brick';
    }

    /**
     * Set the brickable admin view path.
     *
     * @return string
     */
    protected function setFormViewPath(): string
    {
        return 'laravel-brickables::brickables.' . Str::snake(class_basename($this), '-') . '.form';
    }

    /**
     * Set the brickable store route name.
     *
     * @return string
     */
    protected function setStoreRouteName(): string
    {
        return 'brick.store';
    }

    /**
     * Set the brickable edit route name.
     *
     * @return string
     */
    protected function setEditRouteName(): string
    {
        return 'brick.edit';
    }

    /**
     * Set the brickable update route name.
     *
     * @return string
     */
    protected function setUpdateRouteName(): string
    {
        return 'brick.update';
    }

    /**
     * Set the brickable destroy route name.
     *
     * @return string
     */
    protected function setDestroyRouteName(): string
    {
        return 'brick.destroy';
    }

    /**
     * Set the brickable move up route name.
     *
     * @return string
     */
    protected function setMoveUpRouteName(): string
    {
        return 'brick.move.up';
    }

    /**
     * Set the brickable move down route name.
     *
     * @return string
     */
    protected function setMoveDownRouteName(): string
    {
        return 'brick.move.down';
    }

    /**
     * Get the brickable store validation rules.
     *
     * @return array
     */
    public function getStoreValidationRules(): array
    {
        return $this->storeValidationRules;
    }

    /**
     * Set the brickable store validation rules.
     *
     * @return array
     */
    abstract protected function setStoreValidationRules(): array;

    /**
     * Get the brickable update validation rules.
     *
     * @return array
     */
    public function getUpdateValidationRules(): array
    {
        return $this->updateValidationRules;
    }

    /**
     * Set the brickable update validation rules.
     *
     * @return array
     */
    abstract protected function setUpdateValidationRules(): array;

    /**
     * Get the management view path.
     *
     * @return string
     */
    public function getFormViewPath(): string
    {
        return $this->adminViewPath;
    }

    /**
     * Get the template view path.
     *
     * @return string
     */
    public function getBrickViewPath(): string
    {
        return $this->templateViewPath;
    }

    /**
     * Get the brickable label.
     *
     * @return string
     */
    public function getLabel(): string
    {
        return __($this->label);
    }

    /**
     * Set the brickable label.
     *
     * @return string
     */
    public function setLabel(): string
    {
        return ucfirst(Str::snake(class_basename($this), ' '));
    }

    /**
     * Get the brickable store route.
     *
     * @param mixed $parameters
     *
     * @return string
     */
    public function getStoreRoute($parameters = []): string
    {
        return route($this->storeRouteName, $parameters);
    }

    /**
     * Get the brickable edit route.
     *
     * @param mixed $parameters
     *
     * @return string
     */
    public function getEditRoute($parameters = []): string
    {
        return route($this->editRouteName, $parameters);
    }

    /**
     * Get the brickable update route.
     *
     * @param mixed $parameters
     *
     * @return string
     */
    public function getUpdateRoute($parameters = []): string
    {
        return route($this->updateRouteName, $parameters);
    }

    /**
     * Get the brickable destroy route.
     *
     * @param mixed $parameters
     *
     * @return string
     */
    public function getDestroyRoute($parameters = []): string
    {
        return route($this->destroyRouteName, $parameters);
    }

    /**
     * Get the brickable move up route.
     *
     * @param mixed $parameters
     *
     * @return string
     */
    public function getMoveUpRoute($parameters = []): string
    {
        return route($this->moveUpRouteName, $parameters);
    }

    /**
     * Get the brickable move down route.
     *
     * @param mixed $parameters
     *
     * @return string
     */
    public function getMoveDownRoute($parameters = []): string
    {
        return route($this->moveDownRouteName, $parameters);
    }

    /**
     * Get the brickable-related brick model.
     *
     * @return \Okipa\LaravelBrickables\Models\Brick
     */
    public function getBrickModel(): Brick
    {
        return (new $this->brickModelClass);
    }

    /**
     * Get the brickable-related bricks controller.
     *
     * @return \Okipa\LaravelBrickables\Controllers\BricksController
     */
    public function getBricksController(): BricksController
    {
        return (new $this->bricksControllerClass);
    }
}

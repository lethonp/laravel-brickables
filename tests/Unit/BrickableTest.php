<?php

namespace Okipa\LaravelBrickables\Tests\Unit;

use Illuminate\Support\Facades\Route;
use Okipa\LaravelBrickables\Abstracts\Brickable;
use Okipa\LaravelBrickables\Brickables\OneTextColumn;
use Okipa\LaravelBrickables\Models\Brick;
use Okipa\LaravelBrickables\Tests\BrickableTestCase;
use Okipa\LaravelBrickables\Tests\Models\BrickModel;
use Okipa\LaravelBrickables\Tests\Models\Page;

class BrickableTest extends BrickableTestCase
{
    /** @test */
    public function it_can_set_and_returns_model()
    {
        $brickable = new Class extends Brickable {
            public function setBrickModelClass(): string
            {
                return BrickModel::class;
            }

            protected function setStoreValidationRules(): array
            {
                return [];
            }

            protected function setUpdateValidationRules(): array
            {
                return [];
            }
        };
        $this->assertEquals(BrickModel::class, $brickable->getBrickModel()->getMorphClass());
    }

    /** @test */
    public function it_can_set_and_returns_label()
    {
        $brickable = new Class extends Brickable {
            public function setLabel(): string
            {
                return 'Dummy label';
            }

            protected function setStoreValidationRules(): array
            {
                return [];
            }

            protected function setUpdateValidationRules(): array
            {
                return [];
            }
        };
        $this->assertEquals('Dummy label', $brickable->getLabel());
    }

    /** @test */
    public function it_can_set_and_returns_brick_view_path()
    {
        $brickable = new Class extends Brickable {
            public function setBrickViewPath(): string
            {
                return 'dummy.brick.view.path';
            }

            protected function setStoreValidationRules(): array
            {
                return [];
            }

            protected function setUpdateValidationRules(): array
            {
                return [];
            }
        };
        $this->assertEquals('dummy.brick.view.path', $brickable->getBrickViewPath());
    }

    /** @test */
    public function it_can_set_and_returns_form_view_path()
    {
        $brickable = new Class extends Brickable {
            public function setFormViewPath(): string
            {
                return 'dummy.form.view.path';
            }

            protected function setStoreValidationRules(): array
            {
                return [];
            }

            protected function setUpdateValidationRules(): array
            {
                return [];
            }
        };
        $this->assertEquals('dummy.form.view.path', $brickable->getFormViewPath());
    }

    /** @test */
    public function it_can_set_and_returns_store_route()
    {
        Route::post('dummy/store', function () {
        })->name('dummy.store');
        $brickable = new Class extends Brickable {
            public function setStoreRouteName(): string
            {
                return 'dummy.store';
            }

            protected function setStoreValidationRules(): array
            {
                return [];
            }

            protected function setUpdateValidationRules(): array
            {
                return [];
            }
        };
        $this->assertEquals('http://localhost/dummy/store', $brickable->getStoreRoute());
    }

    /** @test */
    public function it_can_set_and_returns_edit_route()
    {
        Route::get('dummy/edit/{brick}', function () {
        })->name('dummy.edit');
        $brickable = new Class extends Brickable {
            public function setEditRouteName(): string
            {
                return 'dummy.edit';
            }

            protected function setStoreValidationRules(): array
            {
                return [];
            }

            protected function setUpdateValidationRules(): array
            {
                return [];
            }
        };
        config()->set('brickables.registered', [get_class($brickable)]);
        $page = factory(Page::class)->create();
        $brick = $page->addBrick(get_class($brickable), []);
        $this->assertEquals('http://localhost/dummy/edit/' . $brick->id, $brickable->getEditRoute($brick));
    }

    /** @test */
    public function it_can_set_and_returns_update_route()
    {
        Route::put('dummy/update/{brick}', function () {
        })->name('dummy.update');
        $brickable = new Class extends Brickable {
            public function setUpdateRouteName(): string
            {
                return 'dummy.update';
            }

            protected function setStoreValidationRules(): array
            {
                return [];
            }

            protected function setUpdateValidationRules(): array
            {
                return [];
            }
        };
        config()->set('brickables.registered', [get_class($brickable)]);
        $page = factory(Page::class)->create();
        $brick = $page->addBrick(get_class($brickable), []);
        $this->assertEquals('http://localhost/dummy/update/' . $brick->id, $brickable->getUpdateRoute($brick));
    }

    /** @test */
    public function it_can_set_and_returns_destroy_route()
    {
        Route::delete('dummy/destroy/{brick}', function () {
        })->name('dummy.destroy');
        $brickable = new Class extends Brickable {
            public function setDestroyRouteName(): string
            {
                return 'dummy.destroy';
            }

            protected function setStoreValidationRules(): array
            {
                return [];
            }

            protected function setUpdateValidationRules(): array
            {
                return [];
            }
        };
        config()->set('brickables.registered', [get_class($brickable)]);
        $page = factory(Page::class)->create();
        $brick = $page->addBrick(get_class($brickable), []);
        $this->assertEquals('http://localhost/dummy/destroy/' . $brick->id, $brickable->getDestroyRoute($brick));
    }

    /** @test */
    public function it_can_set_and_returns_move_up_route()
    {
        Route::post('dummy/move/up/{brick}', function () {
            //
        })->name('dummy.move.up');
        $brickable = new Class extends Brickable {
            public function setMoveUpRouteName(): string
            {
                return 'dummy.move.up';
            }

            protected function setStoreValidationRules(): array
            {
                return [];
            }

            protected function setUpdateValidationRules(): array
            {
                return [];
            }
        };
        config()->set('brickables.registered', [get_class($brickable)]);
        $page = factory(Page::class)->create();
        $brick = $page->addBrick(get_class($brickable), []);
        $this->assertEquals('http://localhost/dummy/move/up/' . $brick->id, $brickable->getMoveUpRoute($brick));
    }

    /** @test */
    public function it_can_set_and_returns_move_down_route()
    {
        Route::post('dummy/move/down/{brick}', function () {
            //
        })->name('dummy.move.down');
        $brickable = new Class extends Brickable {
            public function setMoveDownRouteName(): string
            {
                return 'dummy.move.down';
            }

            protected function setStoreValidationRules(): array
            {
                return [];
            }

            protected function setUpdateValidationRules(): array
            {
                return [];
            }
        };
        config()->set('brickables.registered', [get_class($brickable)]);
        $page = factory(Page::class)->create();
        $brick = $page->addBrick(get_class($brickable), []);
        $this->assertEquals('http://localhost/dummy/move/down/' . $brick->id, $brickable->getMoveDownRoute($brick));
    }

    /** @test */
    public function it_can_set_and_returns_validation_rules()
    {
        $brickable = new Class extends Brickable {
            protected function setStoreValidationRules(): array
            {
                return ['store' => ['validation', 'rules']];
            }

            protected function setUpdateValidationRules(): array
            {
                return ['update' => ['validation', 'rules']];
            }
        };
        $this->assertEquals(['store' => ['validation', 'rules']], $brickable->getStoreValidationRules());
        $this->assertEquals(['update' => ['validation', 'rules']], $brickable->getUpdateValidationRules());
    }
}

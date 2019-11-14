<?php

namespace App\Admin\Controllers;

use App\Models\ClassAssocs;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ClassAssocsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Models\ClassAssocs';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new ClassAssocs);

        $grid->column('ca_id', __('Ca id'));
        $grid->column('uid', __('Uid'));
        $grid->column('cid', __('Cid'));
        $grid->column('bm_id', __('Bm id'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(ClassAssocs::findOrFail($id));

        $show->field('ca_id', __('Ca id'));
        $show->field('uid', __('Uid'));
        $show->field('cid', __('Cid'));
        $show->field('bm_id', __('Bm id'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new ClassAssocs);

        $form->number('uid', __('Uid'));
        $form->number('cid', __('Cid'));
        $form->number('bm_id', __('Bm id'));

        return $form;
    }
}

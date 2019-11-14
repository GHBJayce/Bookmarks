<?php

namespace App\Admin\Controllers;

use App\Models\Classes;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ClassesController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Models\Classes';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Classes);

        $grid->column('cid', __('Cid'));
        $grid->column('uid', __('Uid'));
        $grid->column('name', __('Name'));
        $grid->column('sort', __('Sort'));
        $grid->column('pid', __('Pid'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

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
        $show = new Show(Classes::findOrFail($id));

        $show->field('cid', __('Cid'));
        $show->field('uid', __('Uid'));
        $show->field('name', __('Name'));
        $show->field('sort', __('Sort'));
        $show->field('pid', __('Pid'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Classes);

        $form->number('uid', __('Uid'));
        $form->text('name', __('Name'));
        $form->number('sort', __('Sort'));
        $form->number('pid', __('Pid'));

        return $form;
    }
}

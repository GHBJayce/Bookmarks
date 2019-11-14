<?php

namespace App\Admin\Controllers;

use App\Models\Bookmarks;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class BookmarksController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Models\Bookmarks';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Bookmarks);

        $grid->column('bm_id', __('Bm id'));
        $grid->column('uid', __('Uid'));
        $grid->column('title', __('Title'));
        $grid->column('url', __('Url'));
        $grid->column('access_num', __('Access num'));
        $grid->column('last_access_time', __('Last access time'));
        $grid->column('is_like', __('Is like'));
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
        $show = new Show(Bookmarks::findOrFail($id));

        $show->field('bm_id', __('Bm id'));
        $show->field('uid', __('Uid'));
        $show->field('title', __('Title'));
        $show->field('url', __('Url'));
        $show->field('access_num', __('Access num'));
        $show->field('last_access_time', __('Last access time'));
        $show->field('is_like', __('Is like'));
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
        $form = new Form(new Bookmarks);

        $form->number('uid', __('Uid'));
        $form->text('title', __('Title'));
        $form->url('url', __('Url'));
        $form->number('access_num', __('Access num'));
        $form->number('last_access_time', __('Last access time'));
        $form->switch('is_like', __('Is like'));

        return $form;
    }
}

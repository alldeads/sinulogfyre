<?php

namespace App\Admin\Controllers;

use App\Product;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ProductController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Product';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Product());

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('price', __('Price'));
        $grid->column('quantity', __('Quantity'));
        $grid->column('brief', __('Brief'));
        $grid->column('description', __('Description'));
        $grid->column('avatar_first', __('Avatar first'));
        $grid->column('avatar_second', __('Avatar second'));
        $grid->column('avatar_third', __('Avatar third'));
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
        $show = new Show(Product::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('price', __('Price'));
        $show->field('quantity', __('Quantity'));
        $show->field('brief', __('Brief'));
        $show->field('description', __('Description'));
        $show->field('avatar_first', __('Avatar first'));
        $show->field('avatar_second', __('Avatar second'));
        $show->field('avatar_third', __('Avatar third'));
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
        $form = new Form(new Product());

        $form->text('name', __('Name'));
        $form->decimal('price', __('Price'));
        $form->number('quantity', __('Quantity'));
        $form->textarea('brief', __('Brief'));
        $form->textarea('description', __('Description'));
        $form->textarea('avatar_first', __('Avatar first'));
        $form->textarea('avatar_second', __('Avatar second'));
        $form->textarea('avatar_third', __('Avatar third'));

        return $form;
    }
}

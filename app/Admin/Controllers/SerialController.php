<?php

namespace App\Admin\Controllers;

use App\Serial;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class SerialController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Serial';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Serial());

        $grid->column('id', __('Id'));
        $grid->column('payment_id', __('Payment id'));
        $grid->column('product.name', __('Ticket'));
        $grid->column('number', __('Number'));
        $grid->column('status', __('Status'));
        $grid->column('created_at', __('Created at'));

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
        $show = new Show(Serial::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('payment_id', __('Payment id'));
        $show->field('number', __('Number'));
        $show->field('status', __('Status'));
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
        $form = new Form(new Serial());

        $form->number('payment_id', __('Payment id'));
        $form->select('product_id', __('Ticket'))->options([1 => 'VIP Ticket', 2 => 'GEN AD Ticket']);
        $form->text('number', __('Number'));
        $form->select('status', __('Status'))->options(['available' => 'Available', 'used' => 'Used']);

        return $form;
    }
}

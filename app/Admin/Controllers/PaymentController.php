<?php

namespace App\Admin\Controllers;

use App\Payment;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class PaymentController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Payment';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Payment());

        $grid->column('id', __('Id'));
        $grid->column('method_id', __('Method id'));
        $grid->column('user_id', __('User id'));
        $grid->column('details_id', __('Details id'));
        $grid->column('order_id', __('Order id'));
        $grid->column('status', __('Status'));
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
        $show = new Show(Payment::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('method_id', __('Method id'));
        $show->field('user_id', __('User id'));
        $show->field('details_id', __('Details id'));
        $show->field('order_id', __('Order id'));
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
        $form = new Form(new Payment());

        $form->number('method_id', __('Method id'));
        $form->number('user_id', __('User id'));
        $form->number('details_id', __('Details id'));
        $form->number('order_id', __('Order id'));
        $form->text('status', __('Status'));

        return $form;
    }
}

<?php

namespace App\Admin\Controllers;

use App\Payment;
use App\User;
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
        $grid->column('order.order_number', __('Order #'));
        $grid->column('method.name', __('Payment Method'));
        $grid->column('user.name', __('Referrer'));
        $grid->column('details.full_name', __('Customer'));
        $grid->column('order.total_price', __('Amount'));
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

        $form->hidden('user.id');
        $form->hidden('id');
        $form->display('method.name', __('Payment Method'));
        $form->display('user.name', __('Referrer'));
        $form->display('details.reference_code', __('Transaction Code'));
        $form->display('details.full_name', __('Customer Name'));
        $form->display('order.order_number', __('Order Number'));

        $form->select('status', __('Status'))->options(['pending' => 'Pending', 'paid' => 'Paid', 'declined' => 'Declined', 'duplicated' => 'Duplicated']);

        $form->saving(function (Form $form) {
            
            $status  = $form->status;
            $user_id = $form->user;

            $payment = Payment::find($form->id);

            $user = User::find($user_id);

            $user = $user[0];

            if ( $payment->status == "paid" ) {
                $user->directs = $user->directs - 1;
                $user->save();
            }

            if ( $payment->status != "paid" ) {
                if ( $user && $status == "paid" ) {
                    $user->directs = $user->directs + 1;
                    $user->save();
                }
            }
        });

        return $form;
    }
}

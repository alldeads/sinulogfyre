<?php

namespace App\Admin\Controllers;

use App\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\User';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new User());

        $grid->column('id', __('Id'));

        $grid->column('manager.name',  __('Manager'))->display(function ( $sponsor_id ) {

            if ( $sponsor_id === null ) {
                return "No Manager";
            }

            return $sponsor_id;
        } );
        $grid->column('name', __('Name'));
        $grid->column('token', __('Token'));
        $grid->column('created_at', __('Date Joined'));

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
        $show = new Show(User::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('referral_id', __('Referral id'));
        $show->field('name', __('Name'));
        $show->field('email', __('Email'));
        $show->field('email_verified_at', __('Email verified at'));
        $show->field('password', __('Password'));
        $show->field('token', __('Token'));
        $show->field('remember_token', __('Remember token'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    public function getUser( Request $request ) {
        $q = $request->get('q');

        return User::where('name', 'like', "%$q%")->paginate(null, ['id', 'name as text']);
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new User());

        $form->select('referral_id', __('Manager'))->options(function ($id) {
            $user = User::find($id);

            if ($user) {
                return [$user->id => $user->name];
            }
        })->ajax('/admin/api/users');

        $form->text('name', __('Name'));
        $form->email('email', __('Email'));
        $form->hidden('password', __('Password'))->default(Hash::make('sinulogfyre!'));
        $form->text('token', __('Token'))->default(uniqid())->readonly();

        return $form;
    }
}

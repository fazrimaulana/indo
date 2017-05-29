<?php

namespace Modules\Users\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use App\User;
use Modules\Role\Models\Role;

use Illuminate\Validation\Rule;
use File;
use Hash;

class UserController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index()
	{
		$method_permission = "can_see_users";
		if(Auth::user()->hasRole('root') || Auth::user()->can($method_permission) ){

			$users = User::paginate(10);

			return view('Users::index', [
					"users" => $users
				]);

        }else{
            return view('404');
        }
	}

	public function add()
	{
		$roles = Role::all();
		return view('Users::add',[
				"roles" => $roles
			]);
	}

	public function store(Request $request)
	{
		$method_permission = "can_add_users";
		if(Auth::user()->hasRole('root') || Auth::user()->can($method_permission) ){

			$this->validate($request, [
					"name" => "required",
					"email" => "required|unique:users,email",
					"gender" => "required",
					"username" => "required|unique:users,username",
					"password" => "required",
					"role" => "required"
				]);

			$user = new User;
			$user->username = $request->username;
			$user->name = $request->name;
			$user->gender = $request->gender;
			$user->email = $request->email;
			$user->password = bcrypt($request->password);

			if ($request->file('image')!= null):
            	$upload_dir = "uploads/foto";
            	$namafile   = date("YmdHis")."-".str_slug(pathinfo($request->file('image')->getClientOriginalName(), PATHINFO_FILENAME), '-');
            	$MimeType   = $request->file('image')->getMimeType();
            	/*$file       = $request->file('image');*/
            	$extension  = explode("/", $MimeType)['1'];
            	$fullname   = $upload_dir . "/" . $namafile . "." . $extension;
            	File::makeDirectory($upload_dir, $mode = 0777, true, true);
            	$request->file('image')->move($upload_dir, $fullname);
        	else:
	            $fullname   = null;
        	endif;

        	$user->photo = $fullname;
			$user->save();

			$user->roles()->attach($request->role);

			return redirect('/dashboard/users');


        }else{
            return view('404');
        }
	}

	public function getData(User $user, Request $request)
	{
		$method_permission = "can_edit_users";
		if(Auth::user()->hasRole('root') || Auth::user()->can($method_permission) || Auth::user()->id==$user->id ){

			$roles = Role::all();

			return view('Users::edit', [
					"user" => $user,
					"roles" => $roles
				]);

        }else{
            return view('404');
        }
	}

	public function update(Request $request, User $user)
	{
		$method_permission = "can_edit_users";
		if(Auth::user()->hasRole('root') || Auth::user()->can($method_permission) || Auth::user()->id==$user->id ){

			$this->validate($request, [
					"name" => "required",
					"email" => ["required", Rule::unique('users')->ignore($user->id)],
					"gender" => "required",
					"username" => "required",
					"role" => "required"
				]);

			if ($request->file('image')!= null):

				File::delete($user->photo);				

            	$upload_dir = "uploads/foto";
            	$namafile   = date("YmdHis")."-".str_slug(pathinfo($request->file('image')->getClientOriginalName(), PATHINFO_FILENAME), '-');
            	$MimeType   = $request->file('image')->getMimeType();
            	/*$file       = $request->file('image');*/
            	$extension  = explode("/", $MimeType)['1'];
            	$fullname   = $upload_dir . "/" . $namafile . "." . $extension;
            	File::makeDirectory($upload_dir, $mode = 0777, true, true);
            	$request->file('image')->move($upload_dir, $fullname);

        	else:
	            $fullname   = $user->photo;
        	endif;

			$user->update([
					"username" => $request->username,
					"name" => $request->name,
					"date_of_birth" => $request->date_of_birth,
					"gender" => $request->gender,
					"no_hp" => $request->no_hp,
					"email" => $request->email,
					"photo" => $fullname,
					"address" => $request->address
				]);

			$user->roles()->sync($request->role);

			return redirect('/dashboard/users')->with('status', 'Update Success');

        }else{
            return view('404');
        }
	}

	public function getChangePassword(Request $request, User $user)
	{
		$method_permission = "can_edit_users_password";
		if(Auth::user()->hasRole('root') || Auth::user()->can($method_permission) || Auth::user()->id==$user->id ){

			return view('Users::change_password',[
					"user" => $user
				]);

        }else{
            return view('404');
        }
	}

	public function changePassword(Request $request, User $user)
	{
		$method_permission = "can_edit_users_password";
		if(Auth::user()->hasRole('root') || Auth::user()->can($method_permission) || Auth::user()->id==$user->id ){

			$this->validate($request, [
					"new_password" => "required",
					"current_password" => "required"
				]);

			if (Hash::check($request->current_password, $user->password)) {
				$user->update([
						"password" => bcrypt($request->new_password)
					]);

				return redirect('/dashboard/users')->with('status', 'Change Password Success');

			}
			else
			{
				return redirect()->back()->with('status', 'Change Password Failed');
			}

        }else{
            return view('404');
        }
	}

	public function delete(Request $request)
	{
		$method_permission = "can_delete_users";
		if(Auth::user()->hasRole('root') || Auth::user()->can($method_permission)){

			$user = User::find($request->id);

			File::delete($user->photo);

			$user->delete();

			return redirect()->back()->with('status', 'Delete Success');;


        }else{
            return view('404');
        }
	}

	public function deleteUsers(Request $request)
	{
		$method_permission = "can_delete_users";
		if(Auth::user()->hasRole('root') || Auth::user()->can($method_permission) ){

				if ($request->ajax()) {
					if($request->iduser!=null)
					{
						foreach ($request->iduser as $key => $value) {
							$user = User::find($value);

							foreach ($user->roles as $userRole) {

								if ($userRole->name!="root") 
								{
									File::delete($user->photo);

									$user->delete();		
								}

							}

						}	
						return $request->all();
					}
					else
					{
						return null;
					}
				}
				else
				{
					return view('404');
				}

        }else{
            return view('404');
        }
	}

	public function profile()
	{
		$method_permission = "can_see_users";
		if(Auth::user()->hasRole('root') || Auth::user()->can($method_permission) ){

			$user = User::find(Auth::user()->id);
			$roles = Role::all();

			return view('Users::profile',[
					"user" => $user,
					"roles" => $roles
				]);

        }else{
            return view('404');
        }
	}

	public function detail(User $user)
	{
		$method_permission = "can_see_users";
		if(Auth::user()->hasRole('root') || Auth::user()->can($method_permission) || Auth::user()->id==$user->id ){

			$roles = Role::all();
			return view('Users::profile',[
					"user" => $user,
					"roles" => $roles
				]);

        }else{
            return view('404');
        }
	}

	public function changePhoto(User $user, Request $request){
		$method_permission = "can_edit_users";
		if(Auth::user()->hasRole('root') || Auth::user()->can($method_permission) || Auth::user()->id==$user->id ){

			$this->validate($request, [
					"image" => "required",
				]);

			if ($request->file('image')!= null):

				File::delete($user->photo);				

            	$upload_dir = "uploads/foto";
            	$namafile   = date("YmdHis")."-".str_slug(pathinfo($request->file('image')->getClientOriginalName(), PATHINFO_FILENAME), '-');
            	$MimeType   = $request->file('image')->getMimeType();
            	/*$file       = $request->file('image');*/
            	$extension  = explode("/", $MimeType)['1'];
            	$fullname   = $upload_dir . "/" . $namafile . "." . $extension;
            	File::makeDirectory($upload_dir, $mode = 0777, true, true);
            	$request->file('image')->move($upload_dir, $fullname);

        	else:
	            $fullname   = $user->photo;
        	endif;

			$user->update([
					"photo" => $fullname,
				]);

			return redirect()->back()->with('status_success', 'Update Photo Success');

        }else{
            return view('404');
        }
	}

}
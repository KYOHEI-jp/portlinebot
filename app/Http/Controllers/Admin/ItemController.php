<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Http\Controllers\Controller;
/*use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Requests\CreateItemRequest;
use App\Http\Requests\EditItemRequest;
use Illuminate\Support\Facades\Auth;
*/

class ItemController extends Controller {
	public function index() {
		$items = Item::all();
		return view('admin.index', compact('items'));
	}
	public function detail($id) {
		$item = Item::find($id);
		return view('admin.detail', compact('item'));
	}

	public function showCreateForm() {
		return view('admin.create');
	}

	public function create(CreateItemRequest $request) {
		$item = new Item;
		$item->name = $request->name;
		$item->description = $request->description;
		$item->price = $request->price;
		$item->stock = $request->stock;
		$item->save();
		return redirect(route('admin.index'));
	}

	public function showEditForm($id) {
		$edit_item = Item::find($id);
		return view('admin.edit', compact('edit_item'));
	}

	public function edit($id, EditItemRequest $request) {
		$detail_edit = Item::find($ide);
		$detail_edit->name = $request->name;
		$detail_edit->description = $request->description;
		$detail_edit->stock = $request->stock;
		$detail_edit->save();
		return redirect(route('admin.index');
	}

}

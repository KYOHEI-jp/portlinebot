<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
class ItemController extends Controller {
	public function index() {
		$items = Item::all();
		return view('index', compact('items'));
	}
	public function detail($id) {
		$item = Item::find($id);
		return view('detail', compact('item'));
	}

}

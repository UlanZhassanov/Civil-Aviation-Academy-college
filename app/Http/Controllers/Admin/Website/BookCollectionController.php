<?php

namespace App\Http\Controllers\Admin\Website;

use App\Http\Controllers\Controller;
use App\Models\BookCollection;
use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BookCollectionController extends Controller
{
    public function __construct()
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $book_collection = BookCollection::all();
        return view('admin.website.book_collection.index', compact('book_collection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.website.book_collection.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cover_imgs = [
            'ru' => 'cover_img_ru',
            'kk' => 'cover_img_kk',
            'en' => 'cover_img_en',
        ];
        // Validate Background Images
        foreach ($cover_imgs as $k) {
            $request->validate([
                $k => 'image|mimes:jpeg,png,jpg,gif,pdf,jfif',
            ]);
        }

        $now = date_format(now('Asia/Almaty'), 'Ymd');
        $folder = public_path('/storage/books/book_collection/');
        $user = User::find(Auth::user()->id)->workersInfo;
        $book_id = BookCollection::orderBy('id', 'desc')->first();
        if (empty($book_id)) {
            $book_id = 1;
        } else {
            $book_id = BookCollection::orderBy('id', 'desc')->first();
            $book_id = $book_id->id;
        }
        $data = new BookCollection();


        // Titles
        $titles = [
            'ru' => 'title_ru',
            'kk' => 'title_kk',
            'en' => 'title_en',
        ];
        $title_arr = [];
        foreach ($titles as $k => $v) {
            $res = $request->$v;
            if (empty($res)) {
                $res = $title_arr['ru'];
            }
            $title_arr[$k] = $res;
        }
        $title_obj = json_decode(json_encode($title_arr));
        $title_ser = serialize($title_obj);

        // Author
        $authors = [
            'ru' => 'author_ru',
            'kk' => 'author_kk',
            'en' => 'author_en',
        ];
        $author_arr = [];
        foreach ($authors as $k => $v) {
            $res = $request->$v;
            if (empty($res)) {
                $res = $author_arr['ru'];
            }
            $author_arr[$k] = $res;
        }
        $author_obj = json_decode(json_encode($author_arr));
        $author_ser = serialize($author_obj);

        // Descriptions
        $descs = [
            'ru' => 'desc_ru',
            'kk' => 'desc_kk',
            'en' => 'desc_en',
        ];
        $desc_arr = [];
        foreach ($descs as $k => $v) {
            $res = $request->$v;
            if (empty($res)) {
                $res = $desc_arr['ru'];
            }
            $desc_arr[$k] = $res;
        }
        $desc_obj = json_decode(json_encode($desc_arr));
        $desc_ser = serialize($desc_obj);

        // Background Images
        $bg_arr = [];
        foreach ($cover_imgs as $k => $v) {
            $bg_image = $request->file($v);
            if (!empty($bg_image)) {
                $bg_image_name = $now . $k . $bg_image->getClientOriginalName();
                $bg_image = Image::make($bg_image);
                $bg_image->save($folder . $bg_image_name, 40);
                $bg_arr[$k] = $bg_image_name;
            } else {
                $bg_arr[$k] = null;
            }
        }
        $bg_obj = json_decode(json_encode($bg_arr));
        $bg_ser = serialize($bg_obj);

        // Сохраняём в базу
        $data->user_id = $user->user_id;
        // $data->slug = $book_id + 1;
        $data->titles = $title_ser;
        $data->authors = $author_ser;
        $data->cover_imgs = $bg_ser;
        $data->descriptions = $desc_ser;

        $data->save();

        return redirect()->route('admin.website.book_collection.index')->with('alert', 'Книга успешно добавлена!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book_collection = BookCollection::find($id);
        return view('admin.website.book_collection.edit', compact('book_collection'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // For generate name images ...
        $now = date_format(now('Asia/Almaty'), 'Ymd');
        $folder = public_path('/storage/books/book_collection/');

        $cover_imgs = [
            'ru' => 'cover_img_ru',
            'kk' => 'cover_img_kk',
            'en' => 'cover_img_en',
        ];

        // Validate Background Images
        foreach ($cover_imgs as $cover_img) {
            $request->validate([
                $cover_img => 'image|mimes:jpeg,png,jpg,gif,pdf,jfif',
            ]);
        }

        // Get department name
        $book = BookCollection::find($id);

        // Delete Bg Images
        $oldBgImages = unserialize($book->cover_imgs);
        $oldBgImages = (array) $oldBgImages;

        foreach ($cover_imgs as $k => $v) {
            $cover_img = $request->file($v);
            if (!empty($cover_img)) {
                foreach ($oldBgImages as $oldBgImageKey => $oldBgImageValue) {
                    if ($oldBgImageKey === $k) {
                        File::delete(public_path('/storage/books/book_collection/' . $oldBgImageValue));
                    }
                }
                $bg_image_name = $now . $k . $cover_img->getClientOriginalName();
                $bg_image = Image::make($cover_img);
                $bg_image->save($folder . $bg_image_name, 40);
                $oldBgImages[$k] = $bg_image_name;
            }
        }

        $oldBgImages_obj = json_decode(json_encode($oldBgImages));
        $oldBgImages_ser = serialize($oldBgImages_obj);

        // Titles
        $titles = [
            'ru' => 'title_ru',
            'kk' => 'title_kk',
            'en' => 'title_en',
        ];

        $title_arr = [];

        foreach ($titles as $k => $v) {
            $res = $request->$v;
            if (empty($res)) {
                $res = $title_arr['ru'];
            }
            $title_arr[$k] = $res;
        }

        $title_obj = json_decode(json_encode($title_arr));
        $title_ser = serialize($title_obj);

        // Authors
        $authors = [
            'ru' => 'author_ru',
            'kk' => 'author_kk',
            'en' => 'author_en',
        ];

        $author_arr = [];

        foreach ($authors as $k => $v) {
            $res = $request->$v;
            if (empty($res)) {
                $res = $author_arr['ru'];
            }
            $author_arr[$k] = $res;
        }

        $author_obj = json_decode(json_encode($author_arr));
        $author_ser = serialize($author_obj);

        // Descriptions
        $descs = [
            'ru' => 'desc_ru',
            'kk' => 'desc_kk',
            'en' => 'desc_en',
        ];
        $desc_arr = [];
        foreach ($descs as $k => $v) {
            $res = $request->$v;
            if (empty($res)) {
                $res = $desc_arr['ru'];
            }
            $desc_arr[$k] = $res;
        }
        $desc_obj = json_decode(json_encode($desc_arr));
        $desc_ser = serialize($desc_obj);

        // Сохраняём в базу
        $book->titles = $title_ser;
        $book->authors = $author_ser;
        $book->descriptions = $desc_ser;
        $book->cover_imgs = $oldBgImages_ser;
        $book->save();

        return redirect()->route('admin.website.book_collection.index')->with('alert', 'Книга успешно изменена!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = BookCollection::find($id);
        $bg_images = unserialize($book->bg_images);
        $more_images = unserialize($book->more_images);
        if (!empty($bg_images)) {
            foreach ($bg_images as $bg_image) {
                File::delete(public_path('/storage/books/book_collection/' . $bg_image));
            }
        }
        if (!empty($more_images)) {
            foreach ($more_images as $more_image) {
                File::delete(public_path('/storage/books/book_collection/' . $more_image));
            }
        }
        $book->delete();
        return redirect()->back()->with('alert', 'Книга успешно удалена!');
    }
}

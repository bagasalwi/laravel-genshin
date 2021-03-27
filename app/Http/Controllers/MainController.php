<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    private $characters = "characters";
    private $domains = "domains";
    private $elements = "elements";
    private $materials = "materials";
    private $nations = "nations";
    private $weapons = "weapons";
    private $portrait = "portrait";
    private $icon = "icon";
    
    public function __construct()
    {
        $this->data = resource_path() . '/genshin/data/';
        $this->images = resource_path() . '/genshin/images/';
    }

    public function index(Request $request){
        // $path = public_path() . '\assets\genshin\data\characters\ganyu\en.json';
        
        if($request->type){
            $path = $this->data . $request->type;
            if($request->character_name){
                $path = $this->data . $request->type . '/' . $request->character_name . '/en.json';
            }
        }
        
        if (!file_exists($path)) {
            return "no data";
        }else{
            $json = json_decode(file_get_contents($path), true); 
            return($json);
        }

        // $dir          = public_path() . '\assets\genshin\data'; //path

        // $files = scandir($data);
    }

    public function characters($name = null){
        $pathData = $this->data . $this->characters;
        $pathImages = $this->images . $this->characters;
        $listData = scandir($pathData);
        $listImages = scandir($pathImages);

        if($name){
            $pathData = $this->data . $this->characters . '/' . $name . '/en.json';
            $pathImages = $this->images . $this->characters . '/' . $name . '/icon';

            if (!file_exists($pathData) && !file_exists($pathImages)) {
                return "Fail name";
            }else{
                $data['data'] = json_decode(file_get_contents($pathData), true); 
                $data['imageData'] = $this->get_images($name, 'portrait');

                // dd($data);
                return view('main.character.detail',$data);
            }
        }else{
            $data['arr_data'] = collect(array_slice($listData, 2));
            $data['arr_images'] = collect(array_slice($listImages, 2));
            // $data['image'] = $this->get_images('albedo');

            foreach($data['arr_images'] as $item){
                $newArr[] = (object) array(
                            'name' => $item,
                            // 'portrait' => $this->get_images($item, $this->portrait),
                            // 'icon' => $this->get_images($item, $this->icon),
                            'elements' => $this->get_character_attribute($item, 'vision'),
                            // 'elements_image' => $this->get_element_images($this->get_character_attribute($item, 'vision'))
                        );
            }

            $data['list'] = $newArr;
            $data['pathData'] =  $pathData;
            $data['pathImages'] =  $pathImages;
            
            dd($data['list']);

            return view('main.character.list', $data);
        }

    }

    public function get_character_attribute($name, $atr = null){
        $pathData = $this->data . $this->characters . '/' . $name . '/en.json';

        if (!file_exists($pathData)) {
            return "Fail name";
        }else{
            $data = json_decode(file_get_contents($pathData), true);
            
            if($atr){
                return $data[$atr];
            }else{
                return $data;
            }
        }
    }

    public function get_images($name = null, $type){
        $pathImages = $this->images . $this->characters . '/' . $name . '/' . $type;

        // dd($pathImages);

        if (!file_exists($pathImages)) {
            return "Fail name";
        }else{
            $base64 = 'data:image/png;base64,';
            $image = base64_encode(file_get_contents($pathImages));
            $data = base64_decode($base64 . $image);

            file_put_contents($this->images . $this->characters . '/' . $name . '/' . $name . '.png', $data);
            return ($base64 . $image);
        }
    }

    public function get_element_images($name){
        $pathImages = $this->images . $this->elements . '/' . $name . '/icon';

        if(!file_exists($pathImages)){
            return "Fail name";
        }else{
            $base64 = 'data:image/png;base64,';
            $image = base64_encode(file_get_contents($pathImages));

            // dd($data);
            return ($base64 . $image);
        }
    }

    public function convert_file_to_png(Request $request){
        $pathData = $this->data . $this->characters;
        $pathImages = $this->images . $this->characters;
        $listData = scandir($pathData);
        $listImages = scandir($pathImages);

        $data['arr_data'] = collect(array_slice($listData, 2));
        $data['arr_images'] = collect(array_slice($listImages, 2));
        // $data['image'] = $this->get_images('albedo');

        foreach($data['arr_images'] as $item){
            // dd($this->images . $this->characters . '/' . $item . '/' . 'portrait.png');
            $pathImagesPortrait = $this->images . $this->characters . '/' . $item . '/portrait';
            $pathImagesIcon = $this->images . $this->characters . '/' . $item . '/icon';

            if (!file_exists($pathImagesPortrait)) {
                $message[] = $item . ' portrait failed';
            }else{
                $base64 = 'data:image/png;base64,';
                $image = base64_encode(file_get_contents($pathImagesPortrait));
                $data = base64_decode($image);
                
                file_put_contents($this->images . $this->characters . '/' . $item . '/' . 'portrait.png', $data);
                unlink($this->images . $this->characters . '/' . $item . '/portrait');
                $message[] = $item . ' portrait succeed';
            }

            if (!file_exists($pathImagesIcon)) {
                $message[] = $item . ' icon failed';
            }else{
                $base64 = 'data:image/png;base64,';
                $image = base64_encode(file_get_contents($pathImagesIcon));
                $data = base64_decode($image);
                
                file_put_contents($this->images . $this->characters . '/' . $item . '/' . 'icon.png', $data);
                unlink($this->images . $this->characters . '/' . $item . '/icon');
                $message[] = $item . ' icon succeed';
            }
        } 
        
        return $message;
        
    }
}

<?php 
require '../config/function.php';

$paraRestultId = checkParamId('id');
if(is_numeric($paraRestultId)){
    $slideId = validate($paraRestultId);
    $slide = getById('slider', $slideId);   
    if($slide['status'] == 200){
        $imagePath = $slide['data']['image'];
        if(!empty($imagePath) && file_exists($imagePath)){
            unlink($imagePath);
        }
        $slideDelete = delete('slider',$slideId);
        if($slideDelete){
            redirect('slider.php','slide deleted successfully');
        }else{
            redirect('slider.php',' acnt delete slide');
        }
    }else{
        redirect('slider.php',$slide['message']);
    }
}else{
    redirect('slider.php', 'somthing went wrong');
}
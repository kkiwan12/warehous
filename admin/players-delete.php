    <?php
    require '../config/function.php';

    $paraRestultId = checkParamId('id');
    if(is_numeric($paraRestultId)){
        $playerId = validate($paraRestultId);

        $player = getById('players', $playerId);

        if($player['status'] == 200){
            $deleteInvoices = deleteInvoicesByPlayerId($playerId);
            $deletePlayerFromeClass = deletePlayerFromeClass($playerId);
            if($deleteInvoices){

            $imagePath = $player['data']['image'];
            if(!empty($imagePath) && file_exists($imagePath)){
                unlink($imagePath);
            }
            $playerDelete = delete('players',$playerId);
            if($playerDelete){
                redirect('players.php','the player has been deleted');
            }else{
                redirect('players.php','some thing went wrong');
            }
            }else{
                redirect('players.php','some thing went wrong');
            }
        }else{
            redirect('players.php',$player['message']);
        }
    }else{
        redirect('players.php','some thing went wrong');

    }
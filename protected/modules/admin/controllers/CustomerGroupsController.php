<?php

class GiftVoucherThemesController extends BackendController {

    public function actionIndex() {
        $groups = CustomerGroup::model()->findAll();
        
        $this->render('index', array(
            'groups'=>$groups            
        ));
    }

}
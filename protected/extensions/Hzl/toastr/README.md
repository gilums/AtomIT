// Version 1.0
// correct some errors and enhanced to new version by Scott Huang <zhiliang.huang@gmail.com>
// As for options, please find from //http://codeseven.github.io/toastr/demo.html

Usage:

1. Simple, will use type info, normally write in view file, actually also can write in controller:)
        $this->widget('ext.Hzl.toastr.HzlToastr', array(
            'message' => 'Please enter at least one condition to avoid huge output, thanks.',
        ));

        $this->widget('ext.Hzl.toastr.HzlToastr', array(
            'message' => 'A warning msg test :)',
            'title'=> 'test title',
           'type'=>'warning',  //info,success,warning,error
        ));


2. More option usage, write in view file

        $this->widget('ext.Hzl.toastr.HzlToastr', array(
            'flashMessagesOnly'=> false, //default to false
            // msg will be ignore if flashMessagesOnly set to false
            'title' =>'Enhanced Usage Title',
            'message' => '<div><input class="input-small" value="textbox"/>&nbsp;<a href="http://johnpapa.net" target="_blank">This is a hyperlink</a></div><div><button type="button" id="okBtn" class="btn btn-primary">Close me</button><button type="button" id="surpriseBtn" class="btn" style="margin: 0 8px 0 8px">Surprise me</button></div>',
            //'message' => time().'temp adskfasdf',
            'type' => 'info',
            //the options passed to the plugin
            'options' => array(
                "closeButton" => true,
                "debug" => true,
                "positionClass" => "toast-top-right",
                "showDuration" => "300",
                "hideDuration" => "1000",
                "timeOut" => "15000",
                "extendedTimeOut" => "1000",
                "showEasing" => "swing",
                "hideEasing" => "linear",
                "showMethod" => "fadeIn",
                "hideMethod" => "fadeOut"
            )
        ));

3. Enhanced usage with flash, normally set flash in controller, and get flash from view
    a. In controller
            //set some msg
            //Type will identify by title words, such as type will set by Success if title include success/Success word
                    Yii::app()->user->setFlash('No this Type', 'my test2: The model was saved with success');
                    Yii::app()->user->setFlash('Success:  Contact: ', 'Thank you for contacting us. We will respond to you as soon as possible.');
                    Yii::app()->user->setFlash('error', 'my test: The model was saved with success');


    b. call message in view       
            http://codeseven.github.io/toastr/demo.html
            $this->widget('ext.Hzl.toastr.HzlToastr', array(
                'flashMessagesOnly' => true, //default to false.  True will fetch setFlashes data
                'options' => array(
                    'timeOut' => 8000,
                )
            ));

